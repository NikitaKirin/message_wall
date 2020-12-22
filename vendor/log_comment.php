<?php
session_start();
require_once "connect.php";
$text = htmlspecialchars($_POST['text_comment']);
$user_id = $_SESSION['user']['id'];
if (!empty($text)) {
    $query = "INSERT INTO comments (user_id, text) VALUES (:user_id, :text)";
    $STH = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $STH->execute(array(':user_id' => $user_id, ':text' => $text));
    if ($STH) {
        $tmsg = "Спасибо за ваше сообщение!";
        $_SESSION['tmessage'] = $tmsg;
        header("Location: ../profile.php#table");
    } else {
        $fmsg = "Возникла ошибка при отправке сообщения";
        $_SESSION['fmessage'] = $fmsg;
        header("Location: ../profile.php#table");
    }
} else {
    $fmsg = "Возникла ошибка при отправке сообщения";
    $_SESSION['fmessage'] = $fmsg;
    header("Location: ../profile.php#table");
}
