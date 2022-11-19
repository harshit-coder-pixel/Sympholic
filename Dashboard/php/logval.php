<?php
function redirect($url){
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
if(isset($_POST['submit']))
{
    require('../config/connection.php');
    $user=$_POST['username'];
    $password=$_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$user'";
        $result= mysqli_query($conn,$sql);

        if(mysqli_num_rows($result))
        {
            while($row = mysqli_fetch_array($result))
            {
                $login_count=$row['loginCount'];
                $loginsql= "UPDATE users SET loginCount=1 WHERE username='$user'";
                $loginresult= mysqli_query($conn,$loginsql);
                $user_password = password_verify($password, $row['password']);;
                if($user_password || $row['password'] == $password)
                {
                    session_start();
                    $_SESSION['username'] = $user;
                    $_SESSION['Name'] = $row['fname']." ".$row['lname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['state'] = $row['state'];
                    $_SESSION['category'] = $row['category'];
                    $_SESSION['dob'] = $row['dob'];
                    $_SESSION['role'] = $row['level'];
                    $_SESSION['id'] = $row['uno'];
                    $_SESSION['user_status'] = "logged_in";
                    $_SESSION['loginCount'] = $row['loginCount'];
                    echo "<br><h2>Welcome ",ucfirst($row['username'])."</h2>";
                    $enpass= password_hash($password,PASSWORD_DEFAULT);
                    $update = "UPDATE users SET password = '$enpass' WHERE username = '$user'";
                    mysqli_query($conn,$update);
                    redirect("../../loginCheck.php");
                    echo '<script type="text/JavaScript">
                    alert("Login Succefully");
                    </script>';
                   

                }
                else 
                {
                    echo '<script type="text/JavaScript">
                    alert("Invalid Password");
                    window.location.replace("../login.php");
                    </script>';
                }
            }
        }
        else{
            echo '<script type="text/JavaScript">
            alert("Invalid Username");
            window.location.replace("../login.php");
            </script>';
            }
        
}

	?>