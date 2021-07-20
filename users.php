<?php
// TODO membuat session agar mencegah users mengakses halaman tanpa login
include 'php/checkSession.php';
?>

<?php include_once "php/template/header.php"; ?>

<body>
    <section class="users" id="users">
        <header class="profile">
            <?php
            // TODO membuat data dinamis

            include_once "php/usersCheck.php";

            $users_row = UserCheck($_SESSION['unique_id']);

            ?>
            <div class="content">
                <div class="img-thumb">
                    <img src="image/profile/<?= $users_row['profile'] ?>" alt="">
                </div>
                <div class="details">
                    <h6 class="text-capitalize"><?= $users_row['fname'] . " " . $users_row['lsname'] ?></h6>
                    <span><?= $users_row['status'] ?></span>
                </div>
            </div>
            <a href="#" class="btn-logout btn-dark mb-0">Logout</a>
        </header>

        <div class="search input-group mb-4">
            <span>Select an User to start chat</span>
            <input type="text" class="form-control" name="search" id="search" placeholder="Enter Name To Search..." autocomplete="off">
            <button class="btn btn-dark btn-search">
                <i class="bi bi-search"></i>
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <h6 class="fw-bold result"></h6>

        <div class="users-list">
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/users.js"></script>
</body>

</html>