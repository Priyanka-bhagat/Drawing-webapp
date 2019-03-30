<html>
    <head>
        <title>View Images</title>
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
</body>
</html>
<?php


echo "<table>";
echo"<h3>Image Files</h3>";
echo "<tr><th>ID</th><th>User name</th><th>Date Created</th><th>File Name</th>";


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr><td>";
    echo $row['id'];
    echo "</td><td>";

    echo $row['Username'];
    echo "</td><td>";
    echo $row['Date_Created'];
    echo "</td><td>";
    echo "<a href='image.php' style='color: red;'>".$row['name']."</a>";
    echo "</td></tr>";
}
echo "</table>";
}
?>