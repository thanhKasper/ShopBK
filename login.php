<section class='hero py-5'>
    <div class="container-sm login-form rounded-2 p-4">
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == -1) : ?>
            <div class="alert alert-warning d-flex align-items-center container-sm" role="alert">
                Wrong username or password
            </div>
        <?php endif; ?>
        <h1 class='fs-3 text-center text-white mb-5 fw-bold'>Login</h1>
        <form action="./controller/login_processing.php" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='username'>
                <label for="floatingInput">Email or Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='password'>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid mt-5">
                <button class='btn btn-primary fw-bold'>
                    Sign In
                </button>
            </div>
        </form>
    </div>
</section>