<?php
$number = $_POST['number'];
session_start();
$user = $_SESSION['username'];
$username = implode(' ', $_SESSION['username']);
$_SESSION['number']=$number;
$conn = new mysqli('localhost', 'root', '', 'login2');

if ($username == '') {
    $query = "SELECT id_record,record FROM organizer  WHERE  id_users='3' and day=$number";
    $res = mysqli_query($conn, $query);
    while ($row = $res->fetch_assoc()) {
        echo $row ['record'], '<br>';
    }
    echo "<form action='main.php'>
 <button type='submit'>Выйти</button>
    </form>";
} else {
    $query1 = "SELECT id_user FROM users  WHERE username='$username'";
    $res1 = mysqli_query($conn, $query1);
    $id = mysqli_fetch_assoc($res1)['id_user'];
    $query = "SELECT id_record,record,time FROM organizer WHERE id_users=$id and day=$number ORDER BY time";
    $res = mysqli_query($conn, $query);
    while ($row = $res->fetch_assoc()) {
        echo "<a href='info.php?id=" . $row['id_record'] . "'>" . $row['record']. "</a>";
        echo $row['time'], '<br>';
    }
    echo "<a href='organizer.php?id=true?'></a>";

    echo "<form action='insertScreen.html' method='POST'>
 <input type='text' name='number' value='{$number}' style='display: none;'>
 <button type='submit'>Добавить</button>
    </form>";

    echo "<form action='main.php'>
 <button type='submit'>Выйти</button>
    </form>";

}
