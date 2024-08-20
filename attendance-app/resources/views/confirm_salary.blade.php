<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Salary</title>
</head>
<body>
    <h1>登録情報確認ページ</h1>

    <p>日付: {{ $data['date'] }}</p>
    <p>名前: {{ $data['name'] }}</p>
    <p>シフトタイプ: {{ implode(', ', $data['shift_types']) }}</p>

    <form action="">
        <button type="button" onclick="history.back()">戻る</button>
    </form>
</body>
</html>

