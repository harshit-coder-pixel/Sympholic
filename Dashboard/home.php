<?php 
    require './config/session.php';
    require './config/connection.php';
    $dateOfBirth = $_SESSION['dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $cage=$diff->format('%y');
    $sql = 'SELECT * FROM schemes';
    echo "<ol>";
    
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $conditions =json_decode($row['conditions']);
            $true_conditions = 0;
            for($i=0;$i<count($conditions);$i++){
                $parameter = $conditions[$i]->parameter;
                $condition = $conditions[$i]->condition;
                if(isset($conditions[$i]->array)) $array = $conditions[$i]->array;
                if($parameter=="age"){
                    $param = $cage;
                    $condition = eval("if($condition) return true; else return false;");
                    if(!$condition) break;
                    else{
                        $true_conditions++;
                        continue;
                    }
                }

                //All array conditions
                $param = $_SESSION[$parameter];
                $arr = $array;
                $condition = eval("if($condition) return true; else return false;");
                if(!$condition) break;
                else $true_conditions++;
            }
            if(count($conditions)==$true_conditions){
                $title = $row['title'];
                $content = $row['desp'];
                $link= "singlepost.php";
                $limit= "40";

                echo "<li>";
                echo "<b>Title is:</b>".$title;
                echo readMore(strip_tags($content),$link,"id",$row['Sno'],$limit);
                echo "</li>";
            }
        }
        
        
    } else {
        echo "0 results";
    }
    echo "</ol>";
    

    function readMore($content,$link,$var,$id, $limit) {
        $content = substr($content,0,$limit);
        $content = substr($content,0,strrpos($content,' '));
        $content = $content." <a href='$link?$var=$id'>Read More...</a>";
        return "<br>".$content;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo $_SESSION['username'];
    ?>
    <button onclick="window.location.replace('./login.php')">Logout</button>
    <a href="./userprofile.php">edit profile</a>
</body>
</html>