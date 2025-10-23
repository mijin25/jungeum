<?php
// pages/index.php
// 정음 웹사이트 메인 페이지

// 서버 환경 설정 로드
require_once '../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once '../lib/helpers.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정음 - 문화와 예술의 공간</title>
    
    <!-- 통합 CSS 로드 (성능 최적화) -->
    <link rel="stylesheet" href="../css/webfonts.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/design-system.css">
    
    <!-- 성능 최적화: CSS 미리 로드 -->
    <link rel="preload" href="../css/design-system.css" as="style">
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="../assets/images/common/logo-jungeum.svg">
</head>
<body>
    <!-- 헤더 -->
    <?php
    $header_data = [
        'logo' => '../assets/images/common/logo-jungeum.svg',
        'menu_items' => [
            '전시' => 'exhibitions',
            '이벤트' => 'events',
            '공간' => 'space',
            '소개' => 'about',
            '문의' => 'contact'
        ],
        'current_page' => 'home'
    ];
    include '../components/layout/header.php';
    ?>
    
    <!-- 메인 콘텐츠 -->
    <main class="main-content">
        <div class="container">
            <h1 class="heading-h1">정음에 오신 것을 환영합니다</h1>
            <p class="body-lg">문화와 예술의 공간에서 특별한 경험을 만나보세요.</p>
            
            <!-- WIP: 메인 콘텐츠 구현 예정 -->
            <div class="wip-notice">
                <p>메인 페이지 콘텐츠 구현 중...</p>
            </div>
        </div>
    </main>
    
    <!-- 푸터 -->
    <?php
    $footer_data = [
        'logo' => '../assets/images/common/logo-jungeum.svg',
        'description' => '문화와 예술의 공간',
        'contact' => [
            'address' => '서울시 강남구 정음로 123',
            'phone' => '02-1234-5678',
            'email' => 'info@jungeum.com'
        ],
        'social_links' => [
            'facebook' => '#',
            'instagram' => '#',
            'youtube' => '#',
            'blog' => '#'
        ],
        'copyright' => '© 2024 정음. All rights reserved.'
    ];
    include '../components/layout/footer.php';
    ?>
    
    <!-- JavaScript (성능 최적화) -->
    <script src="../js/main.js" defer></script>
</body>
</html>
