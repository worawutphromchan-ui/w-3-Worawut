<?php

$con = mysqli_connect("localhost", "root", "", "manrood_db");

if(!$con){
    die("เชื่อมต่อไม่สำเร็จ");
}
echo "เชื่อมต่อสำเร็จ";
