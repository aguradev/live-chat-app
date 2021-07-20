<?php include_once "php/template/header.php"; ?>

<body>
    <section class="form-register" id="form">
        <header class="text-capitalizm fw-bold">Realtime chat app</header>
        <hr class="bg-secondary my-3">
        <form action="#" enctype="multipart/form-data" class="row" autocomplete="off">
            <div class="col-12">
                <div class="alert alert-danger error-message text-center mb-3 fw-bolder" role="alert"></div>
            </div>
            <div class="col-lg-6">
                <label for="firstName" class="form-label">FirstName</label>
                <input required type="text" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="lastname" class="form-label">Lastname</label>
                <input required type="text" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" class="form-control">
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email Address</label>
                <input required type="text" name="email" id="email" placeholder="Enter Your Email" autocomplete="off" class="form-control">
            </div>
            <div class="col-12 position-relative" id="form-password">
                <label for="password" class="form-label">Password</label>
                <input required type="password" name="password" id="password" placeholder="Enter New Password" autocomplete="off" class="form-control" autocomplete="off">
                <i class="eye_icon bi bi-eye-fill" id="password_toogle"></i>
            </div>
            <div class="col-12">
                <label for="Image Picture" class="form-label">Image Picture</label>
                <input class="form-control file-input" type="file" id="formFile" name="image">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-primary" id="btn-register">Create An Account</button>
            </div>
        </form>
        <div class="link">Already Have Account ? <a href="login.php">Login Now</a></div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/password-show-hide.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>