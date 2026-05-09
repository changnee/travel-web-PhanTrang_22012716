<?php
session_start();

$valid_username = "admin";
$valid_password = "Admin@123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo "Không được để trống tên đăng nhập hoặc mật khẩu!";
        exit();
    }

    if ($username == $valid_username && $password == $valid_password) {

        $_SESSION["username"] = $username;

        header("Location: success.php");
        exit();

    } else {

        echo "Sai tên đăng nhập hoặc mật khẩu!";
    }

} else {

    echo "Yêu cầu không hợp lệ!";
}
?>