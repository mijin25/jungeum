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
});

/**
 * 모바일 메뉴 초기화
 */
function initMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    if (mobileToggle && navigation) {
        mobileToggle.addEventListener('click', function() {
            navigation.classList.toggle('active');
            this.classList.toggle('active');
            
            // 햄버거 메뉴 애니메이션
            const lines = this.querySelectorAll('.hamburger-line');
            lines.forEach((line, index) => {
                if (this.classList.contains('active')) {
                    if (index === 0) line.style.transform = 'rotate(45deg) translate(5px, 5px)';
                    if (index === 1) line.style.opacity = '0';
                    if (index === 2) line.style.transform = 'rotate(-45deg) translate(7px, -6px)';
                } else {
                    line.style.transform = 'none';
                    line.style.opacity = '1';
                }
            });
        });
        
        // 메뉴 링크 클릭 시 모바일 메뉴 닫기
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navigation.classList.remove('active');
                mobileToggle.classList.remove('active');
                
                // 햄버거 메뉴 원상태로
                const lines = mobileToggle.querySelectorAll('.hamburger-line');
                lines.forEach(line => {
                    line.style.transform = 'none';
                    line.style.opacity = '1';
                });
            });
        });
    }
}

/**
 * 스크롤 효과 초기화
 */
function initScrollEffects() {
    // 헤더 스크롤 효과
    const header = document.querySelector('.site-header');
    let lastScrollY = window.scrollY;
    
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
    // 병렬 로딩으로 성능 개선
    Promise.all([
        loadExhibitions(),
        loadEvents(),
        loadPress()
    ]).then(() => {
        console.log('모든 데이터 로딩 완료');
    }).catch(error => {
        console.error('데이터 로딩 오류:', error);
    });
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

// 전역 함수로 등록
window.scrollToTop = scrollToTop;
window.smoothScrollTo = smoothScrollTo;
