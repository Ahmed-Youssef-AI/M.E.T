<?php
    session_start(); // بدء الجلسة

    if (!isset($_SESSION['username'])) {
        header("Location: login.html"); // توجيه المستخدم إلى تسجيل الدخول إذا لم يكن مسجلاً
        exit;
    }

    $username = $_SESSION['username'];
    ?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Computers & Informations Science College, M.E.T University">
    <title>Computers & Informations Science College</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #ffffff, rgb(130, 188, 211));
            color: #333;
        }

        header {
            background-color: #004080;
            padding: 10px 0;
            color: white;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        header nav ul li {
            margin: 0 15px;
        }

        header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            background: linear-gradient(to right, #007BFF, #0056b3);
            border-radius: 5px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
        }

        header nav ul li a:hover {
            background: linear-gradient(to right, #0056b3, #003d73);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            transform: scale(1.1);
        }

        #AboutUs {
            display: none;
            /* مخفي بشكل افتراضي */
            text-align: center;
            background: #f7f7f7;
            padding: 20px;
            border: 1px solid #004080;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            width: 50%;
        }

        #Activites {
            display: none;
            background: linear-gradient(to bottom, #ffffff, rgb(130, 188, 211));
            text-align: center;
            margin-top: 20px;
        }

        #News {
            display: none;
            text-align: center;
        }

        #Home {
            display: none;
            text-align: center;

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

        .register {
            background: #f7f7f7;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 500px;
            margin: 0 auto;
            text-align: right;
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

        .imoga {
            position: absolute;
            top: 0;
            right: 0;
        }

        .welcome-box {
            background: linear-gradient(to left, rgba(255, 255, 255, 0.66), rgba(160, 192, 226, 0.94));
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 50%;
            margin: auto;
        }

        .powered-by {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: black;
            background: linear-gradient(to left, rgb(155, 215, 224), rgba(102, 245, 240, 0.54));
            padding: 0px;
            border-radius: 3px;
            margin-top: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .powered-by a {
            color: blue;
            /* تغيير لون البريد الإلكتروني */
            text-decoration: none;
        }

        .powered-by a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <div class="powered-by">
            <p>🚀 Powered by <strong>Ahmed Youssef</strong> | 📧 Gmail: <a href="Gmail:ahmedyosarhan2004@gmail.com">ahmedyosarhan2004@gmail.com</a></p>
        </div>
        <nav>
            <ul>

                <li><a href="home.php">Welcome, <?php echo htmlspecialchars($username); ?>!</a></li>
                <li><a href="home.php">💌</a></li>
                <li><a href="login.php">تسجيل خروج</a></li>
                <li><a href="#" onclick="showSection('AboutUs')">معلومات عنا</a></li>
                <li><a href="#" onclick="showSection('Activites')">الأنشطة</a></li>
                <li><a href="#" onclick="showSection('News')">الأخبار</a></li>
                <li><a href="#" onclick="showSection('Home')">الرئيسية</a></li>
            </ul>
        </nav>

    </header>

    <h1>M.E.T University</h1>
    <h2>Computers & Informations Science College</h2>


    <div class="content">

        <p>مرحبًا بكم في موقع معهد مصر العالي للتجارة والحاسبات. استكشف المزيد من خلال الأقسام أعلاه ✔✔</p>
        <img src="لوجو2.jpg" width="250">

    </div>
    <div class="welcome-box">
        <br>
        <h1>مرحبًا بك، <?php echo htmlspecialchars($username); ?>! 👋</h1>
        <p style="font-size: 22px;  color: #004080; font-weight: bold;">نتمنى لك يومًا رائعًا !</p>
        <br><br>
    </div>
    
    <div id="Home">
        <p>مرحبًا بكم في موقع معهد مصر العالي للتجارة والحاسبات. استكشف المزيد من خلال الأقسام أعلاه!</p>
        <img src="لوجو2.jpg" width="250">
        <hr>
        <hr>
        <img src="img MET.jpg" width="950">
        <img src="img 3.jpg" width="950">

        <hr>
        <hr>
        <h2>:رؤية المعهد</h2>
        <h3>
            يطمح معهد مصر العالي للتجارة والحاسبات بالمنصورة ان يكون صرحا اكاديميا رائدا محليا واقليميا بأفضل معايير الجودة
        </h3>
        <h2>:رسالة المعهد</h2>
        <h3>
            يسعي معهد مصر العالي للتجارة والحاسبات بالمنصورة الي اعداد كفاءات بشرية مؤهلة علميا ومهنيا في مجالات علوم الحاسب ؛ ونظم معلومات الاعمال والمحاسبة وادارة الاعمال ليكونوا قادرين علي مواكبة التطور العلمي والتكنولوجي وقادرة علي خدمة المجتمع والبحث العلمي وذلك من خلال توفير بيئة محفزة تعليميا في اطار منظومة مرنة تسمح بالتطوير المستمر والمحافظة علي الثوابت التعليمية والأخلاقية.
        </h3>
        <hr>
        <hr>


        <h2>:روابط اخري</h2>
        <a href="https://metmans.edu.eg/" target="_blank" title="Go to website page"> Visit Our Official Website.</a>
        <a href="https://www.facebook.com/groups/met.cs.2025/" target="_blank" title="Go to facebook page"> Visit our official page on Facebook.</a>
        <hr>
        <hr>
        <p style="font-size: 18px; font-weight: bold;"> 🚀 Powered by <strong>Ahmed Youssef</strong> | 📧 Gmail: <a href="Gmail:ahmedyosarhan2004@gmail.com">ahmedyosarhan2004@gmail.com</a></p>

        <img src="img 2.jpg" width="800">
        <hr>
        <hr>
    </div>


    <div id="AboutUs">

        <h2>من نحن؟</h2>
        <p>في <strong>M.E.T University<strong>، نحن نؤمن بأن التكنولوجيا والتعليم هما حجر الأساس لمستقبل مشرق. نحن نقدم بيئة تعليمية حديثة حيث يجتمع الإبداع والتطوير، لتمكين الطلاب من اكتشاف إمكاناتهم وتطوير مهاراتهم<br> في مجالات علوم الحاسب ونظم المعلومات</p>
        <p><strong>مهمتنا؟</strong> توفير تجربة تعليمية تفاعلية تُلهم الإبداع وتعزز الابتكار، مع دعم قوي للبحث العلمي والتطوير المستمر.<strong>انضم إلينا وكن جزءًا من مجتمعنا التعليمي المتميز!</strong></p>

        <<
            <p><strong>السلاب صعبة! <strong>عاوز تتعلم صح روح السلاب بنسمع كتير في كل الاوساط المحيطه بينا الكلام ده؛ هفضل اقول دايما اني بتشرف بانتمائي للمكان ده بكل الي فيه واحد من الاماكن النادره الي مازلت هدفها الاول التعليم سمعتها سبقاها في كل مكان؛ خريجين المكان ليهم مكانه كبيره في اوساطهم الحالية❤</p>
                    <h2 style="text-align: left; font-size: 18px;">البشمهندس احمد الديموكسي</h2>
                    <p style="font-size: 18px; font-weight: bold;"> 🚀 Powered by <strong>Ahmed Youssef</strong> | 📧 Gmail: <a href="Gmail:ahmedyosarhan2004@gmail.com">ahmedyosarhan2004@gmail.com</a></p>

    </div>
    <div id="Activites">

        <h2> نشاط دوري كرة القدم </h2>
        <img src="pngtree-dribbling-soccer-player-on-wallpaper-picture-image_2694713.jpg" width="800">
        <h2><b> يبدأ دوري كرة القدم يوم الخميس الموافق 13/3/2025 علي من يريد الاشتراك التوجه لشؤون الطلبة قبل الموعد المعلن وتسجيل اسم الفريق</b></h2>
        <h3><b>كل فريق يضم 7 طلاب كحد ادني ولا يزيد عن 10 طلاب ؛ جميع الطلاب من داخل المعهد ومن نفس الفرقة الدراسية</b></h3>
        <br><br>
        <hr>
        <hr>
        <br><br>
        <h2>يوم الابداع العالمي</h2>
        <img src="هوايات2.jpg">
        <h2><b>يوم الابداع العالمي هو يوم يتم فيه تلاقي المواهب المختلفة في جميع الهوايات بنهاية كل عام دراسي</b></h2>
        <h3><b>لو عندك هواية معينة وشايف نفسك موهوب فيها زي القراءة والغناء والرسم والموسيقي وغيرها..سجل اسمك وهوايتك المفضلة ولو انت موهوب فعلا هتكسب جوائز قيمة</b></h3>

        <h1>نموذج التسجيل</h1>
        <h1>النموذج يسمح بالتسجيل مرة واحدة فقط💡</h1>
        <form class="register">

            <label for="name" class="form-label">: الاسم</label>
            <input type="text" id="name" name="name" class="form-input" required>
            <label for="hobby" class="form-label">: الهواية المفضلة</label>
            <select id="hobby" name="hobby" class="form-select" required>
                <option value="">-- اختر هوايتك المفضلة --</option>
                <option value="القراءة">القراءة</option>
                <option value="الرسم">الرسم</option>
                <option value="الموسيقى">الموسيقى</option>
                <option value="الغناء">الغناء</option>
                <option value="أخرى">أخرى</option>
            </select>

            <button type="submit" class="form-button">تسجيل</button>
        </form>

        <hr>
        <hr>
        <p style="font-size: 18px; font-weight: bold;"> 🚀 Powered by <strong>Ahmed Youssef</strong> | 📧 Gmail: <a href="Gmail:ahmedyosarhan2004@gmail.com">ahmedyosarhan2004@gmail.com</a></p>
        <hr>
        <hr>
        <hr>
        <hr>
        <hr>
        <hr>
    </div>
    <div id="News">
        <br>
        <img src="لوجو.jpg" width="360" class="imoga">
        <h2>توزيع الاماكن التعليمية</h2>
        <img src="2025-03-09 (4).png" width="700">
        <br>
        <hr>
        <hr><br>
        <h2>جدول الارشاد الأكاديمي</h2>
        <img src="2025-03-09.png" width="600">
        <br>
        <hr>
        <hr><br>
        <h2>هيئة معاونة بنظام المكافأة</h2>
        <img src="2025-03-09 (3).png" width="600">
        <br>
        <hr>
        <hr><br>
        <h2>مسابقة بداية حلم</h2>
        <img src="2025-03-09 (1).png" width="500">
        <hr>
        <hr>

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // ✅ إضافة الحدث إلى النموذج بمجرد تحميل الصفحة
            const form = document.querySelector('.register'); // التأكد من استهداف النموذج الصحيح

            if (form) {
                form.addEventListener('submit', (e) => {
                    e.preventDefault(); // منع إعادة تحميل الصفحة عند الإرسال

                    const name = document.querySelector('#name').value.trim();
                    const hobby = document.querySelector('#hobby').value;

                    if (name === '' || hobby === '') {
                        alert('من فضلك، قم بملء جميع الحقول!');
                        return;
                    }

                    alert(`🎉 تم التسجيل بنجاح! مرحبًا بك يا ${name} وهوايتك المفضلة ${hobby}.`);
                    form.style.display = "none";
                });

            }
        });

        // ✅ وظيفة إظهار الأقسام بشكل منفصل
        function showSection(sectionId) {
            const sections = document.querySelectorAll('div');
            sections.forEach(section => section.style.display = 'none');

            const sectionToShow = document.getElementById(sectionId);
            if (sectionToShow) sectionToShow.style.display = 'block';
        }
    </script>
</body>

</html>