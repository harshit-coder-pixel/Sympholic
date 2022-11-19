<?php
    require_once './conn.php';
    $id=$_GET['id'];

    $sql = "SELECT * FROM users WHERE uno = $id";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result))
    {
     
        while($row = mysqli_fetch_assoc($result))
        {
            $uno = $row['uno'];
            $uname = $row ['username'];
            $fname = $row ['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $gender = $row['gender'];
            $dob = $row['dob'];
            $category = $row['category'];
            $income = $row['income'];
            $faddresss = $row['f_address'];
            $laddress = $row['s_address'];
            $state = $row['state'];
            $district = $row['district'];
            $level = $row['level'];
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="user_profile.css"> 
    <title>Edit User</title>
</head>

<body onload='call("<?php echo"$state"?>","<?php echo"$district"?>")'>    
    <div class="contianer">
        <h2 class="heading-line">Edit User</h2>
        
    <form action="user-update.php" method="POST">
        <input type="hidden" name="uno" value="<?php echo"$uno"?>">
        <div class="name">
            <div class="form-floating">
                <input type="text" name="fname" id="fname" value="<?php echo $fname ?>" required>
                <label for="fname" class="floating-label">First Name</label>
            </div>
            <div class="form-floating">
                <input type="text" name="lname" value="<?php echo $lname?>" required>
                <label  class="floating-label">Last Name</label>
            </div>
        </div>
        <div class="mail">
            <div class="form-floating">
                <input type="text" name="email"  value="<?php echo $email?>" required>
                <label  class="floating-label">Email</label>
            </div>
        </div>
            <div class="gen">
            <div class="form-floating">
                <input type="text" name="uname" value="<?php echo $uname?>" required>
                <label  class="floating-label">Username</label>
            </div>
            <div class="form-floating">
                    <select name="gender" id="gender" required>
                        <option value="" disabled="true" <?=$gender== '' ? ' selected="selected"' : '';?>>Select Gender</option>
                        <option value="Male" <?=$gender== 'Male' ? ' selected="selected"' : '';?>>Male</option>
                        <option value="Female" <?=$gender== 'Female' ? ' selected="selected"' : '';?>>Female</option>
                        <option value="other" <?=$gender== 'other' ? ' selected="selected"' : '';?>>other</option>
                    </select>
                <label  class="floating-label">Gender</label>
            </div>
            <div class="form-floating">
                <input type="date" name="bithday" id="birth"  value="<?php echo $dob ?>" required>
                <label  class="floating-label">Date of Birth</label>
            </div>
        </div>
        <div class="flnam">
                <div class="form-floating">
                    <input type="number" name="income" id="income" value="<?php echo $income ?>"required>
                    <label for="income" class="floating-label">Annual Income</label>
                </div>
                <div class="form-floating">
                    <select name="category" id="category" required>
                        <option value="" disabled="true" <?=$category== '' ? ' selected="selected"' : '';?>>Category</option>
                        <option value="GC"  <?=$category== 'GC' ? ' selected="selected"' : '';?>>GC</option>
                        <option value="ST"  <?=$category== 'ST' ? ' selected="selected"' : '';?>>ST</option>
                        <option value="OBC"  <?=$category== 'OBC' ? ' selected="selected"' : '';?>>OBC</option>
                        <option value="SC"  <?=$category== 'SC' ? ' selected="selected"' : '';?>>SC</option>
                        <option value="other"  <?=$category== 'other' ? ' selected="selected"' : '';?>>other</option>
                    </select>
                    <label for="category" class="floating-label">Reservation Category</label>
                </div>
        </div>
        <div class="address">
            <h4 style="margin-left: 20px;">Address</h4>
            <div class="form-floating">
                <input type="text" name="faddress" id="faddress" value="<?php echo $faddresss ?>" required>
                <label for="faddress" class="floating-label"> First line</label>
            </div>
            <div class="form-floating">
                <input type="text" name="laddress" id="laddress" value="<?php echo $laddress ?>" >
                <label for="laddress" class="floating-label"> Second line</label>
            </div>
            <div class="state-cont">
                <div class="form-floating state">
                    <select name="state" id="state" required>
                        <option value="" <?=$state== '' ? ' selected="selected"' : '';?> disabled="true" onchange="">Select your State</option>
                    </select>
                    <label for="state" class="floating-label">State</label>
                </div>
                <div class="form-floating state">
                    <select name="district" id="district" required>
                        <option value="" selected="true" disabled="true">Select Your District</option>
                    </select>
                    <label for="District" class="floating-label">District</label>
                </div>
            </div>
        </div>
        <div class="size">

            <div class="form-floating state">
                <select name="UserLevel" id="userlevel" required>
                    <option value="" disabled <?=$level=='' ? 'selected="selected"':'';?>> select user level</option>
                    <option value="admin" <?= $level=='admin' ? 'selected="selected"':''?> >Admin</option>
                    <option value="editor" <?= $level=='editor'?'selected="selected"':''?> >Editor</option>
                    <option value="user" <?= $level=='user'?'selected="selected"':''?>>User</option>
                </select>
                <label for="user-level" class="floating-label">Level</label>
            <div>
        </div>
        
        <div class="submit">
            <button class="btn" type="submit" name="update" id="submit">Update</button>
        </div>


    </form>



    </div>
    <script src="./user_profile.js"></script>
</body>
</html>