/**
 * 정음 웹사이트 메인 JavaScript
 * Vanilla JS (ES6+)를 사용한 동적 콘텐츠 로딩 및 인터랙션
 */

// DOM이 로드된 후 실행
document.addEventListener('DOMContentLoaded', function() {
    console.log('정음 웹사이트가 로드되었습니다.');
    
    // 초기화 함수들 실행
    initMobileMenu();
    initScrollEffects();
    initDataLoading();
    initHeroSlider();
});

/**
 * 모바일 메뉴 초기화
 */
function initMobileMenu() {
    // 새로운 navbar 모바일 메뉴
    const navbarToggle = document.querySelector('.navbar-toggle');
    const navbarMobileMenu = document.querySelector('.navbar-mobile-menu');
    
    if (navbarToggle && navbarMobileMenu) {
        navbarToggle.addEventListener('click', function() {
            navbarMobileMenu.classList.toggle('active');
            this.classList.toggle('active');
        });
        
        // 모바일 서브메뉴 토글
        const mobileItems = document.querySelectorAll('.navbar-mobile-item');
        mobileItems.forEach(item => {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.navbar-mobile-submenu');
            
            if (link && submenu) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    item.classList.toggle('active');
                });
            }
        });
        
        // 메뉴 외부 클릭 시 닫기
        document.addEventListener('click', function(e) {
            if (!navbarToggle.contains(e.target) && !navbarMobileMenu.contains(e.target)) {
                navbarMobileMenu.classList.remove('active');
                navbarToggle.classList.remove('active');
            }
        });
    }
    
    // 기존 모바일 메뉴 (하위 호환성)
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    if (mobileToggle && navigation) {
        mobileToggle.addEventListener('click', function() {
            navigation.classList.toggle('active');
            this.classList.toggle('active');
        });
        
        // 메뉴 링크 클릭 시 모바일 메뉴 닫기
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navigation.classList.remove('active');
                mobileToggle.classList.remove('active');
            });
        });
    }
}

/**
 * 스크롤 효과 초기화
 */
function initScrollEffects() {
    // Navbar 스크롤 효과
    const navbar = document.querySelector('.navbar');
    
    if (navbar) {
        function updateNavbar() {
            const scrollY = window.scrollY || window.pageYOffset;
            if (scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
        
        window.addEventListener('scroll', updateNavbar);
        updateNavbar(); // 초기 실행
    }
    
    // 서브메뉴 드롭다운 처리
    initSubmenuDropdown();
    
    // 기존 헤더 스크롤 효과 (하위 호환성)
    const header = document.querySelector('.site-header');
    let lastScrollY = window.scrollY;
    
    if (header && !navbar) {
        window.addEventListener('scroll', function() {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 100) {
                header.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = 'none';
            }
            
            lastScrollY = currentScrollY;
        });
    }
    
    // 스크롤 애니메이션
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // 애니메이션 대상 요소들 관찰
    const animatedElements = document.querySelectorAll('.hero-content, .section-title, .card');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

/**
 * JSON 데이터 로딩 초기화
 */
function initDataLoading() {
    // DOM 요소 존재 여부 확인 후 로딩
    const hasExhibitions = document.querySelector('.exhibitions-container');
    const hasEvents = document.querySelector('#events-container');
    const hasPress = document.querySelector('#press-container');
    
    const loadPromises = [];
    
    if (hasExhibitions) {
        loadPromises.push(loadExhibitions());
    }
    if (hasEvents) {
        loadPromises.push(loadEvents());
    }
    if (hasPress) {
        loadPromises.push(loadPress());
    }
    
    if (loadPromises.length > 0) {
        Promise.all(loadPromises).then(() => {
            console.log('데이터 로딩 완료');
        }).catch(error => {
            console.error('데이터 로딩 오류:', error);
        });
    } else {
        console.log('로딩할 데이터 컨테이너가 없습니다.');
    }
}

/**
 * 전시 데이터 로딩
 */
async function loadExhibitions() {
    try {
        const response = await fetch('../data/exhibitions.json');
        if (!response.ok) throw new Error('전시 데이터를 불러올 수 없습니다.');
        
        const data = await response.json();
        console.log('전시 데이터 로드됨:', data);
        
        // 전시 데이터를 DOM에 렌더링
        renderExhibitions(data);
    } catch (error) {
        console.error('전시 데이터 로딩 오류:', error);
    }
}

/**
 * 이벤트 데이터 로딩
 */
async function loadEvents() {
    try {
        const response = await fetch('../data/events.json');
        if (!response.ok) throw new Error('이벤트 데이터를 불러올 수 없습니다.');
        
        const data = await response.json();
        console.log('이벤트 데이터 로드됨:', data);
        
        // 이벤트 데이터를 DOM에 렌더링
        renderEvents(data);
    } catch (error) {
        console.error('이벤트 데이터 로딩 오류:', error);
    }
}

/**
 * 보도 데이터 로딩
 */
async function loadPress() {
    try {
        const response = await fetch('../data/press.json');
        if (!response.ok) throw new Error('보도 데이터를 불러올 수 없습니다.');
        
        const data = await response.json();
        console.log('보도 데이터 로드됨:', data);
        
        // 보도 데이터를 DOM에 렌더링
        renderPress(data);
    } catch (error) {
        console.error('보도 데이터 로딩 오류:', error);
    }
}

/**
 * 전시 데이터 렌더링
 */
function renderExhibitions(data) {
    const container = document.querySelector('.exhibitions-container');
    if (!container) {
        console.log('전시 컨테이너를 찾을 수 없습니다. 스킵합니다.');
        return;
    }
    
    const exhibitionsHTML = data.exhibitions.map(exhibition => `
        <div class="exhibition-card">
            <div class="exhibition-image">
                <img src="${exhibition.image}" alt="${exhibition.title}" loading="lazy">
            </div>
            <div class="exhibition-content">
                <h3 class="exhibition-title">${exhibition.title}</h3>
                <p class="exhibition-description">${exhibition.description}</p>
                <div class="exhibition-meta">
                    <span class="exhibition-date">${exhibition.date}</span>
                    <span class="exhibition-location">${exhibition.location}</span>
                </div>
            </div>
        </div>
    `).join('');
    
    container.innerHTML = exhibitionsHTML;
}

/**
 * 이벤트 데이터 렌더링
 */
function renderEvents(data) {
    const container = document.querySelector('#events-container');
    if (!container) {
        console.log('이벤트 컨테이너를 찾을 수 없습니다. 스킵합니다.');
        return;
    }
    
    const eventsHTML = data.events.map(event => `
        <div class="event-card">
            <div class="event-image">
                <img src="${event.image}" alt="${event.title}" loading="lazy">
            </div>
            <div class="event-content">
                <h3 class="event-title">${event.title}</h3>
                <p class="event-description">${event.description}</p>
                <div class="event-meta">
                    <span class="event-date">${event.date}</span>
                    <span class="event-time">${event.time}</span>
                </div>
            </div>
        </div>
    `).join('');
    
    container.innerHTML = eventsHTML;
}

/**
 * 보도 데이터 렌더링
 */
function renderPress(data) {
    const container = document.querySelector('#press-container');
    if (!container) {
        console.log('보도 컨테이너를 찾을 수 없습니다. 스킵합니다.');
        return;
    }
    
    const pressHTML = data.press.map(item => `
        <div class="press-card">
            <div class="press-image">
                <img src="${item.image}" alt="${item.title}" loading="lazy">
            </div>
            <div class="press-content">
                <h3 class="press-title">${item.title}</h3>
                <p class="press-description">${item.description}</p>
                <div class="press-meta">
                    <span class="press-source">${item.source}</span>
                    <span class="press-date">${item.date}</span>
                </div>
            </div>
        </div>
    `).join('');
    
    container.innerHTML = pressHTML;
}

/**
 * 유틸리티 함수들
 */

// 디바운스 함수
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// 스크롤 최상단으로 이동
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// 부드러운 스크롤
function smoothScrollTo(target) {
    const element = document.querySelector(target);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

/**
 * 히어로 슬라이더 초기화
 */
function initHeroSlider() {
    const slider = document.querySelector('.hero-slider');
    if (!slider) return;
    
    const slides = slider.querySelectorAll('.hero-slide');
    const prevBtnWrapper = slider.querySelector('.hero-slider__btn-wrapper--prev');
    const nextBtnWrapper = slider.querySelector('.hero-slider__btn-wrapper--next');
    const prevBtn = prevBtnWrapper ? prevBtnWrapper.querySelector('.btn') : null;
    const nextBtn = nextBtnWrapper ? nextBtnWrapper.querySelector('.btn') : null;
    const indicatorCurrent = slider.querySelector('.page-indicator__current');
    
    let currentSlide = 0;
    const totalSlides = slides.length;
    
    // 슬라이드 변경 함수
    function goToSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('hero-slide--active', i === index);
        });
        
        // 인디케이터 업데이트
        if (indicatorCurrent) {
            indicatorCurrent.textContent = String(index + 1).padStart(2, '0');
        }
        
        currentSlide = index;
    }
    
    // 다음 슬라이드
    function nextSlide() {
        const next = (currentSlide + 1) % totalSlides;
        goToSlide(next);
    }
    
    // 이전 슬라이드
    function prevSlide() {
        const prev = (currentSlide - 1 + totalSlides) % totalSlides;
        goToSlide(prev);
    }
    
    // 버튼 이벤트
    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }
    
    // 자동 슬라이드 (5초마다)
    let autoSlideInterval = setInterval(nextSlide, 5000);
    
    // 마우스 호버 시 자동 슬라이드 일시 정지
    slider.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    
    // 마우스가 벗어나면 자동 슬라이드 재개
    slider.addEventListener('mouseleave', () => {
        autoSlideInterval = setInterval(nextSlide, 5000);
    });
    
    // 초기 슬라이드 설정
    goToSlide(0);
}

/**
 * 서브메뉴 드롭다운 초기화
 */
function initSubmenuDropdown() {
    const menuItems = document.querySelectorAll('.navbar-menu-item.has-submenu');
    const submenuGroups = document.querySelectorAll('.navbar-submenu-group');
    
    function updateSubmenuPosition() {
        const navbarContainer = document.querySelector('.navbar-container');
        if (!navbarContainer) return;
        
        // navbar-container의 높이 계산
        const containerHeight = navbarContainer.offsetHeight;
        
        menuItems.forEach(item => {
            const submenuId = item.getAttribute('data-submenu');
            const submenuGroup = document.querySelector(`[data-parent="${submenuId}"]`);
            
            if (submenuGroup) {
                // 메뉴 항목의 화면상 위치 계산
                const rect = item.getBoundingClientRect();
                const navbarRect = navbarContainer.getBoundingClientRect();
                const leftPosition = rect.left - navbarRect.left;
                
                // 서브메뉴 그룹의 top 위치를 navbar-container 높이 아래로 설정
                submenuGroup.style.top = containerHeight + 'px';
                
                // 서브메뉴 항목들의 시작 위치를 메뉴 항목 위치에 맞춤
                const submenuItems = submenuGroup.querySelector('.navbar-submenu-items');
                if (submenuItems) {
                    submenuItems.style.paddingLeft = leftPosition + 'px';
                }
            }
        });
    }
    
    menuItems.forEach(item => {
        const submenuId = item.getAttribute('data-submenu');
        const submenuGroup = document.querySelector(`[data-parent="${submenuId}"]`);
        
        if (submenuGroup) {
            item.addEventListener('mouseenter', function() {
                // 위치 업데이트
                updateSubmenuPosition();
                
                // 다른 모든 서브메뉴 숨기기
                submenuGroups.forEach(group => {
                    group.classList.remove('active');
                });
                
                // 현재 서브메뉴 표시
                submenuGroup.classList.add('active');
            });
            
            item.addEventListener('mouseleave', function() {
                submenuGroup.classList.remove('active');
            });
            
            // 서브메뉴 그룹에도 호버 처리
            submenuGroup.addEventListener('mouseenter', function() {
                this.classList.add('active');
            });
            
            submenuGroup.addEventListener('mouseleave', function() {
                this.classList.remove('active');
            });
        }
    });
    
    // 윈도우 리사이즈 시 위치 재계산
    window.addEventListener('resize', updateSubmenuPosition);
}

// 전역 함수로 등록
window.scrollToTop = scrollToTop;
window.smoothScrollTo = smoothScrollTo;
