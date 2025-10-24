<?php
// 서버 환경 설정 로드
require_once __DIR__ . '/../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once __DIR__ . '/../lib/helpers.php';

// 현재 날짜 기준으로 전시 필터링
$current_date = date('Y-m-d');

// JSON 데이터 로드
$exhibitions_data = json_decode(file_get_contents(__DIR__ . '/../data/exhibitions.json'), true);

// 현재&예정 전시와 과거 전시 분리
$current_exhibitions = [];
$past_exhibitions = [];

foreach ($exhibitions_data as $exhibition) {
    $exhibition_date = $exhibition['end_date'] ?? $exhibition['start_date'];
    if ($exhibition_date >= $current_date) {
        $current_exhibitions[] = $exhibition;
    } else {
        $past_exhibitions[] = $exhibition;
    }
}

// 탭 데이터 설정
$tab_data = [
    'tabs' => [
        ['label' => '현재 & 예정 전시', 'url' => 'exhibitions.php?filter=current'],
        ['label' => '과거 전시', 'url' => 'exhibitions.php?filter=past']
    ],
    'active_tab' => isset($_GET['filter']) && $_GET['filter'] === 'past' ? 1 : 0,
    'hide_if_empty' => true,
    'has_past_items' => !empty($past_exhibitions)
];

// 필터에 따른 전시 데이터 선택
$display_exhibitions = isset($_GET['filter']) && $_GET['filter'] === 'past' ? $past_exhibitions : $current_exhibitions;
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>전시 - 정음</title>
    
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
    <!-- 헤더 -->
    <?php include __DIR__ . '/../components/layout/header.php'; ?>
    
    <main class="main-content">
        <div class="container">
            <!-- 페이지 헤더 -->
            <section class="page-header">
                <h1 class="heading-h1">전시</h1>
                <p class="body-lg">정음에서 진행되는 다양한 전시를 확인하세요.</p>
            </section>
            
            <!-- 탭 메뉴 -->
            <?php if (!empty($past_exhibitions) || !empty($current_exhibitions)): ?>
                <section class="exhibitions-tabs">
                    <?php $data = $tab_data; include __DIR__ . '/../components/layout/navigation/tab-menu.php'; ?>
                </section>
            <?php endif; ?>
            
            <!-- 전시 목록 -->
            <section class="exhibitions-section">
                <?php if (empty($display_exhibitions)): ?>
                    <div class="empty-state">
                        <p class="body-md">표시할 전시가 없습니다.</p>
                    </div>
                <?php else: ?>
                    <div class="exhibitions-grid">
                        <?php foreach ($display_exhibitions as $exhibition): ?>
                            <div class="exhibition-card">
                                <?php $data = $exhibition; include __DIR__ . '/../components/cards/exhibition-card.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>
    
    <!-- 푸터 -->
    <?php include __DIR__ . '/../components/layout/footer.php'; ?>
    
    <!-- JavaScript -->
    <script src="../js/main.js"></script>
</body>
</html>