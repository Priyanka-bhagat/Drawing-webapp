<?php
session_start();
$conn = mysqli_connect('localhost','root');
if($conn){
    echo "Connection with the Database Success";

}
else
echo "No connection";

mysqli_select_db($conn, 'canvasimage');
$c=0;
$name = $_POST["username"];
$pass = $_POST["password"];
if (empty($name))
{
   $c=$c+1;
}
if (empty($pass))
{
    $c= $c+1;
}
/*if(($name=="") || ($pass==""))
{
    header('location:login.html');
    session_abort();
}*/
if($c>0)
{
    $errors="Invalid username or Password";
}
    if($c==0)
    {
        if($name=='admin'){
            
        $query1="select Password from login_info where Username='$name'";
        $result1 = mysqli_query($conn,  $query1);
        while($row = mysqli_fetch_assoc($result1)){
            $Passworddb = $row['Password'];
        }
             if($Passworddb == $pass)
             {
                $_SESSION['username'] = $name;
               header('location:admin.php');
              }
          else{
            echo "<script>
            alert('Enter correct Password');
            window.location.href='login.html';
            </script>";
             }
        }
        else{
         $query = "select * from login_info where Username ='$name' ";
         $result =mysqli_query($conn, $query);
         $num = mysqli_num_rows($result);

         if($num){
        
        $query1="select Password from login_info where Username='$name'";
        $result1 = mysqli_query($conn,  $query1);
        while($row = mysqli_fetch_assoc($result1)){
            $Passworddb = $row['Password'];
        }
         if($Passworddb == $pass)
        {
        $_SESSION['username'] = $name;
        header('location:home.php');
        }
        else{
            echo "<script>
            alert('Enter correct Password');
            window.location.href='login.html';
            </script>";
        }
    
    }

    else{
    $qy = "Insert into login_info(Username, Password) values('$name' , '$pass')";
    mysqli_query($conn , $qy);
    
    $_SESSION['username'] = $name;
    header('location:home.php');

    }
}
    
    }
else
  {
        
    echo "<script>
    alert('Invalid username or password');
    window.location.href='login.html';
    </script>";
  }
    
?>