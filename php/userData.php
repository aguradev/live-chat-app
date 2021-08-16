<?php
session_start();
include_once "config.php";

$output = '';
$sender_id = $_SESSION['unique_id'];

// TODO menampilkan data chat 
$userList = mysqli_query($connect, "SELECT * FROM users WHERE NOT unique_id = '{$sender_id}'");
if (mysqli_num_rows($userList) > 0) {
    include "userList.php";
} else {
    $output .= 'no users available to chat';
}

echo $output;
