<?php
/**
 * 이벤트 카드 컴포넌트
 * 이벤트 정보를 표시하는 재사용 가능한 카드
 */

// 매개변수 설정 (기본값)
$event_id = $event_id ?? '';
$title = $title ?? '이벤트 제목';
$description = $description ?? '이벤트 설명';
$image = $image ?? 'assets/images/events/event-thumb-01.jpg';
$date = $date ?? '2025.04.20';
$time = $time ?? '14:00 - 16:00';
$location = $location ?? '정음 3층 세미나실';
$link = $link ?? 'events.php';
$status = $status ?? 'upcoming'; // upcoming, ongoing, ended
?>

<div class="event-card event-card--<?php echo htmlspecialchars($status); ?>" data-event-id="<?php echo htmlspecialchars($event_id); ?>">
    <div class="event-card__image">
        <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
        <div class="event-card__status">
            <?php 
            switch($status) {
                case 'upcoming':
                    echo '<span class="status-badge status-badge--upcoming">예정</span>';
                    break;
                case 'ongoing':
                    echo '<span class="status-badge status-badge--ongoing">진행중</span>';
                    break;
                case 'ended':
                    echo '<span class="status-badge status-badge--ended">종료</span>';
                    break;
            }
            ?>
        </div>
    </div>
    
    <div class="event-card__content">
        <h3 class="event-card__title"><?php echo htmlspecialchars($title); ?></h3>
        <p class="event-card__description"><?php echo htmlspecialchars($description); ?></p>
        
        <div class="event-card__meta">
            <div class="event-card__datetime">
                <span class="meta-icon">📅</span>
                <span class="meta-text"><?php echo htmlspecialchars($date); ?> <?php echo htmlspecialchars($time); ?></span>
            </div>
            <div class="event-card__location">
                <span class="meta-icon">📍</span>
                <span class="meta-text"><?php echo htmlspecialchars($location); ?></span>
            </div>
        </div>
        
        <div class="event-card__actions">
            <a href="<?php echo htmlspecialchars($link); ?>" class="btn btn--secondary">자세히 보기</a>
        </div>
    </div>
</div>
