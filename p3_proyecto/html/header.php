<header>
    <div class="logo">
        <a href="../index.php">
            <img src="../img/copiaLOGO.jpeg" alt="Logo de la Biblioteca" class="logo">
        </a>
    </div>

    <div class="navegacion">
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="catalogo.php">Library</a></li>
                <li><a href="history.php">History</a></li>
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <div class="user-section">
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <div class="user">
                <img src="../img/user/default.jpeg" alt="foto del usuario">
            </div>
        <?php else: ?>
            <div class="auth-buttons">
                <a href="login.php" class="btn-login">Login</a>
                <a href="registro.php" class="btn-register">Register</a>
            </div>
        <?php endif; ?>
    </div>
</header>
