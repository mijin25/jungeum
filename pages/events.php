<?php
// pages/events.php
// 이벤트 페이지

require_once '../config/server.php';
require_once '../lib/helpers.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이벤트 - 정음</title>
    
    <link rel="stylesheet" href="../css/webfonts.css">
    <link rel="stylesheet" href="../css/design-system.css">
    <link rel="stylesheet" href="../css/components.css">
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
        'current_page' => 'events'
    ];
    include '../components/layout/header.php';
    ?>
    
    <!-- 메인 콘텐츠 -->
    <main class="main-content">
        <div class="container">
            <h1 class="heading-h1">이벤트</h1>
            <p class="body-lg">다양한 문화 이벤트와 프로그램을 만나보세요.</p>
            
            <!-- WIP: 이벤트 목록 구현 예정 -->
            <div class="wip-notice">
                <p>이벤트 목록 구현 중...</p>
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
</body>
</html>
