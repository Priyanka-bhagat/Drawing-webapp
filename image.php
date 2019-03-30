<html>
<head>
  <title>View Image</title>

</head>
<body>
<?php
session_start();
$data = $_SESSION['img'];



echo '<img src="'.$data.'"style=height:100%; width:100%;/>';


//header("Content-type: image/gif"); // or whatever 

?>

</body>
</html>