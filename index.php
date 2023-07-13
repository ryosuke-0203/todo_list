<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style1.css">
    <script src="js/bootstrap.min.js"></script>
    <script>
       function openNewWindow(event, url) {
        event.preventDefault();
        window.open(url, '_blank', 'width=800,height=600');
        } 
    </script>
    <?php
        $dsn = 'mysql:dbname=todo;host=localhost;';
        $user = 'testuser';
        $password = 'sa';
        $array_status = [1 => "未着手", 2 => "進行中", 3 => "完了"];
        try{
            //PDOオブジェクトを生成する
            $pdo = new PDO($dsn, $user, $password);
            //UTF8エンコーディング
            $pdo->exec('SET NAMES utf8');
            //プリペアドステートメントを生成する
            $stmt = $pdo->prepare('SELECT id, title, created_at, status_id, memo FROM task');
            //プリペアドステートメントを実行する 
            $stmt->execute();
            //結果の全件を連想配列で取得する
            $results = $stmt->fetchAll();
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
        //データベースを切断する
        $pdo = null;
    ?>
</head>
<body>
    <header>
        <div class="header-title">
            <h1>ToDoリスト</h1>
        </div>
        <div class="header-list">
            <ul>
                <li><a href="./create.php" target="_blank" onclick="openNewWindow(event, this.href)">新規作成</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="search-box">
            <h2>照会</h2>
            <div class="search-wrapper">
                <div class="search-title">
                    <label>タイトル:
                        <input type="text" name="">
                    </label>
                </div>
                <div class="search-day">
                    <label>作成日:
                        <input type="text">～<input type="text">
                    </label>
                </div>
                <div class="search-status">
                    <label>ステータス</label>
                    <label><input type="checkbox">未着手</label>
                    <label><input type="checkbox">進行中</label>
                    <label><input type="checkbox">完了</label>
                </div>
                <div class="search-button">
                    <button type="submit">検索</button>
                </div>   
            </div>
        </div>
        <div class=list-box>
            <h2>一覧</h2>
            <div class="list-wrapper">
                <table class="">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>タイトル</th>
                            <th>作成日</th>
                            <th>ステータス</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                            <tr>
                                <td><button type="">詳細</button></td>
                                <td><input type="checkbox"></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                                <td><?php echo $array_status[$row['status_id']]; ?></td>
                                <td><button type="">編集</button></td>
                            </tr>                           
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>