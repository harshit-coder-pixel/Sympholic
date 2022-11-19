<?php 
    require '../config/session.php';
    require '../config/connection.php';
    $dateOfBirth = $_SESSION['dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $cage=$diff->format('%y');
    $sql = 'SELECT * FROM schemes';
    echo "<ol>";
    
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section class="eligble">
        <h3 class="eligble-heading">You are Eligible for these Schemes</h3>
        <div class="container-flex">
        <?php
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
                $content = $row['desp'];
                $link= "../Dashboard/singlepost.php";
                $limit= "240";

?>
            <div class="card">
                <h4 class="card-title"><?php echo $row['title'] ?></h4>
                    <p><?php echo readMore(strip_tags($content),$link,"id",$row['Sno'],$limit); ?> </p>
            </div>
<?php

                
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
        </div>
    </section>
</body>
</html>