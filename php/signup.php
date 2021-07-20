<?php
session_start();
include_once "config.php";

function DataPost($name)
{
    return $_POST[$name];
}

$fname = mysqli_real_escape_string($connect, DataPost("firstname"));
$lname = mysqli_real_escape_string($connect, DataPost("lastname"));
$email = mysqli_real_escape_string($connect, DataPost("email"));
$password = mysqli_real_escape_string($connect, DataPost("password"));

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // ? check valid email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "$email - this is not valid email";
    } else {
        //? check email apakah sudah ada di database atau belum
        $sql = mysqli_query($connect, "SELECT email FROM users WHERE email = '{$email}'");
        $email_check = mysqli_num_rows($sql);

        // ? jika email sudah ada
        if ($email_check > 0) {
            echo "$email - is already exist!";
        } else {
            // ? check jika users mengupload file
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name']; // ? ambil nama image
                $img_type = $_FILES['image']['type']; // ? ambil jenis image
                $tmp_name = $_FILES['image']['tmp_name']; // ? untuk memindahkan lokasi file

                // ? pisah nama dan tipe data pada file gambar seperti JPG PNG
                $img_explode = explode(".", $img_name);
                $img_ext = end($img_explode); // ? mengambil tipe gambar

                // ? membuat extension untuk mengecek kondisi gambar jika sudah sesuai
                $extension = ["jpg", "png", "jpeg"];

                // TODO cocokan tipe data pada gambar file dan tipe data pada extension
                if (in_array($img_ext, $extension)) {
                    // ? ambil waktu ketika user mengupload file gambar krn digunakan sebagai nama unique pada gambar
                    $current_upload = time();

                    // ? ubah nama file
                    $new_img_name = $current_upload . $fname . "." . $img_ext;
                    if (move_uploaded_file($tmp_name, "../image/profile/" . $new_img_name)) {
                        // ? jika gambar berhasil dipindahkan ke folder yg ditentukan maka status user menjadi aktif
                        $status = "active";
                        $random_id = rand(time(), 10000000); // ? buat id acak utk user
                        $password_enkripsi = password_hash($password, PASSWORD_DEFAULT);

                        $create_data_users = mysqli_query($connect, "INSERT INTO users (unique_id, fname, lsname, email, password,profile, status) VALUES ({$random_id},
                        '{$fname}',
                        '{$lname}',
                        '{$email}',
                        '{$password_enkripsi}',
                        '{$new_img_name}',
                        '{$status}')");

                        // ? jika data berhasil di input ke database
                        if ($create_data_users) {
                            $find_users = mysqli_query($connect, "SELECT * FROM users WHERE email = '{$email}'");

                            if (mysqli_num_rows($find_users)) {
                                $row = mysqli_fetch_assoc($find_users);
                                // ? gunakan unique id pada seasson 
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                        } else {
                            echo "failed to created users " . var_dump($create_data_users);
                        }
                    }
                } else {
                    echo "please select an image file - JPG , PNG , JPEG";
                }
            } else {
                echo "please select an image files!";
            }
        }
    }
} else {
    echo "all input field are required!";
}
