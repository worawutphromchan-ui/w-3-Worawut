<?php

$name = $_POST["name"];
$payment = $_POST["payment"];
$usage_type = $_POST["usage_type"];
$image = $_POST["image"];
$room_id = $_POST["room_id"];
$order_id = $_POST['order_id'];

include "connect.php";

// แก้ไข Syntax Error และเรียงลำดับตัวแปรให้ถูกต้อง
$sql = "UPDATE orders
        SET 
            name = '$name',
            payment = '$payment',
            usage_type = '$usage_type',
            room_id = '$room_id',
            image = '$image'
        WHERE order_id = '$order_id'";

// ลบ echo $sql; ออกแล้ว เพื่อให้ header("location: ...") ทำงานได้ตามปกติ
$result = mysqli_query($con, $sql);

if (!$result) {
    // แสดงข้อความ Error จาก MySQL เพื่อช่วยในกำร Debug
    echo "Error: " . mysqli_error($con);
} else {
    header("location: ../manage_order.php");
    exit;
}
?>