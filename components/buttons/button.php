<?php
// components/buttons/button.php
// 피그마 디자인에 맞는 버튼 컴포넌트

// 필요한 변수: $text, $type, $size, $href, $disabled, $icon, $icon_position, $icon_svg
$text = $text ?? '버튼';
$type = $type ?? 'primary'; // primary, secondary, text
$size = $size ?? 'large'; // large, medium, xl
$href = $href ?? null;
$disabled = $disabled ?? false;
$icon = $icon ?? null; // 아이콘 경로 (img 태그용)
$icon_svg = $icon_svg ?? null; // 인라인 SVG 코드
$icon_position = $icon_position ?? 'right'; // left, right

$button_classes = ['btn'];
$button_classes[] = 'btn--' . htmlspecialchars($type);
$button_classes[] = 'btn--' . htmlspecialchars($size);

if ($disabled) {
    $button_classes[] = 'btn--disabled';
}

$attributes = '';
if ($disabled) {
    $attributes .= ' disabled';
}

// 버튼 내용 구성
$button_content = '';

// 아이콘 렌더링 함수
function render_icon($icon, $icon_svg, $position) {
    if ($icon_svg) {
        // 인라인 SVG 사용
        return '<span class="btn__icon btn__icon--' . $position . '">' . $icon_svg . '</span>';
    } elseif ($icon) {
        // 이미지 파일 사용
        return '<img src="' . htmlspecialchars($icon) . '" alt="" class="btn__icon btn__icon--' . $position . '">';
    }
    return '';
}

// 아이콘이 있고 위치가 왼쪽인 경우
if (($icon || $icon_svg) && $icon_position === 'left') {
    $button_content .= render_icon($icon, $icon_svg, 'left');
}

// 텍스트
$button_content .= '<span class="btn__text">' . htmlspecialchars($text) . '</span>';

// 아이콘이 있고 위치가 오른쪽인 경우
if (($icon || $icon_svg) && $icon_position === 'right') {
    $button_content .= render_icon($icon, $icon_svg, 'right');
}

if ($href && !$disabled) {
    echo '<a href="' . htmlspecialchars($href) . '" class="' . implode(' ', $button_classes) . '"' . $attributes . '>';
    echo $button_content;
    echo '</a>';
} else {
    echo '<button type="button" class="' . implode(' ', $button_classes) . '"' . $attributes . '>';
    echo $button_content;
    echo '</button>';
}
?>