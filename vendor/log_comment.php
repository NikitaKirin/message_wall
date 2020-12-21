<?php
session_start();
require_once "connect.php";
$text = $_POST['text_comment'];
$user_id = $_SESSION['user']['id'];
// echo $user_id;
// echo $text;
// echo $timestamp;
$query = "INSERT INTO comments (user_id, text) VALUES (:user_id, :text)";
$STH = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$STH->execute(array(':user_id' => $user_id, ':text' => $text));
if ($STH) {
    $tmsg = "Спасибо за ваше сообщение!";
    $_SESSION['message'] = $tmsg;
    header("Location: ../profile.php");
} else {
    $fmsg = "Возникла ошибка при отправке сообщения";
    $_SESSION['message'] = $fmsg;
    header("Location: ../profile.php");
}
?>