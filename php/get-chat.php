<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location:../chat.php");
}

include_once 'config.php';
$receiver = mysqli_real_escape_string($connect, $_POST['receiver-msg']);
$sender = mysqli_real_escape_string($connect, $_POST['sender-msg']);
$output = "";

// ? penjelasan SELECT
// * tampikan data penerima = pesan_penerima & pengirim = pesan_pengirim -> sisi pengirim
// * tampilkan data penerima = pesan_pengirim & pengirim = pesan_penerima -> sisi penerima

$user_receiver = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = {$receiver}");
$profile_receiver = mysqli_fetch_assoc($user_receiver);

$user_sender = mysqli_query($connect, "SELECT * FROM users WHERE unique_id = {$sender}");
$profile_sender = mysqli_fetch_assoc($user_sender);


$query = "SELECT * FROM message_db WHERE (sender_id = {$sender}) AND (receiver_id = {$receiver}) OR (sender_id = {$receiver}) AND (receiver_id = {$sender})  ORDER BY message_id ASC";
$chat = mysqli_query($connect, $query);

if (mysqli_num_rows($chat) > 0) {
    while ($data = mysqli_fetch_assoc($chat)) {
        // ? jika posisi dalam posisi pengirim maka tampilkan data dibagian pengirim
        if ($data['sender_id'] == $sender) {
            $output .= '<div class="message sender">
                    <div class="message-content">
                        <p>' . $data['message'] . '</p>
                        <div class="img-message">
                            <img src="image/profile/' . $profile_sender['profile'] . '">
                        </div>
                    </div>
                </div>';
        } else {
            $output .= '<div class="message receiver">
                    <div class="message-content">
                        <div class="img-message">
                            <img src="image/profile/' . $profile_receiver['profile'] . '">
                        </div>
                        <p>' . $data['message'] . '</p>
                    </div>
                </div>';
        }
    }
    echo $output;
}
