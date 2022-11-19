<?php
require('./config/connection.php');
require('./config/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/fullpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
        include "../fav.php";
    ?>
    <title>Simpholic</title>
    <script>
        const urlContainParams = window.location.search.length === 0;
    if (urlContainParams) window.location.href = './home.php';
    </script>
    <!-- Path: Singlepost view\main.html -->
    <style>
        li{
    font-size: 18px !important;
    font-family: Nova,Arial, Helvetica, sans-serif !important;
    font-weight: 500 !important;
    color: #6b6b6b !important;
    line-height: 120%;
    text-align:justify !important;
    margin: 30px 0 !important;
}
    </style>
</head>
<?php
if(isset($_GET['id']))
    $sql = "SELECT * From schemes where Sno=".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {      
        while($row = mysqli_fetch_assoc($result))
        {
            $content = $row['desp'];
            $title = $row['title'];
            $timestamp = $row['publish_date'];
            $datetime = explode(" ",$timestamp);
            $date = $datetime[0];
            $time =" ".$datetime[1];
            $newDate = date("d-m-Y", strtotime($date));
            $buttonCondition = $row['buttonC'];
            $buttonText= $row['buttonText'];
            $buttonLink = $row['buttonLink'];
?>
        
<body>
    <div class="random-background"></div>
    <div class="margin-div">
        <div class="post-title-section">
            <h1 class="post-title"><?php echo $title; ?></h1>
        </div>
    <section class="post-content-section">
        <span><i class="fa fa-clock-o" style="font-size:24px"></i> Published on: <?php echo $newDate;echo $time;?></span>
        <article>
            <?php 
            $text = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
            echo $text; ?>
        </article>
        <?php
            if($buttonCondition=="true"){
        ?>
        <div>
            <button class="button-show" target="_top" onclick="window.open('<?php echo $buttonLink?>')"><?php echo $buttonText ?></button>
        </div>
        <?php
            }
        ?>
    </section>
    <?php
    }
    ?>
    <hr>
    <section class="eligble">
                    <h3 class="eligble-heading">You Also Eligible For These Schemes</h3>
                    <div class="container-flex">
<?php


function readMore($content,$link,$var,$num, $limit) {
    $content = substr($content,0,$limit);
    $content = substr($content,0,strrpos($content,' '));
    $content = $content." <a href='$link?$var=$num'>Read More...</a>";
    return $content;
}

$dateOfBirth = $_SESSION['dob'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$cage=$diff->format('%y');
$counter=0;

$sql = 'SELECT * FROM schemes ORDER BY RAND()';
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    $post_id= $_GET['id'];
    while($row = mysqli_fetch_assoc($result)){
        $sno = $row['Sno'];
        if($post_id!=$sno){
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
                $limit= "220";
                $val= readMore(strip_tags($content),$link,"id",$row['Sno'],$limit);
                if($counter<2)
                {
                $counter+=1;

                
?>
            
                        <div class="card">
                            <h4 class="card-title"><?php echo $title?></h4>
                                <p><?php echo $val?></p>
                        </div>

                        
                        <?php
                }
            }
            }
        }
    }
    else {
        echo "0 results";
    }
    if($counter==0){
?>
        <div class="Nothing-visible">
            <h4 class="nothingTitle">No Schemes Found</h4>
            <p>Please Check later <br>or <a>Contact Us</a></p>
        </div>
<?php
    }
}
else{
    header('Location: '.notExist);
}
?>
        </div>
    </section>
    
</div>


<script src="./js/singlepost.js"></script>
</body>
</html>


<!-- <div class="Nothing-visible">
    <p>Nothing to show here</p><p>Check later</p>
</div> -->