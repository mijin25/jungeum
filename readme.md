# 정음 (Jungeum) 웹사이트

문화와 예술의 공간을 위한 웹사이트 프로젝트입니다.

## 🚀 기술 스택

- **백엔드**: Pure PHP 8.4
- **프론트엔드**: HTML5, CSS (Utility-first), Vanilla JavaScript (ES6+)
- **서버**: Cafe24 New Autobahn
- **데이터**: JSON 파일 기반

## 📁 프로젝트 구조

```
jungeum/
├── index.php                    # 메인 페이지
├── pages/                       # 서브 페이지들
│   ├── contact.php
│   ├── check-cafe24.php
│   ├── component-preview.php    # 컴포넌트 디자인 시스템 가이드
│   └── design-system-preview.php
├── components/                  # 재사용 컴포넌트
│   ├── buttons/                 # 버튼 컴포넌트
│   ├── cards/                   # 카드 컴포넌트
│   ├── forms/                   # 폼 컴포넌트
│   ├── navigation/               # 네비게이션 컴포넌트
│   ├── ui/                      # UI 요소 컴포넌트
│   ├── alerts/                  # 알림 컴포넌트
│   ├── modals/                  # 모달 컴포넌트
│   ├── accordion/                # 아코디언 컴포넌트
│   ├── loading/                 # 로딩 컴포넌트
│   ├── layout/                  # 레이아웃 컴포넌트
│   ├── header.php               # 헤더 컴포넌트
│   ├── footer.php               # 푸터 컴포넌트
│   ├── helpers.php              # 헬퍼 함수
│   └── readme.md                 # 컴포넌트 가이드
├── lib/                         # 핵심 로직
│   └── SVGCache.php             # SVG 캐시 클래스
├── assets/                      # 정적 자원
│   ├── fonts/                   # 웹폰트 파일
│   └── images/                  # 이미지 파일
├── css/                         # 스타일시트
│   ├── base/                    # 기본 스타일
│   ├── components/              # 컴포넌트별 스타일
│   ├── tokens/                  # 디자인 토큰
│   ├── utilities/               # 유틸리티 클래스
│   ├── design-system.css        # 디자인 시스템
│   ├── main.css                 # 메인 스타일
│   ├── preview.css              # 프리뷰 페이지 전용
│   └── webfonts.css             # 웹폰트 정의
├── js/                          # JavaScript
│   └── main.js                  # 메인 스크립트
├── data/                        # JSON 데이터
│   ├── events.json
│   ├── exhibitions.json
│   ├── press.json
│   └── space.json
├── config/                      # 설정 파일
│   └── server.php               # 서버 환경 설정
├── docs/                        # 문서
│   └── deployment.md            # 배포 가이드
├── tests/                       # 테스트
│   ├── unit/                    # 단위 테스트
│   ├── integration/             # 통합 테스트
│   ├── fixtures/                # 테스트 데이터
│   └── readme.md                # 테스트 가이드
└── .cursor/                     # Cursor AI 규칙
    └── rules/
        ├── project-rules.md      # 프로젝트 개발 규칙
        └── readme.md             # 규칙 가이드
```

## 🛠️ 개발 환경 설정

### XAMPP를 사용한 로컬 개발 (권장)

#### 1. XAMPP 설치
- **다운로드**: https://www.apachefriends.org/download.html
- **설치**: Apache, PHP만 선택 (MySQL 불필요)
- **관리자 권한으로 설치**

#### 2. XAMPP 설정
```bash
# XAMPP 제어판 실행
C:\xampp\xampp-control.exe

# Apache만 시작 (MySQL 불필요)
# DocumentRoot를 현재 프로젝트 폴더로 설정
```

#### 3. 프로젝트 설정
```bash
# XAMPP Apache 설정 파일 수정
# C:\xampp\apache\conf\httpd.conf
DocumentRoot "C:/Users/irene/Desktop/Dev/jungeum"
```

#### 4. 접속 URL
```
# 메인 페이지
http://localhost/

# 컴포넌트 프리뷰
http://localhost/pages/component-preview.php

# 문의 페이지
http://localhost/pages/contact.php
```

### 대안: PHP 내장 서버
```bash
# PHP 8.4 환경에서 실행 (PHP 설치 필요)
php -S localhost:8000
```

### 호환성 체크
```bash
# 카페24 호환성 확인
http://localhost/pages/check-cafe24.php
```

## 📚 문서

- [배포 가이드](docs/deployment.md)
- [개발 규칙](.cursor/rules/project-rules.md)
- [컴포넌트 가이드](components/readme.md)
- [테스트 가이드](tests/readme.md)

## 🧪 테스트

```bash
# 단위 테스트 실행
./vendor/bin/phpunit tests/unit/

# 통합 테스트 실행  
./vendor/bin/phpunit tests/integration/

# 전체 테스트 실행
./vendor/bin/phpunit tests/
```

## 🎨 컴포넌트 디자인 시스템

프로젝트는 컴포넌트 기반 개발을 지원합니다:

- **컴포넌트 프리뷰**: `http://localhost/pages/component-preview.php`
- **디자인 시스템**: 통합된 CSS 변수와 토큰 시스템
- **재사용 가능한 컴포넌트**: 버튼, 카드, 폼, 네비게이션 등

## 📝 라이선스

이 프로젝트는 MIT 라이선스 하에 있습니다.
