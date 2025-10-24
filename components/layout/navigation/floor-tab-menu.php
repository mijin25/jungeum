<?php
// components/layout/navigation/floor-tab-menu.php
// 층별 안내용 탭 메뉴 컴포넌트 (피그마 디자인 기반)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$floors = $data['floors'] ?? [];
$active_floor = $data['active_floor'] ?? 0; // 0부터 시작하는 인덱스
$hide_if_empty = $data['hide_if_empty'] ?? false;

if (empty($floors)) {
    return; // 층이 없으면 아무것도 렌더링하지 않음
}

// 과거 데이터가 없을 때 탭 UI 숨김 로직
if ($hide_if_empty && isset($data['has_past_items']) && !$data['has_past_items']) {
    return; // 과거 데이터가 없으면 탭 UI 숨김
}
?>

<nav class="floor-tab-menu" role="tablist" aria-label="층별 안내">
    <div class="floor-tab-menu__container">
        <?php foreach ($floors as $index => $floor): ?>
            <button
                type="button"
                role="tab"
                class="floor-tab-menu__item heading-h2 <?php echo $index === $active_floor ? 'floor-tab-menu__item--active' : ''; ?>"
                aria-selected="<?php echo $index === $active_floor ? 'true' : 'false'; ?>"
                aria-controls="floor-panel-<?php echo $index; ?>"
                id="floor-tab-<?php echo $index; ?>"
                data-floor-index="<?php echo $index; ?>"
                <?php if (isset($floor['url'])): ?>
                    data-url="<?php echo htmlspecialchars($floor['url']); ?>"
                <?php endif; ?>
            >
                <?php echo htmlspecialchars($floor['label']); ?>
            </button>
        <?php endforeach; ?>
    </div>
</nav>

<script>
/**
 * 층별 안내 탭 메뉴 JavaScript (jungeum-project-rules.mdc 준수)
 * 피그마 디자인 기반 층별 안내 탭 메뉴 인터랙션
 */

class FloorTabMenu {
    constructor(container) {
        this.container = container;
        this.tabs = container.querySelectorAll('.floor-tab-menu__item');
        this.activeTab = container.querySelector('.floor-tab-menu__item--active');
        this.activeIndex = this.activeTab ? parseInt(this.activeTab.dataset.floorIndex) : 0;
        
        this.init();
    }
    
    init() {
        this.bindEvents();
        this.setupKeyboardNavigation();
    }
    
    bindEvents() {
        this.tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                this.switchTab(index);
                
                // URL이 #로 시작하는 경우 (테스트용) - 페이지 이동하지 않음
                if (tab.dataset.url && tab.dataset.url.startsWith('#')) {
                    // URL 업데이트만 하고 페이지 이동은 하지 않음
                    window.history.pushState(null, null, tab.dataset.url);
                }
                // 실제 URL인 경우에만 페이지 이동
                else if (tab.dataset.url && !tab.dataset.url.startsWith('#')) {
                    window.location.href = tab.dataset.url;
                }
            });
        });
    }
    
    setupKeyboardNavigation() {
        this.container.addEventListener('keydown', (e) => {
            switch(e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    this.navigateTab(-1);
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    this.navigateTab(1);
                    break;
                case 'Home':
                    e.preventDefault();
                    this.switchTab(0);
                    break;
                case 'End':
                    e.preventDefault();
                    this.switchTab(this.tabs.length - 1);
                    break;
            }
        });
    }
    
    switchTab(index) {
        if (index < 0 || index >= this.tabs.length) return;
        
        // 이전 활성 탭 비활성화
        this.tabs[this.activeIndex].classList.remove('floor-tab-menu__item--active');
        this.tabs[this.activeIndex].setAttribute('aria-selected', 'false');
        
        // 새 활성 탭 활성화
        this.tabs[index].classList.add('floor-tab-menu__item--active');
        this.tabs[index].setAttribute('aria-selected', 'true');
        this.tabs[index].focus();
        
        this.activeIndex = index;
        
        // 커스텀 이벤트 발생
        this.container.dispatchEvent(new CustomEvent('floorTabChanged', {
            detail: {
                activeIndex: index,
                activeTab: this.tabs[index]
            }
        }));
    }
    
    navigateTab(direction) {
        let newIndex = this.activeIndex + direction;
        
        // 순환 네비게이션
        if (newIndex < 0) {
            newIndex = this.tabs.length - 1;
        } else if (newIndex >= this.tabs.length) {
            newIndex = 0;
        }
        
        this.switchTab(newIndex);
    }
}

// DOM 로드 완료 후 층별 안내 탭 메뉴 초기화
document.addEventListener('DOMContentLoaded', function() {
    const floorTabMenus = document.querySelectorAll('.floor-tab-menu');
    
    floorTabMenus.forEach(menu => {
        new FloorTabMenu(menu);
    });
});

// 전역 접근을 위한 export (필요시)
window.FloorTabMenu = FloorTabMenu;
</script>
