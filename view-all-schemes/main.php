<?php
    require_once 'conn.php';
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

    $sql="SELECT * FROM schemes ORDER BY  Sno ASC limit $start_from,$scheme_per_page";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>All Schemes - Simpholic</title>
</head>
<body>
    <div class="contianer ">
        <h1 class="heading-line ">All Schemes</h1>
                <table>
                        <tr class="thead">
                            <th class="sno-cell">Sno</th>
                            <th class="title-cell">Title</th>
                            <th class="Desp-cell">Descrption</th>
                            <th>Publish Date</th>
                            <th>Operation</th>
                        </tr>
                        <tr>

                        <?php
                         $pr_query = "SELECT * FROM schemes";
                         $pr_result = mysqli_query($conn,$pr_query);
                         $total_records = mysqli_num_rows($pr_result);
                         
                         $total_pages = ceil($total_records/$scheme_per_page);

                         insertPagination($page, $total_pages, true);
                            
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $timestamp = $row['publish_date'];
                                $datetime = explode(" ",$timestamp);
                                $date = $datetime[0];
                                $content = $row['desp'];
                                $limit= "200";
                                $shortdesp = short(strip_tags($content),$limit);

                        ?>
                                <td class="sno-cell"><?php echo $row['Sno']?></td>
                                <td><?php echo $row['title']?></td>
                                <td><?php echo $shortdesp?></td>
                                <td><?php echo $date?></td>
                                <td class="extra-button">
                                <a href="../Dashboard/singlepost.php?id=<?php echo $row['Sno']?>"><i class="fa fa-eye"></i> </a> 
                                <a href="./edit/edit.php?id=<?php echo $row['Sno']?>"> <i class="fa fa-pencil"></i> </a> 
                                <a href="deletescheme.php?id=<?php echo $row['Sno']?>" onclick="return confirm('You Really want to Delete\nPostnumber=<?php echo $row['Sno']?>')"><i class="fa fa-trash-o"></i> </a></td>
                        </tr>
                        <?php
                            }
                        ?>
                </table>
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
            ?>       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <?php
                            $pr_query = "SELECT * FROM schemes";
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
                </div>
        </div>
</body>
</html>