<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styleDashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Responsive Dashboard</title>
</head>

<body>
    <!-- Navigation bar code -->
    <header>
        <!-- Contenedor del logo. -->
        <div class="logo"> 
            <a href="index.php">  
            <img src="imgP3/copiaLOGO.jpeg" alt="Logo de la Biblioteca" class="logo">
            </a>
        </div>

        <!-- Contenedor para los enlaces de navegacion del sitio. -->
        <div class="navegacion">
            <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Library</a></li>
                <li><a href="#">History</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
            </nav>
        </div> 

        <!-- User tag in the header -->
        <div class="user">
            <img src="imgP3/userProfile.jpeg" alt="foto del usuario">
        </div>
    </header>
 
    <!-- Sidebar -->
    <div class="container">
        <div class="sidebar">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <i class='bx bx-cog'></i>
                    </span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <i class='bx bx-badge-check'></i>
                    </span>
                    <span class="title">Membership</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <i class='bx bx-chat'></i>
                    </span>
                    <span class="title">Message</span>
                </a>
            </li>
            
            <li>
                <a href="#">
                    <span class="icon">
                        <i class='bx bxs-door-open' ></i>                        
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
        </div>

        <!-- Main content -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class='bx bx-menu-alt-left'></i>
                </div>
                <div class="search">
                    <label>
                        <input type="text" placeholder="What are you looking for...">
                        <i class='bx bx-search-alt-2'></i>
                    </label>
                </div>
            </div>
        </div>
    </div>  

</body>
</html>