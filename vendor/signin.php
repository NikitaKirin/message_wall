<?php
session_start();
require_once 'connect.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT FROM users WHERE username = :username AND password = :password";
$STH = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$STH->execute(array(':username' => $username, ':password' => $password));
$count = $STH->rowCount();
if ($count = 0) {
    $user = $STH->fetch(PDO::FETCH_ASSOC);
    print_r($user);
} else {
    $_SESSION['message'] = "Неверный логин или пароль";
    header('Location: ../index.php');
}
