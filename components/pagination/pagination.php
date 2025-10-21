<?php
/**
 * 페이지네이션 컴포넌트
 * 페이지 번호를 표시하는 페이지네이션
 */

// 매개변수 설정 (기본값)
$current_page = $current_page ?? 1;
$total_pages = $total_pages ?? 1;
$base_url = $base_url ?? '';
$query_param = $query_param ?? 'page';
$show_prev_next = $show_prev_next ?? true;
$show_first_last = $show_first_last ?? true;
$max_visible = $max_visible ?? 5;
$class = $class ?? '';
?>

<nav class="pagination <?php echo htmlspecialchars($class); ?>" aria-label="페이지 네비게이션">
    <ul class="pagination__list">
        
        <?php if ($show_first_last && $current_page > 1): ?>
            <li class="pagination__item">
                <a href="<?php echo htmlspecialchars($base_url . '?' . $query_param . '=1'); ?>" 
                   class="pagination__link pagination__link--first"
                   aria-label="첫 페이지">
                    <span class="pagination__icon">⏮</span>
                </a>
            </li>
        <?php endif; ?>
        
        <?php if ($show_prev_next && $current_page > 1): ?>
            <li class="pagination__item">
                <a href="<?php echo htmlspecialchars($base_url . '?' . $query_param . '=' . ($current_page - 1)); ?>" 
                   class="pagination__link pagination__link--prev"
                   aria-label="이전 페이지">
                    <span class="pagination__icon">◀</span>
                </a>
            </li>
        <?php endif; ?>
        
        <?php
        // 페이지 번호 계산
        $start_page = max(1, $current_page - floor($max_visible / 2));
        $end_page = min($total_pages, $start_page + $max_visible - 1);
        
        if ($end_page - $start_page + 1 < $max_visible) {
            $start_page = max(1, $end_page - $max_visible + 1);
        }
        
        for ($i = $start_page; $i <= $end_page; $i++):
        ?>
            <li class="pagination__item">
                <?php if ($i === $current_page): ?>
                    <span class="pagination__link pagination__link--current" aria-current="page">
                        <?php echo $i; ?>
                    </span>
                <?php else: ?>
                    <a href="<?php echo htmlspecialchars($base_url . '?' . $query_param . '=' . $i); ?>" 
                       class="pagination__link">
                        <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>
        
        <?php if ($show_prev_next && $current_page < $total_pages): ?>
            <li class="pagination__item">
                <a href="<?php echo htmlspecialchars($base_url . '?' . $query_param . '=' . ($current_page + 1)); ?>" 
                   class="pagination__link pagination__link--next"
                   aria-label="다음 페이지">
                    <span class="pagination__icon">▶</span>
                </a>
            </li>
        <?php endif; ?>
        
        <?php if ($show_first_last && $current_page < $total_pages): ?>
            <li class="pagination__item">
                <a href="<?php echo htmlspecialchars($base_url . '?' . $query_param . '=' . $total_pages); ?>" 
                   class="pagination__link pagination__link--last"
                   aria-label="마지막 페이지">
                    <span class="pagination__icon">⏭</span>
                </a>
            </li>
        <?php endif; ?>
        
    </ul>
</nav>
