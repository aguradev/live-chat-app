<?php
include_once 'php/checkSession.php';
include 'php/usersCheck.php';

$receiver_msg = $_GET['user_id'];

$userCheck = UserCheck($receiver_msg);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customize.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title> Username - Chat</title>
</head>

<body>
    <section class="chat-area">

        <header class="profile-chat">
            <a href="users.php" class="arrow-back bi bi-arrow-left-short"></a>

            <div class="content">
                <div class="picture">
                    <i class="circle-icon"></i>
                    <div class="img-thumb">
                        <img src="image/profile/<?= $userCheck['profile'] ?>">
                    </div>
                </div>

                <div class="details">
                    <h6 class="text-capitalize"><?= $userCheck['fname'] . " " . $userCheck['lsname'] ?></h6>
                    <span class="status text-capitalize"><?= $userCheck['status'] ?></span>
                </div>

            </div>
        </header>

        <div class="chat-box">
        </div>

        <section class="message-footer">
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="receiver-msg" value="<?= $receiver_msg ?>" hidden>
                <input type="text" name="sender-msg" value="<?= $_SESSION['unique_id'] ?>" hidden>
                <input type="text" autocomplete="off" name="type_message" class="form-message" placeholder="Type Message Here...">
                <button class="btn-send"><i class="bi bi-telegram"></i></button>
            </form>
        </section>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/chat.js"></script>
</body>

</html>