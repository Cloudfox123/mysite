<?php

use function PHPSTORM_META\type;

require_once "../functions/connect.php";
$login = htmlspecialchars($_POST['login']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
if ($login == "" || $email == ""|| $password == ""){
    echo 'Заполните  все поля';
    exit;
}

if (in_array($login,user_validation_login()[0]))
        echo "Пользователь с таким логином существует!";
else if (in_array($email,user_validation_login()[1]))
        echo "Пользователь с такой почтой существует!";
else 
    create_user($login,$email,$password);
 

//Отправка

function create_user($login,$email,$password){
    global $mysqli;
    connectDB();
    $result = "INSERT INTO users (login, password, email) VALUE ('$login','$password','$email')";
    if(mysqli_query($mysqli, $result))
        echo "Новый пользователь добавлен";
    closeDB();
}


function user_validation_login(){
    global $mysqli;
    connectDB();
    $result = $mysqli->query("SELECT login, email FROM users");
    $row = $result->fetch_all();
    $user = array_column($row, "0");
    $email = array_column($row, "1");
    closeDB();
    return [$user,$email];
}

