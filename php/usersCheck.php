<?php
include_once 'config.php';

function UserCheck($unique_id)
{
    global $connect;

    $user_id = $unique_id;
    $user = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = '$user_id'");

    if (mysqli_num_rows($user) > 0) {
        $users_row = mysqli_fetch_assoc($user);
    }

    return $users_row;
}
