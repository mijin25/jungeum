<?php
// components/cards/event-card.php
// 피그마 디자인에 맞는 이벤트 카드 컴포넌트 (데이터 중심)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$title = $data['title'] ?? '팝업 스토어 : 간결한 선과 결을 통해 미니멀 디자인의 주얼리 올레프트';
$date = $data['date'] ?? '2025.10.15 — 2025.12.21';
$image = $data['image'] ?? '../assets/images/events/event-thumb-01.jpg';
$link = $data['link'] ?? '#';
$status = $data['status'] ?? 'current'; // current, upcoming
?>

<div class="event-card">
    <a href="<?php echo htmlspecialchars($link); ?>" class="event-card__link">
        <div class="event-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
            <div class="event-card__status">
                <?php
                $data = [
                    'type' => 'event',
                    'state' => $status,
                    'position' => 'image-over'
                ];
                include __DIR__ . '/../ui/tag.php';
                ?>
            </div>
        </div>
        
        <div class="event-card__content">
            <div class="event-card__title">
                <?php echo htmlspecialchars($title); ?>
            </div>
            <div class="event-card__date">
                <?php echo htmlspecialchars($date); ?>
            </div>
        </div>
    </a>
</div>

<style>
/* 이벤트 카드 컴포넌트 스타일 - 피그마 디자인 기반 */
.event-card {
    display: flex;
    flex-direction: column;
    gap: 24px;
    width: 100%;
    max-width: 442px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card:hover {
    transform: translateY(-4px);
}

/* 카드 링크 */
.event-card__link {
    display: flex;
    flex-direction: column;
    gap: 24px;
    text-decoration: none;
    color: inherit;
    width: 100%;
}

/* 이미지 영역 */
.event-card__image {
    position: relative;
    width: 100%;
    aspect-ratio: 597.333 / 845.78;
    overflow: hidden;
    border-radius: 12px;
}

.event-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
}

.event-card:hover .event-card__image img {
    transform: scale(1.05);
}

/* 상태 태그 영역 */
.event-card__status {
    position: absolute;
    top: 16px;
    right: 16px;
    z-index: 10;
}

/* 콘텐츠 영역 */
.event-card__content {
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 0 4px;
}

/* 제목 */
.event-card__title {
    font-family: "JASOSansBold", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-size: 28px;
    font-weight: 700;
    line-height: 1.4;
    letter-spacing: -0.56px;
    color: #171414;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: keep-all;
}

/* 날짜 */
.event-card__date {
    font-family: "JASOSansRegular", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.6;
    letter-spacing: -0.36px;
    color: #171414;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* 반응형 디자인 */
@media (max-width: 768px) {
    .event-card {
        max-width: 100%;
        gap: 20px;
    }
    
    .event-card__content {
        gap: 12px;
        padding: 0;
    }
    
    .event-card__title {
        font-size: 24px;
        line-height: 1.3;
        letter-spacing: -0.48px;
    }
    
    .event-card__date {
        font-size: 16px;
        line-height: 1.5;
        letter-spacing: -0.32px;
    }
    
    .event-card__status {
        top: 12px;
        right: 12px;
    }
}

@media (max-width: 480px) {
    .event-card {
        gap: 16px;
    }
    
    .event-card__content {
        gap: 10px;
    }
    
    .event-card__title {
        font-size: 20px;
        line-height: 1.3;
        letter-spacing: -0.4px;
    }
    
    .event-card__date {
        font-size: 14px;
        line-height: 1.4;
        letter-spacing: -0.28px;
    }
    
    .event-card__status {
        top: 8px;
        right: 8px;
    }
}
</style>