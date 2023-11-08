<!DOCTYPE html>
<html>

<head>
    <title>ShopBK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/home.css" />
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
    <?php $page = $_GET['page'] ?? null; ?>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid mx-3">
            <a class="navbar-brand text-white fw-bold fs-2" href="http://localhost/index.php?page=home">ShopBK</a>
            <button class="navbar-toggler shawdow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <?php
                if ($page == 'products') {
                    echo '
                    <div class="navbar-nav">
                    <a class="nav-link"  href="http://localhost/index.php?page=home">Home</a>
                    <a class="nav-link active" aria-current="page" href="http://localhost/index.php?page=products">Products</a>
                    <a class="nav-link" href="http://localhost/index.php?page=login">Login</a>
                    <a class="nav-link" href="http://localhost/index.php?page=register">Register</a>
                    </div>';
                } else if ($page == 'login') {
                    echo '
                    <div class="navbar-nav">
                    <a class="nav-link"  href="http://localhost/index.php?page=home">Home</a>
                    <a class="nav-link" aria-current="page" href="http://localhost/index.php?page=products">Products</a>
                    <a class="nav-link active" href="http://localhost/index.php?page=login">Login</a>
                    <a class="nav-link" href="http://localhost/index.php?page=register">Register</a>
                    </div>';
                } else if ($page == 'register') {
                    echo '
                    <div class="navbar-nav">
                    <a class="nav-link"  href="http://localhost/index.php?page=home">Home</a>
                    <a class="nav-link" href="http://localhost/index.php?page=products">Products</a>
                    <a class="nav-link" href="http://localhost/index.php?page=login">Login</a>
                    <a class="nav-link active" href="http://localhost/index.php?page=register">Register</a>
                    </div>';
                }
                else {
                    echo '
                    <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="http://localhost/index.php?page=home">Home</a>
                    <a class="nav-link" href="http://localhost/index.php?page=products">Products</a>
                    <a class="nav-link" href="http://localhost/index.php?page=login">Login</a>
                    <a class="nav-link" href="http://localhost/index.php?page=register">Register</a>
                    </div>';
                } 
                ?>
                
            </div>
        </div>
    </nav>

    <?php
    switch ($page) {
        case "home":
            include "./home.php";
            break;
        case "products":
            include "./products.php";
            break;
        case "login":
            include "./login.php";
            break;
        case "register":
            include "./register.php";
            break;
        default:
            $page = "home";
            include "./home.php";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>