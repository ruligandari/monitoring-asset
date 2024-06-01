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
            <h6 class="mb-3 text-center">Register to continue to the Affan</h6>

            <form action="">
                <div class="form-group text-start mb-3">
                    <input class="form-control" type="text" placeholder="Email address">
                </div>

                <div class="form-group text-start mb-3">
                    <input class="form-control" type="text" placeholder="Username">
                </div>

                <div class="form-group text-start mb-3 position-relative">
                    <input class="form-control" id="psw-input" type="password" placeholder="New password">
                    <div class="position-absolute" id="password-visibility">
                        <i class="bi bi-eye"></i>
                        <i class="bi bi-eye-slash"></i>
                    </div>
                </div>

                <div class="mb-3" id="pswmeter"></div>

                <div class="form-check mb-3">
                    <input class="form-check-input" id="checkedCheckbox" type="checkbox" value="" checked>
                    <label class="form-check-label text-muted fw-normal" for="checkedCheckbox">I agree with the terms &amp;
                        policy.</label>
                </div>

                <button class="btn btn-primary w-100" type="submit">Sign Up</button>
            </form>
        </div>
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
            <p class="mt-3 mb-0">Already have an account? <a class="stretched-link" href="login.html">Login</a></p>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>