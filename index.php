<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อและเข้าพัก</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-6 md:p-12">

    <?php
        include "action/connect.php";

        $sql = "SELECT * FROM orders";
        $result = mysqli_query($con, $sql);
    ?>

    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">📊 รายการข้อมูลการจองห้องพัก</h1>
            <p class="text-sm text-gray-500 mt-1">แสดงรายละเอียดผู้เข้าพัก สถานะการชำระเงิน และห้องพัก (สามารถคลิกที่เลขห้องหรือรูปภาพเพื่อดูรายละเอียดห้องได้)</p>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium">รหัสรายการ</th>
                        <th scope="col" class="px-6 py-4 font-medium">ชื่อผู้เข้าพัก</th>
                        <th scope="col" class="px-6 py-4 font-medium">ชำระเงิน</th>
                        <th scope="col" class="px-6 py-4 font-medium">ประเภท</th>
                        <th scope="col" class="px-6 py-4 font-medium">ห้อง</th>
                        <th scope="col" class="px-6 py-4 font-medium text-center">ภาพ</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            foreach($result as $order){
                    ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-semibold text-gray-900">
                                    #<?= htmlspecialchars($order["order_id"]) ?>
                                </td>
                                <td class="px-6 py-4 text-gray-700 font-medium">
                                    <?= htmlspecialchars($order["name"]) ?>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                        <?= htmlspecialchars($order["payment"]) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <?= htmlspecialchars($order["usage_type"]) ?>
                                </td>
                                
                                <td class="px-6 py-4 font-mono text-blue-600 font-medium">
                                    <a href="room.php?id=<?= urlencode($order["room_id"]) ?>" class="inline-flex items-center gap-1 hover:underline hover:text-blue-800">
                                        🚪 <?= htmlspecialchars($order["room_id"]) ?>
                                    </a>
                                </td>
                                
                                <td class="px-6 py-4 flex justify-center">
                                    <a href="room.php?id=<?= urlencode($order["room_id"]) ?>" class="block transform hover:scale-105 transition-transform duration-200">
                                        <div class="w-32 h-20 rounded-lg overflow-hidden shadow-sm border border-gray-100">
                                            <img 
                                                src="<?= htmlspecialchars($order["image"]) ?>" 
                                                class="w-full h-full object-cover"
                                                alt="Room Image"
                                                onerror="this.src='https://placehold.co/600x400?text=No+Image'"
                                            >
                                        </div>
                                    </a>
                                </td>
                            </tr>
                    <?php
                            }
                        } else {
                    ?>
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-400">
                                📭 ไม่พบข้อมูลรายการในขณะนี้
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>