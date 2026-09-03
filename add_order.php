<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มรายการจองห้องพัก - WORAWUT SPACE</title>
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

        /* ---------------- Form Container ---------------- */
        .container {
            padding: 40px 20px;
        }

        .card {
            max-width: 580px;
            margin: 0 auto;
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            border: 1px solid rgba(139, 92, 246, 0.25);
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.2), inset 0 0 15px rgba(56, 189, 248, 0.05);
            overflow: hidden;
        }

        .card-header {
            background: rgba(30, 27, 75, 0.6);
            padding: 32px 36px 28px;
            border-bottom: 1px solid rgba(139, 92, 246, 0.3);
        }

        .card-header h1 {
            font-size: 24px;
            margin: 0 0 6px 0;
            background: linear-gradient(135deg, #38bdf8 0%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(192, 132, 252, 0.3);
        }

        .card-header p.subtitle {
            margin: 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .card-body {
            padding: 32px 36px 36px;
        }

        /* ---------------- Form Controls ---------------- */
        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
            margin-top: 20px;
            color: #c084fc;
            letter-spacing: 0.5px;
        }

        label:first-of-type {
            margin-top: 0;
        }

        input[type="text"],
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
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input[type="text"]::placeholder {
            color: #64748b;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.4);
        }

        select {
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2338bdf8' stroke-width='2.5'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 16px;
            padding-right: 38px;
        }

        select option {
            background: #0f172a;
            color: #f8fafc;
        }

        /* ---------------- Actions & Buttons ---------------- */
        .actions {
            margin-top: 32px;
            display: flex;
            gap: 12px;
        }

        button {
            flex: 1;
            padding: 13px 20px;
            font-size: 15px;
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

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 18px;
            font-size: 14px;
            font-weight: 700;
            color: #38bdf8;
            background: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            background: rgba(56, 189, 248, 0.15);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.3);
            color: #7dd3fc;
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
            <a href="manage_order.php">จัดการการเช่าพัก</a>
            <a href="add_order.php" class="active">เพิ่มข้อมูลการเช่าพัก</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>🛸 เพิ่มรายการจองห้องพัก</h1>
                <p class="subtitle">กรอกข้อมูลผู้เข้าพักและเลือกห้องพักในระบบ</p>
            </div>

            <div class="card-body">
                <form action="action/insert_order.php" method="post">

                    <label for="name">ชื่อผู้เข้าพัก</label>
                    <input type="text" id="name" name="name" placeholder="ชื่อ-นามสกุล">

                    <label for="payment">การจ่ายเงิน</label>
                    <input type="text" id="payment" name="payment" placeholder="เช่น โอน / เงินสด">

                    <label for="usage_type">ประเภทการใช้งาน</label>
                    <input type="text" id="usage_type" name="usage_type" placeholder="เช่น ชั่วคราว / รายเดือน">

                    <label for="image">ภาพผู้เข้าพัก</label>
                    <input type="text" id="image" name="image" placeholder="ลิงก์รูปภาพ (URL)">

                    <?php
                        include "action/connect.php";

                        $sql = "SELECT * FROM rooms";
                        $result = mysqli_query($con, $sql);
                    ?>

                    <label for="room_id">เลือกห้องพัก</label>
                    <select name="room_id" id="room_id">
                        <?php foreach($result as $room): ?>
                            <option value="<?= $room["room_id"] ?>">
                                ห้อง <?= $room["room_id"] ?> | สูบบุหรี่: <?= $room["smoke"] ?> | ประเภท: <?= $room["room_type"] ?> | ราคา: <?= number_format($room["price"]) ?> บาท
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="actions">
                        <a href="manage_order.php" class="back-link">← ดูรายการทั้งหมด</a>
                        <button type="submit">💾 บันทึกข้อมูล</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>