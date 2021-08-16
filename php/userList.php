<?php
while ($data = mysqli_fetch_assoc($userList)) {
    // ? menampilkan data paling depan dari pesan user lain dan user yang login
    $recentMessage = "SELECT * FROM message_db WHERE (sender_id = '{$data['unique_id']}' OR
receiver_id = '{$data['unique_id']}') AND (sender_id = '{$sender_id}' OR
receiver_id = '{$sender_id}') ORDER BY message_id DESC LIMIT 1";

    $recentQuery = mysqli_query($connect, $recentMessage);
    $row2 = mysqli_fetch_assoc($recentQuery);
    $resultMessage = (mysqli_num_rows($recentQuery) > 0) ? $row2['message'] : "no message available";
    $user = (mysqli_num_rows($recentQuery) > 0) ? $row2['sender_id'] : "";

    // ? menampilkan pesan jika kata lebih dari 28 huruf
    (strlen($resultMessage) > 0) ? $message = substr($resultMessage, 0, 28) . '...' : $message = $resultMessage;

    ($sender_id == $user) ? $userRecent = "you: " : $userRecent = "";

    $output .= '<div class="content">
    <a href="chat.php?user_id=' . $data['unique_id'] . '" class="stretched-link"></a>
    <div class="picture">
        <i class="circle-icon"></i>
        <div class="img-thumb">
            <img src="image/profile/' . $data['profile'] . '">
        </div>
    </div>
    <div class="details">
        <h6 class="text-capitalize">' . $data['fname'] . " " . $data['lsname'] . '</h6>
        <span class="message-current">' . $userRecent . $message . '</span>
    </div>
</div>';
}
