    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0;url=index.php">
        <title>تسجيل دخول</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                margin: 0;
                padding: 0;
                background: linear-gradient(to bottom, #ffffff, rgb(130, 188, 211));
                color: #333;
            }

            #loginForm {
                /* display: none; /* مخفي بشكل افتراضي */
                text-align: center;
                background: #f7f7f7;
                padding: 20px;
                border: 1px solid #004080;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                margin: 20px auto;
                width: 50%;
            }

            input[type="text"],
            input[type="password"] {
                margin: 10px 0;
                padding: 10px;
                width: 80%;
                border: 1px solid #004080;
                border-radius: 5px;
            }

            input[type="submit"] {
                background-color: #004080;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #003366;
            }


            .form-input,
            .form-select {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #aaa;
                border-radius: 5px;
                box-sizing: border-box;
            }

            .form-button {
                width: 100%;
                background: linear-gradient(to right, #004080, #007BFF);
                color: white;
                padding: 10px;
                font-family: Arial, sans-serif;
                font-size: large;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .form-label {
                font-size: large;
                font-weight: bold;
                display: block;
                margin-bottom: 10px;
            }

            .form-button:hover {
                background: linear-gradient(to right, #003366, #0056b3);
                transform: scale(1.02);
            }

            h1,
            h2 {
                color: #004080;
                text-align: center;
            }

            p,
            .content {
                margin: 20px auto;
                width: 80%;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>M.E.T University</h1>
        <h2>Computers & Informations Science College</h2>


        <div class="content">

            <p>.مرحبًا بكم في موقع معهد مصر العالي للتجارة والحاسبات .!</p>
            <img src="لوجو2.jpg" width="250">

        </div>
        <div id="loginForm">
            <h2>تسجيل الدخول</h2>
            <form action="login.php" method="post">
                <input type="text" name="name" placeholder="اسم المستخدم" required><br>
                <input type="password" name="pass" placeholder="كلمة المرور" required><br>
                <input type="submit" name="log" value="تسجيل الدخول">
            </form>
            <p>لا تملك حسابًا؟ <a href="register.php" class="btn">إنشاء حساب جديد</a></p>
        </div>
    </body>

    </html>
    <?php
    session_start(); // بدء الجلسة للمستخدم

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['log'])) {
        require_once 'connection.php';

        $username = trim($_POST['name']);
        $password = trim($_POST['pass']); // ❌ بدون تشفير

        if (!$link) {
            die("⚠️ خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error());
        }

        // ✅ البحث عن المستخدم وكلمة المرور بدون تشفير
        $stmt = mysqli_prepare($link, "SELECT password FROM users WHERE name = ?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) { // ✅ فقط إذا كان الحساب موجود
                mysqli_stmt_bind_result($stmt, $stored_password);
                mysqli_stmt_fetch($stmt);

                // ✅ تحقق من تطابق كلمة المرور المدخلة
                if ($password === $stored_password) {
                    session_regenerate_id(true); // تعزيز أمان الجلسة
                    $_SESSION['username'] = $username;
                    echo "<script>alert('🎉 تم تسجيل الدخول بنجاح!');</script>";
                    header("Location: home.php"); // التوجيه إلى الصفحة الرئيسية
                    exit;
                } else {
                    echo "<script>alert('❌ Incorrect password! Please try again.');</script>";
                }
            } else {
                echo "<script>alert('🚨 Invalid username! Please check and try again.');</script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('⚠️ خطأ في تنفيذ الاستعلام!');</script>";
        }

        mysqli_close($link);
    }
    ?>
