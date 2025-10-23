<?php
// 서버 환경 설정 로드
require_once '../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once '../components/helpers.php';

// 디자인 검증 도구
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정음 - 디자인 검증 도구</title>
    
    <!-- 웹폰트 로드 -->
    <link rel="stylesheet" href="../css/webfonts.css">
    
    <!-- 기본 스타일시트 -->
    <link rel="stylesheet" href="../css/design-system.css">
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="../assets/images/common/logo-jungeum.svg">
    
    <style>
        /* 디자인 검증을 위한 추가 스타일 */
        .design-validator {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            background: var(--color-white);
            border: 2px solid var(--accent-primary);
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            max-width: 300px;
        }
        
        .design-validator__title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-primary);
        }
        
        .design-validator__controls {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .design-validator__button {
            padding: 8px 12px;
            border: 1px solid var(--border-medium);
            background: var(--bg-primary);
            color: var(--text-primary);
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.2s ease;
        }
        
        .design-validator__button:hover {
            background: var(--bg-secondary);
            border-color: var(--accent-primary);
        }
        
        .design-validator__button.active {
            background: var(--accent-primary);
            color: var(--text-inverse);
        }
        
        .design-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 9998;
            display: none;
        }
        
        .design-overlay.active {
            display: block;
        }
        
        .design-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(to right, rgba(255,0,0,0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,0,0,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
        }
        
        .component-outline {
            outline: 2px solid #ff0000;
            outline-offset: 2px;
        }
        
        .color-palette {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: var(--color-white);
            border: 1px solid var(--border-medium);
            border-radius: 8px;
            padding: 12px;
            z-index: 9999;
            display: none;
        }
        
        .color-palette.active {
            display: block;
        }
        
        .color-swatch {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            margin: 2px;
            border: 1px solid var(--border-medium);
        }
    </style>
</head>
<body>
    <!-- 디자인 검증 도구 -->
    <div class="design-validator">
        <h3 class="design-validator__title">디자인 검증 도구</h3>
        <div class="design-validator__controls">
            <button class="design-validator__button" onclick="toggleGrid()">그리드 표시</button>
            <button class="design-validator__button" onclick="toggleComponentOutline()">컴포넌트 아웃라인</button>
            <button class="design-validator__button" onclick="toggleColorPalette()">컬러 팔레트</button>
            <button class="design-validator__button" onclick="toggleResponsive()">반응형 모드</button>
            <button class="design-validator__button" onclick="checkAccessibility()">접근성 검사</button>
        </div>
    </div>
    
    <!-- 그리드 오버레이 -->
    <div class="design-overlay" id="gridOverlay">
        <div class="design-grid"></div>
    </div>
    
    <!-- 컬러 팔레트 -->
    <div class="color-palette" id="colorPalette">
        <h4 style="margin-bottom: 8px; font-size: 12px;">정음 컬러 팔레트</h4>
        <div>
            <div class="color-swatch" style="background: var(--color-jungeum-warm-white);" title="Warm White"></div>
            <div class="color-swatch" style="background: var(--color-jungeum-yellow);" title="Yellow"></div>
            <div class="color-swatch" style="background: var(--color-jungeum-orange);" title="Orange"></div>
            <div class="color-swatch" style="background: var(--color-jungeum-blue);" title="Blue"></div>
            <div class="color-swatch" style="background: var(--color-jungeum-brick);" title="Brick"></div>
        </div>
        <div style="margin-top: 8px;">
            <div class="color-swatch" style="background: var(--color-warm-grey-10);" title="Grey 10"></div>
            <div class="color-swatch" style="background: var(--color-warm-grey-20);" title="Grey 20"></div>
            <div class="color-swatch" style="background: var(--color-warm-grey-40);" title="Grey 40"></div>
            <div class="color-swatch" style="background: var(--color-warm-grey-60);" title="Grey 60"></div>
            <div class="color-swatch" style="background: var(--color-warm-grey-70);" title="Grey 70"></div>
            <div class="color-swatch" style="background: var(--color-warm-grey-100);" title="Grey 100"></div>
        </div>
    </div>
    
    <!-- 헤더 컴포넌트 -->
    <?php include 'components/header.php'; ?>
    
    <!-- 메인 콘텐츠 -->
    <main class="main-content">
        
        <!-- 타이포그래피 검증 섹션 -->
        <section class="section">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title">타이포그래피 검증</h2>
                    <p class="section__description">Figma 디자인과 일치하는지 확인</p>
                </div>
                
                <div class="section__content">
                    <div class="typography-showcase">
                        <h1 class="heading-h1">Heading H1 (80px)</h1>
                        <h2 class="heading-h2">Heading H2 (64px)</h2>
                        <h3 class="heading-h3">Heading H3 (48px)</h3>
                        <h4 class="heading-h4">Heading H4 (32px)</h5>
                        <h5 class="heading-h5">Heading H5 (28px)</h5>
                        <h6 class="heading-h6">Heading H6 (24px)</h6>
                        
                        <div class="body-text-showcase">
                            <p class="body-xl">Body XL (20px) - 큰 본문 텍스트</p>
                            <p class="body-lg">Body LG (18px) - 큰 본문 텍스트</p>
                            <p class="body-md">Body MD (16px) - 기본 본문 텍스트</p>
                            <p class="body-sm">Body SM (14px) - 작은 본문 텍스트</p>
                        </div>
                        
                        <div class="display-showcase">
                            <div class="display-1">Display 1 (100px)</div>
                            <div class="display-2">Display 2 (320px)</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- 컬러 시스템 검증 섹션 -->
        <section class="section section--light">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title">컬러 시스템 검증</h2>
                    <p class="section__description">Figma 컬러 팔레트와 일치하는지 확인</p>
                </div>
                
                <div class="section__content">
                    <div class="color-showcase">
                        <div class="color-group">
                            <h4 class="heading-h5">브랜드 컬러</h4>
                            <div class="color-row">
                                <div class="color-item" style="background: var(--color-jungeum-warm-white);">
                                    <span>Warm White</span>
                                </div>
                                <div class="color-item" style="background: var(--color-jungeum-yellow);">
                                    <span>Yellow</span>
                                </div>
                                <div class="color-item" style="background: var(--color-jungeum-orange);">
                                    <span>Orange</span>
                                </div>
                                <div class="color-item" style="background: var(--color-jungeum-blue);">
                                    <span>Blue</span>
                                </div>
                                <div class="color-item" style="background: var(--color-jungeum-brick);">
                                    <span>Brick</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="color-group">
                            <h4 class="heading-h5">웜 그레이 컬러</h4>
                            <div class="color-row">
                                <div class="color-item" style="background: var(--color-warm-grey-10);">
                                    <span>Grey 10</span>
                                </div>
                                <div class="color-item" style="background: var(--color-warm-grey-20);">
                                    <span>Grey 20</span>
                                </div>
                                <div class="color-item" style="background: var(--color-warm-grey-40);">
                                    <span>Grey 40</span>
                                </div>
                                <div class="color-item" style="background: var(--color-warm-grey-60);">
                                    <span>Grey 60</span>
                                </div>
                                <div class="color-item" style="background: var(--color-warm-grey-70);">
                                    <span>Grey 70</span>
                                </div>
                                <div class="color-item" style="background: var(--color-warm-grey-100);">
                                    <span>Grey 100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- 반응형 검증 섹션 -->
        <section class="section">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title">반응형 검증</h2>
                    <p class="section__description">다양한 화면 크기에서의 레이아웃 확인</p>
                </div>
                
                <div class="section__content">
                    <div class="responsive-showcase">
                        <div class="responsive-info">
                            <p>현재 화면 크기: <span id="screenSize"></span></p>
                            <p>브레이크포인트: <span id="breakpoint"></span></p>
                        </div>
                        
                        <div class="grid grid--3-cols grid--responsive">
                            <div class="grid__item">
                                <div class="responsive-card">
                                    <h4>모바일 (320px-768px)</h4>
                                    <p>세로 레이아웃, 터치 친화적</p>
                                </div>
                            </div>
                            <div class="grid__item">
                                <div class="responsive-card">
                                    <h4>태블릿 (768px-1024px)</h4>
                                    <p>2열 그리드, 중간 크기</p>
                                </div>
                            </div>
                            <div class="grid__item">
                                <div class="responsive-card">
                                    <h4>데스크톱 (1024px+)</h4>
                                    <p>3열 그리드, 넓은 레이아웃</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    
    <!-- 푸터 컴포넌트 -->
    <?php include 'components/footer.php'; ?>
    
    <!-- JavaScript -->
    <script src="js/main.js"></script>
    
    <script>
        // 디자인 검증 도구 JavaScript
        function toggleGrid() {
            const overlay = document.getElementById('gridOverlay');
            const button = event.target;
            
            if (overlay.classList.contains('active')) {
                overlay.classList.remove('active');
                button.classList.remove('active');
            } else {
                overlay.classList.add('active');
                button.classList.add('active');
            }
        }
        
        function toggleComponentOutline() {
            const button = event.target;
            const components = document.querySelectorAll('.exhibition-card, .event-card, .space-card, .press-card, .btn, .form-field');
            
            if (button.classList.contains('active')) {
                components.forEach(comp => comp.classList.remove('component-outline'));
                button.classList.remove('active');
            } else {
                components.forEach(comp => comp.classList.add('component-outline'));
                button.classList.add('active');
            }
        }
        
        function toggleColorPalette() {
            const palette = document.getElementById('colorPalette');
            const button = event.target;
            
            if (palette.classList.contains('active')) {
                palette.classList.remove('active');
                button.classList.remove('active');
            } else {
                palette.classList.add('active');
                button.classList.add('active');
            }
        }
        
        function toggleResponsive() {
            const button = event.target;
            const body = document.body;
            
            if (button.classList.contains('active')) {
                body.style.transform = 'scale(0.5)';
                body.style.transformOrigin = 'top left';
                button.classList.remove('active');
            } else {
                body.style.transform = 'scale(1)';
                button.classList.add('active');
            }
        }
        
        function checkAccessibility() {
            // 접근성 검사 로직
            const issues = [];
            
            // 이미지 alt 속성 검사
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                if (!img.alt) {
                    issues.push('이미지에 alt 속성이 없습니다: ' + img.src);
                }
            });
            
            // 버튼 aria-label 검사
            const buttons = document.querySelectorAll('button');
            buttons.forEach(btn => {
                if (!btn.getAttribute('aria-label') && !btn.textContent.trim()) {
                    issues.push('버튼에 접근성 라벨이 없습니다');
                }
            });
            
            if (issues.length > 0) {
                alert('접근성 문제 발견:\n' + issues.join('\n'));
            } else {
                alert('접근성 검사 완료 - 문제 없음');
            }
        }
        
        // 화면 크기 표시
        function updateScreenSize() {
            const width = window.innerWidth;
            const height = window.innerHeight;
            document.getElementById('screenSize').textContent = width + 'x' + height;
            
            let breakpoint = 'Mobile';
            if (width >= 1024) breakpoint = 'Desktop';
            else if (width >= 768) breakpoint = 'Tablet';
            
            document.getElementById('breakpoint').textContent = breakpoint;
        }
        
        window.addEventListener('resize', updateScreenSize);
        updateScreenSize();
    </script>
</body>
</html>
