function logout() {
    fetch('../php/logout.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '../index.html';  // Redirect to login page
            }
        })
        .catch(error => console.error('Error:', error));
}
