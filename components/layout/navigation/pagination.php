<?php
// components/layout/navigation/pagination.php
// 화면설계서 기반 접근 가능한 윈도우 페이지네이션 컴포넌트

// SVGCache 클래스 로드
require_once __DIR__ . '/../../../lib/SVGCache.php';

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$current = max(1, (int)($data['current_page'] ?? 1));
$total = max(1, (int)($data['total_pages'] ?? 1));
$base_url = (string)($data['base_url'] ?? '?page=');
$window = max(3, (int)($data['window'] ?? 5)); // 기본 5개 페이지 표시

// URL 생성 함수
function page_url(string $base, int $n): string {
    $sep = (strpos($base, '?') === false) ? '?' : '&';
    return $base . $sep . 'page=' . $n;
}

/**
 * 윈도우된 페이지 리스트 생성 (ellipsis 포함)
 * @return array [['type'=>'page'|'ellipsis', 'num'=>int|null]]
 */
function build_windowed_pages(int $current, int $total, int $window): array {
    $items = [];
    
    // 전체 페이지가 윈도우 이하이면 모든 페이지 표시
    if ($total <= $window) {
        for ($i = 1; $i <= $total; $i++) {
            $items[] = ['type' => 'page', 'num' => $i];
        }
        return $items;
    }
    
    $half = (int)floor($window / 2);
    $start = max(1, $current - $half);
    $end = min($total, $start + $window - 1);
    
    // 끝에 가까울 때 윈도우 조정
    if ($end - $start + 1 < $window) {
        $start = max(1, $end - $window + 1);
    }
    
    // 첫 페이지 항상 포함 (ellipsis 필요시 추가)
    if ($start > 1) {
        $items[] = ['type' => 'page', 'num' => 1];
        if ($start > 2) {
            $items[] = ['type' => 'ellipsis', 'num' => null];
        }
    }
    
    // 중간 페이지들 표시
    for ($i = $start; $i <= $end; $i++) {
        $items[] = ['type' => 'page', 'num' => $i];
    }
    
    // 마지막 페이지 항상 포함 (ellipsis 필요시 추가)
    if ($end < $total) {
        if ($end < $total - 1) {
            $items[] = ['type' => 'ellipsis', 'num' => null];
        }
        $items[] = ['type' => 'page', 'num' => $total];
    }
    
    return $items;
}

$items = build_windowed_pages($current, $total, $window);

// Prev/Next 상태
$has_prev = $current > 1;
$has_next = $current < $total;

// 아이콘 로드
$chev_left = SVGCache::get('common/icon-arrow-left.svg', ['class' => 'pagination__icon']);
$chev_right = SVGCache::get('common/icon-arrow-right.svg', ['class' => 'pagination__icon']);
?>

<nav class="pagination" aria-label="페이지네이션">
    <div class="pagination__container">
        <!-- 이전 버튼 -->
        <?php if ($has_prev): ?>
            <a class="pagination__button"
               href="<?php echo htmlspecialchars(page_url($base_url, $current - 1)); ?>"
               rel="prev"
               aria-label="이전 페이지">
                <?php echo $chev_left; ?>
            </a>
        <?php else: ?>
            <span class="pagination__button pagination__button--disabled" aria-disabled="true" aria-label="이전 페이지 없음">
                <?php echo $chev_left; ?>
            </span>
        <?php endif; ?>
        
        <!-- 페이지 번호 -->
        <div class="pagination__numbers">
            <?php foreach ($items as $item): ?>
                <?php if ($item['type'] === 'ellipsis'): ?>
                    <span class="pagination__ellipsis" aria-hidden="true">…</span>
                <?php else:
                    $n = (int)$item['num'];
                    if ($n === $current): ?>
                        <span class="pagination__number pagination__number--current" aria-current="page"><?php echo $n; ?></span>
                    <?php else: ?>
                        <a class="pagination__number"
                           href="<?php echo htmlspecialchars(page_url($base_url, $n)); ?>"
                           aria-label="<?php echo $n; ?> 페이지">
                            <?php echo $n; ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <!-- 다음 버튼 -->
        <?php if ($has_next): ?>
            <a class="pagination__button"
               href="<?php echo htmlspecialchars(page_url($base_url, $current + 1)); ?>"
               rel="next"
               aria-label="다음 페이지">
                <?php echo $chev_right; ?>
            </a>
        <?php else: ?>
            <span class="pagination__button pagination__button--disabled" aria-disabled="true" aria-label="다음 페이지 없음">
                <?php echo $chev_right; ?>
            </span>
        <?php endif; ?>
    </div>
</nav>