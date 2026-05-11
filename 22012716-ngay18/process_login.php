<?php

session_start();

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        die("Vui lòng nhập đầy đủ thông tin!");
    }

    $sql = "SELECT * FROM users WHERE username = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["full_name"] = $user["full_name"];

            header("Location: home.php");
            exit();

        } else {
            echo "Sai mật khẩu!";
        }

    } else {
        echo "Username không tồn tại!";
    }

}

?>