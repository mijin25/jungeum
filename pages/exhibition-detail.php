<?php
// pages/exhibition-detail.php
// 전시 상세 페이지

require_once __DIR__ . '/../config/server.php';
require_once __DIR__ . '/../lib/helpers.php';

// 전시 ID 가져오기
$exhibition_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// JSON 데이터 로드
$exhibitions_data = json_decode(file_get_contents(__DIR__ . '/../data/exhibitions.json'), true);

// 해당 ID의 전시 찾기
$exhibition = null;
foreach ($exhibitions_data['exhibitions'] as $exh) {
    if ($exh['id'] === $exhibition_id) {
        $exhibition = $exh;
        break;
    }
}

// 전시가 없으면 404
if (!$exhibition) {
    header('HTTP/1.0 404 Not Found');
    exit('전시를 찾을 수 없습니다.');
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($exhibition['title']); ?> - 정음</title>
    
    <!-- 웹폰트 preload -->
    <link rel="preload" href="../assets/fonts/JASOSansRegular/font.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="../assets/fonts/JASOSansBold/font.woff2" as="font" type="font/woff2" crossorigin>
    
    <!-- 웹폰트 로드 -->
    <link rel="stylesheet" href="../css/webfonts.css">
    
    <!-- 사이트 디자인 시스템 -->
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/design-system.css">
    <link rel="stylesheet" href="../css/components.css">
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="../assets/images/common/logo-jungeum.svg">
</head>
<body>
    <!-- 스크롤 인디케이터 -->
    <?php
    $scroll_indicator_data = [
        'current_position' => 0,
        'is_visible' => true
    ];
    $data = $scroll_indicator_data;
    include __DIR__ . '/../components/layout/navigation/scroll-indicator.php';
    ?>
    
    <!-- 헤더 -->
    <?php 
    $current_page = 'exhibitions'; // 네비게이션 활성 상태용
    include __DIR__ . '/../components/layout/header.php'; 
    ?>
    
    <main class="main-content">
        <div class="container">
            <!-- 페이지 헤더 -->
            <section class="page-header">
                <h1 class="heading-h1"><?php echo htmlspecialchars($exhibition['title']); ?></h1>
                <p class="body-lg"><?php echo htmlspecialchars($exhibition['description']); ?></p>
            </section>
            
            <!-- 전시 상세 정보 -->
            <section class="exhibition-detail">
                <div class="exhibition-detail__content">
                    <div class="exhibition-detail__image">
                        <img src="<?php echo htmlspecialchars($exhibition['image']); ?>" alt="<?php echo htmlspecialchars($exhibition['title']); ?>">
                    </div>
                    
                    <div class="exhibition-detail__info">
                        <div class="exhibition-detail__meta">
                            <p class="body-md"><strong>일시:</strong> <?php echo htmlspecialchars($exhibition['date']); ?></p>
                            <p class="body-md"><strong>장소:</strong> <?php echo htmlspecialchars($exhibition['location']); ?></p>
                            <p class="body-md"><strong>작가:</strong> <?php echo htmlspecialchars($exhibition['artist']); ?></p>
                            <p class="body-md"><strong>카테고리:</strong> <?php echo htmlspecialchars($exhibition['category']); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    
    <!-- 푸터 -->
    <?php include __DIR__ . '/../components/layout/footer.php'; ?>
    
    <!-- JavaScript -->
    <script src="../js/main.js"></script>
</body>
</html>
