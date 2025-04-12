document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('../html/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect based on role
                if (data.rol === 'admin') {
                    window.location.href = 'admin/dashboard.php';
                } else {
                    window.location.href = 'usuario/dashboard.php';
                }
            } else {
                // Show error message
                const errorDiv = document.querySelector('.error-message');
                if (!errorDiv) {
                    const div = document.createElement('div');
                    div.className = 'error-message';
                    div.textContent = data.message;
                    loginForm.insertBefore(div, loginForm.firstChild);
                } else {
                    errorDiv.textContent = data.message;
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
