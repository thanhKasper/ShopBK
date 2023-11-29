<!-- Admin mail: kieutienthanh207@email.com, admin password: 12345678 -->

<section id="register" style="margin-top: auto; margin-bottom: auto;">
    <form action="/controller/addAccount.php" method="POST" class="d-flex flex-column w-50 p-5 mt-5 border mx-auto my-auto bg-body-secondary rounded-3">
        <h1 class="text-center">Create Your New Account</h1>
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id='username' name="username" required>
            </div>
            <div class="col-md-12 col-lg-8">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="mt-3">
            <label for="pwd" class='form-label'>Password</label>
            <input type="password" class="form-control" id="pwd" name="password" required>
        </div>
        <div class="mt-3">
            <label for="confirmPwd" class='form-label'>Confirm Your Password</label>
            <input type="password" class="form-control" id="confirmPwd" name="confirmPwd" required>
        </div>
        <button class="btn btn-success mt-4 d-block">Register</button>
    </form>
</section>