<?php
// components/layout/navigation/scroll-indicator.php
// 스크롤 인디케이터 컴포넌트 (피그마 디자인 기반)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$current_position = $data['current_position'] ?? 0; // 현재 스크롤 위치 (0 ~ 100)
$is_visible = $data['is_visible'] ?? true; // 인디케이터 표시 여부

// 현재 위치 유효성 검사
$current_position = max(0, min(100, $current_position));
?>

<div class="scroll-indicator" aria-label="스크롤 인디케이터" <?php echo $is_visible ? '' : 'style="display: none;"'; ?>>
    <div class="scroll-indicator__track">
        <div class="scroll-indicator__thumb"></div>
    </div>
</div>

<script>
// 스크롤 인디케이터 업데이트 함수 (한 번만 실행)
if (!window.scrollIndicatorInitialized) {
    window.scrollIndicatorInitialized = true;
    
    (function() {
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (!scrollIndicator) return;
        
        const thumb = scrollIndicator.querySelector('.scroll-indicator__thumb');
        if (!thumb) return;
        
        function updateScrollIndicator() {
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // 스크롤 가능한 높이 계산
            const scrollableHeight = documentHeight - windowHeight;
            
            // 인디케이터 항상 표시 (테스트용)
            scrollIndicator.style.display = 'block';
            
            if (scrollableHeight <= 0) {
                // 스크롤이 필요없으면 썸만 숨김
                thumb.style.width = '0%';
                return;
            }
            
            // 현재 스크롤 위치를 퍼센트로 계산
            const scrollPercentage = (scrollTop / scrollableHeight) * 100;
            
            // 썸 위치 업데이트
            thumb.style.width = scrollPercentage + '%';
        }
        
        // 스크롤 이벤트 리스너
        window.addEventListener('scroll', updateScrollIndicator);
        
        // 초기 로드 시 업데이트
        updateScrollIndicator();
        
        // 리사이즈 이벤트 리스너
        window.addEventListener('resize', updateScrollIndicator);
    })();
}
</script>