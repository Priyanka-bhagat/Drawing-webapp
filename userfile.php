<?php 
session_start();
?>

<html>
<head>
    <title>UserFile</title>
    <style>
         body{
background-image: linear-gradient(-75deg, rgba(0,0,0,.6), rgba(0,0,0,.6) ),url('13.jpg');
border: none;
height : 100%;
width: 100%;
background-size: cover;


}

table{
margin-left: 20%;
margin-right: 50%;

width: 60%;
border: 2px solid white;
color: white;
font-size: 22px;

}
th{
border-bottom: 3px solid #FFF;
border-right: 2px solid #FFF;

}
td{
border-bottom: 2px solid #FFF;
border-right: 2px solid #FFF;

}
h3{
margin-left: 40%;
margin-top:10%;
font-size: 20px;
color: white;
}
    </style>
<script type="text/javascript" src="jquery.js"></script>
        <script>
            $(document).ready(function(){

                $("input").click(function(){
                   
                    var name=$(this).val();
                  

                    $.ajax({
                        type: "POST",
                        url: "getImage.php",
                        data: {fname: name}
                      
                    }).done(function(respond){console.log("done: "+respond);
                      window.location.href='image.php';
                    })
                  

                });
            });
			
			
        </script>
</head>
<body>
<!--<input type='button' value='Go Back' onclick='goBack()' style='margin-right: 50%; margin-top:10px; color: white; display:inline; background-color:transparent; font-size:20px; ' onclick="location.href='admin.php'"></input>-->
</body>
</html>
<?php

$username=$_GET['username'];
echo"<h3>".$username."'s files</h3>";

$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn, 'canvasimage');

if($conn){
    echo "";

}
else
echo "";

$qry = "Select * from imagefiles where Username='$username'";
$result = mysqli_query($conn , $qry);
$num = mysqli_num_rows($result);
if($num!=0)
{
    echo "<table>";

echo "<tr><th>User name</th><th>Date Created</th><th>File Name</th>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr><td>";
    //echo $row['id'];
   // echo "</td><td>";

    echo $row['Username'];
    echo "</td><td>";
    echo $row['Date_Created'];
    echo "</td><td>";
    echo "<input  type='button' value=".$row['name']." style='color:yellow; display:inline; background-color:transparent; font-size:20px;'>";
    echo "</td></tr>";
}

echo "</table>";
}

else{
    
    echo "<script>
            alert('No saved file for this user..Loading Back!');
            window.location.href='admin.php';
            </script>";
        }

    


?>