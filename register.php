<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب جديد</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background: linear-gradient(to bottom, #ffffff, rgb(130, 188, 211));
            text-align: center;
            margin: 0;
            padding: 0;
            color: #333;
        }

        #registerForm {
            background: white;
            padding: 25px;
            border: 1px solid #004080;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 40%;
            margin: 50px auto;

        }

        h2,
        h1 {
            font-size: 26px;
            color: #004080;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 85%;
            background: linear-gradient(to right, #008040, #00A86B);
            color: white;
            font-size: 18px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #006633, #008040);
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <h1>M.E.T University</h1>
    <h2>Computers & Informations Science College</h2>


    <div class="content">

        <p> .مرحبًا بكم في موقع معهد مصر العالي للتجارة والحاسبات .!</p>
        <img src="لوجو2.jpg" width="250">
        <div id="registerForm">
            <h2>إنشاء حساب جديد</h2>
            <form action="register.php" method="post">
                <input type="text" name="username" placeholder="اسم المستخدم" required><br>
                <input type="password" name="password" placeholder="كلمة المرور" required><br>
                <input type="submit" name="register" value="إنشاء الحساب">
            </form>

        </div>
</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    require_once 'connection.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']); // ❌ بدون تشفير

    if (!$link) {
        die("⚠️ خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error());
    }

    // ✅ التحقق إذا كان اسم المستخدم موجودًا مسبقًا
    $check_stmt = mysqli_prepare($link, "SELECT name FROM users WHERE name = ?");
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        echo "<script>alert('⚠️ اسم المستخدم موجود بالفعل، استخدم اسمًا آخر!');</script>";
    } else {
        // ✅ إدراج الحساب الجديد بدون تشفير كلمة المرور
        $stmt = mysqli_prepare($link, "INSERT INTO users (name, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        /* if (mysqli_stmt_execute($stmt)) {
            echo "🎉 تم إنشاء الحساب بنجاح!";
            sleep(5);
            header("Location: login.php"); 
            exit;
        */
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
            alert('🚀 Your account has been successfully created! Welcome aboard! 🎉');
            setTimeout(function() {
                window.location.href='login.php';
            }, 3000); // ✅ انتظار 3 ثوانٍ قبل التوجيه
          </script>";
            exit;
        } else {
            echo "❌ خطأ في التسجيل: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_stmt_close($check_stmt);
    mysqli_close($link);
}
?>