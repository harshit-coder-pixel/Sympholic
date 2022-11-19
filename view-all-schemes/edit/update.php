<?php

    require_once '../conn.php';
    $id=$_POST['id'];
    $schemeTitle=$_POST['schemeTitle'];
    $schemeDescription=$_POST['schemeDescription'];
    $show_Btn=$_POST['show_Btn'];
    $show_Btnlabel=$_POST['show_Btnlabel'];
    $show_Btnlink=$_POST['show_Btnlink'];
    // $conditions=$_POST['conditions'];
    
    $sql = "UPDATE `schemes` SET `title`='$schemeTitle',`desp`='$schemeDescription',`buttonC`='$show_Btn',`buttonText`='$show_Btnlabel',`buttonLink`='$show_Btnlink' WHERE `Sno`='$id'"; 
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Done Successfully";
        // $result = mysqli_query($conn,'SELECT conditions FROM schemes ORDER BY Sno DESC LIMIT 1;');
        // if (mysqli_num_rows($result) > 0) {
        //     $last_row = mysqli_fetch_row($result);
        //     echo $last_row[0]; //Here it is
        // }
    }else{
        echo("Error description: " . mysqli_error($conn));
    }
?>