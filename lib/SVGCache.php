<?php
/**
 * Robust SVG inline cache & normalizer
 * - Migrates style="..." to attributes
 * - Normalizes colors to currentColor (except fill="none")
 * - Preserves viewBox; only removes width/height if viewBox present (or derive it)
 * - Ensures xmlns
 * - Caches with filemtime
 */
class SVGCache {
    private static array $cache = [];
    private static string $base_path = __DIR__ . '/../assets/images/'; // 필요시 icons로 변경

    public static function setBasePath(string $absPath): void {
        self::$base_path = rtrim($absPath, '/').'/';
    }

    public static function get(string $filename, array $attributes = []): string {
        $full = self::$base_path . ltrim($filename, '/');

        if (!is_file($full)) {
            return '<!-- SVG not found: ' . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . ' -->';
        }

        $mtime = (string)filemtime($full);
        $cacheKey = $full . '::' . $mtime;

        if (isset(self::$cache[$cacheKey])) {
            return self::applyAttributes(self::$cache[$cacheKey], $attributes);
        }

        $raw = file_get_contents($full);
        if ($raw === false) {
            return '<!-- SVG read failed: ' . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . ' -->';
        }

        $normalized = self::normalizeSvg($raw);
        self::$cache = [];                // 메모리 폭증 방지: 간단한 LRU 대신 전체 갱신
        self::$cache[$cacheKey] = $normalized;

        return self::applyAttributes($normalized, $attributes);
    }

    /** Normalize SVG safely using DOMDocument */
    private static function normalizeSvg(string $raw): string {
        // 빠른 방어: XML 선언 제거(있어도 무방하지만 일관성 위해)
        $raw = preg_replace('/^\xEF\xBB\xBF|<\?xml[^>]*\?>/i', '', $raw);

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;

        // 엔티티 확장 방지
        $ok = @$dom->loadXML($raw, LIBXML_NONET);
        if (!$ok) {
            // 파싱 실패 시 기존 로직으로 최소한의 치환만 하고 반환
            return self::fallbackClean($raw);
        }

        /** @var \DOMElement|null $svg */
        $svg = $dom->getElementsByTagName('svg')->item(0);
        if (!$svg) return self::fallbackClean($raw);

        // xmlns 보장
        if (!$svg->hasAttribute('xmlns')) {
            $svg->setAttribute('xmlns', 'http://www.w3.org/2000/svg');
        }

        // 렌더링 품질 개선
        if (!$svg->hasAttribute('shape-rendering')) {
            $svg->setAttribute('shape-rendering', 'geometricPrecision');
        }

        // viewBox/width/height 정리
        $hasViewBox = $svg->hasAttribute('viewBox');
        if (!$hasViewBox) {
            // width/height로부터 유추 (px/숫자만 처리)
            $w = self::extractNumber($svg->getAttribute('width'));
            $h = self::extractNumber($svg->getAttribute('height'));
            if ($w > 0 && $h > 0) {
                $svg->setAttribute('viewBox', '0 0 ' . $w . ' ' . $h);
                $hasViewBox = true;
            }
        }
        // viewBox가 있으면 width/height 제거 (CSS로 제어)
        if ($hasViewBox) {
            $svg->removeAttribute('width');
            $svg->removeAttribute('height');
        }

        // 모든 노드 순회: style → 개별 속성, 색상 정규화
        $xpath = new \DOMXPath($dom);
        foreach ($xpath->query('//*') as $el) {
            if (!($el instanceof \DOMElement)) continue;

            // style 파싱 → 속성으로 승격
            if ($el->hasAttribute('style')) {
                $style = $el->getAttribute('style');
                foreach (self::parseStyle($style) as $k => $v) {
                    $el->setAttribute($k, $v);
                }
                $el->removeAttribute('style');
            }

            // 색상 정규화 (fill/stroke)
            foreach (['fill','stroke'] as $attr) {
                if ($el->hasAttribute($attr)) {
                    $val = trim($el->getAttribute($attr));
                    if ($attr === 'fill' && strtolower($val) === 'none') {
                        // 그대로 유지
                    } else {
                        $el->setAttribute($attr, self::toCurrentColor($val));
                    }
                }
            }

            // 면형 아이콘에서 stroke 제거 (fill이 있고 stroke가 있는 경우)
            if ($el->hasAttribute('fill') && $el->hasAttribute('stroke')) {
                $fillVal = strtolower(trim($el->getAttribute('fill')));
                if ($fillVal !== 'none' && $fillVal !== 'currentcolor') {
                    $el->removeAttribute('stroke');
                }
            }

            // stroke가 있는데 fill이 없으면 fill="none" 보강 (stroke 아이콘 가독성)
            if ($el->hasAttribute('stroke') && !$el->hasAttribute('fill')) {
                $el->setAttribute('fill', 'none');
            }

            // stroke 아이콘 품질 개선 (선형 아이콘만)
            if ($el->hasAttribute('stroke') && !$el->hasAttribute('fill')) {
                // stroke-linecap 기본값 설정 (화살표 머리 부분 개선)
                if (!$el->hasAttribute('stroke-linecap')) {
                    $el->setAttribute('stroke-linecap', 'round');
                }
                // stroke-linejoin 기본값 설정 (연결 부분 부드럽게)
                if (!$el->hasAttribute('stroke-linejoin')) {
                    $el->setAttribute('stroke-linejoin', 'round');
                }
            }
        }

        // 문자열로 반환
        $out = $dom->saveXML($svg);
        return $out ?: self::fallbackClean($raw);
    }

    private static function extractNumber(string $v): float {
        // "24", "24px", "24.0px" 등 처리
        if ($v === '') return 0.0;
        if (preg_match('/([0-9]*\.?[0-9]+)/', $v, $m)) return (float)$m[1];
        return 0.0;
    }

    private static function parseStyle(string $style): array {
        $result = [];
        foreach (explode(';', $style) as $decl) {
            if (strpos($decl, ':') === false) continue;
            [$prop, $val] = array_map('trim', explode(':', $decl, 2));
            $prop = strtolower($prop);
            $val  = trim($val);
            // 관심 속성만 승격
            if (in_array($prop, ['fill','stroke','stroke-width','stroke-linecap','stroke-linejoin','stroke-miterlimit','shape-rendering'], true)) {
                if ($prop === 'fill' && strtolower($val) === 'none') {
                    $result[$prop] = 'none';
                } else {
                    $result[$prop] = self::toCurrentColor($val);
                }
            }
        }
        return $result;
    }

    /** normalize any color to currentColor (except 'none') */
    private static function toCurrentColor(string $val): string {
        $v = strtolower($val);
        if ($v === 'none' || $v === 'currentcolor') return $val;

        // hex/rgb/rgba/hsl/hsla/named 모두 currentColor로
        if (preg_match('/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', $v)) return 'currentColor';
        if (preg_match('/^(rgb|rgba|hsl|hsla)\s*\(/i', $v)) return 'currentColor';
        // 흔한 네임드 컬러
        $named = ['black','white','red','green','blue','gray','grey','silver','maroon','navy','purple','teal','olive','lime','aqua','fuchsia','yellow','orange'];
        if (in_array($v, $named, true)) return 'currentColor';

        // 알 수 없으면 원본 유지(안전)
        return $val;
    }

    /** 매우 보수적인 폴백: 기존 정규식 치환 개선판 */
    private static function fallbackClean(string $svg): string {
        // 색상 → currentColor (hex/rgb/hsl/네임드)
        $svg = preg_replace('/\bfill\s*=\s*"(#(?:[0-9a-f]{3}|[0-9a-f]{6}))"/i', 'fill="currentColor"', $svg);
        $svg = preg_replace('/\bstroke\s*=\s*"(#(?:[0-9a-f]{3}|[0-9a-f]{6}))"/i', 'stroke="currentColor"', $svg);
        $svg = preg_replace('/\bfill\s*=\s*"(rgb[a]?\([^)]+\)|hsl[a]?\([^)]+\)|black|white)"/i', 'fill="currentColor"', $svg);
        $svg = preg_replace('/\bstroke\s*=\s*"(rgb[a]?\([^)]+\)|hsl[a]?\([^)]+\)|black|white)"/i', 'stroke="currentColor"', $svg);
        // style 제거 전 fill/stroke만 추출하지는 못하지만 최소한 style 속성은 유지
        // width/height는 viewBox 있을 때만 제거
        if (preg_match('/viewBox="/i', $svg)) {
            $svg = preg_replace('/\s+(width|height)="[^"]*"/i', '', $svg);
        }
        return $svg;
    }

    private static function applyAttributes(string $svg, array $attrs): string {
        if (!$attrs) return $svg;
        $buf = '';
        foreach ($attrs as $k => $v) {
            $buf .= ' ' . $k . '="' . htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8') . '"';
        }
        return preg_replace('/(<svg\b[^>]*)(>)/i', '$1' . $buf . '$2', $svg, 1);
    }

    public static function clearCache(): void { self::$cache = []; }
    public static function getCacheStatus(): array { return array_keys(self::$cache); }
}