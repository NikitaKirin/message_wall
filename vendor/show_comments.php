<?php
session_start();
require "connect.php";
$query = "SELECT comments.id, username, text, date FROM comments JOIN users ON comments.user_id = users.id";
// $STH = $DBH->query($query);
// $STH->setFetchMode(PDO::FETCH_OBJ);
// while ($row = $STH->fetch()) {
//     $_SESSION['comments'][$row->id]['username'] = $row->username;
//     $_SESSION['comments'][$row->id]['text'] = $row->text;
//     $_SESSION['comments'][$row->id]['date'] = $row->date;
// }
$STH = $DBH->prepare($query);
$STH->execute();
$result = $STH->fetchAll();
?>