<?php
// 서버 환경 설정 로드
require_once __DIR__ . '/../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once __DIR__ . '/../lib/helpers.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정음 - 컴포넌트 디자인 시스템</title>
    
    <!-- 웹폰트 로드 -->
    <link rel="stylesheet" href="../css/webfonts.css">
    
    <!-- 사이트 디자인 시스템 -->
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/design-system.css">
    
    <!-- DEV-ONLY: 컴포넌트 프리뷰 전용 스타일 (운영 사이트 미포함) -->
    <link rel="stylesheet" href="../css/preview.css">
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="../assets/images/common/logo-jungeum.svg">
    
    <!-- 인라인 스타일 제거 - preview.css로 이동됨 -->
</head>
<body>
    <div id="preview" class="preview-container">
        <header class="preview-header">
            <h1 class="heading-h2">정음 컴포넌트 디자인 시스템</h1>
            <p class="body-md">재사용 가능한 컴포넌트들의 모음입니다.</p>
        </header>

        <!-- 버튼 컴포넌트 -->
        <section class="preview-section">
            <h2>버튼 (Buttons)</h2>
            
            <h3>Primary 버튼</h3>
            <div class="component-showcase">
                <?php
                $primary_buttons = [
                    ['text' => 'Primary Large', 'type' => 'primary', 'size' => 'large'],
                    ['text' => 'Primary Medium', 'type' => 'primary', 'size' => 'medium']
                ];
                
                foreach ($primary_buttons as $button_data) {
                    $data = $button_data;
                    include __DIR__ . '/../components/ui/buttons/button.php';
                }
                ?>
            </div>
            
            <h3>Secondary 버튼</h3>
            <div class="component-showcase">
                <?php
                $secondary_buttons = [
                    ['text' => 'Secondary Large', 'type' => 'secondary', 'size' => 'large'],
                    ['text' => 'Secondary Medium', 'type' => 'secondary', 'size' => 'medium', 'icon' => 'plus']
                ];
                
                foreach ($secondary_buttons as $button_data) {
                    $data = $button_data;
                    include __DIR__ . '/../components/ui/buttons/button.php';
                }
                ?>
            </div>
            
            <h3>Text 버튼</h3>
            <div class="component-showcase">
                <?php
                $text_buttons = [
                    ['text' => '전시 둘러보기', 'type' => 'text', 'size' => 'xl', 'icon' => 'arrow-right', 'icon_position' => 'right'],
                    ['text' => '모두 보기', 'type' => 'text', 'size' => 'medium', 'icon' => 'arrow-right', 'icon_position' => 'right'],
                    ['text' => '목록으로', 'type' => 'text', 'size' => 'medium', 'icon' => 'arrow-left', 'icon_position' => 'left'],
                    ['text' => 'info@jungeum.com', 'type' => 'text', 'size' => 'medium']
                ];
                
                foreach ($text_buttons as $button_data) {
                    $data = $button_data;
                    include __DIR__ . '/../components/ui/buttons/button.php';
                }
                ?>
            </div>
            
            <h3>소셜 링크 버튼</h3>
            <div class="component-showcase">
                <?php
                $social_buttons = [
                    ['text' => '블로그', 'type' => 'text', 'size' => 'small', 'icon' => 'blog', 'href' => '#'],
                    ['text' => '페이스북', 'type' => 'text', 'size' => 'small', 'icon' => 'facebook', 'href' => '#'],
                    ['text' => '인스타그램', 'type' => 'text', 'size' => 'small', 'icon' => 'instagram', 'href' => '#'],
                    ['text' => '유튜브', 'type' => 'text', 'size' => 'small', 'icon' => 'youtube', 'href' => '#'],
                    ['text' => '웹사이트', 'type' => 'text', 'size' => 'small', 'icon' => 'website', 'href' => '#']
                ];
                
                foreach ($social_buttons as $button_data) {
                    $data = $button_data;
                    include __DIR__ . '/../components/ui/buttons/button.php';
                }
                ?>
            </div>
            
            <h3>Control 버튼</h3>
            <div class="component-showcase">
                <?php
                $control_buttons = [
                    ['text' => '', 'type' => 'control', 'size' => 'large', 'icon' => 'arrow-left-large'],
                    ['text' => '', 'type' => 'control', 'size' => 'large', 'icon' => 'arrow-right-large'],
                    ['text' => '', 'type' => 'control', 'size' => 'medium', 'icon' => 'arrow-left-large'],
                    ['text' => '', 'type' => 'control', 'size' => 'medium', 'icon' => 'arrow-right-large']
                ];
                
                foreach ($control_buttons as $button_data) {
                    $data = $button_data;
                    include __DIR__ . '/../components/ui/buttons/button.php';
                }
                ?>
            </div>
        </section>

        <!-- 카드 컴포넌트 -->
        <section class="preview-section">
            <h2>카드 (Cards)</h2>
            
            <h3>전시 카드</h3>
            <div class="component-showcase">
                <?php
                $exhibition_cards = [
                    [
                        'title' => '대화: 김중업 × 르 코르뷔지에' . "\n" . '두 건축가의 운명적 만남',
                        'date' => '2025.09.30 — 2025.10.26',
                        'image' => '../assets/images/exhibitions/exh-thumb-01.jpg',
                        'status' => 'current',
                        'link' => '#'
                    ],
                    [
                        'title' => '미래의 건축' . "\n" . '디지털 시대의 공간',
                        'date' => '2025.11.15 — 2025.12.30',
                        'image' => '../assets/images/exhibitions/exh-thumb-02.jpg',
                        'status' => 'upcoming',
                        'link' => '#'
                    ],
                    [
                        'title' => '도시의 기억' . "\n" . '서울 건축사',
                        'date' => '2025.01.15 — 2025.03.20',
                        'image' => '../assets/images/exhibitions/exh-thumb-03.jpg',
                        'status' => 'current',
                        'link' => '#'
                    ],
                    [
                        'title' => '재생의 미학' . "\n" . '옛 건물의 새로운 삶',
                        'date' => '2025.04.01 — 2025.06.30',
                        'image' => '../assets/images/exhibitions/exh-thumb-04.jpg',
                        'status' => 'upcoming',
                        'link' => '#'
                    ]
                ];
                
                foreach ($exhibition_cards as $card_data) {
                    $data = $card_data;
                    include __DIR__ . '/../components/cards/exhibition-card.php';
                }
                ?>
            </div>
            
            <h3>이벤트 카드</h3>
            <div class="component-showcase">
                <?php
                $event_cards = [
                    [
                        'title' => '팝업 스토어 : 간결한 선과 결을 통해 미니멀 디자인의 주얼리 올레프트',
                        'date' => '2025.10.15 — 2025.12.21',
                        'image' => '../assets/images/events/event-thumb-01.jpg',
                        'status' => 'current',
                        'link' => '#'
                    ],
                    [
                        'title' => '아티스트 토크 : 건축가와의 대화',
                        'date' => '2025.12.01 — 2025.12.15',
                        'image' => '../assets/images/events/event-thumb-02.jpg',
                        'status' => 'upcoming',
                        'link' => '#'
                    ],
                    [
                        'title' => '워크샵 : 나만의 건축 모형 만들기',
                        'date' => '2025.11.20 — 2025.11.30',
                        'image' => '../assets/images/events/event-thumb-03.jpg',
                        'status' => 'current',
                        'link' => '#'
                    ],
                    [
                        'title' => '세미나 : 지속가능한 건축의 미래',
                        'date' => '2025.12.10 — 2025.12.20',
                        'image' => '../assets/images/events/event-thumb-04.jpg',
                        'status' => 'upcoming',
                        'link' => '#'
                    ]
                ];
                
                foreach ($event_cards as $card_data) {
                    $data = $card_data;
                    include __DIR__ . '/../components/cards/event-card.php';
                }
                ?>
            </div>
            
            <h3>보도 카드</h3>
            <div class="component-showcase">
                <?php
                $press_cards = [
                    [
                        'title' => '연희동의 시간이 쌓인 공간, \'정음\'에서 발견한 건축의 미학',
                        'description' => '1세대 건축가 김중업의 숨결이 깃든 건물이 새로운 문화 공간으로 태어났다. 단순한 재생을 넘어, \'정음전자\'의 역사와 연희동의 감성을 담아낸 \'정음\'은 방문객들에게 영감을 주는 도시의 새로운 사랑방이 될 것이다...',
                        'image' => '../assets/images/press/press-thumb-01.jpg',
                        'source' => '조선일보 땅집고',
                        'date' => '2024.10.30',
                        'link' => '#'
                    ]
                ];
                
                foreach ($press_cards as $card_data) {
                    $data = $card_data;
                    include __DIR__ . '/../components/cards/press-card.php';
                }
                ?>
            </div>
            
            <h3>공간 카드</h3>
            <div class="component-showcase">
                <?php
                $space_cards = [
                    [
                        'id' => '1',
                        'title' => '1-2층 전시실',
                        'description' => '다양한 전시를 위한 넓은 공간',
                        'image' => '../assets/images/space/space-1f2f-01.jpg',
                        'floor' => '1-2층',
                        'capacity' => '100명',
                        'features' => ['전시', '강연', '워크샵'],
                        'link' => '#'
                    ],
                    [
                        'id' => '2',
                        'title' => '3층 세미나실',
                        'description' => '소규모 강연과 토론을 위한 공간',
                        'image' => '../assets/images/space/space-3f-01.jpg',
                        'floor' => '3층',
                        'capacity' => '30명',
                        'features' => ['강연', '토론', '세미나'],
                        'link' => '#'
                    ]
                ];
                
                foreach ($space_cards as $card_data) {
                    $data = $card_data;
                    include __DIR__ . '/../components/cards/space-card.php';
                }
                ?>
            </div>
        </section>

        <!-- 폼 컴포넌트 -->
        <section class="preview-section">
            <h2>폼 (Forms)</h2>
            
            <h3>기본 입력 필드</h3>
            <div class="component-showcase" style="flex-direction: column; align-items: flex-start;">
                <?php
                $form_inputs = [
                    [
                        'name' => 'name',
                        'type' => 'text',
                        'label' => '이름',
                        'placeholder' => '이름을 입력하세요',
                        'required' => true
                    ],
                    [
                        'name' => 'email',
                        'type' => 'email',
                        'label' => '이메일',
                        'placeholder' => '이메일을 입력하세요',
                        'required' => true
                    ],
                    [
                        'name' => 'phone',
                        'type' => 'tel',
                        'label' => '전화번호',
                        'placeholder' => '전화번호를 입력하세요',
                        'required' => false
                    ],
                    [
                        'name' => 'message',
                        'type' => 'textarea',
                        'label' => '메시지',
                        'placeholder' => '메시지를 입력하세요',
                        'required' => true
                    ]
                ];
                
                foreach ($form_inputs as $input_data) {
                    $data = $input_data;
                    include __DIR__ . '/../components/forms/input.php';
                }
                ?>
            </div>
            
            <h3>에러 상태</h3>
            <div class="component-showcase" style="flex-direction: column; align-items: flex-start;">
                <?php
                $error_inputs = [
                    [
                        'name' => 'error_email',
                        'type' => 'email',
                        'label' => '이메일',
                        'placeholder' => '이메일을 입력하세요',
                        'value' => 'invalid-email',
                        'error' => '올바른 이메일 형식을 입력해주세요',
                        'required' => true
                    ],
                    [
                        'name' => 'error_password',
                        'type' => 'password',
                        'label' => '비밀번호',
                        'placeholder' => '비밀번호를 입력하세요',
                        'error' => '비밀번호는 8자 이상이어야 합니다',
                        'required' => true
                    ]
                ];
                
                foreach ($error_inputs as $input_data) {
                    $data = $input_data;
                    include __DIR__ . '/../components/forms/input.php';
                }
                ?>
            </div>
        </section>

        <!-- 네비게이션 컴포넌트 -->
        <section class="preview-section">
            <h2>네비게이션 (Navigation)</h2>
            
            <h3>탭 메뉴</h3>
            <div class="component-showcase">
                <?php
                $tab_data = [
                    'tabs' => [
                        ['label' => '현재 & 예정 전시', 'url' => '#current'],
                        ['label' => '과거 전시', 'url' => '#past'],
                        ['label' => '특별 전시', 'url' => '#special']
                    ],
                    'active_tab' => 0
                ];
                $data = $tab_data;
                include __DIR__ . '/../components/layout/navigation/tab-menu.php';
                ?>
            </div>
            
            <h3>페이지 인디케이터</h3>
            <div class="component-showcase">
                <?php
                $page_indicator_data = [
                    'current_page' => 2,
                    'total_pages' => 5,
                    'base_url' => 'exhibitions.php'
                ];
                $data = $page_indicator_data;
                include __DIR__ . '/../components/layout/navigation/page-indicator.php';
                ?>
            </div>
            
            <h3>페이지네이션</h3>
            <div class="component-showcase">
                <?php
                $pagination_data = [
                    'current_page' => 3,
                    'total_pages' => 10,
                    'base_url' => 'exhibitions.php'
                ];
                $data = $pagination_data;
                include __DIR__ . '/../components/layout/navigation/pagination.php';
                ?>
            </div>
        </section>

        <!-- UI 컴포넌트 -->
        <section class="preview-section">
            <h2>UI 요소 (UI Elements)</h2>
            
            <h3>알림 (Alerts)</h3>
            <div class="component-showcase" style="flex-direction: column; align-items: flex-start;">
                <?php
                $alerts = [
                    [
                        'type' => 'success',
                        'title' => '성공',
                        'message' => '요청이 성공적으로 처리되었습니다.',
                        'dismissible' => true
                    ],
                    [
                        'type' => 'warning',
                        'title' => '경고',
                        'message' => '주의가 필요한 상황입니다.',
                        'dismissible' => true
                    ],
                    [
                        'type' => 'error',
                        'title' => '오류',
                        'message' => '문제가 발생했습니다. 다시 시도해주세요.',
                        'dismissible' => true
                    ],
                    [
                        'type' => 'info',
                        'title' => '정보',
                        'message' => '추가 정보를 확인해주세요.',
                        'dismissible' => true
                    ]
                ];
                
                foreach ($alerts as $alert_data) {
                    $data = $alert_data;
                    include __DIR__ . '/../components/ui/alerts/alert.php';
                }
                ?>
            </div>
            
            <h3>로딩 스피너</h3>
            <div class="component-showcase">
                <?php
                $spinner_data = [
                    'size' => 'large',
                    'text' => '로딩 중...'
                ];
                $data = $spinner_data;
                include __DIR__ . '/../components/ui/loading/spinner.php';
                ?>
            </div>
            
            <h3>태그</h3>
            <div class="component-showcase">
                <?php
                $tags = [
                    ['text' => '현재 전시', 'type' => 'current'],
                    ['text' => '예정 전시', 'type' => 'upcoming'],
                    ['text' => '과거 전시', 'type' => 'past'],
                    ['text' => '특별 전시', 'type' => 'special']
                ];
                
                foreach ($tags as $tag_data) {
                    $data = $tag_data;
                    include __DIR__ . '/../components/ui/tag.php';
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>
