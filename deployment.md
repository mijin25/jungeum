# 카페24 서버 배포 가이드

## 🚀 배포 전 체크리스트

### 1. 로컬 환경 테스트
```bash
# 호환성 체크 실행
http://localhost/check-cafe24.php
```

### 2. 필수 파일 확인
- [ ] `index.php` - 메인 페이지
- [ ] `css/design-system.css` - 디자인 시스템
- [ ] `css/webfonts.css` - 웹폰트
- [ ] `js/main.js` - JavaScript
- [ ] `data/*.json` - 데이터 파일들
- [ ] `components/*.php` - 컴포넌트들
- [ ] `assets/` - 이미지 및 폰트 파일들

### 3. 카페24 서버 설정

#### PHP 설정
- PHP 버전: 8.4
- 문자 인코딩: UTF-8
- 에러 리포팅: 비활성화 (프로덕션)

#### 파일 업로드
1. FTP/SFTP로 모든 파일 업로드
2. 파일 권한 설정 (755 for directories, 644 for files)
3. `.htaccess` 파일 설정 (필요시)

#### 보안 설정
- PHP 버전 노출 비활성화
- 세션 보안 설정 활성화
- CSRF 토큰 검증 활성화

### 4. 배포 후 테스트
- [ ] 메인 페이지 로딩 확인
- [ ] 반응형 디자인 테스트
- [ ] JavaScript 동작 확인
- [ ] 폼 제출 테스트
- [ ] 이미지 로딩 확인

## 🔧 환경별 설정

### 개발 환경 (로컬)
- 에러 리포팅: 활성화
- 디버그 모드: 활성화
- PHP 버전 노출: 활성화

### 프로덕션 환경 (카페24)
- 에러 리포팅: 비활성화
- 디버그 모드: 비활성화
- PHP 버전 노출: 비활성화
- 보안 헤더 설정

## 📁 파일 구조
```
jungeum/
├── index.php
├── contact.php
├── config/
│   └── server.php
├── css/
│   ├── design-system.css
│   └── webfonts.css
├── js/
│   └── main.js
├── data/
│   ├── events.json
│   ├── exhibitions.json
│   ├── press.json
│   └── space.json
├── components/
│   ├── header.php
│   └── footer.php
├── assets/
│   ├── fonts/
│   └── images/
└── check-cafe24.php
```

## ⚠️ 주의사항
- 카페24에서는 MariaDB 사용하지 않음
- 모든 데이터는 JSON 파일로 관리
- PHP 8.4 문법 준수
- UTF-8 인코딩 필수
- 보안 설정 강화 필요
