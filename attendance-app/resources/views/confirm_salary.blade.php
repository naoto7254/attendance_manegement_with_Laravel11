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
    <p>朝ボーナス: {{ $data['morning_bonus'] }}</p>
    <p>昼ボーナス: {{ $data['afternoon_bonus'] }}</p>
    <p>夕ボーナス: {{ $data['evening_bonus'] }}</p>
    <p>遅延ボーナス(朝): {{ $data['morning_delay_bonus'] }}</p>
    <p>遅延ボーナス(昼): {{ $data['afternoon_delay_bonus'] }}</p>
    <p>遅延ボーナス(夕): {{ $data['evening_delay_bonus'] }}</p>
    <p>baseSalary: {{ var_dump($baseSalary) }}</p>
    <p>morningBonusSalary: {{ var_dump($morningBonusSalary) }}</p>
    <p>afternoonBonusSalary: {{ var_dump($afternoonBonusSalary) }}</p>
    <p>eveningBonusSalary: {{ var_dump($eveningBonusSalary) }}</p>
    <p>morningDelayBonusSalary: {{ var_dump($morningDelayBonusSalary) }}</p>
    <p>afternoonDelayBonusSalary: {{ var_dump($afternoonDelayBonusSalary) }}</p>
    <p>eveningDelayBonusSalary: {{ var_dump($eveningDelayBonusSalary) }}</p>

    <form action="">
        <button type="button" onclick="history.back()">戻る</button>
    </form>
</body>
</html>

