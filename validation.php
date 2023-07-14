<?php
    require_once('validator.php');
    $validator = new Validator(); 
    //$validatorオブジェクトのvalidate()関数をコールする
    $errors = $validator->validate($_POST);
    if (!empty($errors)) {
        //$errorsが空でないときの処理
        session_start();
        $_SESSION['errors'] = $errors;
        header('location: http://localhost/todo_list/validationError.php');
        exit();
    } 
?>