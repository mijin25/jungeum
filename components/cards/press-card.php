<?php
// components/cards/press-card.php
// 피그마 디자인에 맞는 보도 카드 컴포넌트 (데이터 중심)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$title = $data['title'] ?? '연희동의 시간이 쌓인 공간, \'정음\'에서 발견한 건축의 미학';
$description = $data['description'] ?? '1세대 건축가 김중업의 숨결이 깃든 건물이 새로운 문화 공간으로 태어났다. 단순한 재생을 넘어, \'정음전자\'의 역사와 연희동의 감성을 담아낸 \'정음\'은 방문객들에게 영감을 주는 도시의 새로운 사랑방이 될 것이다...';
$image = $data['image'] ?? '../assets/images/press/press-thumb-01.jpg';
$source = $data['source'] ?? '조선일보 땅집고';
$date = $data['date'] ?? '2024.10.30';
$link = $data['link'] ?? '#';
?>

<div class="press-card">
    <a href="<?php echo htmlspecialchars($link); ?>" class="press-card__link">
        <div class="press-card__image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
        </div>
        
        <div class="press-card__content">
            <div class="press-card__text">
                <div class="press-card__title">
                    <?php echo htmlspecialchars($title); ?>
                </div>
                <div class="press-card__description">
                    <?php echo htmlspecialchars($description); ?>
                </div>
            </div>
            
            <div class="press-card__meta">
                <div class="press-card__source">
                    <span class="meta-text"><?php echo htmlspecialchars($source); ?></span>
                </div>
                <div class="press-card__separator">
                    <span class="separator-dot"></span>
                </div>
                <div class="press-card__date">
                    <span class="meta-text"><?php echo htmlspecialchars($date); ?></span>
                </div>
            </div>
        </div>
    </a>
</div>
