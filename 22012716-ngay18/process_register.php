<?php

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (
        empty($full_name) ||
        empty($username) ||
        empty($email) ||
        empty($password)
    ) {
        die("Vui lòng nhập đầy đủ thông tin!");
    }

    if (strlen($username) < 4 || strlen($username) > 30) {
        die("Username phải từ 4 đến 30 ký tự!");
    }

    if (strlen($password) < 8) {
        die("Password phải tối thiểu 8 ký tự!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email không hợp lệ!");
    }

    $sql_check = "SELECT id FROM users 
                  WHERE username = ? OR email = ?";

    $stmt = $conn->prepare($sql_check);

    $stmt->bind_param("ss", $username, $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Username hoặc email đã tồn tại!");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO users 
    (username, email, password, full_name)
    VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_insert);

    $stmt->bind_param(
        "ssss",
        $username,
        $email,
        $hashed_password,
        $full_name
    );

    if ($stmt->execute()) {
        echo "Đăng ký thành công! <a href='login.php'>Đăng nhập</a>";
    } else {
        echo "Lỗi đăng ký!";
    }

}

?>