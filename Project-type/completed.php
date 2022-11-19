<?php
    require_once '../config/connection.php';
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
    $scheme_per_page = 8;
    $start_from =($page-1)*$scheme_per_page;
    $sql = "SELECT * FROM project ORDER BY sno DESC limit $start_from,$scheme_per_page";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View Project</title>
</head>
<body>
    <h2 class="title">Completed Projects</h2>
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
                $StDate = date('Y-m-d', strtotime($StartDate));
                $EDate = date('Y-m-d', strtotime($EndDate));
                $StartDate = date('d M, Y', strtotime($StartDate));
                $EndDate = date('d M , Y', strtotime($EndDate));
                // echo gettype($StartDate);
                // echo $StartDate;
                
                
                $currentDate = date('Y-m-d');
                $Pcount= 1;
                echo $StDate;
                $content = $Description;
                $link= "../ProjectView/fullpageProject.php";
                $limit= "200";
                
                

            if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) > strtotime($EDate)){
                
        ?>   
        <div class="container">
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
                    <a href="../ProjectPost/serverData/PostData_<?php echo $id ?>/pdf/pdf_1.pdf" download ><i class="fa fa-file-pdf-o" style="font-size: 20px;"></i></a>
                    <?php
                        if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) > strtotime($EDate)){
                    ?>
                        <div class="status-completed">Complete Project</div>
                    <?php
                        }else if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) < strtotime($EDate)){
                    ?>
                        <div  class="status-ongoing">ongoing</div>
                    
                    <?php
                        }else {
                    ?>
                        <div class="status-upcoming">Upcomming</div>
                    <?php
                        }
                    ?>
                </div>  
            </div>
        </div>
        <?php
                 }
    }   
    function readMore($content,$link,$var,$id, $limit) {
        $content = substr($content,0,$limit);
        $content = substr($content,0,strrpos($content,' '));
        $content = $content." <a href='$link?$var=$id' id='myBtn'>Read More...</a>";
        return "<br>".$content;
    }
    ?>
    </div>
    <?php 
                    function insertPagination($cur_page, $number_of_pages, $prev_next=false) {
                            $ends_count = 1;  //how many items at the ends (before and after [...])
                            $middle_count = 2;  //how many items before and after current page
                            $dots = false;
                        ?>
                <div class="pagination">
                <?php
                    if ($prev_next && $cur_page && 1 < $cur_page) {  //print previous button?
                ?>
                    <a href="./display.php?page=<?php echo $cur_page-1; ?>">&laquo; Previous</a>  
                <?php
                    }
                    for ($i = 1; $i <= $number_of_pages; $i++) {
                        if ($i == $cur_page) {
                ?>
                    <a class="active"><?php echo $i; ?></a>
                <?php
                    $dots = true;
                        }
                        else{
                            if ($i <= $ends_count || ($cur_page && $i >= $cur_page - $middle_count && $i <= $cur_page + $middle_count) || $i > $number_of_pages - $ends_count) 
                            { 
                ?>
                        <a href="./display.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php
                    $dots = true;
                    } elseif ($dots) {
                ?>  
                    <a>&hellip;</a>
                <?php
                    $dots = false;
                    }
                }
            }
            if ($prev_next && $cur_page && ($cur_page < $number_of_pages || -1 == $number_of_pages)) {
                ?>
                    <a href="./display.php?page=<?php echo $cur_page+1; ?>">Next &raquo;</a>
                <?php
            }
        }
                            $pr_query = "SELECT * FROM project";
                            $pr_result = mysqli_query($conn,$pr_query);
                            $total_records = mysqli_num_rows($pr_result);
                            
                            $total_pages = ceil($total_records/$scheme_per_page);

                            insertPagination($page, $total_pages, true);
                            function short($content,$limit) {
                                $content = substr($content,0,$limit);
                                $content = substr($content,0,strrpos($content,' '));
                                return $content."...";
                            }
                            ?>
</body>
</html>