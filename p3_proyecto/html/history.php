<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Historial de Libros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleHistory.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar" id="theNavbar">
    <a href="../index.php">Home</a>
    <a href="catalogo.php">Library</a>
    <a href="history.php">History</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">&#9776;</a>
</div>

<div class="historial-container">
    <h2>Historial de Libros Leídos</h2>

    <!-- Mostrar mensaje si existe -->
    <?php if (!empty($mensaje)): ?>
        <div class="mensaje <?= strpos($mensaje, '❌') !== false ? 'error' : '' ?>" id="mensaje"><?= $mensaje ?></div>
    <?php endif; ?>

    <button class="boton-toggle" onclick="mostrarFormulario()">+ Agregar nuevo libro</button>

       <!-- Formulario nuevo libro -->
       <form class="formulario-nuevo" id="formularioLibro" method="POST" action="history.php" onsubmit="return validarFormulario()">
        <label for="titulo">Título del libro:</label>
        <input type="text" name="titulo" id="titulo">

        <label for="fecha">Fecha de lectura:</label>
        <input type="date" name="fecha" id="fecha">

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" id="comentario" rows="4" placeholder="¿Qué opinaste del libro?"></textarea>

        <button type="submit">Guardar</button>
    </form>

      <!-- Historial -->
      <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
        <div class="entrada">
            <div class="titulo"><?= htmlspecialchars($fila['titulo']) ?></div>
            <div class="fecha"><?= $fila['fecha_lectura'] ?></div>
            <div class="comentario"><?= htmlspecialchars($fila['comentario']) ?></div>
        </div>
    <?php endwhile; ?>
</div>
