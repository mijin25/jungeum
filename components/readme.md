# 컴포넌트 구조

## 폴더 구조

```
components/
├── README.md              # 컴포넌트 가이드
├── header.php             # 헤더 컴포넌트
├── footer.php             # 푸터 컴포넌트
├── cards.php              # 카드 컴포넌트 통합
├── accordion/             # 아코디언 컴포넌트
├── alerts/                # 알림 컴포넌트
├── buttons/               # 버튼 컴포넌트
├── cards/                 # 카드 컴포넌트들
│   ├── event-card.php
│   ├── exhibition-card.php
│   ├── press-card.php
│   └── space-card.php
├── forms/                 # 폼 컴포넌트들
│   ├── contact-form.php
│   └── input.php
├── layout/                # 레이아웃 컴포넌트들
│   ├── grid.php
│   └── section.php
├── loading/               # 로딩 컴포넌트
├── modals/                # 모달 컴포넌트
├── navigation/            # 네비게이션 컴포넌트들
│   ├── page-indicator.php
│   ├── pagination.php
│   ├── scroll-indicator.php
│   └── tab-menu.php
└── ui/                    # UI 컴포넌트들
    └── tag.php
```

## 사용 방법

### 기본 컴포넌트
```php
<?php include 'components/header.php'; ?>
<?php include 'components/footer.php'; ?>
```

### 카드 컴포넌트
```php
<?php include 'components/cards/event-card.php'; ?>
<?php include 'components/cards/exhibition-card.php'; ?>
```

### 폼 컴포넌트
```php
<?php include 'components/forms/contact-form.php'; ?>
```

## 컴포넌트 개발 가이드

1. **재사용성**: 여러 페이지에서 사용할 수 있도록 설계
2. **독립성**: 다른 컴포넌트에 의존하지 않도록 설계
3. **일관성**: 동일한 네이밍 컨벤션 사용
4. **문서화**: 각 컴포넌트의 사용법을 주석으로 명시
