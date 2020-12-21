<?php
session_start();
require_once('/OpenServer/OpenServer/domains/kirinnikitahost/message_wall/vendor/connect.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $STH = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $STH->execute(array(':username' => $username, ':password' => $password, ':email' => $email));
    if ($STH) {
        $tmsg = "Регистрация прошла успешно";
        $_SESSION['message'] = $tmsg;
        header('Location: ../register.php');
    } else {
        $fmsg = "Ошибка регистрации";
        $_SESSION['message'] = $fmsg;
        header('Location: ../register.php');
    }
}
?>