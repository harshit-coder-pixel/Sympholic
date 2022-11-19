<?php
require_once './conn.php';
if(isset($_POST['update'])){
    $uno = $_POST['uno'];
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['bithday'];
    $category = $_POST['category'];
    $income = $_POST['income'];
    $faddress = $_POST['faddress'];
    $laddress = $_POST['laddress'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $level = $_POST['UserLevel'];
    

    $sql = "UPDATE users SET username='$uname',fname='$fname',lname='$lname',email='$email',gender='$gender',dob='$dob',category='$category',income='$income',f_address='$faddress',s_address='$laddress',state='$state',district='$district',level='$level' Where uno='$uno'";

    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('User Updated Successfully')</script>";
        echo "<script>window.location.replace('../userView/main.php');</script>";
    }
    else{
        echo mysqli_error($conn);
        echo "<script>alert('User Not Updated')</script>";
    }
}
?>