<html>
<head>
    <title>Admin</title>
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
    <script>

    </script>
</head>
<body>
<input type='button' value='Logout' style='margin-right: 50%; margin-top:10px; color: white; display:inline; background-color:transparent; font-size:20px; ' onclick="location.href='login.html'"></input>

</body>
</html>

<?php

$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn, 'canvasimage');

if($conn){
    echo "";

}
else
echo "";

$qry = "Select Username, count(*) from imagefiles group by Username";
$result = mysqli_query($conn , $qry);
$num = mysqli_num_rows($result);
if($num!=0)
{
    echo "<table>";
echo"<h3>Image Files</h3>";
echo "<tr><th>User name</th><th>Number of Files</th>";


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr><td>";
    echo "<a href='userfile.php?username=".$row['Username']."' style='color:yellow;'>".$row['Username']."</a>";
    echo "</td><td>";
    echo $row['count(*)'];

    echo "</td></tr>";
}
echo "</table>";
}


?>