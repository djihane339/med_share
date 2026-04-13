<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); } 
?>
<nav style="background:#27ae60; padding:15px; text-align:center; border-radius:10px; margin-bottom:20px;">
    <a href="index.php" style="color:white; text-decoration:none; margin:0 10px; font-weight:bold;">🏠 الرئيسية</a>
    
    <a href="add.php" style="color:white; text-decoration:none; margin:0 10px; font-weight:bold;">➕ إضافة دواء</a>

    <?php if(isset($_SESSION['admin'])): ?>
        <span style="color:#f1c40f; font-weight:bold;">[وضع المدير 🛡️]</span>
        <a href="logout.php" style="color:#ffcccc; text-decoration:none; margin:0 10px; font-weight:bold;">🚪 خروج</a>
    <?php else: ?>
        <a href="login.php" style="color:white; text-decoration:none; margin:0 10px; font-weight:bold;">🔐 دخول الإدارة</a>
    <?php endif; ?>
</nav>