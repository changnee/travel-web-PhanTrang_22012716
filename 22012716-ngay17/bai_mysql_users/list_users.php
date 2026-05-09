<?php

include "db.php";

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách người dùng</title>

    <style>

        body{
            font-family: Arial;
            background-color: #f2f2f2;
            padding: 30px;
        }

        h2{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td{
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th{
            background-color: #007bff;
            color: white;
        }

    </style>

</head>
<body>

    <h2>DANH SÁCH NGƯỜI DÙNG</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
        </tr>

        <?php

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";

                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["full_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='6'>Không có dữ liệu</td>";
            echo "</tr>";
        }

        ?>

    </table>

</body>
</html>