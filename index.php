<?php
// 정음 웹사이트 메인 페이지

// 서버 환경 설정 로드
require_once 'config/server.php';
// PHP 8.4, UTF-8 인코딩
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정음 - Jungeum</title>
    <meta name="description" content="정음 웹사이트 - 문화와 예술의 공간">
    
    <!-- 웹폰트 로드 -->
    <link rel="stylesheet" href="css/webfonts.css">
    
            <!-- 메인 스타일시트 (모듈화된 CSS) -->
            <link rel="stylesheet" href="css/main.css">
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="assets/images/common/logo-jungeum.svg">
</head>
<body>
    <!-- 헤더 컴포넌트 -->
    <?php include 'components/header.php'; ?>
    
    <!-- 메인 콘텐츠 영역 -->
    <main class="main-content">
        <!-- 히어로 섹션 -->
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">정음</h1>
                <p class="hero-subtitle">문화와 예술의 공간</p>
                <div class="hero-actions">
                    <a href="exhibitions.php" class="btn btn-primary">전시 보기</a>
                    <a href="space.php" class="btn">공간 둘러보기</a>
                </div>
            </div>
        </section>
        
        <!-- 현재 전시 섹션 -->
        <section class="current-exhibition-section">
            <div class="container">
                <h2 class="section-title">현재 전시</h2>
                <div class="exhibition-highlight">
                    <div class="exhibition-image">
                        <img src="assets/images/exhibitions/exh-thumb-01.jpg" alt="한국 현대 미술의 흐름" loading="lazy">
                    </div>
                    <div class="exhibition-info">
                        <h3 class="exhibition-title">한국 현대 미술의 흐름</h3>
                        <p class="exhibition-description">한국 현대 미술의 다양한 흐름과 변화를 보여주는 전시</p>
                        <div class="exhibition-meta">
                            <span class="exhibition-date">2025.01.15 - 2025.03.15</span>
                            <span class="exhibition-location">정음 1층 전시실</span>
                        </div>
                        <a href="exhibitions.php" class="btn btn-primary">자세히 보기</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- 다가오는 이벤트 섹션 -->
        <section class="upcoming-events-section">
            <div class="container">
                <h2 class="section-title">다가오는 이벤트</h2>
                <div class="events-grid" id="events-container">
                    <!-- JavaScript로 동적 로딩 -->
                </div>
                <div class="section-actions">
                    <a href="events.php" class="btn">모든 이벤트 보기</a>
                </div>
            </div>
        </section>
        
        <!-- 공간 소개 섹션 -->
        <section class="space-intro-section">
            <div class="container">
                <h2 class="section-title">정음의 공간</h2>
                <div class="space-grid">
                    <div class="space-card">
                        <div class="space-image">
                            <img src="assets/images/space/space-1f2f-01.jpg" alt="1-2층 전시실" loading="lazy">
                        </div>
                        <div class="space-info">
                            <h3 class="space-title">1-2층 전시실</h3>
                            <p class="space-description">대형 전시를 위한 넓은 공간</p>
                        </div>
                    </div>
                    <div class="space-card">
                        <div class="space-image">
                            <img src="assets/images/space/space-3f-01.jpg" alt="3층 세미나실" loading="lazy">
                        </div>
                        <div class="space-info">
                            <h3 class="space-title">3층 세미나실</h3>
                            <p class="space-description">강연과 토크 세션을 위한 공간</p>
                        </div>
                    </div>
                    <div class="space-card">
                        <div class="space-image">
                            <img src="assets/images/space/space-ach-01.jpg" alt="아카이브 라운지" loading="lazy">
                        </div>
                        <div class="space-info">
                            <h3 class="space-title">아카이브 라운지</h3>
                            <p class="space-description">휴식과 독서를 위한 편안한 공간</p>
                        </div>
                    </div>
                </div>
                <div class="section-actions">
                    <a href="space.php" class="btn">공간 자세히 보기</a>
                </div>
            </div>
        </section>
        
        <!-- 보도 섹션 -->
        <section class="press-section">
            <div class="container">
                <h2 class="section-title">보도 자료</h2>
                <div class="press-grid" id="press-container">
                    <!-- JavaScript로 동적 로딩 -->
                </div>
                <div class="section-actions">
                    <a href="press.php" class="btn">모든 보도 보기</a>
                </div>
            </div>
        </section>
    </main>
    
    <!-- 푸터 컴포넌트 -->
    <?php include 'components/footer.php'; ?>
    
    <!-- JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>
