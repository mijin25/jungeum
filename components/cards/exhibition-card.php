<?php
// components/cards/exhibition-card.php
// 피그마 디자인에 맞는 전시 카드 컴포넌트 (데이터 중심)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$title = $data['title'] ?? '김중업 × 르 코르뷔지에 건축사진전';
$date = $data['date'] ?? '2025.09.30 — 2025.10.26';
$image_url = $data['image_url'] ?? $data['image'] ?? '../assets/images/exhibitions/exh-thumb-01.jpg';
$status = $data['status'] ?? 'current'; // current, upcoming, past, none
$link = $data['link'] ?? '#';
$variant = $data['variant'] ?? 'default'; // default, with-tag, empty, none
$is_empty = $data['is_empty'] ?? false;
?>

<div class="exhibition-card<?php echo $is_empty ? ' exhibition-card--empty' : ''; ?>">
    <?php if ($is_empty): ?>
        <!-- 전시 없음 상태 - 일반 전시 카드와 완전히 동일한 구조 -->
        <a href="/contact" class="exhibition-card__link">
            <div class="exhibition-card__image exhibition-card__image--empty">
                <div class="exhibition-card__empty-content">
                    <p class="exhibition-card__empty-text">전시 준비 중</p>
                </div>
            </div>
            
            <div class="exhibition-card__content">
                <div class="exhibition-card__header">
                    <div class="exhibition-card__title">
                        전시 준비 중입니다
                    </div>
                    <!-- 원형 태그 없음 - 일반 전시 카드와 동일 -->
                </div>
                <div class="exhibition-card__date">
                    문의 바로가기
                </div>
            </div>
        </a>
    <?php else: ?>
        <!-- 일반 전시 카드 -->
        <a href="<?php echo htmlspecialchars($link); ?>" class="exhibition-card__link">
            <div class="exhibition-card__image">
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy" />
            </div>
            
            <div class="exhibition-card__content">
                <div class="exhibition-card__header">
                    <div class="exhibition-card__title">
                        <?php echo htmlspecialchars($title); ?>
                    </div>
                    <?php if ($variant === 'with-tag' && $status !== 'past'): ?>
                        <div class="exhibition-card__tag exhibition-card__tag--<?php echo htmlspecialchars($status); ?>">
                            <span class="exhibition-card__tag-text">
                                <?php 
                                if ($status === 'current') {
                                    echo '현재 전시';
                                } elseif ($status === 'upcoming') {
                                    echo '예정 전시';
                                }
                                ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="exhibition-card__date">
                    <?php echo htmlspecialchars($date); ?>
                </div>
            </div>
        </a>
    <?php endif; ?>
</div>