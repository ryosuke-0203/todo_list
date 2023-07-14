<?php 
    //2023/07/14に修正しました
    session_start();
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
    unset($_SESSION['errors']);
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