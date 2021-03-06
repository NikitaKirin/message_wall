<?php
session_start();
require_once('connect.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = md5(htmlspecialchars(($_POST['password'])));
    $email = htmlspecialchars($_POST['email']);
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $STH = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $STH->execute(array(':username' => $username, ':password' => $password, ':email' => $email));
    if ($STH && $STH->rowCount() > 0) {
        $tmsg = "Регистрация прошла успешно";
        $_SESSION['tmessage'] = $tmsg;
        header('Location: ../register.php');
    } else {
        $fmsg = "Ошибка регистрации, данное имя пользователя уже существует";
        $_SESSION['fmessage'] = $fmsg;
        header('Location: ../register.php');
    }
}
