<?php
// components/cards/exhibition-card.php
// 피그마 디자인에 맞는 전시 카드 컴포넌트

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$title = $data['title'] ?? '대화: 김중업 × 르 코르뷔지에\n두 건축가의 운명적 만남';
$date = $data['date'] ?? '2025.09.30 — 2025.10.26';
$image_url = $data['image_url'] ?? $data['image'] ?? '../assets/images/exhibitions/exh-thumb-01.jpg';
$is_current = $data['is_current'] ?? ($data['status'] === 'current');
$link = $data['link'] ?? '#';
?>

<div class="exhibition-card">
    <a href="<?php echo htmlspecialchars($link); ?>" class="exhibition-card__link">
        <div class="exhibition-card__image">
            <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy" />
        </div>
        <div class="exhibition-card__content">
            <div class="exhibition-card__text">
                <h3 class="exhibition-card__title">
                    <?php echo nl2br(htmlspecialchars($title)); ?>
                </h3>
                <p class="exhibition-card__date"><?php echo htmlspecialchars($date); ?></p>
            </div>
            <?php if ($is_current): ?>
                <div class="exhibition-card__tag">
                    <span class="tag-text">현재전시</span>
                </div>
            <?php endif; ?>
        </div>
    </a>
</div>