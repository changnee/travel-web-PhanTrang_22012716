<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tour</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            width: 900px;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: darkblue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        form {
            width: 400px;
            margin: auto;
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
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

        .success {
            color: green;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

        .result {
            margin-top: 20px;
            background-color: #e8f5e9;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>DANH SÁCH TOUR DU LỊCH</h2>

    <?php

    $tours = [
        [
            "matour" => "T01",
            "tentour" => "Tour Đà Lạt",
            "diemden" => "Đà Lạt",
            "giatour" => 2000000,
            "songay" => 3
        ],

        [
            "matour" => "T02",
            "tentour" => "Tour Nha Trang",
            "diemden" => "Nha Trang",
            "giatour" => 2500000,
            "songay" => 4
        ],

        [
            "matour" => "T03",
            "tentour" => "Tour Phú Quốc",
            "diemden" => "Phú Quốc",
            "giatour" => 3500000,
            "songay" => 5
        ],

        [
            "matour" => "T04",
            "tentour" => "Tour Đà Nẵng",
            "diemden" => "Đà Nẵng",
            "giatour" => 3000000,
            "songay" => 4
        ]
    ];

    ?>

    <table>

        <tr>
            <th>Mã tour</th>
            <th>Tên tour</th>
            <th>Điểm đến</th>
            <th>Giá tour</th>
            <th>Số ngày</th>
        </tr>

        <?php
        foreach ($tours as $tour) {
        ?>

        <tr>
            <td><?php echo $tour["matour"]; ?></td>
            <td><?php echo $tour["tentour"]; ?></td>
            <td><?php echo $tour["diemden"]; ?></td>
            <td><?php echo number_format($tour["giatour"]); ?> VNĐ</td>
            <td><?php echo $tour["songay"]; ?></td>
        </tr>

        <?php
        }
        ?>

    </table>


    <h2>FORM ĐẶT TOUR</h2>

    <form method="POST">

        <label>Họ tên</label>
        <input type="text" name="hoten">

        <label>Chọn mã tour</label>
        <select name="matour">
            <option value="">-- Chọn tour --</option>

            <?php
            foreach ($tours as $tour) {
                echo "<option value='".$tour["matour"]."'>".$tour["matour"]." - ".$tour["tentour"]."</option>";
            }
            ?>

        </select>

        <label>Số người</label>
        <input type="number" name="songuoi">

        <button type="submit">Đặt tour</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $hoten = $_POST["hoten"];
        $matour = $_POST["matour"];
        $songuoi = $_POST["songuoi"];

        $loi = "";

        // Kiểm tra họ tên
        if ($hoten == "") {
            $loi .= "Họ tên không được rỗng<br>";
        }

        // Kiểm tra mã tour
        if ($matour == "") {
            $loi .= "Phải chọn mã tour<br>";
        }

        // Kiểm tra số người
        if ($songuoi == "" || $songuoi <= 0) {
            $loi .= "Số người phải lớn hơn 0<br>";
        }

        // Nếu có lỗi
        if ($loi != "") {

            echo "<div class='error'>$loi</div>";

        } else {

            $tourchon = null;

            foreach ($tours as $tour) {

                if ($tour["matour"] == $matour) {
                    $tourchon = $tour;
                }
            }

            $tongtien = $tourchon["giatour"] * $songuoi;

            echo "<div class='result'>";
            echo "<h3>THÔNG TIN ĐẶT TOUR</h3>";
            echo "Họ tên khách hàng: " . $hoten . "<br><br>";
            echo "Tên tour: " . $tourchon["tentour"] . "<br><br>";
            echo "Điểm đến: " . $tourchon["diemden"] . "<br><br>";
            echo "Số người: " . $songuoi . "<br><br>";
            echo "Tổng tiền: " . number_format($tongtien) . " VNĐ";
            echo "</div>";
        }
    }

    ?>

</div>

</body>
</html>