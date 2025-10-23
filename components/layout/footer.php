<?php
// 푸터 컴포넌트
// 사이트 정보, 연락처, 소셜 미디어 링크를 포함한 사이트 푸터
?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- 푸터 상단 영역 -->
            <div class="footer-top">
                <div class="footer-info">
                    <div class="footer-logo">
                        <img src="assets/images/common/logo-jungeum.svg" alt="정음" class="footer-logo-image">
                    </div>
                    <p class="footer-description">
                        문화와 예술의 공간, 정음에서 만나는 특별한 경험
                    </p>
                </div>
                
                <div class="footer-links">
                    <div class="footer-column">
                        <h4 class="footer-title">사이트</h4>
                        <ul class="footer-list">
                            <li><a href="story.php" class="footer-link">스토리</a></li>
                            <li><a href="space.php" class="footer-link">공간</a></li>
                            <li><a href="exhibitions.php" class="footer-link">전시</a></li>
                            <li><a href="events.php" class="footer-link">이벤트</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h4 class="footer-title">정보</h4>
                        <ul class="footer-list">
                            <li><a href="press.php" class="footer-link">보도</a></li>
                            <li><a href="contact.php" class="footer-link">문의</a></li>
                            <li><a href="privacy.php" class="footer-link">개인정보처리방침</a></li>
                            <li><a href="terms.php" class="footer-link">이용약관</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h4 class="footer-title">연락처</h4>
                        <div class="contact-info">
                            <p class="contact-item">
                                <span class="contact-label">주소:</span>
                                <span class="contact-value">서울특별시 강남구 테헤란로 123</span>
                            </p>
                            <p class="contact-item">
                                <span class="contact-label">전화:</span>
                                <span class="contact-value">02-1234-5678</span>
                            </p>
                            <p class="contact-item">
                                <span class="contact-label">이메일:</span>
                                <span class="contact-value">info@jungeum.com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- 푸터 하단 영역 -->
            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>&copy; 2025 정음. All rights reserved.</p>
                </div>
                
                <div class="footer-social">
                    <h4 class="social-title">소셜 미디어</h4>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="페이스북">
                            <img src="assets/images/common/icon-social-facebook.svg" alt="페이스북" class="social-icon">
                        </a>
                        <a href="#" class="social-link" aria-label="인스타그램">
                            <img src="assets/images/common/icon-social-instagram.svg" alt="인스타그램" class="social-icon">
                        </a>
                        <a href="#" class="social-link" aria-label="유튜브">
                            <img src="assets/images/common/icon-social-youtube.svg" alt="유튜브" class="social-icon">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* 푸터 스타일 */
.site-footer {
    background-color: #f8f8f8;
    border-top: 1px solid #e0e0e0;
    padding: 3rem 0 1rem;
    margin-top: 4rem;
}

.footer-content {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.footer-top {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 3rem;
    align-items: start;
}

.footer-info {
    max-width: 400px;
}

.footer-logo {
    margin-bottom: 1rem;
}

.footer-logo-image {
    height: 50px;
    width: auto;
}

.footer-description {
    color: #666;
    line-height: 1.6;
    font-size: 1rem;
}

.footer-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

.footer-column {
    display: flex;
    flex-direction: column;
}

.footer-title {
    font-family: "JASOSansBold", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 1rem;
    color: #333;
}

.footer-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer-list li {
    margin-bottom: 0.5rem;
}

.footer-link {
    color: #666;
    text-decoration: none;
    font-size: 0.95rem;
    transition: color 0.3s ease;
}

.footer-link:hover {
    color: #333;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 0.5rem;
}

.contact-label {
    font-weight: 600;
    color: #333;
    min-width: 50px;
}

.contact-value {
    color: #666;
}

.footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 2rem;
    border-top: 1px solid #e0e0e0;
}

.footer-copyright {
    color: #999;
    font-size: 0.9rem;
}

.footer-social {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.social-title {
    font-family: "JASOSansBold", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-weight: 700;
    font-size: 1rem;
    color: #333;
    margin: 0;
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background-color: #333;
    border-color: #333;
    transform: translateY(-2px);
}

.social-icon {
    width: 20px;
    height: 20px;
    transition: filter 0.3s ease;
}

.social-link:hover .social-icon {
    filter: brightness(0) invert(1);
}

/* 반응형 디자인 */
@media (max-width: 768px) {
    .footer-top {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .footer-links {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
    
    .footer-bottom {
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
    }
    
    .footer-social {
        flex-direction: column;
        gap: 1rem;
    }
    
    .social-links {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .site-footer {
        padding: 2rem 0 1rem;
    }
    
    .footer-links {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .contact-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
    
    .contact-label {
        min-width: auto;
    }
    
    .social-links {
        gap: 0.75rem;
    }
    
    .social-link {
        width: 35px;
        height: 35px;
    }
    
    .social-icon {
        width: 18px;
        height: 18px;
    }
}
</style>
