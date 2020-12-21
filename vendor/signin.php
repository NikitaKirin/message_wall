<?php
session_start();
require_once 'connect.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM users WHERE username = :username AND password = :password";
$STH = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$STH->execute(array(':username' => $username, ':password' => $password));
// $STH->setFetchMode(PDO::FETCH_ASSOC);
$user = $STH->fetch(PDO::FETCH_ASSOC);
$count = count($user);
if ($count > 0) {
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['username'],
        "email" => $user['email']
    ];
    header('Location: ../profile.php');
} else {
    $_SESSION['message'] = "Неверный логин или пароль";
    header('Location: ../index.php');
}
