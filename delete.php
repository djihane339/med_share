<?php
// 1. بدء الجلسة للتحقق من هوية المدير
session_start();

// 2. حماية الملف: إذا حاول شخص غريب دخوله، يتم طرده لصفحة الدخول
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// 3. التأكد من وجود رقم الدواء (ID) في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 4. تنفيذ أمر الحذف من قاعدة البيانات
    $sql = "DELETE FROM medicines WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // إذا نجح الحذف، العودة للرئيسية مع رسالة تنبيه بسيطة
        echo "<script>alert('تم حذف الدواء بنجاح 🗑️'); window.location.href='index.php';</script>";
    } else {
        echo "خطأ أثناء الحذف: " . mysqli_error($conn);
    }
} else {
    // إذا حاول شخص دخول الصفحة بدون تحديد رقم دواء
    header("Location: index.php");
}
?>