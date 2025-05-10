<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/styleDashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="js/scriptDashboard.js"></script>
    <title>Responsive Dashboard</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <!-- Sidebar -->
    <div class="container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <i class='bx bx-cog'></i>
                        </span>
                        <span class="title">Settings</span>
                    </a> 
                </li>

                <li>
                    <a href="prestamos.php">
                        <span class="icon">
                            <i class='bx bx-badge-check'></i>
                        </span>
                        <span class="title">Prestamos</span>
                    </a>
                </li>

                <li>
                    <a href="chat.php">
                        <span class="icon">
                            <i class='bx bx-chat'></i>
                        </span>
                        <span class="title">Message</span>
                    </a>
                </li>

                <?php if ($_SESSION['user_type'] !== 'admin'): ?>
                <li>
                    <a href="#">
                        <span class="admin-only">
                            <span class="icon">
                                <i class='bx bx-edit'></i>
                            </span>
                            <span class="title">Edit Profile</span>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="bibliotecario-only">
                            <span class="icon">
                                <i class='bx bx-book'></i>
                            </span>
                            <span class="title">Update Books</span>
                        </span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Main content -->
        <div class="main">
            <div class="topbar">
                <div class="search">
                    <label>
                        <input type="text" placeholder="What are you looking for...">
                        <i class='bx bx-search-alt-2'></i>
                    </label>
                </div>
            </div>

            <!-- Settings Form -->
            <div class="settings-container">
                <h2>Profile Settings</h2>
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['errors'])) {
                    foreach($_SESSION['errors'] as $error) {
                        echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
                    }
                    unset($_SESSION['errors']);
                }
                ?>
                <form action="update_profile.php" method="POST" enctype="multipart/form-data" id="profileForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <a href="logout.php" class="btn btn-secondary mt-3">Logout</a>
            </div>
        </div>
    </div>

    <script>
    const form = document.getElementById('profileForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', function(e) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Saving...';
    });
    </script>
</body>

</html>
