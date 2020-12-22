<?php
session_start();
require "connect.php";
$edit_text = $_POST['text'];
$id = (int)$_GET['id'];
$user_id = (int)$_GET['user_id'];
if (isset($_POST['text']) && $_SESSION['user']['id'] == $user_id) {
    $query = "UPDATE comments SET text = :text WHERE id = :id";
    $STH = $DBH->prepare($query);
    $STH->execute(array(':text' => $edit_text, ':id' => $id));
    if ($STH) {
        $tmsg = "Сообщение успешно изменено";
        $_SESSION['message'] = $tmsg;
        header('Location: ../profile.php');
    } else {
        $fmsg = "Ошибка изменения сообщения";
        $_SESSION['message'] = $fmsg;
        header('Location: ../profile.php');
    }
}
else{
    $tmsg = "Вы не может редактировать данное сообщение";
    $_SESSION['message'] = $tmsg;
    header('Location: ../profile.php');
}
?>
