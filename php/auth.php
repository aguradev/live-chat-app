<?php
session_start();
include_once "config.php";

function DataPost($name)
{
    return $_POST[$name];
}

$email = mysqli_real_escape_string($connect, DataPost("email"));
$password = mysqli_real_escape_string($connect, DataPost("password"));

if (!empty($email) && !empty($password)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "$email - is not valid";
    } else {
        $users = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
        $users_row = mysqli_fetch_assoc($users);
        $user_checked = mysqli_num_rows($users);

        // TODO check users email & password match in database
        if ($user_checked > 0 && password_verify($password, $users_row['password'])) {
            $_SESSION['unique_id'] = $users_row['unique_id'];
            echo "login success";
        } else {
            echo "email or password is incorrect!";
        }
    }
} else {
    echo "all input field are required!";
}
