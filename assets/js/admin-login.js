const loginForm = document.querySelector('#admin-login-form');

if (loginForm) {
    const messageBox = document.querySelector('#login-message');
    const emailInput = document.querySelector('#email');
    const passwordInput = document.querySelector('#password');
    const emailError = document.querySelector('#email-error');
    const passwordError = document.querySelector('#password-error');
    const submitButton = loginForm.querySelector('button[type="submit"]');

    function clearMessages() {
        messageBox.textContent = '';
        messageBox.className = 'ajax-message';

        emailError.textContent = '';
        passwordError.textContent = '';

        emailInput.classList.remove('has-error');
        passwordInput.classList.remove('has-error');
    }

    function showMessage(message, type) {
        messageBox.textContent = message;
        messageBox.className = `ajax-message is-visible is-${type}`;
    }

    loginForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        clearMessages();

        submitButton.disabled = true;
        submitButton.textContent = 'Signing in...';

        try {
            const response = await fetch(loginForm.action, {
                method: 'POST',
                body: new FormData(loginForm),
                credentials: 'same-origin',
                headers: {
                    Accept: 'application/json'
                }
            });

            const responseText = await response.text();
            let result;

            try {
                result = JSON.parse(responseText);
            } catch {
                throw new Error('The server did not return valid JSON.');
            }

            if (result.errors?.email) {
                emailError.textContent = result.errors.email;
                emailInput.classList.add('has-error');
            }

            if (result.errors?.password) {
                passwordError.textContent = result.errors.password;
                passwordInput.classList.add('has-error');
            }

            if (!response.ok || !result.success) {
                showMessage(
                    result.message || 'Login failed. Please try again.',
                    'error'
                );

                return;
            }

            showMessage(
                result.message || 'Login successful.',
                'success'
            );

            if (result.redirect) {
                window.location.href = result.redirect;
            }
        } catch (error) {
            console.error(error);

            showMessage(
                'Unable to contact the server. Please try again.',
                'error'
            );
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = 'Login';
        }
    });
}