<?php
// 서버 환경 설정 로드
require_once __DIR__ . '/../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once __DIR__ . '/../lib/helpers.php';
// 페이지네이션 헬퍼 함수 로드
require_once __DIR__ . '/../lib/pagination_helper.php';

// 현재 날짜 기준으로 이벤트 필터링
$current_date = date('Y-m-d');

// JSON 데이터 로드
$events_data = json_decode(file_get_contents(__DIR__ . '/../data/events.json'), true);

// 현재&예정 이벤트와 과거 이벤트 분리
$current_events = [];
$past_events = [];

foreach ($events_data as $event) {
    $event_date = $event['end_date'] ?? $event['start_date'];
    if ($event_date >= $current_date) {
        $current_events[] = $event;
    } else {
        $past_events[] = $event;
    }
}

// 탭 데이터 설정
$tab_data = [
    'tabs' => [
        ['label' => '현재 & 예정 이벤트', 'url' => 'events.php?filter=current'],
        ['label' => '과거 이벤트', 'url' => 'events.php?filter=past']
    ],
    'active_tab' => isset($_GET['filter']) && $_GET['filter'] === 'past' ? 1 : 0,
    'hide_if_empty' => true,
    'has_past_items' => !empty($past_events)
];

// 필터에 따른 이벤트 데이터 선택
$display_events = isset($_GET['filter']) && $_GET['filter'] === 'past' ? $past_events : $current_events;

// 페이지네이션 설정
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 12; // 페이지당 12개 이벤트

// 페이지네이션 계산
$pagination_info = calculatePagination($display_events, $current_page, $items_per_page);
$paginated_events = $pagination_info['current_page_data'];

// 페이지네이션 컴포넌트 데이터 준비
$base_url = 'events.php';
$additional_params = [];
if (isset($_GET['filter'])) {
    $additional_params['filter'] = $_GET['filter'];
}

$pagination_data = preparePaginationData($pagination_info, $base_url, $additional_params);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이벤트 - 정음</title>
    
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
    <?php 
    $current_page = 'events'; // 네비게이션 활성 상태용
    include __DIR__ . '/../components/layout/header.php'; 
    ?>
    
    <main class="main-content">
        <div class="container">
            <!-- 페이지 헤더 -->
            <section class="page-header">
                <h1 class="heading-h1">이벤트</h1>
                <p class="body-lg">정음에서 진행되는 다양한 이벤트를 확인하세요.</p>
            </section>
            
            <!-- 탭 메뉴 -->
            <?php if (!empty($past_events) || !empty($current_events)): ?>
                <section class="events-tabs">
                    <?php $data = $tab_data; include __DIR__ . '/../components/layout/navigation/tab-menu.php'; ?>
                </section>
            <?php endif; ?>
            
            <!-- 이벤트 목록 -->
            <section class="events-section">
                <?php if (empty($display_events)): ?>
                    <div class="empty-state">
                        <p class="body-md">표시할 이벤트가 없습니다.</p>
                    </div>
                <?php else: ?>
                    <div class="events-grid">
                        <?php foreach ($paginated_events as $event): ?>
                            <div class="event-card">
                                <?php $data = $event; include __DIR__ . '/../components/cards/event-card.php'; ?>
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
    <?php include __DIR__ . '/../components/layout/footer.php'; ?>
    
    <!-- JavaScript -->
    <script src="../js/main.js"></script>
</body>
</html>