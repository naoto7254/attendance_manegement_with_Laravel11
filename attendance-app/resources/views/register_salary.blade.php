<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠登録</title>
</head>
<body>
    <h1>勤怠登録画面</h1>

    <form action="{{ route('salary.confirm') }}" method="POST">
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
            <input type="checkbox" id="morning" name="shift_types[]" value="morning" {{ in_array('morning', old('shift_types', [])) ? 'checked' : '' }}>
            <label for="morning">朝</label>

            <input type="checkbox" id="afternoon" name="shift_types[]" value="afternoon" {{ in_array('afternoon', old('shift_types', [])) ? 'checked' : '' }}>
            <label for="afternoon">昼</label>

            <input type="checkbox" id="evening" name="shift_types[]" value="evening" {{ in_array('evening', old('shift_types', [])) ? 'checked' : '' }}>
            <label for="evening">夕</label>
        </div>

        <div>
            <label for="morning_bonus_none">朝ボーナス:</label>
            <input type="radio" id="morning_bonus_none" name="morning_bonus" value="none" {{ old('morning_bonus', 'none') === 'none' ? 'checked' : '' }}>
            <label for="morning_bonus_none">なし</label>
            <input type="radio" id="morning_bonus_10" name="morning_bonus" value="10" {{ old('morning_bonus') === '10' ? 'checked' : '' }}>
            <label for="morning_bonus_10">10分</label>
            <input type="radio" id="morning_bonus_20" name="morning_bonus" value="20" {{ old('morning_bonus') === '20' ? 'checked' : '' }}>
            <label for="morning_bonus_20">20分</label>
            <input type="radio" id="morning_bonus_30" name="morning_bonus" value="30" {{ old('morning_bonus') === '30' ? 'checked' : '' }}>
            <label for="morning_bonus_30">30分</label><br>

            <label for="afternoon_bonus">昼ボーナス:</label>
            <input type="radio" id="afternoon_bonus_none" name="afternoon_bonus" value="none" {{ old('afternoon_bonus', 'none') === 'none' ? 'checked' : '' }}>
            <label for="afternoon_bonus_none">なし</label>
            <input type="radio" id="afternoon_bonus_10" name="afternoon_bonus" value="10" {{ old('afternoon_bonus') === '10' ? 'checked' : '' }}>
            <label for="afternoon_bonus_10">10分</label>
            <input type="radio" id="afternoon_bonus_20" name="afternoon_bonus" value="20" {{ old('afternoon_bonus') === '20' ? 'checked' : '' }}>
            <label for="afternoon_bonus_20">20分</label>
            <input type="radio" id="afternoon_bonus_30" name="afternoon_bonus" value="30" {{ old('afternoon_bonus') === '30' ? 'checked' : '' }}>
            <label for="afternoon_bonus_30">30分</label><br>

            <label for="evening_bonus">夜ボーナス:</label>
            <input type="radio" id="evening_bonus_none" name="evening_bonus" value="none" {{ old('evening_bonus', 'none') === 'none' ? 'checked' : '' }}>
            <label for="evening_bonus_none">なし</label>
            <input type="radio" id="evening_bonus_10" name="evening_bonus" value="10" {{ old('evening_bonus') === '10' ? 'checked' : '' }}>
            <label for="evening_bonus_10">10分</label>
            <input type="radio" id="evening_bonus_20" name="evening_bonus" value="20" {{ old('evening_bonus') === '20' ? 'checked' : '' }}>
            <label for="evening_bonus_20">20分</label>
            <input type="radio" id="evening_bonus_30" name="evening_bonus" value="30" {{ old('evening_bonus') === '30' ? 'checked' : '' }}>
            <label for="evening_bonus_30">30分</label><br>
        </div>

        <div>
            <label for="morning_delay_bonus">遅延ボーナス(朝):</label>
            <input type="radio" id="morning_delay_bonus_none" name="morning_delay_bonus" value="none" {{ old('morning_delay_bonus', 'none') === 'none' ? 'checked' : '' }}>
            <label for="morning_delay_bonus_none">なし</label>
            <input type="radio" id="morning_delay_bonus_exist" name="morning_delay_bonus" value="exist" {{ old('morning_delay_bonus') === '10' ? 'checked' : '' }}>
            <label for="morning_delay_bonus_exist">あり</label><br>

            <label for="afternoon_delay_bonus">遅延ボーナス(昼):</label>
            <input type="radio" id="afternoon_delay_bonus_none" name="afternoon_delay_bonus" value="none" {{ old('afternoon_delay_bonus', 'none') === 'none' ? 'checked' : '' }}>
            <label for="afternoon_delay_bonus_none">なし</label>
            <input type="radio" id="afternoon_delay_bonus_exist" name="afternoon_delay_bonus" value="exist" {{ old('afternoon_delay_bonus') === '10' ? 'checked' : '' }}>
            <label for="afternoon_delay_bonus_exist">あり</label><br>

            <label for="evening_delay_bonus">遅延ボーナス(夕):</label>
            <input type="radio" id="evening_delay_bonus_none" name="evening_delay_bonus" value="none" {{ old('evening_delay_bonus', 'none') === 'none' ? 'checked' : '' }}>
            <label for="evening_delay_bonus_none">なし</label>

            <input type="radio" id="evening_delay_bonus_exist" name="evening_delay_bonus" value="exist" {{ old('evening_delay_bonus') === '10' ? 'checked' : '' }}>
            <label for="evening_delay_bonus_exist">あり</label><br>
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

