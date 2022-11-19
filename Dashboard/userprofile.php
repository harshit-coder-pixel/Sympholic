<?php 
    require './config/session.php';
    require './config/connection.php';
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
        include "../fav.php";
    ?>
    <link rel="stylesheet" href="css/userprofile-edit.css">
    <title>User Profile</title>
</head> 
<body onload='call("<?php echo"$state"?>","<?php echo"$district"?>")'>
    <main>
        <h2>User Profile</h2>
        <form action="./php/profile.php" method="post" >
            <div class="flnam">
                <div>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="First name" value="<?php echo $fname ?>" required>
                </div>
                
                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Last name" value="<?php echo $lname?>" required>
                </div>
            </div>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email here" value="<?php echo $email?>" required>
            
            <label for="birth">Date of Birth</label>
            <input type="date" name="bithday" id="birth"  value="<?php echo $birth?>"required>
            
            <div class="flnam">
                <div>
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" required>
                        <option value="" disabled="true" <?=$gender== '' ? ' selected="selected"' : '';?>>Select your Gender</option>
                        <option value="Male" <?=$gender== 'Male' ? ' selected="selected"' : '';?>>Male</option>
                        <option value="Female" <?=$gender== 'Female' ? ' selected="selected"' : '';?>>Female</option>
                        <option value="other" <?=$gender== 'other' ? ' selected="selected"' : '';?>>other</option>
                    </select>
                </div>
                <div>
                    <label for="category">Reservation Category</label>
                    <select name="category" id="category" required>
                        <option value="" disabled="true" <?=$category== '' ? ' selected="selected"' : '';?>>Category</option>
                        <option value="GC"  <?=$category== 'GC' ? ' selected="selected"' : '';?>>GC</option>
                        <option value="ST"  <?=$category== 'ST' ? ' selected="selected"' : '';?>>ST</option>
                        <option value="OBC"  <?=$category== 'OBC' ? ' selected="selected"' : '';?>>OBC</option>
                        <option value="SC"  <?=$category== 'SC' ? ' selected="selected"' : '';?>>SC</option>
                        <option value="other"  <?=$category== 'other' ? ' selected="selected"' : '';?>>other</option>
                    </select>
                </div>
            </div>
            
            <label for="income">Annual Income</label>
            <input type="number" name="income" id="income" placeholder="Enter your income in rupees" value="<?php echo $income ?>"required>
            
            
            <label for="address">Address</label>
            <input type="text" id="address" name="f_address" required placeholder="First line" value="<?php echo $faddress?>">
            <input type="text" id="address" name="l_address" placeholder="second line(optional)" style="margin-top: 10px;" value="<?php echo $saddress ?>">
        
            
            <label for="state">State</label>
            <select name="state" id="state" required>
            <option value="" <?=$state== '' ? ' selected="selected"' : '';?> disabled="true" onchange="">Select your State</option>
            </select>
            <div class="box" id="sol"></div>
            <label for="District">District</label>
            <select name="district" id="district" required>
            <option value="" selected="true" disabled="true">Select Your District</option>
            </select>
        
            <button type="submit" name="submit">Save</button>
        </form>
    </main>
    <script src="js/usereditprofile.js"></script>
</body>
</html>

