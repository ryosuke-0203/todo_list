<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録画面</title>
</head>
<body>
    <div>
        新規登録画面
        <form action="taskSubmitValidate.php" method="POST">
        <div>
            <label>タイトル:
                <input type="text" name="req_title">
            </label>
        </div>
        <div>
            <label>状態:
                <select name="req_status_id">
                    <option value="1">未着手</option>
                    <option value="2">進行中</option>
                    <option value="3">完了</option>
                </select>
            </label>
        </div>
        <div>
            <label>備考
                <textarea name="req_memo"></textarea>
            </label>
        </div>
        <div>
            <button type="submit">登録する</button>
        </div>
        </form>
    </div>
</body>
</html>