<?php
// components/navigation/scroll-indicator.php
// 피그마 디자인에 맞는 스크롤 인디케이터 컴포넌트

// 필요한 변수: $text, $icon
$text = $text ?? '아래로 스크롤';
$icon = $icon ?? 'assets/images/icons/arrow-down-small.svg';
?>

<div class="scroll-indicator">
    <?php if ($text): ?>
        <span class="scroll-indicator__text"><?php echo htmlspecialchars($text); ?></span>
    <?php endif; ?>
    <?php if ($icon): ?>
        <img src="<?php echo htmlspecialchars($icon); ?>" alt="스크롤" class="scroll-indicator__icon">
    <?php endif; ?>
</div>