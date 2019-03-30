<?php

    if(!isset($_POST["image"])){
        die("Post was empty.");
    }
    $data = $_POST["image"];
    $path = uniqid() . '.png';

    $sql="insert into imagefiles (image,name) values('$data','$path')";

    $conn = new PDO('mysql:host=localhost;dbname=canvasimage', "root", "");
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":image",$_POST["image"]);
    $stmt->execute();
    $affected_rows = $stmt->rowCount();
    echo $affected_rows;
    

   
?>