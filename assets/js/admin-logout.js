const logoutForm = document.querySelector('#admin-logout-form');

if (logoutForm) {
    const logoutMessage = document.querySelector('#admin-logout-message');
    const logoutButton = logoutForm.querySelector('button[type="submit"]');

    function showLogoutError(message) {
        logoutMessage.textContent = message;
        logoutMessage.className =
            'ajax-message admin-logout-message is-visible is-error';
    }

    logoutForm.addEventListener('submit', async function (event) {
        event.preventDefault();

        logoutMessage.textContent = '';
        logoutMessage.className = 'ajax-message admin-logout-message';

        logoutButton.disabled = true;
        logoutButton.textContent = 'Logging out...';

        try {
            const response = await fetch(logoutForm.action, {
                method: 'POST',
                body: new FormData(logoutForm),
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

            if (!response.ok || !result.success) {
                showLogoutError(
                    result.message || 'Logout failed. Please try again.'
                );

                return;
            }

            if (result.redirect) {
                window.location.href = result.redirect;
            }
        } catch (error) {
            console.error(error);

            showLogoutError(
                'Unable to contact the server. Please try again.'
            );
        } finally {
            logoutButton.disabled = false;
            logoutButton.textContent = 'Logout';
        }
    });
}