<?php $conn = mysqli_connect("localhost","root", "", "canvasimage");
session_start();
// Check connection
$uname = $_SESSION['username'];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['image'])){
$img = $_POST["image"];

$startp='(';
$endp=')';

   // $con=mysql_connect("localhost","root","");
    //mysql_select_db("canvasimage",$con);
    $path = $uname.$startp.uniqid() .$endp. '.png';
    //$file = addslashes(file_get_contents($_FILES["image"]["tempname"]));
    $qry="insert into imagefiles (Username, name, image) values('$uname', '$path','$img')";
    $result = $conn->query($qry);
    if($result){
        echo "Image saved successfully";
    }
    else{
        echo "Couldn't save the image";
    }
}


?>
 