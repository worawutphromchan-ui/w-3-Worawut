<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลการเช่าพัก - WORAWUT SPACE</title>
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

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 11px 20px;
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
            background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 0 15px rgba(124, 58, 237, 0.4);
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.6);
            transform: translateY(-2px);
        }

        /* ---------------- Table Space Style ---------------- */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        th {
            padding: 14px 18px;
            color: #38bdf8;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: rgba(30, 27, 75, 0.6);
            border-bottom: 2px solid rgba(139, 92, 246, 0.4);
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
            vertical-align: middle;
        }

        tr:hover {
            background: rgba(139, 92, 246, 0.1);
        }

        .order-id {
            color: #c084fc;
            font-weight: 700;
        }

        .badge-payment {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: rgba(192, 132, 252, 0.15);
            color: #c084fc;
            border: 1px solid rgba(192, 132, 252, 0.3);
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

        .img-thumb {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid rgba(139, 92, 246, 0.4);
            box-shadow: 0 0 10px rgba(139, 92, 246, 0.2);
        }
    </style>
</head>
<body>

    <!-- Header Navbar -->
    <header class="navbar">
        <div class="logo">🚀 WORAWUT</div>
        <nav class="nav-links">
            <a href="index.php" class="active">ข้อมูลการเช่าพัก</a>
            <a href="room.php">ข้อมูลห้องพัก</a>
            <a href="manage_order.php">จัดการการเช่าพัก</a>
            <a href="add_order.php">เพิ่มข้อมูลการเช่าพัก</a>
        </nav>
    </header>

    <!-- Main Content Container -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>🌌 รายการข้อมูลการเช่าพัก</h1>
                <a href="add_order.php" class="btn-add">+ เพิ่มการเช่าพัก</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>รหัสรายการ</th>
                        <th>ผู้เข้าพัก</th>
                        <th>ห้องพัก</th>
                        <th>การจ่ายเงิน</th>
                        <th>ประเภทการใช้งาน</th>
                        <th>รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "action/connect.php";

                        // ดึงข้อมูลการจองร่วมกับข้อมูลห้องพัก
                        $sql = "SELECT * FROM orders INNER JOIN rooms ON orders.room_id = rooms.room_id";
                        $result = mysqli_query($con, $sql);

                        if ($result && mysqli_num_rows($result) > 0):
                            foreach ($result as $row):
                    ?>
                        <tr>
                            <td class="order-id">#<?= $row['order_id'] ?></td>
                            <td style="font-weight: 600; color: #f8fafc;"><?= $row['name'] ?></td>
                            <td>
                                <span class="room-tag"><?= $row['room_id'] ?></span>
                                <span style="font-size: 12px; color: #94a3b8; margin-left: 4px;">(<?= number_format($row['price']) ?> บาท)</span>
                            </td>
                            <td>
                                <?php if(!empty($row['payment'])): ?>
                                    <span class="badge-payment"><?= $row['payment'] ?></span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td><?= $row['usage_type'] ?></td>
                            <td>
                                <?php if (!empty($row['image'])): ?>
                                    <img src="<?= $row['image'] ?>" alt="User" class="img-thumb">
                                <?php else: ?>
                                    <span style="color: #64748b; font-size: 12px;">No Image</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php 
                            endforeach; 
                        else:
                    ?>
                        <tr>
                            <td colspan="6" style="text-align: center; color: #64748b; padding: 40px;">ไม่พบข้อมูลการเช่าพัก</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>