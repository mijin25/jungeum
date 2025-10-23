<?php
// 서버 환경 설정 로드
require_once '../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once '../lib/helpers.php';

// 컴포넌트 사용 예시 페이지
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정음 - 컴포넌트 미리보기</title>
    
    <!-- 웹폰트 로드 -->
    <link rel="stylesheet" href="../css/webfonts.css">
    
    <!-- 사이트 디자인 시스템 (실제 컴포넌트 스타일) -->
    <link rel="stylesheet" href="../css/design-system.css">
    
    <!-- 컴포넌트 프리뷰 페이지 전용 스타일 (레이아웃만 분리) -->
    <link rel="stylesheet" href="../css/utilities.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="../assets/images/common/logo-jungeum.svg">
</head>
<body>
    <!-- 메인 콘텐츠 -->
    <main class="main-content">
        <div class="preview-layout">
            <!-- 전체 콘텐츠 -->
            <div class="preview-content">
                <div class="preview-content__container">
                    <!-- 타이포그래피 섹션 -->
                    <section id="typography">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">Typography</h1>
                            <p class="body-lg">Font styles and size system</p>
                        </div>
                        <div class="preview-component-group">
                            <!-- 헤딩 스타일 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Headings</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 1rem;">
                                <h1 class="heading-h1">Heading H1 (80px)</h1>
                                <h2 class="heading-h2">Heading H2 (64px)</h2>
                                <h3 class="heading-h3">Heading H3 (48px)</h3>
                                <h4 class="heading-h4">Heading H4 (32px)</h4>
                                <h5 class="heading-h5">Heading H5 (28px)</h5>
                                <h6 class="heading-h6">Heading H6 (24px)</h6>
                                </div>
                            </div>
                                
                            <!-- 본문 텍스트 스타일 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Body Text</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 0.5rem;">
                                    <p class="body-xl">Body XL (20px) - 큰 본문 텍스트</p>
                                    <p class="body-lg">Body LG (18px) - 큰 본문 텍스트</p>
                                    <p class="body-md">Body MD (16px) - 기본 본문 텍스트</p>
                                    <p class="body-sm">Body SM (14px) - 작은 본문 텍스트</p>
                                </div>
                                </div>
                                
                            <!-- 디스플레이 스타일 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Display</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 1rem;">
                                    <div class="display-1">Display 1 (100px)</div>
                                    <div class="display-2">Display 2 (320px)</div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- 컬러 섹션 -->
                    <section id="colors">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">Colors</h1>
                            <p class="body-lg">Brand colors and gray scale</p>
                        </div>
                        <div class="preview-component-group">
                            <!-- 브랜드 컬러 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Brand Colors</h3>
                                <div class="preview-component-showcase">
                                    <div class="color-palette">
                                        <div class="color-swatch color-swatch--warm-white">
                                            <span class="color-swatch__label">Warm White</span>
                        </div>
                                        <div class="color-swatch color-swatch--yellow">
                                            <span class="color-swatch__label">Yellow</span>
                                    </div>
                                        <div class="color-swatch color-swatch--orange">
                                            <span class="color-swatch__label">Orange</span>
                                    </div>
                                        <div class="color-swatch color-swatch--blue">
                                            <span class="color-swatch__label">Blue</span>
                                    </div>
                                        <div class="color-swatch color-swatch--brick">
                                            <span class="color-swatch__label">Brick</span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 그레이 스케일 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Warm Gray Colors</h3>
                                <div class="preview-component-showcase">
                                    <div class="color-palette">
                                        <div class="color-swatch color-swatch--grey-10">
                                            <span class="color-swatch__label">Grey 10</span>
                                    </div>
                                        <div class="color-swatch color-swatch--grey-20">
                                            <span class="color-swatch__label">Grey 20</span>
                                    </div>
                                        <div class="color-swatch color-swatch--grey-40">
                                            <span class="color-swatch__label">Grey 40</span>
                                    </div>
                                        <div class="color-swatch color-swatch--grey-60">
                                            <span class="color-swatch__label">Grey 60</span>
                                    </div>
                                        <div class="color-swatch color-swatch--grey-70">
                                            <span class="color-swatch__label">Grey 70</span>
                                    </div>
                                        <div class="color-swatch color-swatch--grey-100">
                                            <span class="color-swatch__label">Grey 100</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- 반응형 검증 섹션 -->
                    <section id="responsive">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">Responsive</h1>
                            <p class="body-lg">Layout system for different screen sizes</p>
                        </div>
                        <div class="section__content">
                            <div class="responsive-info" style="background: var(--bg-secondary); padding: 20px; border-radius: 0; margin-bottom: 32px; border: 1px solid var(--border-light);">
                                <p style="margin-bottom: 8px; font-size: 16px;">Current screen size: <span id="screenSize" style="font-weight: 500; color: var(--accent-primary);"></span></p>
                                <p style="font-size: 16px;">Breakpoint: <span id="breakpoint" style="font-weight: 500; color: var(--accent-primary);"></span></p>
                            </div>
                            
                            <div class="grid grid--3-cols grid--responsive" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                                <div class="grid__item">
                                    <div class="responsive-card" style="background: var(--bg-secondary); padding: 20px; border-radius: 0; border: 1px solid var(--border-light);">
                                        <h4 style="margin-bottom: 12px; color: var(--text-primary);">Mobile (320px-768px)</h4>
                                        <p style="color: var(--text-secondary); line-height: 1.6;">Vertical layout, touch-friendly interface</p>
                                    </div>
                                </div>
                                <div class="grid__item">
                                    <div class="responsive-card" style="background: var(--bg-secondary); padding: 20px; border-radius: 0; border: 1px solid var(--border-light);">
                                        <h4 style="margin-bottom: 12px; color: var(--text-primary);">Tablet (768px-1024px)</h4>
                                        <p style="color: var(--text-secondary); line-height: 1.6;">2-column grid, medium-sized layout</p>
                                    </div>
                                </div>
                                <div class="grid__item">
                                    <div class="responsive-card" style="background: var(--bg-secondary); padding: 20px; border-radius: 0; border: 1px solid var(--border-light);">
                                        <h4 style="margin-bottom: 12px; color: var(--text-primary);">Desktop (1024px+)</h4>
                                        <p style="color: var(--text-secondary); line-height: 1.6;">3-column grid, wide layout</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        
        <!-- 버튼 컴포넌트 섹션 -->
                    <section id="buttons">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">Buttons</h1>
                            <p class="body-lg">Various button styles and states</p>
                </div>
                
                        <div class="preview-component-group">
                            <!-- Primary Buttons -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Primary Buttons</h3>
                                <div class="preview-component-showcase">
                                    <p>컴포넌트 테스트:</p>
                                    
                                    <!-- 1. 하드코딩된 버튼 테스트 -->
                                    <button style="background: red; color: white; padding: 10px; margin: 5px;">하드코딩 버튼 1</button>
                                    <button style="background: red; color: white; padding: 10px; margin: 5px;">하드코딩 버튼 2</button>
                                    
                                    <!-- 2. 간단한 PHP 버튼 테스트 -->
                                    <?php
                                    echo '<button style="background: blue; color: white; padding: 10px; margin: 5px;">PHP 버튼 1</button>';
                                    echo '<button style="background: blue; color: white; padding: 10px; margin: 5px;">PHP 버튼 2</button>';
                                    ?>
                                    
                                    <!-- 3. button.php 컴포넌트 직접 테스트 -->
                                    <p>button.php 컴포넌트 테스트:</p>
                                    <?php
                                    $data = [
                                        'text' => '컴포넌트 버튼 1',
                                        'type' => 'primary',
                                        'size' => 'large',
                                        'href' => null,
                                        'disabled' => false,
                                        'icon' => null,
                                        'icon_svg' => null,
                                        'icon_position' => 'right'
                                    ];
                                    echo '<p>데이터 설정: ' . $data['text'] . '</p>';
                                    include '../components/ui/buttons/button.php';
                                    echo '<p>첫 번째 include 완료</p>';
                                    
                                    $data = [
                                        'text' => '컴포넌트 버튼 2',
                                        'type' => 'primary',
                                        'size' => 'medium',
                                        'href' => null,
                                        'disabled' => false,
                                        'icon' => null,
                                        'icon_svg' => null,
                                        'icon_position' => 'right'
                                    ];
                                    echo '<p>데이터 설정: ' . $data['text'] . '</p>';
                                    include '../components/ui/buttons/button.php';
                                    echo '<p>두 번째 include 완료</p>';
                                    ?>
                                    
                                    <!-- 4. 이중 루프 테스트 -->
                                    <p>이중 루프 테스트:</p>
                                    <?php
                                    $button_groups = [
                                        'primary' => [
                                            [
                                                'text' => '루프 버튼 1',
                                                'type' => 'primary',
                                                'size' => 'large',
                                                'href' => null,
                                                'disabled' => false,
                                                'icon' => null,
                                                'icon_svg' => null,
                                                'icon_position' => 'right'
                                            ],
                                            [
                                                'text' => '루프 버튼 2',
                                                'type' => 'primary',
                                                'size' => 'medium',
                                                'href' => null,
                                                'disabled' => false,
                                                'icon' => null,
                                                'icon_svg' => null,
                                                'icon_position' => 'right'
                                            ]
                                        ]
                                    ];
                                    
                                    foreach($button_groups as $group_name => $buttons) {
                                        echo '<p>그룹: ' . $group_name . '</p>';
                                        foreach($buttons as $data) {
                                            echo '<p>루프 데이터: ' . $data['text'] . '</p>';
                                            include '../components/ui/buttons/button.php';
                                            echo '<p>루프 include 완료</p>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <!-- Secondary Buttons -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Secondary Buttons</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    // 데이터 중심 구현
                                    $secondary_buttons_data = [
                                        [
                                            'text' => 'Buy goods',
                                            'type' => 'secondary',
                                            'size' => 'large',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => null,
                                            'icon_position' => 'right'
                                        ],
                                        [
                                            'text' => 'Upload file',
                                            'type' => 'secondary',
                                            'size' => 'medium',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 1V15M1 8H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                                            'icon_position' => 'left'
                                        ]
                                    ];
                                    
                                    foreach($secondary_buttons_data as $button_data) {
                                        // 변수 명시적 설정
                                        $text = $button_data['text'];
                                        $type = $button_data['type'];
                                        $size = $button_data['size'];
                                        $href = $button_data['href'];
                                        $disabled = $button_data['disabled'];
                                        $icon = $button_data['icon'];
                                        $icon_svg = $button_data['icon_svg'];
                                        $icon_position = $button_data['icon_position'];
                                        include '../components/ui/buttons/button.php';
                                    }
                                    ?>
                            </div>
                        </div>
                        
                            <!-- Text Buttons -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Text Buttons</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 1rem;">
                                    <?php
                                    // 데이터 중심 구현
                                    $text_buttons_data = [
                                        [
                                            'text' => 'View Exhibitions',
                                            'type' => 'text',
                                            'size' => 'xl',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25"><path d="M22 14C17.5817 14 14 10.4183 14 6"/><path d="M2 14H22"/></svg>',
                                            'icon_position' => 'right'
                                        ],
                                        [
                                            'text' => 'View All',
                                            'type' => 'text',
                                            'size' => 'medium',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25"><path d="M22 14C17.5817 14 14 10.4183 14 6"/><path d="M2 14H22"/></svg>',
                                            'icon_position' => 'right'
                                        ],
                                        [
                                            'text' => 'Back to List',
                                            'type' => 'text',
                                            'size' => 'medium',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25"><path d="M2 14C6.41828 14 10 10.4183 10 6"/><path d="M22 14H2"/></svg>',
                                            'icon_position' => 'left'
                                        ],
                                        [
                                            'text' => 'info@jungeum.com',
                                            'type' => 'text',
                                            'size' => 'medium',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => null,
                                            'icon_position' => 'right'
                                        ],
                                        [
                                            'text' => 'allleft.co.kr',
                                            'type' => 'text',
                                            'size' => 'small',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1043_10666)"><rect width="24" height="24" fill="white" fill-opacity="0.01"/><path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85383C4.07979 4.06253 2.66989 5.78049 1.83733 7.79048C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3165 7.72022 22.3642 9.85401 22.7886C11.9878 23.2131 14.1995 22.9952 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C23 9.08262 21.8411 6.28472 19.7782 4.22182C17.7153 2.15892 14.9174 1 12 1ZM21.4286 11.2143H16.7143C16.6226 8.32057 15.8729 5.48576 14.5221 2.925C16.3832 3.43406 18.0432 4.50181 19.2782 5.98412C20.5133 7.46643 21.2638 9.29195 21.4286 11.2143ZM12 21.4286C11.8247 21.4403 11.6489 21.4403 11.4736 21.4286C9.8458 18.8327 8.9424 15.8485 8.85715 12.7857H15.1429C15.0647 15.8463 14.1695 18.8304 12.55 21.4286C12.3669 21.4414 12.1831 21.4414 12 21.4286ZM8.85715 11.2143C8.93531 8.15367 9.83052 5.16965 11.45 2.57143C11.7999 2.53212 12.153 2.53212 12.5029 2.57143C14.1389 5.16491 15.0505 8.14926 15.1429 11.2143H8.85715ZM9.45429 2.925C8.11174 5.48772 7.37015 8.32242 7.28572 11.2143H2.57143C2.7362 9.29195 3.48674 7.46643 4.72177 5.98412C5.95679 4.50181 7.61684 3.43406 9.47786 2.925H9.45429ZM2.61072 12.7857H7.325C7.407 15.677 8.1459 18.5116 9.48572 21.075C7.63054 20.5605 5.97733 19.4904 4.7483 18.0085C3.51926 16.5266 2.77332 14.704 2.61072 12.7857ZM14.5221 21.075C15.8729 18.5142 16.6226 15.6794 16.7143 12.7857H21.4286C21.2638 14.7081 20.5133 16.5336 19.2782 18.0159C18.0432 19.4982 16.3832 20.5659 14.5221 21.075Z" fill="currentColor"/></g><defs><clipPath id="clip0_1043_10666"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>',
                                            'icon_position' => 'left'
                                        ]
                                    ];
                                    
                                    foreach($text_buttons_data as $button_data) {
                                        // 변수 명시적 설정
                                        $text = $button_data['text'];
                                        $type = $button_data['type'];
                                        $size = $button_data['size'];
                                        $href = $button_data['href'];
                                        $disabled = $button_data['disabled'];
                                        $icon = $button_data['icon'];
                                        $icon_svg = $button_data['icon_svg'];
                                        $icon_position = $button_data['icon_position'];
                                        include '../components/ui/buttons/button.php';
                                    }
                                    ?>
                                </div>
                        </div>
                        
                            <!-- Control Buttons -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Control Buttons</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    // 데이터 중심 구현
                                    $control_buttons_data = [
                                        [
                                            'text' => '',
                                            'type' => 'control',
                                            'size' => 'large',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25"><path d="M10 20C10 15.5817 6.41828 12 2 12C6.41828 12 10 8.41828 10 4"/><path d="M22 12L2 12"/></svg>',
                                            'icon_position' => 'left'
                                        ],
                                        [
                                            'text' => '',
                                            'type' => 'control',
                                            'size' => 'large',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25"><path d="M14 20C14 15.5817 17.5817 12 22 12C17.5817 12 14 8.41828 14 4"/><path d="M2 12L22 12"/></svg>',
                                            'icon_position' => 'right'
                                        ]
                                    ];
                                    
                                    foreach($control_buttons_data as $button_data) {
                                        // 변수 명시적 설정
                                        $text = $button_data['text'];
                                        $type = $button_data['type'];
                                        $size = $button_data['size'];
                                        $href = $button_data['href'];
                                        $disabled = $button_data['disabled'];
                                        $icon = $button_data['icon'];
                                        $icon_svg = $button_data['icon_svg'];
                                        $icon_position = $button_data['icon_position'];
                                        include '../components/ui/buttons/button.php';
                                    }
                                    ?>
                            </div>
                            
                                <div class="preview-component-showcase" style="margin-top: 1rem;">
                                    <?php
                                    // 중간 크기 Control Buttons
                                    $control_buttons_medium_data = [
                                        [
                                            'text' => '',
                                            'type' => 'control',
                                            'size' => 'medium',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25"><path d="M10 20C10 15.5817 6.41828 12 2 12C6.41828 12 10 8.41828 10 4"/></svg>',
                                            'icon_position' => 'left'
                                        ],
                                        [
                                            'text' => '',
                                            'type' => 'control',
                                            'size' => 'medium',
                                            'href' => null,
                                            'disabled' => false,
                                            'icon' => null,
                                            'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25"><path d="M14 20C14 15.5817 17.5817 12 22 12C17.5817 12 14 8.41828 14 4"/><path d="M2 12L22 12"/></svg>',
                                            'icon_position' => 'right'
                                        ]
                                    ];
                                    
                                    foreach($control_buttons_medium_data as $button_data) {
                                        // 변수 명시적 설정
                                        $text = $button_data['text'];
                                        $type = $button_data['type'];
                                        $size = $button_data['size'];
                                        $href = $button_data['href'];
                                        $disabled = $button_data['disabled'];
                                        $icon = $button_data['icon'];
                                        $icon_svg = $button_data['icon_svg'];
                                        $icon_position = $button_data['icon_position'];
                                        include '../components/ui/buttons/button.php';
                                    }
                                    ?>
                    </div>
                </div>
            </div>
        </section>
        
                    <!-- 카드 컴포넌트 섹션 -->
                    <section id="cards">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">Cards</h1>
                            <p class="body-lg">Various card styles and states</p>
                        </div>
                        
                        <div class="preview-component-group">
                            <!-- 이벤트 카드 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Event Cards</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    // 이벤트 카드 데이터 설정
                                    $event_data = [
                                        'title' => '정음 특별전시',
                                        'subtitle' => '문화와 예술의 만남',
                                        'date' => '2024.01.15 - 2024.03.15',
                                        'location' => '정음 갤러리',
                                        'image' => '../assets/images/events/event-thumb-01.jpg',
                                        'status' => 'ongoing'
                                    ];
                                    include '../components/cards/event-card.php';
                                    ?>
                                    
                                    <?php
                                    $event_data = [
                                        'title' => '미래의 전시',
                                        'subtitle' => '예술가들의 비전',
                                        'date' => '2024.04.01 - 2024.06.30',
                                        'location' => '정음 갤러리',
                                        'image' => '../assets/images/events/event-thumb-02.jpg',
                                        'status' => 'upcoming'
                                    ];
                                    include '../components/cards/event-card.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 전시 카드 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Exhibition Cards</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    // 전시 카드 데이터 설정
                                    $exhibition_data = [
                                        'title' => '현대 미술의 흐름',
                                        'artist' => '김정음',
                                        'period' => '2024.01.15 - 2024.03.15',
                                        'image' => '../assets/images/exhibitions/exh-thumb-01.jpg',
                                        'status' => 'current'
                                    ];
                                    include '../components/cards/exhibition-card.php';
                                    ?>
                                    
                                    <?php
                                    $exhibition_data = [
                                        'title' => '추상의 세계',
                                        'artist' => '이예술',
                                        'period' => '2024.04.01 - 2024.06.30',
                                        'image' => '../assets/images/exhibitions/exh-thumb-02.jpg',
                                        'status' => 'upcoming'
                                    ];
                                    include '../components/cards/exhibition-card.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 공간 카드 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Space Cards</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    // 공간 카드 데이터 설정
                                    $space_data = [
                                        'name' => '1층 메인 갤러리',
                                        'description' => '자연광이 들어오는 넓은 전시 공간',
                                        'capacity' => '100명',
                                        'image' => '../assets/images/space/space-1f2f-01.jpg',
                                        'features' => ['자연광', '고정 벽면', '전문 조명']
                                    ];
                                    include '../components/cards/space-card.php';
                                    ?>
                                    
                                    <?php
                                    $space_data = [
                                        'name' => '3층 세미나실',
                                        'description' => '소규모 강연 및 워크샵 공간',
                                        'capacity' => '30명',
                                        'image' => '../assets/images/space/space-3f-01.jpg',
                                        'features' => ['프로젝터', '화이트보드', '음향시설']
                                    ];
                                    include '../components/cards/space-card.php';
                                    ?>
                        </div>
                        </div>
                    </div>
                </section>
                
                    <!-- 입력 폼 컴포넌트 섹션 -->
                    <section id="inputs">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">Inputs</h1>
                            <p class="body-lg">Various input field styles and states</p>
                        </div>
                        
                        <div class="preview-component-group">
                            <!-- 기본 입력 필드 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Basic Input Fields</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 1rem; width: 100%;">
                                    <?php
                                    // 기본 입력 필드
                                    $input_data = [
                                        'type' => 'text',
                                        'name' => 'name',
                                        'label' => '이름',
                                        'placeholder' => '이름을 입력하세요',
                                        'required' => true
                                    ];
                                    include '../components/forms/input.php';
                                    ?>
                                    
                                    <?php
                                    $input_data = [
                                        'type' => 'email',
                                        'name' => 'email',
                                        'label' => '이메일',
                                        'placeholder' => '이메일을 입력하세요',
                                        'required' => true
                                    ];
                                    include '../components/forms/input.php';
                                    ?>
                                    
                                    <?php
                                    $input_data = [
                                        'type' => 'tel',
                                        'name' => 'phone',
                                        'label' => '전화번호',
                                        'placeholder' => '010-0000-0000',
                                        'required' => false
                                    ];
                                    include '../components/forms/input.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 텍스트 영역 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Text Areas</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 1rem; width: 100%;">
                                    <?php
                                    $input_data = [
                                        'type' => 'textarea',
                                        'name' => 'message',
                                        'label' => '메시지',
                                        'placeholder' => '메시지를 입력하세요',
                                        'rows' => 4,
                                        'required' => true
                                    ];
                                    include '../components/forms/input.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 선택 필드 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Select Fields</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 1rem; width: 100%;">
                                    <?php
                                    $input_data = [
                                        'type' => 'select',
                                        'name' => 'category',
                                        'label' => '카테고리',
                                        'options' => [
                                            '전시' => 'exhibition',
                                            '이벤트' => 'event',
                                            '공간' => 'space',
                                            '기타' => 'other'
                                        ],
                                        'required' => true
                                    ];
                                    include '../components/forms/input.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 문의 폼 전체 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Contact Form</h3>
                                <div class="preview-component-showcase" style="width: 100%;">
                                    <?php
                                    // 문의 폼 데이터 설정
                                    $form_data = [
                                        'title' => '문의하기',
                                        'description' => '궁금한 사항이 있으시면 언제든 문의해주세요.',
                                        'fields' => [
                                            'name' => ['type' => 'text', 'label' => '이름', 'required' => true],
                                            'email' => ['type' => 'email', 'label' => '이메일', 'required' => true],
                                            'phone' => ['type' => 'tel', 'label' => '전화번호', 'required' => false],
                                            'subject' => ['type' => 'text', 'label' => '제목', 'required' => true],
                                            'message' => ['type' => 'textarea', 'label' => '메시지', 'required' => true]
                                        ],
                                        'submit_text' => '문의하기'
                                    ];
                                    include '../components/forms/contact-form.php';
                                    ?>
                        </div>
                        </div>
                    </div>
                </section>
                
                    <!-- 네비게이션 컴포넌트 섹션 -->
                    <section id="navigation">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">Navigation</h1>
                            <p class="body-lg">Various navigation components and states</p>
                        </div>
                        
                        <div class="preview-component-group">
                            <!-- 헤더 네비게이션 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Header Navigation</h3>
                                <div class="preview-component-showcase" style="width: 100%;">
                                    <?php
                                    // 헤더 데이터 설정
                                    $header_data = [
                                        'logo' => '../assets/images/common/logo-jungeum.svg',
                                        'menu_items' => [
                                            '전시' => 'exhibitions',
                                            '이벤트' => 'events',
                                            '공간' => 'space',
                                            '소개' => 'about',
                                            '문의' => 'contact'
                                        ],
                                        'current_page' => 'exhibitions'
                                    ];
                                    include '../components/layout/header.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 푸터 네비게이션 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Footer Navigation</h3>
                                <div class="preview-component-showcase" style="width: 100%;">
                                    <?php
                                    // 푸터 데이터 설정
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
                                </div>
                            </div>
                            
                            <!-- 페이지 인디케이터 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Page Indicators</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    $indicator_data = [
                                        'current' => 2,
                                        'total' => 5,
                                        'type' => 'dots'
                                    ];
                                    include '../components/layout/navigation/page-indicator.php';
                                    ?>
                                    
                                    <?php
                                    $indicator_data = [
                                        'current' => 3,
                                        'total' => 8,
                                        'type' => 'numbers'
                                    ];
                                    include '../components/layout/navigation/page-indicator.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 페이지네이션 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Pagination</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    $pagination_data = [
                                        'current' => 3,
                                        'total' => 10,
                                        'show_prev_next' => true,
                                        'show_first_last' => true
                                    ];
                                    include '../components/layout/navigation/pagination.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 탭 메뉴 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Tab Menu</h3>
                                <div class="preview-component-showcase" style="width: 100%;">
                                    <?php
                                    $tab_data = [
                                        'tabs' => [
                                            '전시' => 'exhibitions',
                                            '이벤트' => 'events',
                                            '공간' => 'space'
                                        ],
                                        'active' => 'exhibitions'
                                    ];
                                    include '../components/layout/navigation/tab-menu.php';
                                    ?>
                        </div>
                        </div>
                    </div>
                </section>
                
                    <!-- UI 요소 섹션 -->
                    <section id="ui">
                        <div class="preview-section__header">
                            <h1 class="heading-h1">UI Elements</h1>
                            <p class="body-lg">Various UI elements and interactive components</p>
                        </div>
                        
                        <div class="preview-component-group">
                            <!-- 태그 컴포넌트 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Tags</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    $tag_data = [
                                        'text' => '진행중',
                                        'type' => 'status',
                                        'color' => 'green'
                                    ];
                                    include '../components/ui/tag.php';
                                    ?>
                                    
                                    <?php
                                    $tag_data = [
                                        'text' => '예정',
                                        'type' => 'status',
                                        'color' => 'blue'
                                    ];
                                    include '../components/ui/tag.php';
                                    ?>
                                    
                                    <?php
                                    $tag_data = [
                                        'text' => '종료',
                                        'type' => 'status',
                                        'color' => 'gray'
                                    ];
                                    include '../components/ui/tag.php';
                                    ?>
                                    
                                    <?php
                                    $tag_data = [
                                        'text' => '특별전시',
                                        'type' => 'category',
                                        'color' => 'orange'
                                    ];
                                    include '../components/ui/tag.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 알림 컴포넌트 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Alerts</h3>
                                <div class="preview-component-showcase" style="flex-direction: column; align-items: flex-start; gap: 1rem; width: 100%;">
                                    <?php
                                    $alert_data = [
                                        'type' => 'success',
                                        'title' => '성공',
                                        'message' => '문의가 성공적으로 전송되었습니다.',
                                        'dismissible' => true
                                    ];
                                    include '../components/ui/alerts/alert.php';
                                    ?>
                                    
                                    <?php
                                    $alert_data = [
                                        'type' => 'warning',
                                        'title' => '주의',
                                        'message' => '입력한 정보를 다시 확인해주세요.',
                                        'dismissible' => true
                                    ];
                                    include '../components/ui/alerts/alert.php';
                                    ?>
                                    
                                    <?php
                                    $alert_data = [
                                        'type' => 'error',
                                        'title' => '오류',
                                        'message' => '서버 오류가 발생했습니다. 잠시 후 다시 시도해주세요.',
                                        'dismissible' => true
                                    ];
                                    include '../components/ui/alerts/alert.php';
                                    ?>
                                    
                                    <?php
                                    $alert_data = [
                                        'type' => 'info',
                                        'title' => '정보',
                                        'message' => '새로운 전시가 추가되었습니다.',
                                        'dismissible' => false
                                    ];
                                    include '../components/ui/alerts/alert.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 모달 컴포넌트 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Modals</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    $modal_data = [
                                        'id' => 'preview-modal',
                                        'title' => '전시 상세 정보',
                                        'content' => '이 전시에 대한 자세한 정보를 확인하실 수 있습니다.',
                                        'size' => 'medium',
                                        'show_close' => true
                                    ];
                                    include '../components/ui/modals/modal.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- 아코디언 컴포넌트 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Accordions</h3>
                                <div class="preview-component-showcase" style="width: 100%;">
                                    <?php
                                    $accordion_data = [
                                        'items' => [
                                            [
                                                'title' => '전시 정보',
                                                'content' => '현재 진행 중인 전시에 대한 상세 정보입니다.',
                                                'open' => true
                                            ],
                                            [
                                                'title' => '이벤트 정보',
                                                'content' => '다가오는 이벤트에 대한 정보입니다.',
                                                'open' => false
                                            ],
                                            [
                                                'title' => '공간 정보',
                                                'content' => '갤러리 공간에 대한 상세 정보입니다.',
                                                'open' => false
                                            ]
                                        ]
                                    ];
                                    include '../components/ui/accordion/accordion.php';
                                    ?>
                        </div>
                    </div>
                            
                            <!-- 로딩 스피너 -->
                            <div class="preview-component-subgroup">
                                <h3 class="preview-component-subgroup__title">Loading Spinners</h3>
                                <div class="preview-component-showcase">
                                    <?php
                                    $spinner_data = [
                                        'size' => 'small',
                                        'color' => 'primary'
                                    ];
                                    include '../components/ui/loading/spinner.php';
                                    ?>
                                    
                                    <?php
                                    $spinner_data = [
                                        'size' => 'medium',
                                        'color' => 'secondary'
                                    ];
                                    include '../components/ui/loading/spinner.php';
                                    ?>
                                    
                                    <?php
                                    $spinner_data = [
                                        'size' => 'large',
                                        'color' => 'accent'
                                    ];
                                    include '../components/ui/loading/spinner.php';
                                    ?>
                        </div>
                        </div>
                    </div>
                </section>
                
                </div>
            </div>
        </div>
    </main>
    
    <!-- JavaScript -->
    <script>
            // 화면 크기 표시 (반응형 섹션용)
            function updateScreenSize() {
                const width = window.innerWidth;
                const height = window.innerHeight;
                const screenSizeElement = document.getElementById('screenSize');
                const breakpointElement = document.getElementById('breakpoint');
                
                if (screenSizeElement) {
                    screenSizeElement.textContent = width + 'x' + height;
                }
                
                if (breakpointElement) {
                    let breakpoint = 'Mobile';
                    if (width >= 1024) breakpoint = 'Desktop';
                    else if (width >= 768) breakpoint = 'Tablet';
                    
                    breakpointElement.textContent = breakpoint;
                }
            }
            
            // DOM 로드 완료 후 실행
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', updateScreenSize);
            } else {
                updateScreenSize();
            }
            
            window.addEventListener('resize', updateScreenSize);
    </script>
</body>
</html>