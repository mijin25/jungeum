<?php
// components/cards/space-card.php
// 피그마 디자인에 맞는 공간 카드 컴포넌트 (데이터 중심)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$space_id = $data['id'] ?? '';
$title = $data['title'] ?? '공간 제목';
$description = $data['description'] ?? '공간 설명';
$image = $data['image'] ?? '../assets/images/space/space-1f2f-01.jpg';
$floor = $data['floor'] ?? '1-2층';
$capacity = $data['capacity'] ?? '50명';
$features = $data['features'] ?? ['전시', '강연', '워크샵'];
$link = $data['link'] ?? '#';
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
                <span class="meta-text"><?php echo htmlspecialchars($capacity); ?></span>
            </div>
            <div class="space-card__features">
                <span class="meta-text"><?php echo implode(', ', $features); ?></span>
            </div>
        </div>
        
        <div class="space-card__actions">
            <a href="<?php echo htmlspecialchars($link); ?>" class="btn btn--secondary btn--medium">공간 둘러보기</a>
        </div>
    </div>
</div>
