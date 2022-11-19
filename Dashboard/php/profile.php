<?php
require '../config/session.php';
echo "Running";
if(isset($_POST['submit'])){

    $cuser= $_SESSION['username'];
    $cmail= $_SESSION['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $birth = $_POST['bithday'];
    $gender= $_POST['gender'];
    $category= $_POST['category'];
    $income= $_POST['income'];
    $f_address= $_POST['f_address'];
    $s_address= $_POST['l_address'];
    $state=$_POST['state'];
    $district=$_POST['district'];

    $_SESSION['state']=$state;
    $_SESSION['district']=$district;
    $_SESSION['category']=$category;
    $_SESSION['gender']=$gender;
    $_SESSION['dob']=$birth;
    
    $server="localhost";
    $dbuser="symp_root";
    $dbpass="Adarsh@12";
    $dbname="symp_sy";

    $conn=mysqli_connect("$server","$dbuser","$dbpass","$dbname");
    if(!$conn){
        die("connection failed".mysqli_connect_error());
    }
    $sqlcheckmail="SELECT * FROM users WHERE email='$email'";
    $testmail= mysqli_query($conn,$sqlcheckmail);

    if($cmail==$email){
        $sql="UPDATE users SET fname='$fname',lname='$lname',email='$email',dob='$birth',gender='$gender',income='$income',f_address='$f_address',s_address='$s_address',state='$state',district='$district',category='$category' where username='$cuser'";
        if(mysqli_query($conn,$sql))
        {
            echo '<script type="text/JavaScript"> 
                        alert("Profile Updated Successfully");
                        window.location.replace("../userprofile.php")
                </script>';
                $_SESSION['Name'] = $fname." ".$lname;
                $_SESSION['email'] = $email;
                $_SESSION['gender'] = $gender;
                $_SESSION['state'] = $state;
                $_SESSION['category'] = $category;
                $_SESSION['dob'] = $birth;
        }
        else
        {
            echo"Error updating record:".mysqli_error($conn);
        }
    }else if(mysqli_num_rows($testmail))
    {
        echo '<script type="text/JavaScript">
        alert("Email Already Exist\nPlease Try Another Email");
        window.location.replace("../userprofile.php")
        </script>';
    }
    else
    {
        $sql="UPDATE users SET fname='$fname',lname='$lname',email='$email',dob='$birth',gender='$gender',income='$income',f_address='$f_address',s_address='$s_address',state='$state',district='$district',category='$category' where username='$cuser'";
        if(mysqli_query($conn,$sql))
        {
            echo '<script type="text/JavaScript"> 
                        alert("Profile Updated Successfully");
                        window.location.replace("../userprofile.php")
                </script>';
                $_SESSION['Name'] = $fname." ".$lname;
                $_SESSION['email'] = $email;
                $_SESSION['gender'] = $gender;
                $_SESSION['state'] = $state;
                $_SESSION['category'] = $category;
                $_SESSION['dob'] = $birth;
        }
        else
        {
            echo"Error updating record:".mysqli_error($conn);
        }

    }
}
?>