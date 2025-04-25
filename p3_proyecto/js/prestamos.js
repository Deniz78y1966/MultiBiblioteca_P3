
document.addEventListener("DOMContentLoaded", function () {
    cargarUsuarios();
});

function cargarUsuarios() {
    fetch('obtener_usuarios.php')
        .then(response => response.json())
        .then(usuarios => {
            const selectUsuario = document.getElementById('usuario-select');
            usuarios.forEach(usuario => {
                const option = document.createElement('option');
                option.value = usuario.ID_Usuarios;
                option.textContent = usuario.Nombre;
                selectUsuario.appendChild(option);
            });
        });
}

function cargarLibros() {
    const usuarioId = document.getElementById('usuario-select').value;
    if (!usuarioId) return;

    fetch('obtener_libros.php')
        .then(response => response.json())
        .then(libros => {
            const selectLibro = document.getElementById('libro-select');
            selectLibro.innerHTML = "<option value=''>--Seleccionar Libro--</option>";

            libros.forEach(libro => {
                const option = document.createElement('option');
                option.value = libro.ID_Libros;
                option.textContent = `${libro.Titulo} - ${libro.Autor}`;
                selectLibro.appendChild(option);
            });
        });
}

function prestarLibro() {
    const ID_Usuarios = document.getElementById('usuario-select').value;
    const ID_Libros = document.getElementById('libro-select').value;

    if (!ID_Usuarios || !ID_Libros) {
        mostrarMensaje("Por favor, selecciona un usuario y un libro.", "error");
        return;
    }

    fetch('prestamo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            ID_Usuarios: ID_Usuarios,
            ID_Libros: ID_Libros,
            metodo_acceso: "Ticket"
        })
    })
    .then(response => response.json())
    .then(data => {
        mostrarMensaje(data.message, data.status === 'success' ? 'success' : 'error');
        cargarLibros(); // Actualizamos la lista de libros disponibles
    });
}

function devolverLibro() {
    const ID_Usuarios = document.getElementById('usuario-select').value;
    const ID_Libros = document.getElementById('libro-select').value;

    if (!ID_Usuarios || !ID_Libros) {
        mostrarMensaje("Por favor, selecciona un usuario y un libro para devolver.", "error");
        return;
    }

    fetch('devolucion.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            ID_Usuarios: ID_Usuarios,
            ID_Libros: ID_Libros
        })
    })
    .then(response => response.json())
    .then(data => {
        mostrarMensaje(data.message, data.status === 'success' ? 'success' : 'error');
        cargarLibros(); // Actualizamos la lista de libros disponibles
    });
}

function mostrarMensaje(message, type) {
    const mensaje = document.getElementById('mensaje');
    mensaje.textContent = message;
    mensaje.style.display = 'block';
    mensaje.style.backgroundColor = type === 'success' ? '#27ae60' : '#e74c3c';
    setTimeout(() => {
        mensaje.style.display = 'none';
    }, 3000);
}
