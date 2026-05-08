<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra form đặt tour</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            width: 450px;
            margin: 40px auto;
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

        input, select {
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

        .error {
            color: red;
            margin-top: 15px;
            font-weight: bold;
        }

        .success {
            color: green;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM ĐẶT TOUR</h2>

    <form method="POST">

        <label>Họ tên</label>
        <input type="text" name="hoten">

        <label>Số điện thoại</label>
        <input type="text" name="sodienthoai">

        <label>Email</label>
        <input type="email" name="email">

        <label>Điểm đến</label>
        <select name="diemden">
            <option value="">-- Chọn điểm đến --</option>
            <option value="Đà Lạt">Đà Lạt</option>
            <option value="Nha Trang">Nha Trang</option>
            <option value="Phú Quốc">Phú Quốc</option>
        </select>

        <label>Số người</label>
        <input type="number" name="songuoi">

        <button type="submit">Đặt tour</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $hoten = $_POST["hoten"];
        $sodienthoai = $_POST["sodienthoai"];
        $email = $_POST["email"];
        $diemden = $_POST["diemden"];
        $songuoi = $_POST["songuoi"];

        $loi = "";

        // Kiểm tra họ tên
        if ($hoten == "") {
            $loi .= "Họ tên không được rỗng<br>";
        }

        // Kiểm tra số điện thoại
        if ($sodienthoai == "") {
            $loi .= "Số điện thoại không được rỗng<br>";
        }

        // Kiểm tra email
        if ($email == "") {
            $loi .= "Email không được rỗng<br>";
        }

        // Kiểm tra điểm đến
        if ($diemden == "") {
            $loi .= "Phải chọn điểm đến<br>";
        }

        // Kiểm tra số người
        if ($songuoi == "" || $songuoi <= 0) {
            $loi .= "Số người phải lớn hơn 0<br>";
        }

        // Hiển thị kết quả
        if ($loi != "") {
            echo "<div class='error'>$loi</div>";
        } else {
            echo "<div class='success'>Đặt tour thành công</div>";
        }
    }

    ?>

</div>

</body>
</html>