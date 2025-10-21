<?php
// components/cards/exhibition-card.php
// 피그마 디자인에 맞는 전시 카드 컴포넌트

// 필요한 변수: $title, $date, $image, $tag_text, $link
$title = $title ?? '대화: 김중업 × 르 코르뷔지에\n두 건축가의 운명적 만남';
$date = $date ?? '2025.09.30 — 2025.10.26';
$image = $image ?? 'assets/images/exhibitions/exh-thumb-01.jpg';
$tag_text = $tag_text ?? '현재\n전시';
$link = $link ?? '#';
?>

<div class="exhibition-card">
    <a href="<?php echo htmlspecialchars($link); ?>" class="exhibition-card__link">
        <div class="exhibition-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
        </div>
        <div class="exhibition-card__content">
            <div class="exhibition-card__text">
                <h3 class="exhibition-card__title"><?php echo nl2br(htmlspecialchars($title)); ?></h3>
                <p class="exhibition-card__date"><?php echo htmlspecialchars($date); ?></p>
            </div>
            <div class="exhibition-card__tag">
                <span class="exhibition-card__tag-text"><?php echo nl2br(htmlspecialchars($tag_text)); ?></span>
            </div>
        </div>
    </a>
</div>