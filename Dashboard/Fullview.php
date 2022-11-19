<?php
require('./config/connection.php');
if(isset($_GET['id']))
    $sql = "SELECT * From schemes where Sno=".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $content = $row['desp'];
        $title = $row['title'];
        echo $title;
        echo $content;
    }
?>