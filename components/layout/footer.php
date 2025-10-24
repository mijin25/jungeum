<?php
// 푸터 컴포넌트
// 사이트 정보, 연락처, 소셜 미디어 링크를 포함한 사이트 푸터

// 컴포넌트 헬퍼 함수들 로드
require_once __DIR__ . '/../../lib/helpers.php';

// 현재 페이지가 pages 폴더 안에 있는지 확인
$is_pages_folder = strpos(__DIR__, DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR) !== false;
$base_path = $is_pages_folder ? '../' : '';
?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- 푸터 상단 영역 -->
            <div class="footer-top">
                <div class="footer-info">
                    <div class="footer-logo">
                        <img src="<?php echo $base_path; ?>assets/images/common/logo-jungeum.svg" alt="정음" class="footer-logo-image">
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
                    <div class="social-links">
                        <?php
                        require_once __DIR__ . '/../../lib/SVGCache.php';
                        ?>
                        <a href="#" class="social-link" aria-label="페이스북">
                            <?php echo SVGCache::get('common/icon-social-facebook.svg', ['width' => '20', 'height' => '20']); ?>
                        </a>
                        <a href="#" class="social-link" aria-label="인스타그램">
                            <?php echo SVGCache::get('common/icon-social-instagram.svg', ['width' => '20', 'height' => '20']); ?>
                        </a>
                        <a href="#" class="social-link" aria-label="유튜브">
                            <?php echo SVGCache::get('common/icon-social-youtube.svg', ['width' => '20', 'height' => '20']); ?>
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
    background-color: var(--color-jungeum-warm-white); /* warm-white */
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
    color: var(--text-secondary);
    line-height: var(--line-height-loose);
    font-size: var(--font-size-base);
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
    font-family: var(--font-family-bold);
    font-weight: var(--font-weight-bold);
    font-size: var(--font-size-lg);
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
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
    color: var(--text-secondary);
    text-decoration: none;
    font-size: var(--font-size-sm);
    transition: color 0.3s ease;
}

.footer-link:hover {
    color: var(--text-primary);
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: var(--spacing-sm);
    font-size: var(--font-size-sm);
    color: var(--text-secondary);
    margin-bottom: var(--spacing-sm);
}

.contact-label {
    font-weight: var(--font-weight-bold);
    color: var(--text-primary);
    min-width: 50px;
}

.contact-value {
    color: var(--text-secondary);
}

.footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 2rem;
    border-top: 1px solid #e0e0e0;
}

.footer-copyright {
    color: var(--text-tertiary);
    font-size: var(--font-size-sm);
}

.footer-social {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.social-title {
    font-family: var(--font-family-bold);
    font-weight: var(--font-weight-bold);
    font-size: var(--font-size-base);
    color: var(--text-primary);
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
    background-color: var(--color-white);
    border: 1px solid var(--border-light);
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background-color: var(--text-primary);
    border-color: var(--text-primary);
    transform: translateY(-2px);
}

.social-link svg {
    width: 20px;
    height: 20px;
    transition: filter 0.3s ease;
    fill: var(--text-primary);
}

.social-link:hover svg {
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
