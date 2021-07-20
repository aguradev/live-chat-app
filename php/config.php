<?php
$connect = mysqli_connect("localhost", "root", "", "chat_app_db");

if (!$connect) {
    echo "database not connection " . mysqli_connect_error();
}
