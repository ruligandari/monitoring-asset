<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Login Wrapper Area -->
<div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
        <div class="text-center px-4">
            <img class="login-intro-img" src="<?= base_url('mobile') ?>/img/bg-img/36.png" alt="">
        </div>

        <!-- Register Form -->
        <div class="register-form mt-4">
            <h6 class="mb-3 text-center">Silahkan Login Akun Anda</h6>

            <form action="https://designing-world.com/affan-1.6.0/home.html">
                <div class="form-group">
                    <input class="form-control" type="text" id="username" placeholder="Username">
                </div>

                <div class="form-group position-relative">
                    <input class="form-control" id="psw-input" type="password" placeholder="Enter Password">
                    <div class="position-absolute" id="password-visibility">
                        <i class="bi bi-eye"></i>
                        <i class="bi bi-eye-slash"></i>
                    </div>
                </div>

                <button class="btn btn-primary w-100" type="submit">Sign In</button>
            </form>
        </div>

        <!-- Login Meta -->
        <div class="login-meta-data text-center">
            <a class="stretched-link forgot-password d-block mt-3 mb-1" href="forget-password.html">Forgot
                Password?</a>
            <p class="mb-0">Didn't have an account?
                <a class="stretched-link" href="register.php">Register Now</a>
            </p>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>