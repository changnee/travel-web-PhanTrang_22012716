<?php
$tenTour = "Tour Phú Quốc nghỉ dưỡng";
$giaTour = 4500000;
$soNguoi = 4;

if ($soNguoi <= 0) {
    echo "Số người không hợp lệ";
} else {
    $tongTien = $giaTour * $soNguoi;

    if ($giaTour < 2000000) {
        $phanLoai = "Tour tiết kiệm";
    } elseif ($giaTour <= 4000000) {
        $phanLoai = "Tour tiêu chuẩn";
    } else {
        $phanLoai = "Tour cao cấp";
    }

    echo "<h2>Thông tin tour</h2>";
    echo "Tên tour: $tenTour <br>";
    echo "Giá tour: " . number_format($giaTour) . " VNĐ <br>";
    echo "Số người: $soNguoi <br>";
    echo "Tổng tiền: " . number_format($tongTien) . " VNĐ <br>";
    echo "Phân loại: $phanLoai <br>";
}
?>