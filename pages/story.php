<?php
// pages/story.php
// 스토리 페이지

require_once __DIR__ . '/../config/server.php';
require_once __DIR__ . '/../lib/helpers.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스토리 - 정음</title>
    
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
    $current_page = 'story'; // 네비게이션 활성 상태용
    include __DIR__ . '/../components/layout/header.php'; 
    ?>
    
    <main class="main-content">
        <div class="container">
            <!-- 페이지 헤더 -->
            <section class="page-header">
                <h1 class="heading-h1">스토리</h1>
                <p class="body-lg">정음의 이야기를 소개합니다.</p>
            </section>
            
            <!-- 스토리 콘텐츠 -->
            <section class="story-content">
                <div class="story-content__intro">
                    <h2 class="heading-h2">정음은</h2>
                    <p class="body-lg">문화와 예술의 공간으로, 다양한 작가들과 함께 전시와 이벤트를 진행합니다.</p>
                </div>
                
                <div class="story-content__sections">
                    <div class="story-section">
                        <h3 class="heading-h3">정음 하드웨어</h3>
                        <p class="body-md">정음 하드웨어의 역사와 발전 과정을 소개합니다.</p>
                    </div>
                    
                    <div class="story-section">
                        <h3 class="heading-h3">정음 일렉트로닉스</h3>
                        <p class="body-md">정음 일렉트로닉스의 혁신적인 기술을 알아봅니다.</p>
                    </div>
                    
                    <div class="story-section">
                        <h3 class="heading-h3">쿠움 건축</h3>
                        <p class="body-md">쿠움 건축의 미학과 공간 철학을 탐구합니다.</p>
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
