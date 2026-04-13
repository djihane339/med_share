<?php
include 'config.php';
if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['med_name']);
    $ph_name = mysqli_real_escape_string($conn, $_POST['pharmacy_name']);
    $cat = $_POST['category'];
    $date = $_POST['expiry_date'];
    $qty = $_POST['quantity'];
    
    $sql = "INSERT INTO medicines (med_name, pharmacy_name, category, expiry_date, quantity) VALUES ('$name', '$ph_name', '$cat', '$date', '$qty')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('تم إضافة الدواء بنجاح ✅'); window.location.href='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><meta charset="UTF-8"><title>تبرع بدواء</title>
<style>
    body { font-family: sans-serif; background: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
    .box { background: white; padding: 25px; border-radius: 15px; width: 350px; border-top: 5px solid #27ae60; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    input, select, button { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
    button { background: #27ae60; color: white; border: none; cursor: pointer; font-weight: bold; }
</style>
</head>
<body>
<div class="box">
    <h2 style="text-align:center; color:#27ae60;">➕ تبرع بدواء</h2>
    <form method="POST">
        <input type="text" name="med_name" placeholder="اسم الدواء (مثال: دوليبران)" required>
        <input type="text" name="pharmacy_name" placeholder="اسم الصيدلية أو موقعك" required>
        <select name="category">
            <option value="أقراص">أقراص 💊</option>
            <option value="شراب">شراب 🧪</option>
            <option value="مرهم">مرهم 🧴</option>
        </select>
        <input type="date" name="expiry_date" required>
        <input type="number" name="quantity" placeholder="الكمية المتوفرة" required>
        <button type="submit" name="add">تأكيد التبرع</button>
        <a href="index.php" style="display:block; text-align:center; color:#999; text-decoration:none;">رجوع</a>
    </form>
</div>
</body>
</html>