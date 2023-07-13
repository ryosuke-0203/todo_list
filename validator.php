<?php
    //バリデーションクラスを定義する
    class Validator {
        //引数が$dataで、返り値が$errorsのvalidate関数を定義する
        public function validate($data) {
            //配列$errorsを定義する
            $errors = [];
            //$data['title']の中身が空もしくは20文字以上の時
            if (empty($data['req_title']) || mb_strlen($data['req_title']) > 20) {
                $errors[] = "タイトルの入力は必須であり、文字数制限は20文字です";
            }
            if (mb_strlen($data['req_message']) > 256) {
                $errors[] = "メモの文字数制限は256文字です";
            }
            //配列$errorsを返す
            return $errors;
        }
    }   
?>