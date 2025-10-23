<?php
// components/cards/event-card.php
// 피그마 디자인에 맞는 이벤트 카드 컴포넌트 (데이터 중심)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$title = $data['title'] ?? '팝업 스토어 : 간결한 선과 결을 통해 미니멀 디자인의 주얼리 올레프트';
$date = $data['date'] ?? '2025.10.15 — 2025.12.21';
$image = $data['image'] ?? '../assets/images/events/event-thumb-01.jpg';
$link = $data['link'] ?? '#';
$status = $data['status'] ?? 'current'; // current, upcoming, past
$show_tag = $data['show_tag'] ?? true; // 과거 이벤트는 태그 숨김
?>

<div class="event-card">
    <a href="<?php echo htmlspecialchars($link); ?>" class="event-card__link">
        <div class="event-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
            <?php if ($show_tag && $status !== 'past'): ?>
                <div class="event-card__status">
                    <div class="event-card__tag event-card__tag--<?php echo htmlspecialchars($status); ?>">
                        <span class="event-card__tag-text">
                            <?php 
                            if ($status === 'current') {
                                echo '현재';
                            } elseif ($status === 'upcoming') {
                                echo '예정';
                            }
                            ?>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="event-card__content">
            <h3 class="event-card__title heading-h6-emphasized">
                <?php echo htmlspecialchars($title); ?>
            </h3>
            <div class="event-card__date body-lg">
                <?php echo htmlspecialchars($date); ?>
            </div>
        </div>
    </a>
</div>
