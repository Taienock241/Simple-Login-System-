document.querySelectorAll('[data-password-toggle]').forEach((button) => {
    button.addEventListener('click', () => {
        const input = document.getElementById(button.dataset.passwordToggle);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        button.textContent = isPassword ? 'Hide' : 'Show';
        button.setAttribute('aria-label', `${isPassword ? 'Hide' : 'Show'} password`);
    });
});

document.querySelectorAll('form[data-validate]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        let valid = true;
        form.querySelectorAll('[required]').forEach((input) => {
            const message = input.closest('.field')?.querySelector('.field-error');
            if (!input.value.trim()) {
                input.classList.add('input-error');
                if (message) message.textContent = 'This field is required.';
                valid = false;
            } else {
                input.classList.remove('input-error');
                if (message) message.textContent = '';
            }
        });

        const password = form.querySelector('input[name="password"]');
        const confirmation = form.querySelector('input[name="confirm_password"]');
        if (password && password.value.length > 0 && password.value.length < 8) {
            password.classList.add('input-error');
            password.closest('.field').querySelector('.field-error').textContent = 'Use at least 8 characters.';
            valid = false;
        }
        if (password && confirmation && password.value !== confirmation.value) {
            confirmation.classList.add('input-error');
            confirmation.closest('.field').querySelector('.field-error').textContent = 'Passwords do not match.';
            valid = false;
        }

        if (!valid) event.preventDefault();
    });
});
