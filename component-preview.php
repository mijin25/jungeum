<?php
// 서버 환경 설정 로드
require_once 'config/server.php';

// 컴포넌트 사용 예시 페이지
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정음 - 컴포넌트 미리보기</title>
    
    <!-- 웹폰트 로드 -->
    <link rel="stylesheet" href="css/webfonts.css">
    
    <!-- 메인 스타일시트 (모듈화된 CSS) -->
    <link rel="stylesheet" href="css/main.css">
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="assets/images/common/logo-jungeum.svg">
</head>
<body>
    <!-- 메인 콘텐츠 -->
    <main class="main-content">
        <div class="guide-layout">
            <!-- 왼쪽 네비게이션 -->
            <nav class="guide-nav">
                <!-- 디자인 시스템 메뉴 -->
                <h3 class="guide-nav__title">Design System</h3>
                <ul class="guide-nav__list">
                    <li class="guide-nav__item">
                        <a href="#typography" class="guide-nav__link guide-nav__link--active">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                                <path d="M14 20C14 15.5817 17.5817 12 22 12C17.5817 12 14 8.41828 14 4" stroke="currentColor" stroke-width="1.25"/>
                                <path d="M2 12L22 12" stroke="currentColor" stroke-width="1.25"/>
                            </svg>
                            Typography
                        </a>
                    </li>
                    <li class="guide-nav__item">
                        <a href="#colors" class="guide-nav__link">Colors</a>
                    </li>
                    <li class="guide-nav__item">
                        <a href="#responsive" class="guide-nav__link">Responsive</a>
                    </li>
                </ul>
                
                <!-- 컴포넌트 메뉴 -->
                <h3 class="guide-nav__title" style="margin-top: 32px;">Components</h3>
                <ul class="guide-nav__list">
                    <li class="guide-nav__item">
                        <a href="#buttons" class="guide-nav__link">Buttons</a>
                    </li>
                    <li class="guide-nav__item">
                        <a href="#cards" class="guide-nav__link">Cards</a>
                    </li>
                    <li class="guide-nav__item">
                        <a href="#inputs" class="guide-nav__link">Inputs</a>
                    </li>
                    <li class="guide-nav__item">
                        <a href="#navigation" class="guide-nav__link">Navigation</a>
                    </li>
                    <li class="guide-nav__item">
                        <a href="#ui" class="guide-nav__link">UI Elements</a>
                    </li>
                </ul>
            </nav>
            
            <!-- 오른쪽 콘텐츠 -->
            <div class="guide-content">
                <!-- 타이포그래피 섹션 (기본 활성) -->
                <section id="typography" class="section">
                    <div class="container">
                        <div class="section__header section__header--left">
                            <h2 class="section__title">Typography</h2>
                            <p class="section__description">Font styles and size system</p>
                        </div>
                        <div class="section__content">
                            <div class="typography-showcase">
                                <h1 class="heading-h1">Heading H1 (80px)</h1>
                                <h2 class="heading-h2">Heading H2 (64px)</h2>
                                <h3 class="heading-h3">Heading H3 (48px)</h3>
                                <h4 class="heading-h4">Heading H4 (32px)</h4>
                                <h5 class="heading-h5">Heading H5 (28px)</h5>
                                <h6 class="heading-h6">Heading H6 (24px)</h6>
                                
                                <div class="body-text-showcase" style="margin-top: 32px;">
                                    <p class="body-xl">Body XL (20px) - 큰 본문 텍스트</p>
                                    <p class="body-lg">Body LG (18px) - 큰 본문 텍스트</p>
                                    <p class="body-md">Body MD (16px) - 기본 본문 텍스트</p>
                                    <p class="body-sm">Body SM (14px) - 작은 본문 텍스트</p>
                                </div>
                                
                                <div class="display-showcase" style="margin-top: 32px;">
                                    <div class="display-1">Display 1 (100px)</div>
                                    <div class="display-2">Display 2 (320px)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- 컬러 섹션 -->
                <section id="colors" class="section" style="display: none;">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">Colors</h2>
                            <p class="section__description">Brand colors and gray scale</p>
                        </div>
                        <div class="section__content">
                            <div class="color-group" style="margin-bottom: 32px;">
                                <h4 class="heading-h5" style="margin-bottom: 16px;">Brand Colors</h4>
                                <div class="color-row" style="display: flex; gap: 16px; flex-wrap: wrap;">
                                    <div class="color-item" style="background: var(--color-jungeum-warm-white); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-primary); font-weight: 500;">Warm White</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-jungeum-yellow); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-primary); font-weight: 500;">Yellow</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-jungeum-orange); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-inverse); font-weight: 500;">Orange</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-jungeum-blue); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-inverse); font-weight: 500;">Blue</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-jungeum-brick); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-inverse); font-weight: 500;">Brick</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="color-group">
                                <h4 class="heading-h5" style="margin-bottom: 16px;">Warm Gray Colors</h4>
                                <div class="color-row" style="display: flex; gap: 16px; flex-wrap: wrap;">
                                    <div class="color-item" style="background: var(--color-warm-grey-10); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-primary); font-weight: 500;">Grey 10</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-warm-grey-20); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-primary); font-weight: 500;">Grey 20</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-warm-grey-40); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-inverse); font-weight: 500;">Grey 40</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-warm-grey-60); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-inverse); font-weight: 500;">Grey 60</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-warm-grey-70); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-inverse); font-weight: 500;">Grey 70</span>
                                    </div>
                                    <div class="color-item" style="background: var(--color-warm-grey-100); padding: 16px; border-radius: 0; min-width: 140px; text-align: center; border: 1px solid var(--border-light);">
                                        <span style="color: var(--text-inverse); font-weight: 500;">Grey 100</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- 반응형 검증 섹션 -->
                <section id="responsive" class="section" style="display: none;">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">Responsive</h2>
                            <p class="section__description">Layout system for different screen sizes</p>
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
                    </div>
                </section>
        
        <!-- 버튼 컴포넌트 섹션 -->
                <section id="buttons" class="section" style="display: none;">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title">버튼 컴포넌트</h2>
                    <p class="section__description">다양한 스타일의 버튼들</p>
                </div>
                
                <div class="section__content">
                    <div class="guide-guide-component-group">
                        <!-- btn-basic 카테고리 -->
                        <div class="guide-component-group">
                            <h4 class="heading-h5">btn-basic (기본 버튼들)</h4>
                            <div class="guide-component-subgroup">
                                <h5 class="heading-h6">Primary Buttons</h5>
                                <!-- HTML로 직접 작성된 버튼들 -->
                                <button class="btn btn--primary btn--large">제출하기</button>
                                
                                <button class="btn btn--primary btn--medium">파일 올리기</button>
                            </div>
                            
                            <div class="guide-component-subgroup">
                                <h5 class="heading-h6">Secondary Buttons</h5>
                                <!-- HTML로 직접 작성된 버튼들 -->
                                <button class="btn btn--secondary btn--large">굿즈 구매하기</button>
                                
                                <button class="btn btn--secondary btn--medium">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 6px;"><path d="M8 1V15M1 8H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    파일 올리기
                                </button>
                            </div>
                        </div>
                        
                        <!-- btn-text 카테고리 -->
                        <div class="guide-component-group">
                            <h4 class="heading-h5">btn-text (텍스트 버튼들)</h4>
                            <!-- HTML로 직접 작성된 텍스트 버튼들 -->
                            <button class="btn btn--text btn--xl">
                                전시 둘러보기
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 16px;" stroke="currentColor" stroke-width="1.25">
                                    <path d="M22 14C17.5817 14 14 10.4183 14 6"/>
                                    <path d="M2 14H22"/>
                                </svg>
                            </button>
                            
                            <button class="btn btn--text btn--medium">
                                모두 보기
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 6px;" stroke="currentColor" stroke-width="1.25">
                                    <path d="M22 14C17.5817 14 14 10.4183 14 6"/>
                                    <path d="M2 14H22"/>
                                </svg>
                            </button>
                            
                            <button class="btn btn--text btn--medium">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 6px;" stroke="currentColor" stroke-width="1.25">
                                    <path d="M2 14C6.41828 14 10 10.4183 10 6"/>
                                    <path d="M22 14H2"/>
                                </svg>
                                목록으로
                            </button>
                            
                            <button class="btn btn--text btn--medium">info@jungeum.com</button>
                            
                            <button class="btn btn--text btn--small">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 6px;">
                                    <g clip-path="url(#clip0_1043_10666)">
                                        <rect width="24" height="24" fill="white" fill-opacity="0.01"/>
                                        <path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85383C4.07979 4.06253 2.66989 5.78049 1.83733 7.79048C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3165 7.72022 22.3642 9.85401 22.7886C11.9878 23.2131 14.1995 22.9952 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C23 9.08262 21.8411 6.28472 19.7782 4.22182C17.7153 2.15892 14.9174 1 12 1ZM21.4286 11.2143H16.7143C16.6226 8.32057 15.8729 5.48576 14.5221 2.925C16.3832 3.43406 18.0432 4.50181 19.2782 5.98412C20.5133 7.46643 21.2638 9.29195 21.4286 11.2143ZM12 21.4286C11.8247 21.4403 11.6489 21.4403 11.4736 21.4286C9.8458 18.8327 8.9424 15.8485 8.85715 12.7857H15.1429C15.0647 15.8463 14.1695 18.8304 12.55 21.4286C12.3669 21.4414 12.1831 21.4414 12 21.4286ZM8.85715 11.2143C8.93531 8.15367 9.83052 5.16965 11.45 2.57143C11.7999 2.53212 12.153 2.53212 12.5029 2.57143C14.1389 5.16491 15.0505 8.14926 15.1429 11.2143H8.85715ZM9.45429 2.925C8.11174 5.48772 7.37015 8.32242 7.28572 11.2143H2.57143C2.7362 9.29195 3.48674 7.46643 4.72177 5.98412C5.95679 4.50181 7.61684 3.43406 9.47786 2.925H9.45429ZM2.61072 12.7857H7.325C7.407 15.677 8.1459 18.5116 9.48572 21.075C7.63054 20.5605 5.97733 19.4904 4.7483 18.0085C3.51926 16.5266 2.77332 14.704 2.61072 12.7857ZM14.5221 21.075C15.8729 18.5142 16.6226 15.6794 16.7143 12.7857H21.4286C21.2638 14.7081 20.5133 16.5336 19.2782 18.0159C18.0432 19.4982 16.3832 20.5659 14.5221 21.075Z" fill="currentColor"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1043_10666">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                allleft.co.kr
                            </button>
                        </div>
                        
                        <!-- btn-control 카테고리 -->
                        <div class="guide-component-group">
                            <h4 class="heading-h5">btn-control (컨트롤 버튼들)</h4>
                            <div class="guide-control-group">
                                <button class="btn-control btn-control--left btn-control--large" aria-label="이전">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25">
                                        <path d="M10 20C10 15.5817 6.41828 12 2 12C6.41828 12 10 8.41828 10 4"/>
                                        <path d="M22 12L2 12"/>
                                    </svg>
                                </button>
                                <button class="btn-control btn-control--right btn-control--large" aria-label="다음">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25">
                                        <path d="M14 20C14 15.5817 17.5817 12 22 12C17.5817 12 14 8.41828 14 4"/>
                                        <path d="M2 12L22 12"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="guide-control-group">
                                <button class="btn-control btn-control--left btn-control--medium" aria-label="이전">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25">
                                        <path d="M10 20C10 15.5817 6.41828 12 2 12C6.41828 12 10 8.41828 10 4"/>
                                        <path d="M22 12L2 12"/>
                                    </svg>
                                </button>
                                <button class="btn-control btn-control--right btn-control--medium" aria-label="다음">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.25">
                                        <path d="M14 20C14 15.5817 17.5817 12 22 12C17.5817 12 14 8.41828 14 4"/>
                                        <path d="M2 12L22 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
                <!-- 다른 컴포넌트 섹션들 (추후 추가) -->
                <section id="cards" class="section" style="display: none;">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">카드 컴포넌트</h2>
                            <p class="section__description">다양한 스타일의 카드들</p>
                        </div>
                        <div class="section__content">
                            <p>카드 컴포넌트는 추후 추가 예정입니다.</p>
                        </div>
                    </div>
                </section>
                
                <section id="inputs" class="section" style="display: none;">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">입력 컴포넌트</h2>
                            <p class="section__description">다양한 스타일의 입력 필드들</p>
                        </div>
                        <div class="section__content">
                            <p>입력 컴포넌트는 추후 추가 예정입니다.</p>
                        </div>
                    </div>
                </section>
                
                <section id="navigation" class="section" style="display: none;">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">네비게이션 컴포넌트</h2>
                            <p class="section__description">다양한 스타일의 네비게이션들</p>
                        </div>
                        <div class="section__content">
                            <p>네비게이션 컴포넌트는 추후 추가 예정입니다.</p>
                        </div>
                    </div>
                </section>
                
                <section id="ui" class="section" style="display: none;">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">UI 요소</h2>
                            <p class="section__description">다양한 UI 요소들</p>
                        </div>
                        <div class="section__content">
                            <p>UI 요소는 추후 추가 예정입니다.</p>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    </main>
    
    <!-- JavaScript -->
    <script src="js/main.js"></script>
    <script>
        // 컴포넌트 프리뷰 네비게이션
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.guide-nav__link');
            const sections = document.querySelectorAll('.guide-content section[id]');
            
            // 네비게이션 클릭 이벤트
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);
                    
                    if (targetSection) {
                        // 모든 섹션 숨기기
                        sections.forEach(section => {
                            section.style.display = 'none';
                        });
                        
                        // 타겟 섹션 보이기
                        targetSection.style.display = 'block';
                        
                        // 활성 링크 업데이트
                        navLinks.forEach(navLink => {
                            navLink.classList.remove('guide-nav__link--active');
                            // 기존 아이콘 제거
                            const existingIcon = navLink.querySelector('svg');
                            if (existingIcon) {
                                existingIcon.remove();
                            }
                        });
                        this.classList.add('guide-nav__link--active');
                        
                        // 활성 메뉴에 아이콘 추가
                        const iconSvg = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                            <path d="M14 20C14 15.5817 17.5817 12 22 12C17.5817 12 14 8.41828 14 4" stroke="currentColor" stroke-width="1.25"/>
                            <path d="M2 12L22 12" stroke="currentColor" stroke-width="1.25"/>
                        </svg>`;
                        this.innerHTML = iconSvg + this.textContent;
                        
                        // 콘텐츠 영역을 맨 위로 스크롤 (LNB는 고정)
                        const previewContent = document.querySelector('.guide-content');
                        if (previewContent) {
                            previewContent.scrollTop = 0;
                        }
                    }
                });
            });
            
            // 화면 크기 표시 (디자인 시스템 섹션용)
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
            
            window.addEventListener('resize', updateScreenSize);
            updateScreenSize();
        });
    </script>
</body>
</html>
