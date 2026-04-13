<?php
include 'config.php';
session_start();

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // التأكد من بيانات المدير
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
    
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $user;
        header("Location: index.php");
        exit();
    } else {
        $error = "اسم المستخدم أو كلمة السر خاطئة!";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول - الإدارة</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border-top: 5px solid #27ae60; text-align: center; width: 320px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { background: #27ae60; color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; width: 100%; font-size: 16px; font-weight: bold; }
        button:hover { background: #219150; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🔐 دخول الإدارة</h2>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="اسم المستخدم" required>
            <input type="password" name="password" placeholder="كلمة السر" required>
            <button type="submit" name="login">تسجيل الدخول</button>
        </form>
    </div>
</body>
</html>