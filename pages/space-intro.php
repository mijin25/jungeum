<?php
// pages/space-intro.php
// 공간 소개 페이지

require_once '../config/server.php';
require_once '../lib/helpers.php';
require_once '../lib/pagination_helper.php';

// JSON 데이터 로드
$space_data = json_decode(file_get_contents(__DIR__ . '/../data/space.json'), true);

// 페이지네이션 설정
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 6; // 페이지당 6개 공간

// 페이지네이션 계산
$pagination_info = calculatePagination($space_data['spaces'], $current_page, $items_per_page);
$paginated_spaces = $pagination_info['current_page_data'];

// 페이지네이션 컴포넌트 데이터 준비
$base_url = 'space-intro.php';
$pagination_data = preparePaginationData($pagination_info, $base_url, []);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공간 소개 - 정음</title>
    
    <link rel="stylesheet" href="../css/webfonts.css">
    <link rel="stylesheet" href="../css/design-system.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="icon" type="image/svg+xml" href="../assets/images/common/logo-jungeum.svg">
</head>
<body>
    <!-- 헤더 -->
    <?php 
    $current_page = 'space-intro'; // 네비게이션 활성 상태용
    include __DIR__ . '/../components/layout/header.php'; 
    ?>
    
    <!-- 메인 콘텐츠 -->
    <main class="main-content">
        <div class="container">
            <!-- 페이지 헤더 -->
            <section class="page-header">
                <h1 class="heading-h1">쿠움 공간</h1>
                <p class="body-lg">정음의 다양한 공간을 소개합니다.</p>
            </section>
            
            <!-- 공간 목록 -->
            <section class="space-section">
                <?php if (empty($space_data['spaces'])): ?>
                    <div class="empty-state">
                        <p class="body-md">표시할 공간이 없습니다.</p>
                    </div>
                <?php else: ?>
                    <div class="space-grid">
                        <?php foreach ($paginated_spaces as $space): ?>
                            <div class="space-card">
                                <?php $data = $space; include __DIR__ . '/../components/cards/space-card.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- 페이지네이션 -->
                    <?php if ($pagination_info['total_pages'] > 1): ?>
                        <div class="pagination-section">
                            <?php $data = $pagination_data; include __DIR__ . '/../components/layout/navigation/pagination.php'; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </section>
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
