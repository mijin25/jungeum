<?php
// 헤더 컴포넌트
// 네비게이션과 로고를 포함한 사이트 헤더
?>
<header class="site-header">
    <div class="container">
        <div class="header-content">
            <!-- 로고 -->
            <div class="logo">
                <a href="index.php" class="logo-link">
                    <img src="assets/images/common/logo-jungeum.svg" alt="정음" class="logo-image">
                </a>
            </div>
            
            <!-- 네비게이션 -->
            <nav class="main-navigation">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">홈</a>
                    </li>
                    <li class="nav-item">
                        <a href="story.php" class="nav-link">스토리</a>
                    </li>
                    <li class="nav-item">
                        <a href="space.php" class="nav-link">공간</a>
                    </li>
                    <li class="nav-item">
                        <a href="exhibitions.php" class="nav-link">전시</a>
                    </li>
                    <li class="nav-item">
                        <a href="events.php" class="nav-link">이벤트</a>
                    </li>
                    <li class="nav-item">
                        <a href="press.php" class="nav-link">보도</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">문의</a>
                    </li>
                </ul>
            </nav>
            
            <!-- 모바일 메뉴 버튼 -->
            <button class="mobile-menu-toggle" aria-label="메뉴 열기">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
</header>

<style>
/* 헤더 스타일 */
.site-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    z-index: 1000;
    transition: all 0.3s ease;
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
    min-height: 70px;
}

/* 로고 스타일 */
.logo {
    flex-shrink: 0;
}

.logo-link {
    display: block;
    text-decoration: none;
}

.logo-image {
    height: 40px;
    width: auto;
    transition: transform 0.3s ease;
}

.logo-link:hover .logo-image {
    transform: scale(1.05);
}

/* 네비게이션 스타일 */
.main-navigation {
    display: flex;
    align-items: center;
}

.nav-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 2rem;
}

.nav-item {
    position: relative;
}

.nav-link {
    display: block;
    padding: 0.5rem 0;
    color: #333;
    text-decoration: none;
    font-family: "JASOSansRegular", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-weight: 500;
    font-size: 1rem;
    transition: color 0.3s ease;
    position: relative;
}

.nav-link:hover {
    color: #666;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #333;
    transition: width 0.3s ease;
}

.nav-link:hover::after {
    width: 100%;
}

/* 모바일 메뉴 토글 */
.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    justify-content: space-around;
    width: 30px;
    height: 30px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}

.hamburger-line {
    width: 100%;
    height: 2px;
    background-color: #333;
    transition: all 0.3s ease;
}

/* 반응형 디자인 */
@media (max-width: 768px) {
    .main-navigation {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
    }
    
    .main-navigation.active {
        display: block;
    }
    
    .nav-list {
        flex-direction: column;
        gap: 0;
        padding: 0 2rem;
    }
    
    .nav-item {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    .nav-item:last-child {
        border-bottom: none;
    }
    
    .nav-link {
        padding: 1rem 0;
        font-size: 1.1rem;
    }
    
    .mobile-menu-toggle {
        display: flex;
    }
    
    .header-content {
        padding: 0.75rem 0;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }
    
    .logo-image {
        height: 35px;
    }
    
    .nav-list {
        padding: 0 1rem;
    }
}
</style>

<script>
// 모바일 메뉴 토글 기능
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>
