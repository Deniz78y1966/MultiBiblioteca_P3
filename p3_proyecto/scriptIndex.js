document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('validate_login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Login exitoso!');
        } else {
            alert('Usuario o contraseña incorrectos');
        }
    })
    .catch(error => console.error('Error:', error));
});