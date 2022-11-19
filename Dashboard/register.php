<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
        include "../fav.php";
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/reg.css">
    <title>Register</title>
</head>
<body>
<section style="margin:10px 10px 0">
    <a href="../Landing-site/homepage.php" style="text-decoration:none;color:purple">
    <i class="fa fa-arrow-circle-left" style="font-size:24px"></i>
    Go Back to Home
    </a>
    </section>
<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
				</div>
				<form  method="post" onsubmit="checksub(event)" >
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" name="fname" required>
						<input type="text" placeholder="Last Name" class="form-control" name="lname" required>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="username" required autocomplete="off">
						<i class="fa fa-user"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Patient-ID" class="form-control" name="patient-id" required autocomplete="off">
						<i class="fa fa-user"></i>
					</div>
					<div class="form-wrapper">
						<input type="email" placeholder="Email Address" class="form-control" name="email" required>
						<i class="fa fa-envelope"></i>
					</div>
					<div class="form-wrapper">
						<select id="" name="gen" class="form-control"  required>
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="fa fa-venus-mars	
                        " style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" id="pass" placeholder="Password" class="form-control" required name="pass" autocomplete="off">
						<i class="fa fa-eye-slash" id="1" onclick="eye1()"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password"  name="cpass" id="cpass"class="form-control" required onchange="check()">
						<i class="fa fa-eye-slash" id="2" onclick="eye2()"></i>
					</div>
                    <div>
                        <label><input type="checkbox" style="vertical-align: middle;" required ><p style="display:inline-block;margin: 0 0 10px;padding: 0;"> &nbsp;Agree with tearms and condition?</p></label>
                    </div>
					<button type="submit" name="submit" >Register
					</button>
					<script src="./js/reg.js"></script>
                    <p class="hov sign-in"><a href="./login.php">Already have account?</a> </p>
				</form>
			</div>
		</div>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit']))
{
	require './config/connection.php';

    $username=$_POST['username'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $gender=$_POST['gen'];
    $password=password_hash($_POST['pass'],PASSWORD_DEFAULT);
	$cpass=$_POST['cpass'];

		$sqlcheckuser="SELECT * FROM users WHERE username='$username'";
		$test= mysqli_query($conn,$sqlcheckuser);
		if(mysqli_num_rows($test))
		{
			echo '<script type="text/JavaScript">
			alert("Username Already Exist... Plear to login");
			window.location.href="./login.php";
			</script>';
		}
		else{
			$sqlcheckmail="SELECT * FROM users WHERE email='$email'";
			$testmail= mysqli_query($conn,$sqlcheckmail);
			if(mysqli_num_rows($testmail))
			{
				echo '<script type="text/JavaScript">
				alert("Email Already Exist");
				</script>';
			}
			else{
				$sql="INSERT INTO users(username,fname,lname,email,gender,password) VALUES('$username','$fname','$lname','$email','$gender','$password')";
				
				if($conn->query($sql)===TRUE)
				{
					sendmail($email,$fname,$username);
					echo '<script type="text/JavaScript"> 
					alert("Register Successfull");
					window.location.replace("./login.php")
					</script>';
					;
				}
				else
				{
					echo "Error: ".$sql."<br>".$conn->error;
				}

			}
		}	
	}


	function sendmail($reciver_mail,$reciver_name,$username){

    
        require '../mail/phpmailer/vendor/autoload.php';
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;									
            $mail->isSMTP();											
            $mail->Host	 = 'smtp.mailgun.org';					
            $mail->SMTPAuth = true;							
            $mail->Username = 'postmaster@email.sympholic.tech';				
            $mail->Password = 'f06dbd11e3d8a86660a3e2a834fcf281-fe066263-1a259ca4';						
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;							
            $mail->Port	 = 465;
 
            $mail->setFrom('welcome@sympholic.tech', 'Simpholic');		
            // $mail->addAddress('receiver1@gfg.com');
            $mail->addAddress($reciver_mail, $reciver_name);

            $mail->isHTML(true);								
            $mail->Subject = 'Register Successfully';
            $mail->Body = '<h2>Dear '.$reciver_name.'</h2>
                            <h3>You have Been Registered Successfully<h3
							<p>
							Username: '. $username.' <br>
							You can <a href="https://sympholic.tech/Dashboard/login.php">Login Now </a> With above username
							</p>
                            <br>Regards,
                            <br>Team Simpholic';
            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return 0;
}

?>