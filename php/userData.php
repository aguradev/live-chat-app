<?php

include_once "config.php";

$output = '';

// TODO menampilkan data chat 
$userList = mysqli_query($connect, "SELECT * FROM users");
if (mysqli_num_rows($userList) > 0) {
    include "userList.php";
} else {
    $output .= 'no users available to chat';
}

echo $output;
