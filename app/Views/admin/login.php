<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin CineMax</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/AdminLogin.css') ?>">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>CineMax Admin</h2>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="error"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <form action="<?= site_url('adminauth/login') ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <div class="password-wrapper">
                        <input type="password" name="password" id="password" placeholder="Masukkan password" required>
                        <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>
    <script>
    function togglePassword() {
        const password = document.getElementById("password");
        const icon = document.querySelector(".toggle-password");

        if (password.type === "password") {
            password.type = "text";
            icon.textContent = "🙈";
        } else {
            password.type = "password";
            icon.textContent = "👁️";
        }
    }
</script>
</body>
</html>