<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>勤怠登録</title>

    <style>
        body {
            background-image: url('{{ asset('images/background.png') }}');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "游明朝", "Yu Mincho", "MS Mincho", "ヒラギノ明朝 Pro", "Hiragino Mincho Pro", serif;
        }

        .custom-container {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 2rem;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            margin: 2rem auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 30px;
            width: 215px;
        }

        .animated-input {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .animated-input:checked + .animated-label {
            background-color: #cce5ff;
            border-radius: 5px;
            padding: 5px;
        }

        .animated-label {
            transition: background-color 0.3s ease, padding 0.3s ease;
            cursor: pointer;
        }

        .text {
            position: absolute;
            top: 75px;
            left: 88px;
            z-index: 5;
            width: 236px,;
            padding-top: 57px;
        }

        /* ハンバーガーメニューのスタイル */
        .hamburger {
            cursor: pointer;
            display: inline-block;
            position: absolute;
            top: 20px;
            right: 50px;
        }

        .hamburger .line {
            width: 30px;
            height: 5px;
            background-color: #333;
            margin: 5px 0;
        }

        .menu {
            display: none;
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #f0f0f0;
            position: absolute;
            top: 50px;
            right: 10px;
            width: 150px;
        }

        .menu li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .menu li:last-child {
            border-bottom: none;
        }

        .menu a {
            text-decoration: none;
            color: #333;
        }

        .menu.show {
            display: block;
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/mid_fiels_farm_log.svg') }}" alt="Logo" class="logo">
    {{-- <img src="{{ asset('images/main_text.png') }}" alt="Main Message" class="text"> --}}

    <ul class="menu" id="menu">
        <li><a href="{{ route('home') }}">ホーム</a></li>
        <li><a href="{{ route('salary.register') }}">給与登録</a></li>
    </ul>

    <div class="hamburger" onclick="toggleMenu()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <div class="custom-container">
        <h1 style="text-align: center;">登録完了！</h1>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('show');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
