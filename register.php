<!-- Admin mail: kieutienthanh207@email.com, admin password: 12345678 -->

<!-- 
user1 user1@email.com 246810
user2 user2@email.com 112358
-->

<section id="register" class="pt-5 ">
    <form action="/controller/addAccount.php" method="POST" class="w-50 mx-auto d-flex flex-column p-sm-3 p-md-5 border bg-body-secondary rounded-3">
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

<script>
    const registerForm = document.querySelector('form')
    registerForm.addEventListener('submit', (e) => {
        e.preventDefault()
        const formData = new FormData(registerForm)
        const pwd = formData.get('password')
        const confirmPwd = formData.get('confirmPwd')
        if (pwd !== confirmPwd) {
            const alertEle = document.createElement('div')
            const btn = document.createElement('button')
            alertEle.className = 'alert alert-warning alert-dismissible fade show'
            alertEle.role = 'alert'
            alertEle.innerHTML = "Your password and retype password are not the same, please check again"
            registerForm.insertBefore(alertEle, registerForm.firstChild);
            btn.type = 'button'
            btn.className = 'btn-close'
            btn.setAttribute('data-bs-dismiss', 'alert')
            alertEle.appendChild(btn)
        } else {
            const xhttp = new XMLHttpRequest()
            xhttp.open('POST', './controller/addAccount.php')
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`username=${formData.get('username')}&email=${formData.get('email')}&password=${formData.get('password')}`)
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.replace('http://localhost/index.php?page=login')
                }
            }
        }
    })
</script>