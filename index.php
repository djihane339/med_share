<?php session_start(); include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>منصة مشاركة الأدوية | الرئيسية</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section class="hero">
        <h1>مرحباً بك في منصة مشاركة الأدوية 💊</h1>
        <p>ابحث عن الدواء الذي تحتاجه وتواصل مع الصيدلية المانحة.</p>
    </section>

    <div class="search-container">
        <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="🔍 ابحث عن اسم الدواء...">
    </div>

    <div class="container">
        <div class="grid">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM medicines ORDER BY id DESC");
            while($row = mysqli_fetch_assoc($result)) {
                $cat = $row['category'];
                $icon = ($cat == "أقراص") ? "💊" : (($cat == "شراب") ? "🧪" : "📦");
            ?>
                <div class="card">
                    <div class="card-header">متوفر حالياً</div>
                    <div class="card-body">
                        <span class="badge"><?php echo $icon . " " . $cat; ?></span>
                        <h3><?php echo htmlspecialchars($row['med_name']); ?></h3>
                        <p style="color: #27ae60; font-weight: bold;">📍 المكان: <?php echo htmlspecialchars($row['pharmacy_name']); ?></p>
                        <p>📅 الصلاحية: <b><?php echo $row['expiry_date']; ?></b></p>
                        <p>📦 الكمية: <b><?php echo $row['quantity']; ?></b></p>
                    </div>
                    <?php if(isset($_SESSION['admin'])): ?>
                    <div class="admin-tools">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-link">✏️ تعديل</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('حذف نهائي؟')">🗑️ حذف</a>
                    </div>
                    <?php endif; ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="script.js"></script>
    <footer style="margin-top: 50px; padding: 20px; background: #e9ecef; text-align: center; border-top: 3px solid #28a745; font-family: Arial, sans-serif;">
    <h3 style="color: #28a745; margin-bottom: 10px;">Contact Support / تواصل معنا</h3>
    <p>Email: <strong>support@teryaq.dz</strong> | Phone: <strong>+213 555 00 11 22</strong></p>
    <p style="font-size: 12px; color: #777;">&copy; 2026 Teryaq Project - Medicine Sharing Platform</p>
</footer>
</body> </html>
</body>
</html>