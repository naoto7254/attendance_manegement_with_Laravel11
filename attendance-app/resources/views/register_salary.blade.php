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

    <div class="custom-container mt5">
        <h1 class="container mb-3">勤怠登録画面</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('salary.confirm') }}" method="POST">
            @csrf
            <div class="d-flex align-items-center mb-2">
                <label for="date" class="form-label animated-label mb-0" style="white-space: nowrap; flex-shrink: 0;">日付: </label>
                <input type="date" name="date" id="date" class="form-control animated-input" value="{{ old('date', now()->format('Y-m-d')) }}" required>
            </div>

            <div class="d-flex align-items-center mb-2">
                <label for="name" class="form-label animated-label mb-0" style="flex-shrink: 0;">名前: </label>
                <input type="text" id="name" name="name" class="form-control animated-input" value="{{ old('name') }}">
            </div>

            <div class="mb-2">
                <label class="form-label animated-label">シフトタイプ: </label>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="morning" name="shift_types[]" value="morning" class="form-check-input animated-input" {{ in_array('morning', old('shift_types', [])) ? 'checked' : '' }}>
                    <label for="morning" class="form-check-label animated-label">朝</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="afternoon" name="shift_types[]" value="afternoon" class="form-check-input animated-input" {{ in_array('afternoon', old('shift_types', [])) ? 'checked' : '' }}>
                    <label for="afternoon" class="form-check-label animated-label">昼</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="evening" name="shift_types[]" value="evening" class="form-check-input animated-input" {{ in_array('evening', old('shift_types', [])) ? 'checked' : '' }}>
                    <label for="evening" class="form-check-label animated-label">夕</label>
                </div>
            </div>

            <div class="mb-2">
                <label for="morning_bonus_none" class="form-label animated-label">朝ボーナス: </label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="morning_bonus_none" name="morning_bonus" class="form-check-input animated-input" value="none" {{ old('morning_bonus', 'none') === 'none' ? 'checked' : '' }}>
                    <label for="morning_bonus_none" class="form-check-label animated-label">なし</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="morning_bonus_10" name="morning_bonus" class="form-check-input animated-input" value="10minutes_less" {{ old('morning_bonus') === '10minutes_less' ? 'checked' : '' }}>
                    <label for="morning_bonus_10" class="form-check-label animated-label">10分</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="morning_bonus_20" name="morning_bonus" class="form-check-input animated-input" value="20minutes_less"  {{ old('morning_bonus') === '20minutes_less' ? 'checked' : '' }}>
                    <label for="morning_bonus_20" class="form-check-label animated-label">20分</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="morning_bonus_30" name="morning_bonus" class="form-check-input animated-input" value="30minutes_less" {{ old('morning_bonus') === '30minutes_less' ? 'checked' : '' }}>
                    <label for="morning_bonus_30" class="form-check-label animated-label">30分</label><br>
                </div>
            </div>

            <div class="mb-2">
                <label for="afternoon_bonus" class="form-label animated-label">昼ボーナス: </label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="afternoon_bonus_none" name="afternoon_bonus" class="form-check-input animated-input" value="none" {{ old('afternoon_bonus', 'none') === 'none' ? 'checked' : '' }}>
                    <label for="afternoon_bonus_none" class="form-check-label animated-label">なし</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="afternoon_bonus_10" name="afternoon_bonus" class="form-check-input animated-input"  value="10minutes_less" {{ old('afternoon_bonus') === '10minutes_less' ? 'checked' : '' }}>
                    <label for="afternoon_bonus_10" class="form-check-label animated-label">10分</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="afternoon_bonus_20" name="afternoon_bonus" class="form-check-input animated-input"  value="20minutes_less" {{ old('afternoon_bonus') === '20minutes_less' ? 'checked' : '' }}>
                    <label for="afternoon_bonus_20" class="form-check-label animated-label">20分</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="afternoon_bonus_30" name="afternoon_bonus" class="form-check-input animated-input"  value="30minutes_less" {{ old('afternoon_bonus') === '30minutes_less' ? 'checked' : '' }}>
                    <label for="afternoon_bonus_30" class="form-check-label animated-label">30分</label><br>
                </div>
            </div>

            <div class="mb-2">
                <label for="evening_bonus" class="form-label animated-label">夜ボーナス: </label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="evening_bonus_none" name="evening_bonus" class="form-check-input animated-input" value="none" {{ old('evening_bonus', 'none') === 'none' ? 'checked' : '' }}>
                    <label for="evening_bonus_none" class="form-check-label animated-label">なし</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="evening_bonus_10" name="evening_bonus" class="form-check-input animated-input"  value="10minutes_less" {{ old('evening_bonus') === '10minutes_less' ? 'checked' : '' }}>
                    <label for="evening_bonus_10" class="form-check-label animated-label">10分</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="evening_bonus_20" name="evening_bonus" class="form-check-input animated-input" value="20minutes_less" {{ old('evening_bonus') === '20minutes_less' ? 'checked' : '' }}>
                    <label for="evening_bonus_20" class="form-check-label animated-label">20分</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="evening_bonus_30" name="evening_bonus" class="form-check-input animated-input" value="30minutes_less" {{ old('evening_bonus') === '30minutes_less' ? 'checked' : '' }}>
                    <label for="evening_bonus_30" class="form-check-label animated-label">30分</label><br>
                </div>
            </div>

            <div class="mb-2">
                <label for="morning_delay_bonus" class="form-label animated-label">遅延ボーナス(朝): </label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="morning_delay_bonus_none" name="morning_delay_bonus" class="form-check-input animated-input"  value="none" {{ old('morning_delay_bonus', 'none') === 'none' ? 'checked' : '' }}>
                    <label for="morning_delay_bonus_none" class="form-check-label animated-label">なし</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="morning_delay_bonus_exist" name="morning_delay_bonus" class="form-check-input animated-input"  value="exist" {{ old('morning_delay_bonus') === '10' ? 'checked' : '' }}>
                    <label for="morning_delay_bonus_exist" class="form-check-label animated-label">あり</label><br>
                </div>
            </div>

            <div class="mb-2">
                <label for="afternoon_delay_bonus" class="form-label animated-label">遅延ボーナス(昼): </label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="afternoon_delay_bonus_none" name="afternoon_delay_bonus" class="form-check-input animated-input"  value="none" {{ old('afternoon_delay_bonus', 'none') === 'none' ? 'checked' : '' }}>
                    <label for="afternoon_delay_bonus_none" class="form-check-label animated-label">なし</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="afternoon_delay_bonus_exist" name="afternoon_delay_bonus" class="form-check-input animated-input"  value="exist" {{ old('afternoon_delay_bonus') === '10' ? 'checked' : '' }}>
                    <label for="afternoon_delay_bonus_exist" class="form-check-label animated-label">あり</label>
                </div>
            </div>

            <div class="mb-2">
                <label for="evening_delay_bonus" class="form-label animated-label">遅延ボーナス(夕): </label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="evening_delay_bonus_none" name="evening_delay_bonus" class="form-check-input animated-input"  value="none" {{ old('evening_delay_bonus', 'none') === 'none' ? 'checked' : '' }}>
                    <label for="evening_delay_bonus_none" class="form-check-label animated-label">なし</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="evening_delay_bonus_exist" name="evening_delay_bonus" class="form-check-input animated-input"  value="exist" {{ old('evening_delay_bonus') === '10' ? 'checked' : '' }}>
                    <label for="evening_delay_bonus_exist" class="form-check-label animated-label">あり</label>
                </div>
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-primary">確認</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
