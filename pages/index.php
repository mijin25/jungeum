<?php
// pages/index.php
// 정음 웹사이트 메인 페이지

// 서버 환경 설정 로드
require_once __DIR__ . '/../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once __DIR__ . '/../lib/helpers.php';

// JSON 데이터 로드
$hero_data_json = json_decode(file_get_contents(__DIR__ . '/../data/hero.json'), true);
$events_data = json_decode(file_get_contents(__DIR__ . '/../data/events.json'), true);
$press_data = json_decode(file_get_contents(__DIR__ . '/../data/press.json'), true);

// 현재 날짜 기준으로 이벤트 필터링
$current_date = date('Y-m-d');
$upcoming_events = array_filter($events_data['events'], function($event) use ($current_date) {
    $event_date = $event['end_date'] ?? $event['start_date'] ?? $event['date'];
    return strtotime($event_date) >= strtotime($current_date);
});

// 예정 이벤트는 최대 4개만
$upcoming_events = array_slice($upcoming_events, 0, 4);
// 보도 자료는 최대 3개만
$press_items = array_slice($press_data['press'], 0, 3);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정음 - 문화와 예술의 공간</title>
    
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
    $current_page = 'index'; // 네비게이션 활성 상태용
    include __DIR__ . '/../components/layout/header.php'; 
    ?>
    
    <!-- 메인 콘텐츠 -->
    <main class="main-content">
        <!-- 히어로 슬라이더 -->
        <?php
        $hero_data = [
            'slides' => $hero_data_json['slides'] ?? [],
            'current_slide' => 0
        ];
        $data = $hero_data;
        include __DIR__ . '/../components/layout/hero-slider.php';
        ?>
        
        <!-- 이벤트 섹션 -->
        <?php if (!empty($upcoming_events)): ?>
        <section class="section section--padding-xlarge">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title heading-h1">다가오는 이벤트</h2>
                    <p class="section__description body-lg">정음에서 준비한 특별한 이벤트를 만나보세요.</p>
                </div>
                
                <div class="main-events-grid">
                    <?php foreach ($upcoming_events as $event): ?>
                        <div class="main-event-card">
                            <?php 
                            $data = [
                                'title' => $event['title'],
                                'date' => $event['date'],
                                'image' => $event['image'],
                                'status' => $event['status'] ?? 'upcoming',
                                'link' => 'events.php'
                            ];
                            include __DIR__ . '/../components/cards/event-card.php'; 
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="section__actions">
                    <?php
                    $data = [
                        'text' => '전체 이벤트 보기',
                        'type' => 'secondary',
                        'size' => 'large',
                        'href' => 'events.php'
                    ];
                    include __DIR__ . '/../components/ui/buttons/button.php';
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        
        <!-- 언론 보도 섹션 -->
        <?php if (!empty($press_items)): ?>
        <section class="section section--padding-xlarge">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title heading-h1">언론 보도</h2>
                    <p class="section__description body-lg">정음에 대한 언론 보도를 확인하세요.</p>
                </div>
                
                <div class="main-press-grid">
                    <?php foreach ($press_items as $press): ?>
                        <div class="main-press-card">
                            <?php 
                            $data = [
                                'title' => $press['title'],
                                'description' => $press['description'],
                                'image' => $press['image'],
                                'source' => $press['source'],
                                'date' => $press['date'],
                                'link' => $press['url'] ?? '#'
                            ];
                            include __DIR__ . '/../components/cards/press-card.php'; 
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="section__actions">
                    <?php
                    $data = [
                        'text' => '전체 보도 보기',
                        'type' => 'secondary',
                        'size' => 'large',
                        'href' => 'press.php'
                    ];
                    include __DIR__ . '/../components/ui/buttons/button.php';
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        
        <!-- 쿠움 공간 섹션 -->
        <section class="section section--padding-xlarge">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title heading-h1">쿠움 공간</h2>
                    <p class="section__description body-lg">정음의 다양한 공간을 둘러보세요.</p>
                </div>
                
                <div class="main-space-grid">
                    <div class="main-space-card">
                        <div class="main-space-card__image">
                            <img src="<?php echo $asset_prefix; ?>assets/images/space/space-1f2f-01.jpg" alt="1층 2층 공간" loading="lazy">
                        </div>
                        <div class="main-space-card__content">
                            <h3 class="main-space-card__title heading-h5-emphasized">1층·2층</h3>
                            <p class="main-space-card__description body-md">메인 전시 공간</p>
                        </div>
                    </div>
                    
                    <div class="main-space-card">
                        <div class="main-space-card__image">
                            <img src="<?php echo $asset_prefix; ?>assets/images/space/space-3f-01.jpg" alt="3층 공간" loading="lazy">
                        </div>
                        <div class="main-space-card__content">
                            <h3 class="main-space-card__title heading-h5-emphasized">3층</h3>
                            <p class="main-space-card__description body-md">특별 전시 공간</p>
                        </div>
                    </div>
                    
                    <div class="main-space-card">
                        <div class="main-space-card__image">
                            <img src="<?php echo $asset_prefix; ?>assets/images/space/space-b1-shop-01.jpg" alt="지하 1층 샵" loading="lazy">
                        </div>
                        <div class="main-space-card__content">
                            <h3 class="main-space-card__title heading-h5-emphasized">지하 1층</h3>
                            <p class="main-space-card__description body-md">샵 및 휴게 공간</p>
                        </div>
                    </div>
                </div>
                
                <div class="section__actions">
                    <?php
                    $data = [
                        'text' => '공간 둘러보기',
                        'type' => 'text',
                        'size' => 'large',
                        'href' => 'space-intro.php',
                        'icon' => 'arrow-right'
                    ];
                    include __DIR__ . '/../components/ui/buttons/button.php';
                    ?>
                </div>
            </div>
        </section>
    </main>
    
    <!-- 푸터 -->
    <?php include __DIR__ . '/../components/layout/footer.php'; ?>
    
    <!-- JavaScript -->
    <script src="../js/main.js"></script>
</body>
</html>
