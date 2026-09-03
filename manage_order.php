<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการการเช่าพัก - WORAWUT SPACE</title>
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
        .wrap {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .topbar h1 {
            font-size: 24px;
            margin: 0;
            background: linear-gradient(135deg, #38bdf8 0%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(192, 132, 252, 0.3);
        }

        .add-btn {
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

        .add-btn:hover {
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.6);
            transform: translateY(-2px);
        }

        .card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            padding: 15px;
            border: 1px solid rgba(139, 92, 246, 0.25);
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.2), inset 0 0 15px rgba(56, 189, 248, 0.05);
            overflow-x: auto;
        }

        /* ---------------- Table Space Style ---------------- */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead th {
            text-align: left;
            padding: 14px 18px;
            color: #38bdf8;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: rgba(30, 27, 75, 0.6);
            border-bottom: 2px solid rgba(139, 92, 246, 0.4);
        }

        thead th:first-child {
            border-top-left-radius: 12px;
        }

        thead th:last-child {
            border-top-right-radius: 12px;
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

        .order-id {
            font-weight: 700;
            color: #c084fc;
        }

        .badge {
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

        .thumb {
            width: 52px;
            height: 52px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            border: 1px solid rgba(139, 92, 246, 0.4);
            box-shadow: 0 0 10px rgba(139, 92, 246, 0.2);
        }

        .no-image {
            width: 52px;
            height: 52px;
            border-radius: 10px;
            background: rgba(30, 41, 59, 0.5);
            color: #64748b;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 1px dashed rgba(139, 92, 246, 0.3);
        }

        .actions a {
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            margin-right: 12px;
            transition: all 0.2s ease;
        }

        .actions .edit {
            color: #38bdf8;
        }

        .actions .edit:hover {
            color: #7dd3fc;
            text-shadow: 0 0 8px rgba(56, 189, 248, 0.6);
        }

        .actions .delete {
            color: #f43f5e;
        }

        .actions .delete:hover {
            color: #fda4af;
            text-shadow: 0 0 8px rgba(244, 63, 94, 0.6);
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
            <a href="room.php">ข้อมูลห้องพัก</a>
            <a href="manage_order.php" class="active">จัดการการเช่าพัก</a>
            <a href="add_order.php">เพิ่มข้อมูลการเช่าพัก</a>
        </nav>
    </header>

    <div class="wrap">

        <div class="topbar">
            <h1>🛠️ จัดการข้อมูลการจองห้องพัก</h1>
            <a href="add_order.php" class="add-btn">+ เพิ่มรายการ</a>
        </div>

        <?php
            include "action/connect.php";
            $sql = "SELECT * FROM orders";
            $result = mysqli_query($con, $sql);
        ?>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>รหัสรายการ</th>
                        <th>ชื่อผู้เข้าพัก</th>
                        <th>ชำระเงิน</th>
                        <th>ประเภท</th>
                        <th>ห้อง</th>
                        <th>ภาพ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php foreach ($result as $order): ?>
                        <tr>
                            <td class="order-id">#<?= $order["order_id"] ?></td>
                            <td style="font-weight: 600; color: #f8fafc;"><?= $order["name"] ?></td>
                            <td>
                                <?php if (!empty($order["payment"])): ?>
                                    <span class="badge"><?= $order["payment"] ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $order["usage_type"] ?></td>
                            <td><span class="room-tag"><?= $order["room_id"] ?></span></td>
                            <td>
                                <?php if (!empty($order["image"])): ?>
                                    <img class="thumb" src="<?= $order["image"] ?>" alt="">
                                <?php else: ?>
                                    <div class="no-image">No Image</div>
                                <?php endif; ?>
                            </td>
                            <td class="actions">
                                <a class="edit" href="edit_order.php?id=<?= $order["order_id"] ?>">แก้ไข</a>
                                <a class="delete" href="action/delete_order.php?id=<?= $order["order_id"] ?>" onclick="return confirm('ยืนยันการลบ?');">ลบ</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="empty">ยังไม่มีรายการจอง</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>