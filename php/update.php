<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$number= $_SESSION['number'];
$id_record= $_SESSION['id'];
$record=$_POST['record'];
$user = $_SESSION['username'];
$username= implode('', $_SESSION['username']);
$conn = new mysqli('127.0.0.1', 'root', 'newpassword', 'calendarDB');
$query1 = "SELECT id_user FROM users  WHERE username='$username'";
$res1 = mysqli_query($conn, $query1);
$id1=mysqli_fetch_assoc($res1)['id_user'];
$query = "UPDATE organizer SET record=$record WHERE id_record=$id_record and day=$number";
$res = mysqli_query($conn, $query);
if ($res == 'true') {
    echo "Запись успешно сохранена";
} else
    {
    echo "Запись не сохранена!";
    }
?>
echo "<form action='main.php' method='POST'>
<button type='submit'>Продолжить</button>";

