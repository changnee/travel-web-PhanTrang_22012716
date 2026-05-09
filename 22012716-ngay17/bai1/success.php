<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập thành công</title>

    <style>

        body{
            margin: 0;
            padding: 0;

            font-family: Arial;
            background-color: #f2f2f2;

            display: flex;
            justify-content: center;
            align-items: center;

            height: 100vh;
        }

        .success-box{
            width: 400px;
            background: white;

            padding: 30px;

            border-radius: 10px;

            text-align: center;

            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2{
            color: green;
        }

        button{
            padding: 10px 20px;

            background-color: red;
            color: white;

            border: none;
            border-radius: 5px;

            cursor: pointer;
        }

        button:hover{
            background-color: darkred;
        }

    </style>

</head>
<body>

    <div class="success-box">

        <h2>Đăng nhập thành công!</h2>

        <p>
            Xin chào:
            <b>
                <?php echo $_SESSION["username"]; ?>
            </b>
        </p>

        <a href="logout.php">
            <button>Đăng xuất</button>
        </a>

    </div>

</body>
</html>