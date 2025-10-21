<?php
/**
 * 로딩 스피너 컴포넌트
 * 로딩 상태를 표시하는 스피너
 */

// 매개변수 설정 (기본값)
$size = $size ?? 'medium'; // small, medium, large
$color = $color ?? 'primary'; // primary, secondary, white
$text = $text ?? '';
$overlay = $overlay ?? false;
$class = $class ?? '';
?>

<div class="spinner-container <?php echo $overlay ? 'spinner-container--overlay' : ''; ?> <?php echo htmlspecialchars($class); ?>">
    <div class="spinner spinner--<?php echo htmlspecialchars($size); ?> spinner--<?php echo htmlspecialchars($color); ?>">
        <div class="spinner__circle"></div>
    </div>
    
    <?php if ($text): ?>
        <p class="spinner__text"><?php echo htmlspecialchars($text); ?></p>
    <?php endif; ?>
</div>
