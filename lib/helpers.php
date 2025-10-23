<?php
/**
 * 컴포넌트 헬퍼 함수들
 * 공통으로 사용되는 유틸리티 함수들을 모아놓은 파일
 */

// SVG 캐시 클래스 로드
require_once __DIR__ . '/../lib/SVGCache.php';

/**
 * SVG 아이콘을 인라인으로 삽입하는 헬퍼 함수
 * @param string $filename SVG 파일명 (경로 포함)
 * @param array $attributes 추가 속성들
 * @return string 인라인 SVG 코드
 */
function svg_icon($filename, $attributes = []) {
    return SVGCache::get($filename, $attributes);
}

/**
 * 공통 아이콘들을 쉽게 사용할 수 있는 함수들
 */

/**
 * 화살표 아이콘
 */
function icon_arrow($direction = 'right', $attributes = []) {
    $filename = 'common/icon-arrow-' . $direction . '.svg';
    return svg_icon($filename, $attributes);
}

/**
 * 체크박스 아이콘
 */
function icon_checkbox($checked = false, $attributes = []) {
    $filename = $checked ? 'common/icon-checkbox-checked-filled.svg' : 'common/icon-checkbox.svg';
    return svg_icon($filename, $attributes);
}

/**
 * 소셜 미디어 아이콘
 */
function icon_social($platform, $attributes = []) {
    $filename = 'common/icon-social-' . $platform . '.svg';
    return svg_icon($filename, $attributes);
}

/**
 * 로고 아이콘
 */
function logo_jungeum($attributes = []) {
    return svg_icon('common/logo-jungeum.svg', $attributes);
}

/**
 * 로고 COOM
 */
function logo_coom($attributes = []) {
    return svg_icon('common/logo-coom.svg', $attributes);
}

/**
 * 안전한 HTML 출력 함수
 * @param string $text 출력할 텍스트
 * @return string 이스케이프된 HTML
 */
function safe_html($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * URL 생성 헬퍼 함수
 * @param string $path 경로
 * @return string 완전한 URL
 */
function url($path = '') {
    $base_url = rtrim($_SERVER['REQUEST_URI'], '/');
    $base_url = dirname($base_url);
    return $base_url . '/' . ltrim($path, '/');
}

/**
 * 에셋 경로 생성 함수
 * @param string $path 에셋 경로
 * @return string 완전한 에셋 URL
 */
function asset($path) {
    return url('assets/' . ltrim($path, '/'));
}

/**
 * CSS 경로 생성 함수
 * @param string $path CSS 파일 경로
 * @return string 완전한 CSS URL
 */
function css($path) {
    return url('css/' . ltrim($path, '/'));
}

/**
 * JavaScript 경로 생성 함수
 * @param string $path JS 파일 경로
 * @return string 완전한 JS URL
 */
function js($path) {
    return url('js/' . ltrim($path, '/'));
}
?>
