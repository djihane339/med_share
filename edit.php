<?php
session_start(); 
include 'config.php';

// حماية الصفحة: إذا لم يكن هناك تسجيل دخول يرجع لصفحة login
if (!isset($_SESSION['admin'])) { 
    header("Location: login.php"); 
    exit(); 
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM medicines WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['med_name']);
    $ph = mysqli_real_escape_string($conn, $_POST['pharmacy_name']);
    $cat = $_POST['category'];
    $date = $_POST['expiry_date'];
    $qty = $_POST['quantity'];
    
    $sql = "UPDATE medicines SET med_name='$name', pharmacy_name='$ph', category='$cat', expiry_date='$date', quantity='$qty' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('تم تحديث البيانات بنجاح ✅'); window.location.href='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل بيانات الدواء</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .box { background: white; padding: 30px; border-radius: 15px; width: 380px; border-top: 5px solid #3498db; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #3498db; margin-bottom: 20px; }
        label { font-size: 14px; color: #666; display: block; margin-top: 10px; }
        input, select, button { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; font-size: 15px; }
        input:focus { border-color: #3498db; outline: none; }
        button { background: #3498db; color: white; border: none; cursor: pointer; font-weight: bold; transition: 0.3s; margin-top: 20px; }
        button:hover { background: #2980b9; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #888; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="box">
    <h2>✏️ تعديل البيانات</h2>
    <form method="POST">
        <label>اسم الدواء:</label>
        <input type="text" name="med_name" value="<?php echo htmlspecialchars($row['med_name']); ?>" required>
        
        <label>اسم الصيدلية / الموقع:</label>
        <input type="text" name="pharmacy_name" value="<?php echo htmlspecialchars($row['pharmacy_name']); ?>" required>
        
        <label>التصنيف:</label>
        <select name="category">
            <option value="أقراص" <?php if($row['category'] == 'أقراص') echo 'selected'; ?>>أقراص 💊</option>
            <option value="شراب" <?php if($row['category'] == 'شراب') echo 'selected'; ?>>شراب 🧪</option>
            <option value="مرهم" <?php if($row['category'] == 'مرهم') echo 'selected'; ?>>مرهم 🧴</option>
        </select>
        
        <label>تاريخ الصلاحية:</label>
        <input type="date" name="expiry_date" value="<?php echo $row['expiry_date']; ?>" required>
        
        <label>الكمية:</label>
        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required>
        
        <button type="submit" name="update">حفظ التغييرات</button>
        <a href="index.php" class="back-link">إلغاء والعودة للرئيسية</a>
    </form>
</div>

</body>
</html>