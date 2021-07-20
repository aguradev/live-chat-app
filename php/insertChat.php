<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location:../login.php");
}

include_once 'config.php';
$receiver = mysqli_real_escape_string($connect, $_POST['receiver-msg']);
$sender = mysqli_real_escape_string($connect, $_POST['sender-msg']);
$message = mysqli_real_escape_string($connect, $_POST['type_message']);

if (!empty($message)) {
    $message = "INSERT INTO message_db (receiver_id, sender_id, message) VALUES({$receiver},{$sender},'{$message}')";
    $send = mysqli_query($connect, $message);
} else {
    header("location:../chat.php");
}
