<?php 
    //セッション開始
    session_start();

    if (isset($_SESSION['errors'])) {
        //変数がセットされており、その値がNULLでないとき
        //$errorsに$_SESSION['errors']を格納する
        $errors = $_SESSION['errors'];
        //$_SESSION['errors']を削除する
        unset($_SESSION['errors']);
    } else {
        $errors = array();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>バリデーションエラー</title>
</head>
<body>
    <h2>バリデーションエラー</h2>
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?> 
    <p><a href="#" onclick="window.close();">戻る</a></p>
</body>
</html>