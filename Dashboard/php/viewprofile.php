<?php
    require '../config/session.php';
    require '../config/connection.php';
    $cuser=$_SESSION['username'] ;
    $sql="SELECT * FROM users WHERE username='$cuser'";
    $fetch= mysqli_query($conn,$sql);
    if($fetch)
    {
        if(mysqli_num_rows($fetch))
        {
            while($row = mysqli_fetch_array($fetch))
            {
                $fname= $row['fname'];
                $lname= $row['lname'];
                $email= $row['email'];
                $gender= $row['gender'];
                $birth= $row['dob'];
                $category= $row['category'];
                $income= $row['income'];
                $faddress=$row['f_address'];
                $saddress=$row['s_address'];
                $state=$row['state'];
                $district=$row['district'];
            }
        }
        else
        {
            echo 'No Data For This Id';
        }
    }
    else{
        echo 'Result Error';
    }
?> 