<?php


require_once "../functions/connect.php";
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
if ($login == "" || $password == ""){
    echo 'Заполните  все поля';
    exit;
}
if (in_array($login,user_validation_entry()[0]) && in_array($password,user_validation_entry()[1]) ){
    echo "Добро пожаловать!";
    
}   
else
    echo "Такого пользователя не существует!";




function user_validation_entry(){
    global $mysqli;
    connectDB();
    $result = $mysqli->query("SELECT login, password FROM users");
    $row = $result->fetch_all();
    $user = array_column($row, "0");
    $password = array_column($row, "1");
    closeDB();
    return [$user, $password];
}