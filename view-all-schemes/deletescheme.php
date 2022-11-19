<?php
    require_once 'conn.php';
    $sql = "DELETE FROM schemes WHERE Sno=".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo '<script type="text/JavaScript">
        alert("Scheme Deleted");
        window.location.replace("./main.php");
        </script>';
    }
    else
    {
        echo '<script type="text/JavaScript">
        alert("Scheme Not Deleted");
        window.location.replace("./main.php");
        </script>';
    }
?>