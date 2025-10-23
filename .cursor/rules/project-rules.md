// Project Rules for CURSOR AI - Final Version (V2.0)
// 이 파일은 모든 로컬 환경에서 **Git을 통해 동기화**되어야 합니다.
// =================================================================
// 1. 기술 스택 및 환경 (Tech Stack & Environment)
// =================================================================
// - 메인 언어: Pure PHP 8.4 (Server-side rendering and logic)
// - 프론트엔드: HTML5, CSS (Utility-first approach, Tailwind 방식), Vanilla JavaScript (ES6+ for dynamic content loading).
// - 서버 환경: Cafe24 New Autobahn (PHP 8.4, UTF-8 인코딩) 준수. MariaDB 사용 안 함.
// - 데이터 소스: 모든 동적 콘텐츠는 프로젝트 루트의 'data/' 폴더에 있는 JSON 파일에서 로드.

// =================================================================
// 2. 스타일 및 구조 (Style & Structure)
// =================================================================
// - **하드코딩 금지:** 웹사이트 구조는 재사용 가능한 컴포넌트 (헤더, 푸터, 카드 등) 기반으로 작성.
// - **CSS 관리:** 불필요한 CSS 파일 최소화. 유틸리티 클래스 중심 스타일링 지향.
// - **PHP Include:** 반복 섹션은 PHP의 `include` 또는 `require` 문을 사용하여 효율적으로 분리.
// - **명명 규칙:** 파일명 및 함수명은 kebab-case 또는 snake_case 사용.
// - **PHP 로직 파일 배치:** SVGCache.php와 같은 핵심 로직 파일은 **루트가 아닌 'lib/' 폴더**에 배치되어야 함.

// - **[중요] 데이터 중심 컴포넌트 원칙 (변수 충돌 방지):**
//   - **표준 접근:** 두 번 이상 반복되거나 다양한 상태를 가진 컴포넌트는 단일 변수 정의 방식($text = '...'; include '...';)을 금지합니다.
//   - **강제 원칙:** 항상 배열 데이터를 foreach 루프로 순회하며 컴포넌트 파일을 include하는 데이터 중심 접근 방식을 사용해야 합니다. (이는 프리뷰 페이지와 실제 페이지 모두에 적용되어야 합니다.)
//   - **컴포넌트 표준:** 모든 컴포넌트는 $data 배열을 통해 데이터를 받아야 하며, 전역 변수에 의존하지 않아야 합니다.

// - **웹 폰트 및 폰트 스택 (Web Fonts & Font Stack):**
//   - **폰트 스택 우선순위:** 1. "JASOSansBold" 또는 "JASOSansRegular" > 2. "Pretendard Variable" > 3. 시스템 및 범용 폰트
//   - **파일 통합:** 모든 @font-face 정의는 **단일 파일 ('css/webfonts.css')**로 관리.
//   - **파일 배치:** 모든 폰트 파일은 **'assets/fonts/'** 폴더 안에 통합.
//   - **경로 규칙:** `css/webfonts.css` 내부의 모든 `url()` 경로는 **'../assets/fonts/'** 사용.
//   - **성능 최적화:** 모든 @font-face 정의에 **`font-display: swap;`** 속성을 반드시 포함.
//   - **최종 폴백 스택:** -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;

// - **SVG 아이콘 관리 및 스타일링 규칙 (최종):**
//   - **컬러 제어:** 모든 인라인 SVG 내부 요소는 **`fill="currentColor"`** 속성을 사용.
//   - **원본 클리닝:** SVG 원본 파일 내부에는 **하드코딩된 색상 코드 (예: #000000)** 및 **width/height/style 속성** 사용 금지.
//   - **스트로크 아이콘:** <path> 요소에 **`fill="none"`**을 강제하여 면 채움을 방지해야 함.
//   - **로딩 로직:** SVG 파일 내용을 읽어와 인라인 삽입하는 **PHP 캐시 함수**를 구현하여 자동 업데이트 및 최적화 보장.

// =================================================================
// 3. 주요 기능 (Key Features)
// =================================================================
// - **JSON 로드 로직:** Vanilla JS (ES6+ Fetch API)를 사용하여 비동기적으로 데이터 로드 및 DOM 삽입 함수 구현.
// - **문의 메일 기능:** PHP 8.4를 사용하여 구현하며, XSS/CSRF 방지 등 보안을 고려한 운영자 이메일 발송 로직 포함.
// - **관리자 페이지:** 구현 범위에서 제외. 모든 콘텐츠 업데이트는 JSON 파일 수정을 통해서만 이루어짐.

// =================================================================
// 4. 개발 환경 및 코드 리뷰 (Development Environment & Code Review)
// =================================================================
// - **로컬 개발 환경:** XAMPP 사용 권장 (Apache + PHP, MySQL 불필요)
// - **DocumentRoot 설정:** 현재 프로젝트 폴더를 직접 사용 (복사하지 않음)
// - **접속 URL:** http://localhost/ (프로젝트 루트), http://localhost/pages/ (서브 페이지)
// - **코드 리뷰:** 컴포넌트 단위로 개발 후 페이지 구현
// - **테스트 환경:** 브라우저에서 직접 확인 (http://localhost/pages/component-preview.php)
// - **MySQL 사용 안 함:** JSON 파일 기반 데이터 관리

// - **[추가된 중요 규칙] 컴포넌트 프리뷰 강제 통합:**
//   - **원칙:** 컴포넌트 프리뷰 페이지(예: `pages/component-preview.php` 등)는 **절대로 컴포넌트 코드를 하드코딩해서는 안 됩니다.**
//   - **강제 INCLUDE:** 프리뷰 페이지는 반드시 **`components/` 폴더 내의 원본 PHP 컴포넌트 파일**을 `include`하거나 헬퍼 함수를 호출하여 렌더링해야 합니다.

// =================================================================
// 5. 산출물 참고 (Reference Materials)
// =================================================================
// - **[화면설계서 Figma]:** 오직 페이지 구조, 요소 배치, 기능 명세에만 사용. 스타일 정보는 완전히 무시.
// - **[최종 디자인 Figma]:** 오직 색상, 폰트, 간격 등 최종 스타일링 및 CSS 구현에만 사용.
// - **스타일링 지침:** 모든 HTML/CSS 구현은 최종 디자인 Figma 및 이전에 정의된 폰트/SVG 규칙을 따름.

// =================================================================
// 6. AI 페어 프로그래밍 컨텍스트 (AI Pair Programming Context)
// =================================================================
// 이 섹션은 Cursor AI가 프로젝트를 이해하고 올바른 코드를 생성하기 위한 컨텍스트입니다.

// ==========================================
// PROJECT CONTEXT / 프로젝트 개요
// ==========================================
// You are an expert PHP 8.4 + Vanilla JS pair programmer working on the real production project **"JUNG EUM WEBSITE"**, developed by **The Grap**.  
// Follow all rules defined in `/.cursor/rules/project-rules.md`.  
// If a user request conflicts with those rules, clearly explain the conflict and suggest a compliant alternative.

// (한글 설명:  
// 당신은 "정음 웹사이트(JUNG EUM WEBSITE)" 프로젝트의 시니어 PHP 8.4 + Vanilla JS 페어 프로그래머입니다.  
// `.cursor/rules/project-rules.md`의 모든 규칙을 절대적으로 준수해야 합니다.  
// 규칙과 충돌하는 요청이 들어오면, 이유를 설명하고 대안을 제시하세요.)

// ==========================================
// ENVIRONMENT / 개발 환경
// ==========================================
// - Language: Pure PHP 8.4 (Server-Side Rendering)
// - Frontend: HTML5, CSS (Utility-first, Tailwind-like), Vanilla JS (ES6+)
// - Hosting: Cafe24 New Autobahn, UTF-8 only
// - Database: ❌ Not used (No MySQL or MariaDB)
// - Data Source: All dynamic content loads from `/data/*.json`
// - Frameworks: None (No Laravel, No React/Vue)

// (한글 설명:  
// 순수 PHP 8.4와 Vanilla JS 기반의 SSR(서버사이드 렌더링) 프로젝트입니다.  
// DB는 사용하지 않고, 모든 동적 콘텐츠는 `/data/` 폴더의 JSON 파일로 관리됩니다.  
// 카페24 New Autobahn 환경을 기준으로 하며, UTF-8 인코딩을 반드시 사용합니다.)

// ==========================================
// PROJECT STRUCTURE / 폴더 구조
// ==========================================
// Root folders:
// - `/components/` → Reusable PHP components (데이터 중심 컴포넌트)
//     - `layout/` → header, footer, gnb-desktop, gnb-mobile
//     - `ui/` → tabs, popup-modal, carousel
//     - `cards/` → card-media-16x10.php, card-media-3x4.php, card-media-1x1.php
// - `/css/` → Utility-first styles (base, utilities, tokens)
// - `/lib/` → PHP helper logic (e.g. SVGCache.php, mail_handler.php)
// - `/pages/` → Assembled pages built with include() + foreach()
// - `/data/` → JSON data for exhibitions, events, press, space, etc.
// - `/assets/fonts/` → Webfonts (managed by css/webfonts.css)

// (한글 설명:  
// 위 구조는 이미 구성된 프로젝트 폴더 기준이며, 컴포넌트는 재사용 가능한 구조로 분리합니다.  
// pages 폴더의 모든 페이지는 반드시 include()를 통해 컴포넌트를 불러옵니다.)

// ==========================================
// CODING PRINCIPLES / 코딩 원칙
// ==========================================
// ✅ Every component receives a `$data` array as input.  
// ✅ Never use global variables.  
// ✅ Never hardcode repeated markup.  
// ✅ Always render repeated items using `foreach + include`.  
// ✅ Preview pages (e.g. `/pages/component-preview.php`) must include original component files directly.  
// ✅ Inline SVGs must use `fill="currentColor"`, no hardcoded color/style.  
// ✅ All @font-face rules are centralized in `/css/webfonts.css` using `../assets/fonts/` path and `font-display: swap;`.  
// ✅ Utility-first CSS only — minimize additional CSS files.

// (한글 설명:  
// 모든 컴포넌트는 `$data` 배열을 입력으로 받아야 합니다.  
// 전역 변수, 하드코딩, 반복 마크업은 금지입니다.  
// 프리뷰 페이지는 반드시 원본 컴포넌트를 include해야 하며, 복사/붙여넣기는 허용되지 않습니다.  
// SVG는 항상 `currentColor`로 채워지고, CSS는 유틸리티 중심으로 작성합니다.)

// ==========================================
// FRONTEND & DATA RULES / 프론트엔드 & 데이터 원칙
// ==========================================
// - Dynamic content is fetched from `/data/*.json`
// - Use Fetch API (ES6+) with async/await and error handling
// - JSON format example:
//   ```json
//   [{ "title": "Exhibition 1", "desc": "Description...", "image": "/assets/img/sample.jpg" }]
//   ```
// - Hide entire tab UI if no "past" items exist
// - Popup modal must support "오늘 하루 그만 보기" (24h cookie expiration)

// (한글 설명:
// 모든 데이터는 JSON 파일에서 가져오며, JS Fetch API를 사용해 비동기로 DOM에 삽입합니다.
// 탭 필터는 과거 데이터가 없을 경우 전체 UI를 숨기며, 팝업은 쿠키 기반(24시간)으로 제어됩니다.)

// ==========================================
// ACCESSIBILITY & SECURITY / 접근성 & 보안
// ==========================================
// Always add alt, aria-label, and proper focus states
// External links → target="_blank" rel="noopener"
// Contact form → Must prevent XSS & CSRF, handled by /lib/mail_handler.php

// (한글 설명:
// 모든 이미지에는 alt, aria-label을 포함해야 하며, 외부 링크는 보안 속성을 반드시 적용합니다.
// 문의 폼은 XSS/CSRF 방어를 포함하며 /lib/mail_handler.php로 메일을 처리해야 합니다.)

// ==========================================
// WORKFLOW / 개발 절차
// ==========================================
// 1️⃣ Create reusable PHP components in /components/
// 2️⃣ Define JSON data in /data/
// 3️⃣ Assemble pages using include() + foreach()
// 4️⃣ Verify via /pages/component-preview.php (no hardcoding)
// 5️⃣ Test locally → http://localhost/pages/component-preview.php

// (한글 설명:
// 모든 페이지는 컴포넌트 조합으로 작성되며, 미리보기 페이지에서는 include만 사용합니다.
// 로컬 환경(XAMPP, Apache)에서 테스트 후 검수합니다.)

// ==========================================
// HOW TO RESPOND / 응답 방식
// ==========================================
// When writing code:
// - Restate which project rules you are following
// - Provide full production-ready PHP/HTML/CSS/JS code
// - Include example $data usage and preview include snippet
// - Keep code minimal, semantic, and compliant
// - Explain briefly in Korean if needed (e.g. // 한글 설명: ~)

// (한글 설명:
// 코드를 작성할 때 반드시 어떤 규칙을 따랐는지 명시하고, 실제 서비스 가능한 완성 코드를 작성합니다.
// 필요 시 한글 주석으로 간단히 설명을 붙입니다.)

// ==========================================
// RESPONSE EXAMPLES / 예시
// ==========================================
// ✅ Example: Component request
// Create /components/cards/card-media-16x10.php
// Rules:
// - Input: $data = ['title','excerpt','image_url','href','external']
// - Render 16:10 figure, 1-line title, 2-line excerpt
// - if external == true → target="_blank" rel="noopener"
// - Utility classes only
// - Provide foreach example for /pages/component-preview.php
// (한글: 전역 변수 금지, 데이터 중심, foreach+include, 유틸리티 클래스 사용)

// ✅ Example: Tab filter logic
// Implement tabs in /pages/exhibitions.php.
// - Tabs: ['current','past']
// - Hide tabs UI if /data/exhibitions.json has no past items.
// (한글: 과거 데이터 없으면 탭 전체 숨김)

// ✅ Example: Popup modal
// Create /components/ui/popup-modal.php
// - Two variants: text+image, image-only
// - Cookie 'hideToday' valid for 24h
// (한글: 팝업 쿠키 24시간 유지, 접근성 고려)

// ==========================================
// 한국어 추가 요약
// ==========================================
// 하드코딩 금지 / 전역 변수 금지
// 모든 데이터는 $data 배열 입력 또는 JSON 기반
// include 구조 고정 / 프리뷰는 원본 include
// currentColor SVG / 유틸리티 CSS
// PHP 8.4 + JS ES6 이상 / 보안·접근성 필수
// 프로젝트 규칙(project-rules.md)이 항상 최우선 기준