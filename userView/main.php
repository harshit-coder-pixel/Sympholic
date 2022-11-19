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
    $scheme_per_page = 15;
    $start_from =($page-1)*$scheme_per_page;

    $sql="SELECT * FROM users ORDER BY  uno ASC limit $start_from,$scheme_per_page";
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
    <?php
        include "../fav.php";
    ?>
    <title>All Users - Simpholic</title>
</head>
<body>
    <div class="contianer">
        <h1 class="heading-line ">All users</h1>
                <table>
                        <tr class="thead">
                            <th class="sno-cell">uno</th>
                            <th class="title-cell">username</th>
                            <th>fname</th>
                            <th>lname</th>
                            <th>Gender</th>
                            <th>User Role</th>
                            <th>Operation</th>
                        </tr>
                        <tr>

                        <?php
                         $pr_query = "SELECT * FROM users";
                         $pr_result = mysqli_query($conn,$pr_query);
                         $total_records = mysqli_num_rows($pr_result);
                         
                         $total_pages = ceil($total_records/$scheme_per_page);

                         insertPagination($page, $total_pages, true);
                            
                            while($row=mysqli_fetch_assoc($result))
                            {

                        ?>
                                <td class="sno-cell"><?php echo $row['uno']?></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['fname']?></td>
                                <td><?php echo $row['lname']?></td>
                                <td><?php echo $row['gender']?></td>
                                <td><?php echo $row['level']?></td>
                                <td class="extra-button">
                                <a href="../User/user_profile_edit.php?id=<?php echo $row['uno']?>&?role=admin"> <i class="fa fa-pencil"></i> Edit</a> 
                                <a href="deleteuser.php?id=<?php echo $row['uno']?>&?role=admin" onclick="return confirm('You Really want to Delete\nusername: <?php echo $row['username']?>')"><i class="fa fa-trash-o"></i> Delete</a></td>
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
                            $pr_query = "SELECT * FROM users";
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