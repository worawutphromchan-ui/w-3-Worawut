<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลห้องพัก - WORAWUT SPACE</title>

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

        /* ---------------- Main Container ---------------- */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            border: 1px solid rgba(139, 92, 246, 0.25);
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.2), inset 0 0 15px rgba(56, 189, 248, 0.05);
            overflow: hidden;
            padding: 30px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .card-header h1 {
            font-size: 24px;
            margin: 0;
            background: linear-gradient(135deg, #38bdf8 0%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(192, 132, 252, 0.3);
        }

        /* ---------------- Table Style ---------------- */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        thead th {
            padding: 14px 18px;
            color: #38bdf8;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: rgba(30, 27, 75, 0.6);
            border-bottom: 2px solid rgba(139, 92, 246, 0.4);
        }

        tbody td {
            padding: 14px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: rgba(139, 92, 246, 0.1);
        }

        .room-tag {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 8px;
            background: rgba(56, 189, 248, 0.15);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.3);
            font-weight: 700;
        }

        .badge-smoke {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: rgba(244, 63, 94, 0.15);
            color: #f43f5e;
            border: 1px solid rgba(244, 63, 94, 0.3);
        }

        .badge-no-smoke {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .price-text {
            font-weight: 700;
            color: #f8fafc;
        }

        .actions {
            margin-top: 24px;
        }

        .btn-link {
            display: inline-flex;
            align-items: center;
            padding: 11px 20px;
            background: rgba(30, 41, 59, 0.6);
            color: #38bdf8;
            text-decoration: none;
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-link:hover {
            background: rgba(56, 189, 248, 0.15);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.3);
            color: #7dd3fc;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }
    </style>
</head>
<body>

    <!-- Header Navbar -->
    <header class="navbar">
        <div class="logo">🚀 WORAWUT</div>
        <nav class="nav-links">
            <a href="index.php">ข้อมูลการเช่าพัก</a>
            <a href="room.php" class="active">ข้อมูลห้องพัก</a>
            <a href="manage_order.php">จัดการการเช่าพัก</a>
            <a href="add_order.php">เพิ่มข้อมูลการเช่าพัก</a>
        </nav>
    </header>

    <?php
        include "action/connect.php";

        // ตรวจสอบว่ามีการส่งค่ารหัสห้อง (id) มาทาง URL หรือไม่
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $room_id = mysqli_real_escape_string($con, $_GET['id']);
            $sql = "SELECT * FROM rooms WHERE room_id = '$room_id'";
            $title_text = "รายละเอียดห้องพัก: " . htmlspecialchars($room_id);
        } else {
            $sql = "SELECT * FROM rooms";
            $title_text = "รายการข้อมูลห้องพักทั้งหมด";
        }

        $result = mysqli_query($con, $sql);
    ?>

    <!-- Main Content Container -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>🛸 <?= $title_text ?></h1>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Smoke</th>
                        <th>ประเภทอ่าง</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php foreach($result as $rooms): ?>
                        <tr>
                            <td><span class="room-tag"><?= htmlspecialchars($rooms["room_id"]) ?></span></td>
                            <td>
                                <?php if (strtolower($rooms["smoke"]) == 'yes' || $rooms["smoke"] == 'สูบบุหรี่ได้'): ?>
                                    <span class="badge-smoke">สูบบุหรี่ได้</span>
                                <?php else: ?>
                                    <span class="badge-no-smoke">ห้ามสูบบุหรี่</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($rooms["bathtub"]) ?></td>
                            <td class="price-text"><?= number_format($rooms["price"]) ?> บาท</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="empty">ไม่พบข้อมูลห้องพักที่ระบุ</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

            <div class="actions">
                <a href="index.php" class="btn-link">← กลับไปหน้าหลัก</a>
            </div>
        </div>
    </div>

</body>
</html>