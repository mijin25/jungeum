<?php
/**
 * 보도 카드 컴포넌트
 * 보도 자료 정보를 표시하는 재사용 가능한 카드
 */

// 매개변수 설정 (기본값)
$press_id = $press_id ?? '';
$title = $title ?? '보도 제목';
$description = $description ?? '보도 설명';
$image = $image ?? 'assets/images/press/press-thumb-01.jpg';
$source = $source ?? '언론사명';
$date = $date ?? '2025.01.15';
$link = $link ?? 'press.php';
$category = $category ?? '전시';
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
