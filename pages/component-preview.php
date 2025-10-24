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
            <div class="component-showcase" style="background-color: #171414; padding: 2rem;">
                <div style="display: flex; gap: 1rem; align-items: center;">
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
            </div>
        </section>

        <!-- 카드 컴포넌트 -->
        <section class="preview-section">
            <h2>카드 (Cards)</h2>
            
            <h3>전시 카드 (4가지 경우의 수)</h3>
            <div class="component-showcase" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; max-width: 100%;">
                <?php
                $exhibition_cards_variants = [
                    // 1. 현재 전시 (현재일 기준 포함되는 날짜)
                    [
                        'title' => '현재 진행 중인 전시: 김중업과 르 코르뷔지에의 건축사진전 - 디지털 시대의 공간과 시간의 만남',
                        'date' => '2025.01.15 — 2025.03.20',
                        'image' => '../assets/images/exhibitions/exh-thumb-01.jpg',
                        'status' => 'current',
                        'variant' => 'with-tag',
                        'link' => '#'
                    ],
                    // 2. 예정 전시 (현재일 기준 미래)
                    [
                        'title' => '미래의 건축 디지털 시대의 공간과 시간의 만남 - 현대 건축의 새로운 패러다임과 지속가능한 도시 설계를 통한 인간 중심의 공간 창조',
                        'date' => '2025.11.15 — 2025.12.30',
                        'image' => '../assets/images/exhibitions/exh-thumb-02.jpg',
                        'status' => 'upcoming',
                        'variant' => 'with-tag',
                        'link' => '#'
                    ],
                    // 3. 과거 전시 (과거 탭에 노출, 태그 없음)
                    [
                        'title' => '김중업 × 르 코르뷔지에 건축사진전',
                        'date' => '2024.09.30 — 2024.10.26',
                        'image' => '../assets/images/exhibitions/exh-thumb-03.jpg',
                        'status' => 'past',
                        'variant' => 'default',
                        'link' => '#'
                    ],
                    // 4. 빈 카드 (전시 1개만 있을 때 나머지 자리)
                    [
                        'is_empty' => true,
                        'variant' => 'empty'
                    ]
                ];
                
                foreach ($exhibition_cards_variants as $card_data) {
                    $data = $card_data;
                    include __DIR__ . '/../components/cards/exhibition-card.php';
                }
                ?>
            </div>
            
            <h3>전시 1개만 있을 때 (빈 카드로 채움)</h3>
            <div class="component-showcase" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; max-width: 100%;">
                <?php
                $exhibition_single = [
                    // 실제 전시 1개
                    [
                        'title' => '현재 진행 중인 전시',
                        'date' => '2025.01.15 — 2025.03.20',
                        'image' => '../assets/images/exhibitions/exh-thumb-08.jpg',
                        'status' => 'current',
                        'variant' => 'with-tag',
                        'link' => '#'
                    ],
                    // 빈 카드 3개
                    [
                        'is_empty' => true,
                        'variant' => 'empty'
                    ],
                    [
                        'is_empty' => true,
                        'variant' => 'empty'
                    ],
                    [
                        'is_empty' => true,
                        'variant' => 'empty'
                    ]
                ];
                
                foreach ($exhibition_single as $card_data) {
                    $data = $card_data;
                    include __DIR__ . '/../components/cards/exhibition-card.php';
                }
                ?>
            </div>
            
            <h3>이벤트 카드 - 3가지 경우의 수</h3>
            <div class="component-showcase">
                <?php
                $event_cards = [
                    [
                        'title' => '팝업 스토어 : 간결한 선과 결을 통해 미니멀 디자인의 주얼리 올레프트',
                        'date' => '2025.10.15 — 2025.12.21',
                        'image' => '../assets/images/events/event-thumb-01.jpg',
                        'status' => 'current',
                        'show_tag' => true,
                        'link' => '#'
                    ],
                    [
                        'title' => '아티스트 토크 : 건축가와의 대화',
                        'date' => '2025.12.01 — 2025.12.15',
                        'image' => '../assets/images/events/event-thumb-02.jpg',
                        'status' => 'upcoming',
                        'show_tag' => true,
                        'link' => '#'
                    ],
                    [
                        'title' => '워크샵 : 나만의 건축 모형 만들기',
                        'date' => '2025.08.20 — 2025.08.30',
                        'image' => '../assets/images/events/event-thumb-03.jpg',
                        'status' => 'past',
                        'show_tag' => false,
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
            
            <h3>쿠움 공간 카드</h3>
            <div class="component-showcase">
                <?php
                $space_cards = [
                    [
                        'title' => '레조네 홍대',
                        'description' => '최고의 입지 연남동 메인 거리에 위치 · 연면적 150평 실내 공간 + 야외 공간 보유',
                        'image' => '../assets/images/space/space-1f2f-01.jpg',
                        'address' => '서울특별시 마포구 동교동 148-7',
                        'link' => '#'
                    ],
                    [
                        'title' => '쿠움 스페이스',
                        'description' => '현대적인 디자인과 최첨단 시설을 갖춘 다목적 공간 · 최대 200명 수용 가능',
                        'image' => '../assets/images/space/space-3f-01.jpg',
                        'address' => '서울특별시 마포구 연남동 123-45',
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
                        ['label' => '과거 전시', 'url' => '#past']
                    ],
                    'active_tab' => 0
                ];
                $data = $tab_data;
                include __DIR__ . '/../components/layout/navigation/tab-menu.php';
                ?>
            </div>
            
            <h3>층별 안내 탭 메뉴</h3>
            <div class="component-showcase">
                <?php
                $floor_tab_data = [
                    'floors' => [
                        [
                            'label' => '3F',
                            'url' => '#3f'
                        ],
                        [
                            'label' => '1F — 2F',
                            'url' => '#1f2f'
                        ],
                        [
                            'label' => 'B1',
                            'url' => '#b1'
                        ]
                    ],
                    'active_floor' => 0,
                    'hide_if_empty' => false
                ];
                $data = $floor_tab_data;
                include __DIR__ . '/../components/layout/navigation/floor-tab-menu.php';
                ?>
            </div>
            
            <h3>페이지 인디케이터</h3>
            <div class="component-showcase">
                <div style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">
                    <!-- 숫자형 인디케이터 -->
                    <div>
                        <h4 style="margin-bottom: 1rem; font-size: 1rem; color: var(--text-secondary);">숫자형</h4>
                        <?php
                        $page_indicator_data = [
                            'current_page' => 3,
                            'total_pages' => 5,
                            'type' => 'numbers'
                        ];
                        $data = $page_indicator_data;
                        include __DIR__ . '/../components/layout/navigation/page-indicator.php';
                        ?>
                    </div>
                    
                    <!-- Dot형 인디케이터 -->
                    <div>
                        <h4 style="margin-bottom: 1rem; font-size: 1rem; color: var(--text-secondary);">Dot형</h4>
                        <?php
                        $page_indicator_data = [
                            'current_page' => 2,
                            'total_pages' => 5,
                            'type' => 'dots'
                        ];
                        $data = $page_indicator_data;
                        include __DIR__ . '/../components/layout/navigation/page-indicator.php';
                        ?>
                    </div>
                </div>
            </div>
            
            <h3>페이지네이션 - 페이지당 12개 카드</h3>
            <div class="component-showcase">
                <div style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">
                    <!-- 예시 1: 현재 페이지 1 (10페이지 중) -->
                    <div>
                        <?php
                        $pagination_data = [
                            'current_page' => 1,
                            'total_pages' => 10,
                            'base_url' => '#'
                        ];
                        $data = $pagination_data;
                        include __DIR__ . '/../components/layout/navigation/pagination.php';
                        ?>
                    </div>
                    <!-- 예시 2: 현재 페이지 중간 (10페이지 중) -->
                    <div>
                        <?php
                        $pagination_data = [
                            'current_page' => 5,
                            'total_pages' => 10,
                            'base_url' => '#'
                        ];
                        $data = $pagination_data;
                        include __DIR__ . '/../components/layout/navigation/pagination.php';
                        ?>
                    </div>
                    <!-- 예시 3: 현재 페이지 끝 (10페이지 중) -->
                    <div>
                        <?php
                        $pagination_data = [
                            'current_page' => 10,
                            'total_pages' => 10,
                            'base_url' => '#'
                        ];
                        $data = $pagination_data;
                        include __DIR__ . '/../components/layout/navigation/pagination.php';
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- 스크롤 인디케이터 -->
            <h3>스크롤 인디케이터</h3>
            <div class="component-showcase">
                <p class="body-md" style="margin-bottom: 2rem;">페이지 상단에 고정되어 스크롤 진행 상황을 표시합니다. 각 페이지에서 스크롤하여 테스트해주세요.</p>
                <?php
                $scroll_indicator_data = [
                    'current_position' => 0,
                    'is_visible' => true
                ];
                $data = $scroll_indicator_data;
                include __DIR__ . '/../components/layout/navigation/scroll-indicator.php';
                ?>
            </div>
            
        </section>

    </div>
    
    <!-- JavaScript -->
    <script src="../js/main.js"></script>
</body>
</html>
