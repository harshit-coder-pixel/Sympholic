<?php
    require '../config/connection.php';
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

    $sql = "SELECT * FROM schemes limit $start_from,$scheme_per_page";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        include "../fav.php";
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section class="eligble">
        <h3 class="eligble-heading">All Schemes</h3>
        <div class="container-flex">
        <?php
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['Sno'];
                $title = $row['title'];
                $desp = $row['desp'];
                $link= "../Dashboard/singlepost.php";
                $limit= "240";
                $content = $desp;
        ?>
            <div class="card">
                <h4 class="card-title"><?php echo $title; ?></h4>
                    <p><?php echo readMore(strip_tags($content),$link,"id",$row['Sno'],$limit); ?></p>
            </div>
        <?php
            }
            function readMore($content,$link,$var,$id, $limit) {
                $content = substr($content,0,$limit);
                $content = substr($content,0,strrpos($content,' '));
                $content = $content." <a href='$link?$var=$id'>Read More...</a>";
                return "<br>".$content;
            }
        ?>
        </div>
    </section>
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
                    <a href="./main.php?page=<?php echo $cur_page-1; ?>">&laquo; Previous</a>  
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
                        <a href="./main.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
                    <a href="./main.php?page=<?php echo $cur_page+1; ?>">Next &raquo;</a>
                <?php
            }
        }
                            $pr_query = "SELECT * FROM schemes";
                            $pr_result = mysqli_query($conn,$pr_query);
                            $total_records = mysqli_num_rows($pr_result);
                            
                            $total_pages = ceil($total_records/$scheme_per_page);

                            insertPagination($page, $total_pages, true);
                        ?>
                </div>
</body>
</html>