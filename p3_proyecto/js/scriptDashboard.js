// Efecto para el hover de los elementos del sidebar
let list = document.querySelectorAll(".sidebar li");

function handleMouseEnter() {
    this.classList.add("hovered");
}

function handleMouseLeave() {
    this.classList.remove("hovered");
}

list.forEach(item => {
    item.addEventListener("mouseenter", handleMouseEnter);
    item.addEventListener("mouseleave", handleMouseLeave);
});


//Efecto de que si es admin, muestre todo
document.addEventListener('DOMContentLoaded', function() {
    const siderbarList = document.querySelector('.sidebar li');
    const userRole = siderbarList.dataset.userRole;   //Obteniendo el valor del data-attribute.
    const adminOnly = document.querySelectorAll('.admin-only');

    if (userRole !== 'admin') {
        adminOnly.forEach(element => {
            element.style.display = 'none';
        });
    }
});


//  Main Toggle.
document.addEventListener('DOMContentLoaded', () => {
    let sidebar = document.querySelector('.sidebar');   
    let toggle = document.querySelector('.toggle');
    let main = document.querySelector('.main');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle("active");
        toggle.classList.toggle("active");
        main.classList.toggle("active");
    });

    // Sign out functionality
    document.getElementById('sign-out-btn').addEventListener('click', function(e) {
        e.preventDefault();
        
        fetch('../php/logout.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'login.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});



