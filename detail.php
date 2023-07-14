<?php
    //定数化したDB接続情報を読み込む
    require_once __DIR__ . '/config/setting.php';
    $req_id = filter_input(INPUT_GET, 'id');
    $array_status = [1 => "未着手", 2 => "進行中", 3 => "完了"];
    try{
        $pdo = new PDO(DSN, USER, PASSWORD);
        $pdo->exec('SET NAMES utf8');
        $stmt = $pdo->prepare('SELECT * from task where id = :req_id');
        //値のバインド(レビューにならい明示的な型宣言をしています)
        $stmt->bindValue(":req_id", $req_id, PDO::PARAM_INT);
        $stmt->execute();
        $task = $stmt->fetch();
    } catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
    $pdo = null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>詳細画面</title>
</head>
<body>
    <h1>詳細画面</h1>

    <table>
        <tr>
            <th>タイトル</th>
            <td><?php echo $task['title'];?></td>
        </tr>
        <tr>
            <th>作成日</th>
            <td><?php echo $task['created_at'];?></td>
        </tr>
        <tr>
            <th>状態</th>
            <td><?php echo $array_status[$task['status_id']];?></td>
        </tr>
        <tr>
            <th>備考</th>
            <td><?php echo $task['memo'];?></td>
        </tr>
    </table>
</body>
</html>