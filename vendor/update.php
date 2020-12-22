<?php
session_start();
require "connect.php";
$edit_text = htmlspecialchars($_POST['text']);
$id = (int)$_GET['id'];
$user_id = (int)$_GET['user_id'];
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
}
else{
    $tmsg = "Вы не можете редактировать чужое сообщение";
    $_SESSION['fmessage'] = $tmsg;
    header('Location: ../profile.php#table');
}
?>
