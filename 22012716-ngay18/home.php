<?php

session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
</head>
<body>

<h2>Xin chào <?php echo $_SESSION["full_name"]; ?></h2>

<p>Bạn đã đăng nhập thành công!</p>

<a href="logout.php">Đăng xuất</a>

</body>
</html>