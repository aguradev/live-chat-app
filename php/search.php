<?php
session_start();
include_once "config.php";
$searchValue = mysqli_real_escape_string($connect, $_POST['searchValue']);
$output = "";

$sender_id = $_SESSION['unique_id'];

$userList = mysqli_query($connect, "SELECT * FROM users WHERE NOT unique_id ='{$sender_id}' AND (fname LIKE '%$searchValue%' OR lsname LIKE '%$searchValue%')");

if (mysqli_num_rows($userList) > 0) {
    include "userList.php";
} else {
    $output .= "No users found related to your search";
}
echo $output;
