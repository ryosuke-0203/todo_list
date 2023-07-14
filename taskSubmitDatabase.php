<?php
    require_once __DIR__ . '/config/setting.php';
    function getFilterInput($type, $value) {
        return filter_input($type, $value);
    }

    $executeArray = array();

    foreach($_POST as $key=> $value) {
        $filteredValue = getFilterInput(INPUT_POST, $key);
        $executeArray[$key] = $filteredValue;
    }
    
    try{
        $pdo = new PDO(DSN, USER, PASSWORD);
        $pdo->exec('SET NAMES utf8');
        $stmt = $pdo->prepare('INSERT INTO task (`title`, `created_at`, `status_id`, `memo`) VALUES (:req_title, now(), :req_status_id, :req_memo)');
        $stmt->execute($executeArray);
    } catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
    $pdo = null;
    header('Location: http://localhost/todo_list/taskSubmitSuccess.php');
    exit();
?>