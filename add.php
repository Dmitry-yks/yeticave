<?php
require_once ('functions.php');
require 'data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $required_fields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    $errors = [];
    foreach( $required_fields as $field){
        if(empty($_POST[$field])){
            $errors[$field] = 'Заполните поле';
        }
        if($field == 'lot-rate'){
            if(!filter_var($_POST[$field], FILTER_VALIDATE_INT)){
                $errors[$field] = 'начальная цена должна быть корректной';
            }
            if(intval($_POST[$field]) < 0 ){
                $errors[$field] = 'начальная цена должна быть корректной';
            }
        }
        if($field == 'lot-step'){
            if(!filter_var($_POST[$field], FILTER_VALIDATE_INT)){
                $errors[$field] = 'Шаг ставки дожен быть корректным';
            }
            if(intval($_POST[$field]) < 0 ){
                $errors[$field] = 'Начальная цена должна быть корректной';
            }
        }
    }

    if(isset($_FILES['lotPhotos'])){
        $info = finfo_open(FILEINFO_MINE_TYPE);
        $file_name = $_FILES['lotPhotos']['name'];
        $file_path = __DIR__ .'/img/';
        $file_tmpname = $_FILES['lotPhotos']['tmp_name'];
        $file_type = finfo_file($finfo, $file_tmpname);
        if($file_type == '/image/gif'){
            move_uploaded_file($_FILES['lotPhotos']['tmp_name'], $file_path . $file_name);
        }
        $file_url = 'img/' . $file_name;
    }
    if(count($errors) !== 0){
        $page_content = compile_template('add.php',
        ['errors' => $errors,
        'categories' => $categories]);
    } else{
        $lot = [
            "image" => $file_url ? 'img/user.jpg' : '',
            "name" => $_POST['lot-name'],
            "start_price" => $_POST['lot-rate'],
            "rate" => $_POST['lot-step'],
            "timer" => $_POST['lot-date'],
            "category" => $_POST['category'],
            "description" => $_POST['message'],
            "account_id" => $_SESSION['auth']['account_id']
        ];
        $page_content = compile_template('add.php',
            [
                'lot' => $lot,
                'categories' => $categories,
                'info' => $info,
                'times_left' => $times_left
        ]);

    }
}


else{
    $page_content = compile_template('add.php',
    [
        'categories' => $categories,
        'info' => $info,
        'times_left' => $times_left ]);
    }





$layout_content = compile_template('layout.php',
[
    'page_title' => 'Главная страница',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'page_content' => $page_content,
    'categories' => $categories

]);

print($layout_content);









?>
