<?php
// components/buttons/button.php
// 피그마 디자인에 맞는 버튼 컴포넌트 (데이터 중심)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$text = $data['text'] ?? 'Button';
$type = $data['type'] ?? 'primary';
$size = $data['size'] ?? 'large';
$href = $data['href'] ?? null;
$disabled = $data['disabled'] ?? false;
$icon = $data['icon'] ?? null;
$icon_svg = $data['icon_svg'] ?? null;
$icon_position = $data['icon_position'] ?? 'right';

// 간단한 버튼 클래스 구성
$button_classes = ['btn', 'btn--' . $type, 'btn--' . $size];
if ($disabled) {
    $button_classes[] = 'btn--disabled';
}

// 속성 구성
$attributes = $disabled ? ' disabled' : '';

// 버튼 내용 구성
$button_content = '<span class="btn__text">' . htmlspecialchars($text) . '</span>';

// 아이콘 추가 (간단한 버전)
if ($icon_svg) {
    $button_content = '<span class="btn__icon">' . $icon_svg . '</span>' . $button_content;
}

// 최종 출력
if ($href && !$disabled) {
    echo '<a href="' . htmlspecialchars($href) . '" class="' . implode(' ', $button_classes) . '"' . $attributes . '>' . $button_content . '</a>';
} else {
    echo '<button type="button" class="' . implode(' ', $button_classes) . '"' . $attributes . '>' . $button_content . '</button>';
}
?>