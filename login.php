<?php include_once "php/template/header.php"; ?>

<body>
    <section class="form-login" id="form">
        <header class="text-capitalizm fw-bold">Realtime chat app</header>
        <hr class="bg-secondary my-3">
        <form action="#" autocomplete="off" class="row">
            <div class="col-12">
                <div class="alert alert-danger error-message text-center mb-3 fw-bolder" role="alert"></div>
            </div>

            <div class="col-12 form-floating">
                <input type="text" name="email" id="email" placeholder="Enter Your Email" autocomplete="off" class="form-control">
                <label for="email" class="form-label">Email Address</label>
            </div>

            <div class="col-12 position-relative form-floating" id="form-password">
                <input type="password" name="password" id="password" placeholder="Enter New Password" autocomplete="off" class="form-control">
                <label for="password" class="form-label">Password</label>
                <i class="eye_icon bi bi-eye-fill" id="password_toogle"></i>
            </div>

            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-dark" id="btn-submit">Login</button>
            </div>
        </form>
        <div class="link">Not Yet Account ? <a href="index.php">Sign Up</a></div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/password-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>

</html>