<?php
while ($data = mysqli_fetch_assoc($userList)) {
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
        <span class="message-current">This is text message</span>
    </div>
</div>';
}
