<?php
// components/navigation/pagination.php
// 피그마 디자인에 맞는 페이지네이션 컴포넌트

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$current_page = $data['current_page'] ?? 1;
$total_pages = $data['total_pages'] ?? 1;
$base_url = $data['base_url'] ?? '?page='; // 예: 'exhibitions.php?page='

if ($total_pages <= 1) {
    return; // 페이지가 1개 이하면 페이지네이션을 표시하지 않음
}

$max_visible_pages = 3; // 피그마 디자인: 최대 3개 페이지 번호 표시
$start_page = max(1, $current_page - floor($max_visible_pages / 2));
$end_page = min($total_pages, $start_page + $max_visible_pages - 1);

// 시작 페이지 조정 (끝 페이지가 max_visible_pages보다 작을 경우)
if ($end_page - $start_page + 1 < $max_visible_pages) {
    $start_page = max(1, $end_page - $max_visible_pages + 1);
}
?>

<nav class="pagination" aria-label="페이지네이션">
    <div class="pagination__container">
        <a
            href="<?php echo htmlspecialchars($base_url . max(1, $current_page - 1)); ?>"
            class="pagination__button <?php echo $current_page === 1 ? 'pagination__button--disabled' : ''; ?>"
            aria-label="이전 페이지"
        >
            <img src="assets/images/icons/arrow-left-small.svg" alt="이전" class="pagination__icon">
        </a>

        <div class="pagination__numbers">
            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                <a
                    href="<?php echo htmlspecialchars($base_url . $i); ?>"
                    class="pagination__number <?php echo $i === $current_page ? 'pagination__number--current' : ''; ?>"
                    aria-current="<?php echo $i === $current_page ? 'page' : 'false'; ?>"
                >
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>

        <a
            href="<?php echo htmlspecialchars($base_url . min($total_pages, $current_page + 1)); ?>"
            class="pagination__button <?php echo $current_page === $total_pages ? 'pagination__button--disabled' : ''; ?>"
            aria-label="다음 페이지"
        >
            <img src="assets/images/icons/arrow-right-small.svg" alt="다음" class="pagination__icon">
        </a>
    </div>
</nav>