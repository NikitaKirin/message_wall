<?php
session_start();
require 'connect.php';
$id = (int)$_GET['id'];
$user_id = (int)$_GET['user_id'];
$date =  date("Y-m-d H:i:s", strtotime($_GET['date']) - (2 * 60 * 60));
$current_date = date("Y-m-d H:i:s", time());
$date = new DateTime($date);
$current_date = new DateTime($current_date);
$interval = $date->diff($current_date);
$diff =  (int)$interval->format('%h');
if ($diff < 5) {
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
    } else {
        $fmsg = "Вы не можете удалить чужое сообщение";
        $_SESSION['fmessage'] = $fmsg;
        header('Location: ../profile.php#table');
    }
}

else{
    $fmsg = "Вы не можете удалить данное сообщение, так как прошло больше 5 часов.";
    $_SESSION['fmessage'] = $fmsg;
    header('Location: ../profile.php#table');
}
