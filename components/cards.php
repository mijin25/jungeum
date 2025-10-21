<?php
/**
 * 카드 컴포넌트 통합 파일
 * 모든 카드 타입을 하나의 파일에서 관리
 */

function renderExhibitionCard($data = []) {
    $exhibition_id = $data['exhibition_id'] ?? '';
    $title = $data['title'] ?? '전시 제목';
    $description = $data['description'] ?? '전시 설명';
    $image = $data['image'] ?? 'assets/images/exhibitions/exh-thumb-01.jpg';
    $date = $data['date'] ?? '2025.01.15 - 2025.03.15';
    $location = $data['location'] ?? '정음 1층 전시실';
    $link = $data['link'] ?? 'exhibitions.php';
    $featured = $data['featured'] ?? false;
    ?>
    <div class="exhibition-card <?php echo $featured ? 'exhibition-card--featured' : ''; ?>" data-exhibition-id="<?php echo htmlspecialchars($exhibition_id); ?>">
        <div class="exhibition-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
            <?php if ($featured): ?>
                <div class="exhibition-card__badge">현재 전시</div>
            <?php endif; ?>
        </div>
        
        <div class="exhibition-card__content">
            <h3 class="exhibition-card__title"><?php echo htmlspecialchars($title); ?></h3>
            <p class="exhibition-card__description"><?php echo htmlspecialchars($description); ?></p>
            
            <div class="exhibition-card__meta">
                <div class="exhibition-card__date">
                    <span class="meta-icon">📅</span>
                    <span class="meta-text"><?php echo htmlspecialchars($date); ?></span>
                </div>
                <div class="exhibition-card__location">
                    <span class="meta-icon">📍</span>
                    <span class="meta-text"><?php echo htmlspecialchars($location); ?></span>
                </div>
            </div>
            
            <div class="exhibition-card__actions">
                <a href="<?php echo htmlspecialchars($link); ?>" class="btn btn--primary">자세히 보기</a>
            </div>
        </div>
    </div>
    <?php
}

function renderEventCard($data = []) {
    $event_id = $data['event_id'] ?? '';
    $title = $data['title'] ?? '이벤트 제목';
    $description = $data['description'] ?? '이벤트 설명';
    $image = $data['image'] ?? 'assets/images/events/event-thumb-01.jpg';
    $date = $data['date'] ?? '2025.04.20';
    $time = $data['time'] ?? '14:00 - 16:00';
    $location = $data['location'] ?? '정음 3층 세미나실';
    $link = $data['link'] ?? 'events.php';
    $status = $data['status'] ?? 'upcoming';
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
    <?php
}

function renderSpaceCard($data = []) {
    $space_id = $data['space_id'] ?? '';
    $title = $data['title'] ?? '공간 제목';
    $description = $data['description'] ?? '공간 설명';
    $image = $data['image'] ?? 'assets/images/space/space-1f2f-01.jpg';
    $floor = $data['floor'] ?? '1-2층';
    $capacity = $data['capacity'] ?? '50명';
    $features = $data['features'] ?? ['전시', '강연', '워크샵'];
    $link = $data['link'] ?? 'space.php';
    ?>
    <div class="space-card" data-space-id="<?php echo htmlspecialchars($space_id); ?>">
        <div class="space-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
            <div class="space-card__overlay">
                <span class="space-card__floor"><?php echo htmlspecialchars($floor); ?></span>
            </div>
        </div>
        
        <div class="space-card__content">
            <h3 class="space-card__title"><?php echo htmlspecialchars($title); ?></h3>
            <p class="space-card__description"><?php echo htmlspecialchars($description); ?></p>
            
            <div class="space-card__meta">
                <div class="space-card__capacity">
                    <span class="meta-icon">👥</span>
                    <span class="meta-text"><?php echo htmlspecialchars($capacity); ?></span>
                </div>
                <div class="space-card__features">
                    <span class="meta-icon">✨</span>
                    <span class="meta-text"><?php echo implode(', ', $features); ?></span>
                </div>
            </div>
            
            <div class="space-card__actions">
                <a href="<?php echo htmlspecialchars($link); ?>" class="btn btn--outline">공간 둘러보기</a>
            </div>
        </div>
    </div>
    <?php
}

function renderPressCard($data = []) {
    $press_id = $data['press_id'] ?? '';
    $title = $data['title'] ?? '보도 제목';
    $description = $data['description'] ?? '보도 설명';
    $image = $data['image'] ?? 'assets/images/press/press-thumb-01.jpg';
    $source = $data['source'] ?? '언론사명';
    $date = $data['date'] ?? '2025.01.15';
    $link = $data['link'] ?? 'press.php';
    $category = $data['category'] ?? '전시';
    ?>
    <div class="press-card" data-press-id="<?php echo htmlspecialchars($press_id); ?>">
        <div class="press-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
            <div class="press-card__category">
                <span class="category-badge"><?php echo htmlspecialchars($category); ?></span>
            </div>
        </div>
        
        <div class="press-card__content">
            <h3 class="press-card__title"><?php echo htmlspecialchars($title); ?></h3>
            <p class="press-card__description"><?php echo htmlspecialchars($description); ?></p>
            
            <div class="press-card__meta">
                <div class="press-card__source">
                    <span class="meta-icon">📰</span>
                    <span class="meta-text"><?php echo htmlspecialchars($source); ?></span>
                </div>
                <div class="press-card__date">
                    <span class="meta-icon">📅</span>
                    <span class="meta-text"><?php echo htmlspecialchars($date); ?></span>
                </div>
            </div>
            
            <div class="press-card__actions">
                <a href="<?php echo htmlspecialchars($link); ?>" class="btn btn--text">기사 보기</a>
            </div>
        </div>
    </div>
    <?php
}
?>
