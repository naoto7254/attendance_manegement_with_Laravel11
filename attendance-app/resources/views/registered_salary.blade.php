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
    </style>
</head>
<body>
    <img src="{{ asset('images/mid_fiels_farm_log.svg') }}" alt="Logo" class="logo">
    <p>登録完了！！！</p>
    {{-- <p> {{ $insertData }} </p> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
