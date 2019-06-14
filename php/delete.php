<?php
session_start();
$number = $_SESSION['number'];
$id_record= $_SESSION['id'];
$user = $_SESSION['username'];
$username= implode('', $_SESSION['username']);
$conn = new mysqli('127.0.0.1', 'root', 'newpassword', 'calendarDB');
$query1 = "SELECT id_user FROM users  WHERE username='$username'";
$res1 = mysqli_query($conn, $query1);
$id=mysqli_fetch_assoc($res1)['id_user'];
$query = ("DELETE FROM organizer WHERE id_record=$id_record and day=$number");
$res = mysqli_query($conn, $query);
if ($res == 'true') {
    echo "Запись успешно удалена!";
} else
    {
    echo "Запись не удалена!";
    }
?>
<form action='main.php' method='POST'>
    <br>
    <button type='submit'>ОК</button>