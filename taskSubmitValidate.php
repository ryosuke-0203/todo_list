<?php
        //'validator.php'を読み込む
        require_once('validator.php');
        //Validatorの新しいインスタンスを生成する
        $validator = new Validator(); 
        //$validatorオブジェクトのvalidate()関数を呼び出し戻り値を$errorsに格納する
        $errors = $validator->validate($_POST);
        if (!empty($errors)) {
            //$errorsが空でないときの処理
            session_start();
            $_SESSION['errors'] = $errors;
            header('location: http://localhost/todo_list/validationError.php');
            exit();
        } else 
        //バリデーションに成功したので、データベースを更新する
        $dsn = 'mysql:dbname=todo;host=localhost;';
        $user = 'testuser';
        $password = 'sa';
        $req_title = filter_input(INPUT_POST, "req_title");
        $req_status_id = filter_input(INPUT_POST, "req_status_id");
        $req_memo = filter_input(INPUT_POST, "req_memo");
        try{
            $pdo = new PDO($dsn, $user, $password);
            $pdo->exec('SET NAMES utf8');
            $stmt = $pdo->prepare('INSERT INTO task (`title`, `created_at`, `status_id`, `memo`) VALUES (:req_title, now(), :req_status_id, :req_memo)');
            $stmt->bindValue("req_title", $req_title);
            $stmt->bindValue("req_status_id", $req_status_id);
            $stmt->bindValue("req_memo", $req_memo);
            $stmt->execute();
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
        $pdo = null;
        header('Location: http://localhost/todo_list/taskSubmitSuccess.php');
        exit();


?>