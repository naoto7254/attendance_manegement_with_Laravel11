<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Confirm Salary</title>
    <style>
        body {
            background-image: url('{{ asset('images/background.png') }}');
            background-size: cover;
            background-position: center;
            padding: 0;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 8px;
            max-width: 800px;
            margin: 2rem auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
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
    <div class="container">
        <h1 class="mb-4">登録情報確認ページ</h1>

        <h2 class="mb-3">基本給料</h2>
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

        <h2 class="mb-3">ボーナス給料</h2>
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

        <form action="" class="text-end">
            <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
