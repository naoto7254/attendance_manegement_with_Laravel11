<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Salary</title>
</head>
<body>
    <h1>登録情報確認ページ</h1>

    <h2>基本給料</h2>
    <table>
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

    <h2>ボーナス給料</h2>
    <table>
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

    <form action="">
        <button type="button" onclick="history.back()">戻る</button>
    </form>
</body>
</html>

