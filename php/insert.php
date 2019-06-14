 <?php
 error_reporting(E_ERROR | E_PARSE);
 $record = $_POST['record'];
 $time = $_POST['time'];
 session_start();
 $user = $_SESSION['username'];
 // $username= implode('', $_SESSION['username']);
 $number= $_SESSION['number'];
 $conn = new mysqli('127.0.0.1', 'root', 'newpassword', 'calendarDB');
 $query1 = "SELECT id_user FROM users  WHERE username='$user'";
 $res1 = mysqli_query($conn, $query1);
 $id=mysqli_fetch_assoc($res1)['id_user'];
 $query = ("INSERT INTO organizer (record,day,id_users,time) VALUES ('$record','$number',$id,'$time');");
 $res = mysqli_query($conn, $query);
 if ($res == 'true') {
     echo "Запись добавлена успешно!";
 } else {
     echo "Запись не добавлена!";
 }
?>
 <br>
 <form action='main.php' method='POST'>
      <br>
     <button type='submit'>ОК</button>

