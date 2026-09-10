<?php
// 1. เชื่อมต่อฐานข้อมูล (เปลี่ยนชื่อไฟล์ตามที่คุณใช้จริง เช่น connect.php หรือ db.php)
require_once 'connect.php'; 

// 2. รับค่า ID จาก URL เช่น edit_order.php?id=11
$order_id = $_GET['id'] ?? null;

// ถ้าไม่มีการส่ง ID มา ให้กลับไปหน้าจัดการ
if (!$order_id) {
    header("Location: manage_order.php");
    exit();
}

// 3. ดึงข้อมูลรายการสั่งซื้อ/การเช่าพักที่ต้องการแก้ไข
$stmt = $conn->prepare("SELECT * FROM order_list WHERE order_id = ?"); // เปลี่ยนชื่อตาราง order_list ให้ตรงกับ DB ของคุณ
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO_FETCH_ASSOC);

// ถ้าค้นหาแล้วไม่เจอข้อมูลใน DB
if (!$order) {
    echo "<script>alert('ไม่พบข้อมูลรายการนี้'); window.location='manage_order.php';</script>";
    exit();
}

// 4. ดึงข้อมูลห้องพักทั้งหมด เพื่อนำมาแสดงในตัวเลือก <select>
$stmt_rooms = $conn->query("SELECT * FROM room"); // เปลี่ยนชื่อตาราง room ให้ตรงกับ DB ของคุณ
$result_rooms = $stmt_rooms->fetchAll(PDO_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="th">
<head>
...

<!DOCTYPE html>


<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรายการสั่งซื้อ - WORAWUT SPACE</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", "Sarabun", Tahoma, sans-serif;
            /* พื้นหลังธีมห้วงอวกาศ */
            background: radial-gradient(circle at 50% 20%, #1a103c 0%, #0b0726 50%, #030014 100%);
            background-attachment: fixed;
            color: #e2e8f0;
        }

        /* ---------------- Navbar Space Style ---------------- */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(11, 7, 38, 0.8);
            backdrop-filter: blur(10px);
            padding: 15px 40px;
            border-bottom: 1px solid rgba(139, 92, 246, 0.3);
            box-shadow: 0 4px 20px rgba(124, 58, 237, 0.15);
        }

        .logo {
            font-weight: 800;
            font-size: 1.2rem;
            color: #38bdf8;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.6), 0 0 20px rgba(139, 92, 246, 0.4);
        }

        .nav-links {
            display: flex;
            gap: 24px;
        }

        .nav-links a {
            text-decoration: none;
            color: #94a3b8;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            color: #38bdf8;
            text-shadow: 0 0 8px rgba(56, 189, 248, 0.8);
        }

        .nav-links a.active {
            color: #c084fc;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(192, 132, 252, 0.8);
        }

        /* ---------------- Main Content ---------------- */
        .container {
            max-width: 650px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            border: 1px solid rgba(139, 92, 246, 0.25);
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.2), inset 0 0 15px rgba(56, 189, 248, 0.05);
            padding: 35px;
        }

        h2 {
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #38bdf8 0%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(192, 132, 252, 0.3);
        }

        /* ---------------- Form Elements ---------------- */
        label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #c084fc;
            letter-spacing: 0.5px;
        }

        select {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            border: 1px solid rgba(139, 92, 246, 0.3);
            border-radius: 10px;
            background: rgba(15, 23, 42, 0.85);
            color: #f8fafc;
            outline: none;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.2);
        }

        select:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.4);
        }

        select option {
            background: #0f172a;
            color: #f8fafc;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        button {
            flex: 1;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
            background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 0 15px rgba(124, 58, 237, 0.4);
            transition: all 0.3s ease;
        }

        button:hover {
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.6);
            transform: translateY(-2px);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 700;
            color: #94a3b8;
            background: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            color: #f8fafc;
            background: rgba(51, 65, 85, 0.8);
        }
    </style>
</head>
<body>

    <!-- Header Navbar -->
    <header class="navbar">
        <div class="logo">🚀 WORAWUT</div>
        <nav class="nav-links">
            <a href="index.php">ข้อมูลการเช่าพัก</a>
            <a href="room.php">ข้อมูลห้องพัก</a>
            <a href="manage_order.php" class="active">จัดการการเช่าพัก</a>
            <a href="add_order.php">เพิ่มข้อมูลการเช่าพัก</a>
        </nav>
    </header>

    <!-- Main Content Container -->
    <div class="container">
        <div class="card">
            <h2>✏️ แก้ไขรายการสั่งซื้อ (#<?= $order['order_id'] ?>)</h2>
            <form action="action/update_order.php" method="post">
                
                <label for="room_id">เลือกห้องพักใหม่</label>
                <select name="room_id" id="room_id">
                    <?php foreach($result_rooms as $room): ?>
                        <option value="<?= $room["room_id"] ?>" <?= $room['room_id'] == $order['room_id'] ? 'selected' : '' ?>>
                            ห้อง <?= $room['room_id'] ?> | 
                            สูบบุหรี่: <?= $room['smoke'] ?> | 
                            ประเภท: <?= $room['room_type'] ?> | 
                            ราคา: <?= number_format($room['price']) ?> บาท
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">

                <div class="btn-group">
                    <button type="submit">💾 บันทึกการเปลี่ยนแปลง</button>
                    <a href="manage_order.php" class="btn-cancel">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>