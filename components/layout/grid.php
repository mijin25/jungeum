<?php
/**
 * 그리드 컴포넌트
 * 반응형 그리드 레이아웃을 구성하는 재사용 가능한 컴포넌트
 */

// 매개변수 설정 (기본값)
$columns = $columns ?? 3; // 1, 2, 3, 4, 6
$gap = $gap ?? 'medium'; // small, medium, large
$responsive = $responsive ?? true;
$class = $class ?? '';
$items = $items ?? [];
?>

<div class="grid grid--<?php echo htmlspecialchars($columns); ?>-cols grid--gap-<?php echo htmlspecialchars($gap); ?> <?php echo $responsive ? 'grid--responsive' : ''; ?> <?php echo htmlspecialchars($class); ?>">
    <?php if (!empty($items)): ?>
        <?php foreach ($items as $item): ?>
            <div class="grid__item">
                <?php echo $item; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <?php echo $content ?? ''; ?>
    <?php endif; ?>
</div>
