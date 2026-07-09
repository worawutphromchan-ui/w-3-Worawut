<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการห้องพัก</title>

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

        tr:hover{
            background:#edf4ff;
            transition:.2s;
        }

        .btn-link{
            display:inline-block;
            margin-top:25px;
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

    <h2>รายการห้องพัก</h2>

    <?php
        include "action/connect.php";

        $sql ="SELECT * FROM rooms";
        $result = mysqli_query($con,$sql);
        //var_dump($result);
    ?>

    <table border="1">
        <thead>
            <th>Room ID</th>
            <th>Smoke</th>
            <th>ประเภทอ่าง</th>
            <th>Price</th>
        </thead>

        <?php
            foreach($result as $rooms){
        ?>
            <tr>
                <td><?= $rooms["room_id"] ?></td>
                <td><?= $rooms["smoke"] ?></td>
                <td><?= $rooms["bathtub"] ?></td>
                <td><?= $rooms["price"] ?></td>
            </tr>
        <?php
            }
        ?>

    </table>

    <a href="index.php" class="btn-link">ไปหน้า Index</a>

</body>
</html>