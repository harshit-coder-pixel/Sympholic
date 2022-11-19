<?php
    require_once '../config/connection.php';
    if(isset($_GET['id']))
    {
        $sql = "SELECT * FROM project WHERE sno = '$_GET[id]'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['sno'];
        $ProjectTitle = $row['Name'];
        $ProjectDescription = $row['Description'];
        $ProjectStartDate = $row['StartDate'];
        $ProjectEndDate = $row['EndDate'];
        $ProjectCompanyName = $row['CompanyName'];
        $ProjectBudget = $row['Budget'];
        $ProjectStDate= date('d-m-Y', strtotime($ProjectStartDate));
        $ProjectEDate= date('d-m-Y', strtotime($ProjectEndDate));

        $ProjectStartDate = date('d M, Y', strtotime($ProjectStartDate));
        $ProjectEndDate = date('d M , Y', strtotime($ProjectEndDate));

        $ProjectState = $row['State'];
        $ProjectDistrict = $row['District'];
        $ProjectPincode = $row['Pincode'];

        $ProjectImage = $row['image'];
        $currentDate = date('d-m-Y');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fullpage.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <?php
        include "../fav.php";
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title of project - Simpholic</title>
</head>
<body>
    <?php
         if(strtotime($currentDate) > strtotime($ProjectStDate) && strtotime($currentDate) > strtotime($ProjectEDate)){
            echo '<div class="status-completed">';

        }
        else if(strtotime($currentDate) > strtotime($ProjectStDate) && strtotime($currentDate) < strtotime($ProjectEDate))
        {
            echo '<div  class="status-ongoing">'; 
        }
        else   
        {
             echo '<div class="status-upcoming">';
         }
    ?>
    
        <h2 class="post-title"><?php echo $ProjectTitle ?></h2>
    </div>
    <div class="content">
        <?php
             if(strtotime($currentDate) > strtotime($ProjectStDate) && strtotime($currentDate) > strtotime($ProjectEDate)){
                 echo '<a href="#" class="tag-completed">Project Completed</a>';
                }
                else if(strtotime($currentDate) > strtotime($ProjectStDate) && strtotime($currentDate) < strtotime($ProjectEDate))
                {
                echo '<a href="#" class="tag-ongoing">Project Ongoing</a>'; 
            }
            else 
            {
                   echo '<a href="#" class="tag-upcoming">Project Upcomming</a>';
            }
        ?>
        <div class="slideshow-container">

        <?php
            for($i=1;$i<= $ProjectImage;$i++)
            {
                $image = "img_".$i;
        ?>

            <div class="mySlides fade">
                <div class="numbertext"> <?php echo $i.'/'.$ProjectImage ?></div>
                <img src="../ProjectPost/serverData/PostData_<?php echo $id ?>/img/<?php echo $image ?>.jpg" style="width:100%">
                <div class="text">Related images</div>
            </div>
            <?php
            }
            ?>
           
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div style="text-align:center">
            <?php 
                for ($i=1; $i <= $ProjectImage ; $i++) { 
                    echo '<span class="dot" onclick="currentSlide('.$i.')"></span>';
                }
            ?>
        </div>
        <p style="margin-top:40px;"><?php echo $ProjectDescription; ?> <p>
    </div>
    
    <div class="more-detials">
        <h3>Project Related Information</h3>
        <hr>
        <br>
        <h4><span class="orange">Company Name: </span><?php echo $ProjectCompanyName ?></h4>
        <p><span class="orange">Budget: </span><?php echo $ProjectBudget ?> Rupees </p>
        <p><span class="orange">Location: </span> <?php echo $ProjectState.', '.$ProjectDistrict.' ('.$ProjectPincode.')' ?></p>
        <p><span class="orange">Duration: </span> <?php echo $ProjectStartDate." - ".$ProjectEndDate; ?> </p>
    </div>
    <div class="download-btn">
        <a href="../ProjectPost/serverData/PostData_<?php echo $id ?>/pdf/pdf_1.pdf" download>Download Detailed &nbsp;<i class="fa fa-file-pdf-o" style="font-size: 20px;"></i></a>
    </div>
    <hr class="outer">
    <div class="random-card">
        <h2>Explore More Project</h2>
        <?php
            $sql = "SELECT * FROM project ORDER BY RAND() LIMIT 2;";
            $result = $conn->query($sql);
        ?>
        <div class="main-container">
        <?php
            while($row = $result->fetch_assoc()){
                $id = $row['sno'];
                $title = $row['Name'];
                $Description = $row['Description'];
                $StartDate = $row['StartDate'];
                $EndDate = $row['EndDate'];
                $CompanyName = $row['CompanyName'];
                $Budget = $row['Budget'];
                $State = $row['State'];
                $District = $row['District'];
                $Pincode = $row['Pincode'];
                $image = $row['image'];
                $pdf = $row['pdf'];
                $StDate = date('d-m-Y', strtotime($StartDate));
                $EDate = date('d-m-Y', strtotime($EndDate));
                $StartDate = date('d M, Y', strtotime($StartDate));
                $EndDate = date('d M , Y', strtotime($EndDate));
                // echo gettype($StartDate);
                // echo $StartDate;
                
                $currentDate = date('d-m-Y');
                $count= 1;
                
                $content = $Description;
                $link= "fullpageProject.php";
                $limit= "200";
        ?>
        <div class="container1">
            <div class="flex-header">
                <div class="sectionBg"style="background:url('../ProjectPost/serverData/PostData_<?php echo $id ?>/img/img_1.jpg');background-position: center;background-size: cover;">
                </div>
                <div>
                    <h2 class="Project-title"><?php echo $title ?></h2>
                    <p class="desp"><?php echo readMore($content,$link,"id",$id,$limit)?></p>
                </div>
            </div>
            <div class="Info">
                <p class="orange big"><?php echo $CompanyName ?></p>
                <p><span class="orange">Location: <span> <?php echo $District ?> ,<?php echo $State ?> (<?php echo $Pincode ?>)</p>
                <p><span class="orange">Budget: </span> <?php echo $Budget ?></p>
            </div>
            <div class="foot ">
                <p style="display: inline-block; margin-top: 8px;"><?php echo $StartDate ?> - <?php echo $EndDate ?></p>
                <div class="float">
                    <a href="../ProjectPost/serverData/PostData_<?php echo $id ?>/pdf/pdf_1.pdf" download ><i class="fa fa-file-pdf-o" style="font-size: 20px; color:white"></i></a>
                    <?php
                        if(strtotime($currentDate) > strtotime($SttDate) && strtotime($currentDate) > strtotime($EDate)){
                    ?>
                        <div class="status-completed1">Complete Project</div>
                    <?php
                        }else if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) < strtotime($EDate)){
                    ?>
                        <div  class="status-ongoing1">ongoing</div>
                    
                    <?php
                        }else {
                    ?>
                        <div class="status-upcoming1">Upcomming</div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
       
    <?php
    }   
    function readMore($content,$link,$var,$id, $limit) {
        $content = substr($content,0,$limit);
        $content = substr($content,0,strrpos($content,' '));
        $content = $content." <a href='$link?$var=$id' id='myBtn'>Read More...</a>";
        return "<br>".$content;
    }
    ?>
        </div>
    </div>





    <script src="fullpage.js"></script>
</body>
</html>