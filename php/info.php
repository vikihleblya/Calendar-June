<?php

    session_start();

$number= $_SESSION['number'];
$id123=$_GET['id'];
$_SESSION['id']=$id123;
$conn = new mysqli('127.0.0.1', 'root', 'newpassword', 'calendarDB');
$query1 = "SELECT record FROM organizer WHERE id_record=$id123";
$res1 = mysqli_query($conn, $query1);
$record=mysqli_fetch_assoc($res1)['record'];
echo ('Выбранная запись:');
echo("$record");
    echo "<form action='updateScreen.html' method='POST'>
 <input type='text' name='number' value='{$number}' style='display: none;'>
 <button type='submit'>Изменить</button>
    </form>";

    echo "<form action='delete.php' method='POST'>
     <input type='text' name='number' value='{$number}' style='display: none;'>
     <button type='submit'>Удалить</button>
    </form>";