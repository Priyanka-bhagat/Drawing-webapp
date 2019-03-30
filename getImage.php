
<?php
    session_start();
  
  $conn = mysqli_connect('localhost','root');
  if($conn){
      echo "Connection with the Database Success";
  
  }
  else
  echo "No connection";

  $name="";

  $name=$_POST['fname'];
  
  mysqli_select_db($conn, 'canvasimage');
  $sql = "SELECT * FROM imagefiles WHERE name='$name'";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $_SESSION['img']=$row['image'];

}



?>

    