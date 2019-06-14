<?php
error_reporting(E_ERROR | E_PARSE);
$name = $_POST["user"];
$password = $_POST["password"];
$conn = new mysqli("127.0.0.1", "root", "newpassword", "calendarDB");
$query = "SELECT `password` FROM `users` WHERE `username` = '$name'";
$res = mysqli_query($conn, $query);
if (mysqli_fetch_assoc($res)['password'] == $password ) {
	session_start();
    $_SESSION['username'] = $name;
    echo "<form action='main.php' method='POST'>	  
           Верный логин и пароль <br>
		    <button type='submit'>Продолжить</button>
          </form>";
    
    $username= implode('', $_SESSION['username']);

} else {
    echo 'Неверно введен логин и пароль';
}
mysqli_close($conn);

