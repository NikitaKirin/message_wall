<?php
session_start();
require 'connect.php';
$id = (int)$_GET['id'];
$date = $_GET['date'];
$user_id = (int)$_GET['user_id'];
if ($user_id == $_SESSION['user']['id']) {
    $query = "DELETE FROM comments WHERE id = :id";
    $STH = $DBH->prepare($query);
    $STH->execute(array(':id' => $id));
    if ($STH) {
        if ($STH) {
            $tmsg = "Сообщение успешно удалено";
            $_SESSION['tmessage'] = $tmsg;
            header('Location: ../profile.php#table');
        } else {
            $fmsg = "Не удалось удалить сообщение";
            $_SESSION['fmessage'] = $fmsg;
            header('Location: ../profile.php#table');
        }
    }
}
else{
    $fmsg = "Вы не можете удалить чужое сообщение";
    $_SESSION['fmessage'] = $fmsg;
    header('Location: ../profile.php#table');
}
