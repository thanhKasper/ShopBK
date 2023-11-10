<section class='hero py-5'>
    <div>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == -1) : ?>
            <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert" style="max-width:480px;">
                Wrong username or password, please type again
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="container-sm login-form rounded-2 p-4">
            <h1 class='fs-3 text-center text-white mb-5 fw-bold'>Login</h1>
            <form action="./controller/login_processing.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="usermail" placeholder="name@example.com" name='username' value="<?php if (isset($_SESSION['prevUname'])) {
                                                                                                                                        echo $_SESSION['prevUname'];
                                                                                                                                    } ?>" required>
                    <label for="usermail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="userpwd" placeholder="Password" name='password' minlength="6" maxlength="30" value="<?php if (isset($_SESSION['prevPwd'])) {
                                                                                                                                                            echo $_SESSION['prevPwd'];
                                                                                                                                                        } ?>" required>
                    <label for="userpwd">Password</label>
                </div>
                <div class="d-grid mt-5">
                    <button class='btn btn-primary fw-bold'>
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- User provide incorret login -->
    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == -1) {unset($_SESSION['user_id']);} ?>
</section>