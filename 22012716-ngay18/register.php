<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
</head>
<body>

<h2>Đăng ký tài khoản</h2>

<form action="process_register.php" method="POST">

    <label>Họ tên:</label><br>
    <input type="text" name="full_name"><br><br>

    <label>Username:</label><br>
    <input type="text" name="username"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Đăng ký</button>

</form>

<br>

<a href="login.php">Đăng nhập</a>

</body>
</html>