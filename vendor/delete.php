<?php
session_start();
require 'connect.php';
$id = (int)$_GET['id'];
$date = $_GET['date'];
$now_date = new DateTime(date("Y-m-d H:i:s"));    //время сейчас
$old_date = new DateTime($date); //дата с которой отчитываем 
$interval = $old_date->diff($now_date);
echo $interval->format("%H:%I:%S - времени прошло"); //выводим результат
// $query = "DELETE FROM comments WHERE id = :id";
// $STH = $DBH->prepare($query);
// $STH->execute(array(':id'=>$id));
// if ($STH){
//     if ($STH) {
//         $tmsg = "Сообщение успешно удалено";
//         $_SESSION['message'] = $tmsg;
//         header('Location: ../profile.php');
//     } else {
//         $fmsg = "Не удалось удалить сообщение";
//         $_SESSION['message'] = $fmsg;
//         header('Location: ../profile.php');
//     }
// }
?>