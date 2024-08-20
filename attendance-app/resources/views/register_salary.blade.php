<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠登録</title>
</head>
<body>
    <h1>勤怠登録画面</h1>

    <form action="{{ route('confirm.salary') }}" method="POST">
        @csrf
        <div>
            <label for="date">日付:</label>
            <input type="date" name="date" id="date" value="{{ old('date', now()->format('Y-m-d')) }}" required>
        </div>

        <div>
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>シフトタイプ:</label>
            <input type="checkbox" id="morning" name="shift_types[]" value="morning">
            <label for="morning">朝</label>

            <input type="checkbox" id="afternoon" name="shift_types[]" value="afternoon">
            <label for="afternoon">昼</label>

            <input type="checkbox" id="evening" name="shift_types[]" value="evening">
            <label for="evening">夕</label>
        </div>

        <div>
            <button type="submit">確認</button>
        </div>
    </form>

    {{-- 【ToDo】ボーナスの情報 --}}
    {{-- 【ToDo】遅延ボーナスの情報 --}}
    {{-- 【ToDo】バリデーション処理結果の表示 --}}
</body>
</html>

