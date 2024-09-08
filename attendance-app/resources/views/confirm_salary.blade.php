<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>給与確認</title>
    <style>
        body {
            background-image: url('{{ asset('images/background.png') }}');
            background-size: cover;
            background-position: center;
            padding: 0;
            margin: 0;
            font-family: "游明朝", "Yu Mincho", "MS Mincho", "ヒラギノ明朝 Pro", "Hiragino Mincho Pro", serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 8px;
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

        table {
            width: 100%;
            margin-bottom: 1.5rem;
        }

        table th, table td {
            padding: 0.75rem;
            text-align: left;
        }

        table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-primary {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
        {{-- <p> {{ var_export($insertData); }} </p> --}}

    <img src="{{ asset('images/mid_fiels_farm_log.svg') }}" alt="Logo" class="logo">

    <div class="container">
        <h1 class="mb-3">登録情報確認ページ</h1>

        <h5 class="mb-2">基本給料</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach ($tableDataBasicSalary['info'] as $info)
                        <th>{{ $info }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach (['morning', 'afternoon', 'evening'] as $shift)
                    <tr>
                        @foreach ($tableDataBasicSalary[$shift] as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="mb-2">ボーナス給料</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach ($tableDataBonusSalary['info'] as $info)
                        <th>{{ $info }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach (['morning', 'afternoon', 'evening'] as $shift)
                    <tr>
                        <td>{{ $tableDataBonusSalary[$shift][0] }}</td>
                        <td>{{ $tableDataBonusSalary[$shift][$shift . 'BonusSalary'] }}</td>
                        <td>{{ $tableDataBonusSalary[$shift][$shift . 'DelayBonusSalary'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('salary.registered') }}" method="POST" onsubmit="disableSubmitButton(this)">
            @csrf
            <input type="hidden" name="insertData" value="{{ $insertData }}">

            <button type="submit" class="btn btn-primary">登録</button>
            <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
        </form>
    </div>

    <script>
        function disableSubmitButton(form) {
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = '登録中...';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
