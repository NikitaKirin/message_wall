<?php
$user = "root";
$password = "root";
try {
    $DBH = new PDO('mysql:host=localhost;dbname=message_wall', $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
