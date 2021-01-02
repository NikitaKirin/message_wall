<?php
session_start();
require "connect.php";
$edit_text = htmlspecialchars($_POST['text']);
$id = (int)$_GET['id'];
$user_id = (int)$_GET['user_id'];
$date =  date("Y-m-d H:i:s", strtotime($_GET['date']) - (2 * 60 * 60));
$current_date = date("Y-m-d H:i:s", time());
$date = new DateTime($date);
$current_date = new DateTime($current_date);
$interval = $date->diff($current_date);
$diff =  (int)$interval->format('%I');
if ($diff < 5) {
    if (!empty($edit_text) && $_SESSION['user']['id'] == $user_id) {
        $query = "UPDATE comments SET text = :text WHERE id = :id";
        $STH = $DBH->prepare($query);
        $STH->execute(array(':text' => $edit_text, ':id' => $id));
        if ($STH) {
            $tmsg = "Сообщение успешно изменено";
            $_SESSION['tmessage'] = $tmsg;
            header('Location: ../profile.php#table');
        } else {
            $fmsg = "Ошибка изменения сообщения";
            $_SESSION['fmessage'] = $fmsg;
            header('Location: ../profile.php#table');
        }
    } else {
        $tmsg = "Вы не можете редактировать чужое сообщение";
        $_SESSION['fmessage'] = $tmsg;
        header('Location: ../profile.php#table');
    }
}
else{
    $fmsg = "Вы не можете редактировать данное сообщение, так как прошло больше 5 часов.";
    $_SESSION['fmessage'] = $fmsg;
    header('Location: ../profile.php#table');
}