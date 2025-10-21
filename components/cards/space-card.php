<?php
/**
 * 공간 카드 컴포넌트
 * 공간 정보를 표시하는 재사용 가능한 카드
 */

// 매개변수 설정 (기본값)
$space_id = $space_id ?? '';
$title = $title ?? '공간 제목';
$description = $description ?? '공간 설명';
$image = $image ?? 'assets/images/space/space-1f2f-01.jpg';
$floor = $floor ?? '1-2층';
$capacity = $capacity ?? '50명';
$features = $features ?? ['전시', '강연', '워크샵'];
$link = $link ?? 'space.php';
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
