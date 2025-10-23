<?php
/**
 * 로딩 스피너 컴포넌트
 * 로딩 상태를 표시하는 스피너
 */

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$size = $data['size'] ?? 'medium'; // small, medium, large
$color = $data['color'] ?? 'primary'; // primary, secondary, white
$text = $data['text'] ?? '';
$overlay = $data['overlay'] ?? false;
$class = $data['class'] ?? '';
?>

<div class="spinner-container <?php echo $overlay ? 'spinner-container--overlay' : ''; ?> <?php echo htmlspecialchars($class); ?>">
    <div class="spinner spinner--<?php echo htmlspecialchars($size); ?> spinner--<?php echo htmlspecialchars($color); ?>">
        <div class="spinner__circle"></div>
    </div>
    
    <?php if ($text): ?>
        <p class="spinner__text"><?php echo htmlspecialchars($text); ?></p>
    <?php endif; ?>
</div>
