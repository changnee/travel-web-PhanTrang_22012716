<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form đặt tour cơ bản</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: darkblue;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            font-size: 16px;
        }

        .ketqua {
            margin-top: 20px;
            background-color: #e8f5e9;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM ĐẶT TOUR</h2>

    <form method="POST">

        <label>Họ tên</label>
        <input type="text" name="hoten">

        <label>Điểm đến</label>
        <input type="text" name="diemden">

        <label>Số người</label>
        <input type="number" name="songuoi">

        <button type="submit">Đặt tour</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $hoten = $_POST["hoten"];
        $diemden = $_POST["diemden"];
        $songuoi = $_POST["songuoi"];

        echo "<div class='ketqua'>";
        echo "<h3>Thông tin đặt tour</h3>";
        echo "Họ tên khách hàng: " . $hoten . "<br><br>";
        echo "Điểm đến: " . $diemden . "<br><br>";
        echo "Số người: " . $songuoi;
        echo "</div>";
    }

    ?>

</div>

</body>
</html>
```
