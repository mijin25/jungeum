<?php
// components/cards/space-card.php
// 쿠움 공간 카드 컴포넌트 (보도 카드 베리에이션)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$title = $data['title'] ?? '레조네 홍대';
$description = $data['description'] ?? '최고의 입지 연남동 메인 거리에 위치 · 연면적 150평 실내 공간 + 야외 공간 보유';
$image = $data['image'] ?? '../assets/images/space/space-1f2f-01.jpg';
$address = $data['address'] ?? '서울특별시 마포구 동교동 148-7';
$link = $data['link'] ?? '#';
?>

<div class="space-card">
    <a href="<?php echo htmlspecialchars($link); ?>" class="space-card__link">
        <div class="space-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
        </div>
        
        <div class="space-card__content">
            <div class="space-card__text">
                <h3 class="space-card__title heading-h6-emphasized">
                    <?php echo htmlspecialchars($title); ?>
                </h3>
                <div class="space-card__description body-md">
                    <?php echo htmlspecialchars($description); ?>
                </div>
            </div>
            
            <div class="space-card__meta">
                <div class="space-card__address body-md">
                    <?php echo htmlspecialchars($address); ?>
                </div>
            </div>
        </div>
    </a>
</div>
