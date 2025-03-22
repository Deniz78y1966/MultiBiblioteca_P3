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
            // Login exitoso
            document.getElementById('login-buttons').style.display = 'none';
            document.getElementById('profile-circle').style.display = 'flex';
            document.getElementById('profile-image').src = data.profileImage;
        } else {
            // Login fallido
            alert('Usuario o contraseña incorrectos');
        }
    })
    .catch(error => console.error('Error:', error));
});