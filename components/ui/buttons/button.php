<?php
// components/buttons/button.php
// 피그마 디자인에 맞는 버튼 컴포넌트 (데이터 중심)

// SVGCache 클래스 로드
require_once __DIR__ . '/../../../lib/SVGCache.php';

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$text = $data['text'] ?? 'Button';
$type = $data['type'] ?? 'primary';
$size = $data['size'] ?? 'large';
$href = $data['href'] ?? null;
$disabled = $data['disabled'] ?? false;
$icon = $data['icon'] ?? null;
$icon_svg = $data['icon_svg'] ?? null;
$icon_position = $data['icon_position'] ?? 'left';

// 간단한 버튼 클래스 구성
$button_classes = ['btn', 'btn--' . $type, 'btn--' . $size];

// 피그마 디자인에 맞는 텍스트 스타일 클래스 적용
if ($type === 'primary') {
    $button_classes[] = 'body-md-emphasized';
} elseif ($type === 'secondary') {
    $button_classes[] = 'body-sm-emphasized';
} elseif ($type === 'text') {
    $button_classes[] = 'body-lg';
} elseif ($size === 'xl') {
    $button_classes[] = 'display-1';
} elseif ($size === 'small') {
    $button_classes[] = 'body-sm';
} else {
    $button_classes[] = 'body-md';
}

if ($disabled) {
    $button_classes[] = 'btn--disabled';
}

// 속성 구성
$attributes = $disabled ? ' disabled' : '';

// 버튼 내용 구성 (Control 버튼은 텍스트 없음)
$button_content = '';
if ($type !== 'control' && $text) {
    $button_content = '<span class="btn__text">' . htmlspecialchars($text) . '</span>';
}

// 아이콘 추가 (SVGCache 사용)
if ($icon_svg) {
    if ($type === 'control') {
        $button_content = '<span class="btn__icon">' . $icon_svg . '</span>';
    } else {
        $button_content = '<span class="btn__icon">' . $icon_svg . '</span>' . $button_content;
    }
} elseif ($icon) {
    // 실제 SVG 파일 매핑
    $icon_file_map = [
        'plus' => 'common/icon-plus.svg',
        'arrow-right' => 'common/icon-arrow-right-small.svg', // Text 버튼용 작은 아이콘
        'arrow-left' => 'common/icon-arrow-left-small.svg',   // Text 버튼용 작은 아이콘
        'arrow-right-large' => 'common/icon-arrow-right.svg', // Control 버튼용 큰 아이콘
        'arrow-left-large' => 'common/icon-arrow-left.svg',   // Control 버튼용 큰 아이콘
        'upload' => 'common/icon-download.svg', // 업로드 아이콘은 다운로드 아이콘 사용
        'website' => 'common/icon-website.svg',
        // 소셜 아이콘 추가
        'blog' => 'common/icon-social-blog.svg',
        'facebook' => 'common/icon-social-facebook.svg',
        'instagram' => 'common/icon-social-instagram.svg',
        'youtube' => 'common/icon-social-youtube.svg'
    ];
    
    if (isset($icon_file_map[$icon])) {
        $icon_svg = SVGCache::get($icon_file_map[$icon], ['width' => '16', 'height' => '16']);
        if ($type === 'control') {
            $button_content = '<span class="btn__icon">' . $icon_svg . '</span>';
        } else {
            if ($icon_position === 'left') {
                $button_content = '<span class="btn__icon">' . $icon_svg . '</span>' . $button_content;
            } else {
                $button_content = $button_content . '<span class="btn__icon">' . $icon_svg . '</span>';
            }
        }
    }
}

// 최종 출력
if ($href && !$disabled) {
    echo '<a href="' . htmlspecialchars($href) . '" class="' . implode(' ', $button_classes) . '"' . $attributes . '>' . $button_content . '</a>';
} else {
    echo '<button type="button" class="' . implode(' ', $button_classes) . '"' . $attributes . '>' . $button_content . '</button>';
}
?>