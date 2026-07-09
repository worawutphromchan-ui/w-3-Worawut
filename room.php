<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดห้องพัก</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#ffffff;
            padding:40px;
        }

        h2{
            text-align:center;
            color:#333;
            margin-bottom:25px;
            font-size:28px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:#fff;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
            margin-bottom: 20px;
        }

        thead{
            background:#4b6cb7;
            color:#fff;
        }

        th{
            padding:15px;
            font-size:16px;
        }

        td{
            padding:12px;
            text-align:center;
            border:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f8f8f8;
        }

        .btn-link{
            display:inline-block;
            padding:12px 24px;
            background:#4b6cb7;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
        }

        .btn-link:hover{
            background:#3558a6;
        }
    </style>

</head>
<body>

    <?php
        include "action/connect.php";

        // ตรวจสอบว่ามีการส่งค่ารหัสห้อง (id) มาทาง URL หรือไม่
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $room_id = mysqli_real_escape_string($con, $_GET['id']);
            // ดึงข้อมูลเฉพาะห้องที่เลือก
            $sql = "SELECT * FROM rooms WHERE room_id = '$room_id'";
            $title_text = "รายละเอียดห้องพัก: " . htmlspecialchars($room_id);
        } else {
            // ถ้าไม่มีการส่งค่ามา ให้แสดงห้องพักทั้งหมดเหมือนเดิม
            $sql = "SELECT * FROM rooms";
            $title_text = "รายการห้องพักทั้งหมด";
        }

        $result = mysqli_query($con, $sql);
    ?>

    <h2><?= $title_text ?></h2>

    <table border="1">
        <thead>
            <tr>
                <th>Room ID</th>
                <th>Smoke</th>
                <th>ประเภทอ่าง</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (mysqli_num_rows($result) > 0) {
                foreach($result as $rooms){
        ?>
                <tr>
                    <td><?= htmlspecialchars($rooms["room_id"]) ?></td>
                    <td><?= htmlspecialchars($rooms["smoke"]) ?></td>
                    <td><?= htmlspecialchars($rooms["bathtub"]) ?></td>
                    <td><?= number_format($rooms["price"], 2) ?> บาท</td>
                </tr>
        <?php
                }
            } else {
        ?>
            <tr>
                <td colspan="4" style="padding: 20px; color: #999;">ไม่พบข้อมูลห้องพักที่ระบุ</td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    <a href="index.php" class="btn-link">⬅ กลับไปหน้าหลัก</a>

</body>
</html>