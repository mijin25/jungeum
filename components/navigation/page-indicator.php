<?php
// components/navigation/page-indicator.php
// 피그마 디자인에 맞는 페이지 인디케이터 컴포넌트

// 필요한 변수: $current_page, $total_pages, $type (numbers, dots)
$current_page = $current_page ?? 1;
$total_pages = $total_pages ?? 1;
$type = $type ?? 'numbers'; // 'numbers' 또는 'dots'

if ($total_pages <= 1) {
    return; // 페이지가 1개 이하면 인디케이터를 표시하지 않음
}
?>

<div class="page-indicator" aria-label="페이지 인디케이터">
    <?php if ($type === 'numbers'): ?>
        <div class="page-indicator__numbers">
            <span class="page-indicator__current"><?php echo str_pad($current_page, 2, '0', STR_PAD_LEFT); ?></span>
            <span class="page-indicator__separator">/</span>
            <span class="page-indicator__total"><?php echo str_pad($total_pages, 2, '0', STR_PAD_LEFT); ?></span>
        </div>
    <?php elseif ($type === 'dots'): ?>
        <div class="page-indicator__dots">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <button
                    type="button"
                    class="page-indicator__dot <?php echo $i === $current_page ? 'page-indicator__dot--active' : ''; ?>"
                    aria-label="<?php echo htmlspecialchars($i); ?> 페이지로 이동"
                    <?php echo $i === $current_page ? 'aria-current="true"' : ''; ?>
                ></button>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>