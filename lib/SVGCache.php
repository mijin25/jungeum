<?php
/**
 * SVG 캐시 관리 클래스
 * SVG 파일을 읽어와 인라인 삽입하는 PHP 캐시 함수
 */

class SVGCache {
    private static $cache = [];
    private static $base_path = 'assets/images/';
    
    /**
     * SVG 파일을 읽어와 인라인으로 삽입
     * @param string $filename SVG 파일명 (경로 포함)
     * @param array $attributes 추가 속성들
     * @return string 인라인 SVG 코드
     */
    public static function get($filename, $attributes = []) {
        $full_path = self::$base_path . $filename;
        
        // 캐시 확인
        if (isset(self::$cache[$full_path])) {
            return self::applyAttributes(self::$cache[$full_path], $attributes);
        }
        
        // 파일 존재 확인
        if (!file_exists($full_path)) {
            return '<!-- SVG 파일을 찾을 수 없습니다: ' . $filename . ' -->';
        }
        
        // SVG 파일 읽기
        $svg_content = file_get_contents($full_path);
        
        // SVG 내용 정리 (하드코딩된 색상 제거)
        $svg_content = self::cleanSvg($svg_content);
        
        // 캐시에 저장
        self::$cache[$full_path] = $svg_content;
        
        return self::applyAttributes($svg_content, $attributes);
    }
    
    /**
     * SVG 내용 정리 (하드코딩된 색상 제거)
     * @param string $svg_content 원본 SVG 내용
     * @return string 정리된 SVG 내용
     */
    private static function cleanSvg($svg_content) {
        // 하드코딩된 색상 코드 제거
        $svg_content = preg_replace('/fill="#[0-9a-fA-F]{6}"/', 'fill="currentColor"', $svg_content);
        $svg_content = preg_replace('/fill="#[0-9a-fA-F]{3}"/', 'fill="currentColor"', $svg_content);
        
        // width/height 속성 제거
        $svg_content = preg_replace('/\s+(width|height)="[^"]*"/', '', $svg_content);
        
        // style 속성 제거
        $svg_content = preg_replace('/\s+style="[^"]*"/', '', $svg_content);
        
        return $svg_content;
    }
    
    /**
     * SVG에 추가 속성 적용
     * @param string $svg_content SVG 내용
     * @param array $attributes 추가 속성들
     * @return string 속성이 적용된 SVG
     */
    private static function applyAttributes($svg_content, $attributes) {
        if (empty($attributes)) {
            return $svg_content;
        }
        
        // SVG 태그에 속성 추가
        $attribute_string = '';
        foreach ($attributes as $key => $value) {
            $attribute_string .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
        }
        
        // 첫 번째 <svg 태그에 속성 추가
        $svg_content = preg_replace(
            '/(<svg[^>]*)/',
            '$1' . $attribute_string,
            $svg_content,
            1
        );
        
        return $svg_content;
    }
    
    /**
     * 캐시 초기화
     */
    public static function clearCache() {
        self::$cache = [];
    }
    
    /**
     * 캐시 상태 확인
     * @return array 캐시된 파일 목록
     */
    public static function getCacheStatus() {
        return array_keys(self::$cache);
    }
}
?>
