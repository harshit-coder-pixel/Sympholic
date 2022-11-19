<?php
    require_once 'conn.php';
    $sql = "DELETE FROM users WHERE uno=".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo '<script type="text/JavaScript">
        alert("User Deleted");
        window.location.replace("./main.php");
        </script>';
    }
    else
    {
        echo '<script type="text/JavaScript">
        alert("User Not Deleted");
        window.location.replace("./main.php");
        </script>';
    }
?>