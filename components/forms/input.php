<?php
/**
 * 입력 필드 컴포넌트
 * 다양한 타입의 재사용 가능한 입력 필드
 */

// 매개변수 설정 (기본값)
$name = $name ?? '';
$type = $type ?? 'text'; // text, email, tel, password, number, textarea
$label = $label ?? '';
$placeholder = $placeholder ?? '';
$value = $value ?? '';
$required = $required ?? false;
$disabled = $disabled ?? false;
$error = $error ?? '';
$help = $help ?? '';
$class = $class ?? '';
$id = $id ?? $name;
?>

<div class="form-field <?php echo $error ? 'form-field--error' : ''; ?> <?php echo htmlspecialchars($class); ?>">
    <?php if ($label): ?>
        <label for="<?php echo htmlspecialchars($id); ?>" class="form-field__label">
            <?php echo htmlspecialchars($label); ?>
            <?php if ($required): ?>
                <span class="form-field__required">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>
    
    <div class="form-field__input">
        <?php if ($type === 'textarea'): ?>
            <textarea id="<?php echo htmlspecialchars($id); ?>" 
                      name="<?php echo htmlspecialchars($name); ?>" 
                      class="form-input form-input--textarea"
                      placeholder="<?php echo htmlspecialchars($placeholder); ?>"
                      <?php echo $required ? 'required' : ''; ?>
                      <?php echo $disabled ? 'disabled' : ''; ?>><?php echo htmlspecialchars($value); ?></textarea>
        <?php else: ?>
            <input type="<?php echo htmlspecialchars($type); ?>" 
                   id="<?php echo htmlspecialchars($id); ?>" 
                   name="<?php echo htmlspecialchars($name); ?>" 
                   class="form-input"
                   placeholder="<?php echo htmlspecialchars($placeholder); ?>"
                   value="<?php echo htmlspecialchars($value); ?>"
                   <?php echo $required ? 'required' : ''; ?>
                   <?php echo $disabled ? 'disabled' : ''; ?>>
        <?php endif; ?>
    </div>
    
    <?php if ($error): ?>
        <div class="form-field__error">
            <span class="error-icon">⚠️</span>
            <span class="error-text"><?php echo htmlspecialchars($error); ?></span>
        </div>
    <?php endif; ?>
    
    <?php if ($help): ?>
        <div class="form-field__help">
            <span class="help-text"><?php echo htmlspecialchars($help); ?></span>
        </div>
    <?php endif; ?>
</div>
