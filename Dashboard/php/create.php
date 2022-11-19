<?php
    ini_set('display_errors', '1');
    require_once '../config/session.php';
    require_once '../config/connection.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $role = $_POST['role'];
        $check = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $check);
        $checkemail = "SELECT * FROM users WHERE email = '$email'";
        $resultemail = mysqli_query($conn, $checkemail);
        if(mysqli_num_rows($result) > 0)
        {
            echo "<script>alert('Username already exists')</script>";
            echo "<script>window.location.href='../createUser.php'</script>";
        }
        else if(mysqli_num_rows($resultemail) > 0)
        {
            echo "<script>alert('Email already exists')</script>";
            echo "<script>window.location.href='../createUser.php'</script>";

        }
        else
        {
            $sql = "INSERT INTO users (fname, lname, username, email, password, level) VALUES ('$fname', '$lname', '$username', '$email', '$password', '$role')";
            if(mysqli_query($conn, $sql))
            {
                sendmail($email,$fname,$username,$pass);
                echo "<script>alert('User created successfully')</script>";
                echo "<script>window.location.href='../createUser.php'</script>";
            }
            else
            {
                // echo "<script>alert('Error creating user')</script>";
                echo "Error creating user: " . mysqli_error($conn);
            }
        }
    }

    function sendmail($reciver_mail,$reciver_name,$username,$pass){

    
        require '../../mail/phpmailer/vendor/autoload.php';
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;									
            $mail->isSMTP();											
            $mail->Host	 = 'smtp.mailgun.org';					
            $mail->SMTPAuth = true;							
            $mail->Username = '';				
            $mail->Password = '';						
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;							
            $mail->Port	 = 465;
 
            $mail->setFrom('welcome@sympholic.tech', 'Simpholic');		
            // $mail->addAddress('receiver1@gfg.com');
            $mail->addAddress($reciver_mail, $reciver_name);

            $mail->isHTML(true);								
            $mail->Subject = 'Registered Successfully';
            $mail->Body = '<h2> Welcome to Sympholic </h2>
                            <h3>You have Been Registered Successfully</h3>
							<p>
                            Name: '.$reciver_name.'<br>
							Username: '. $username.' <br>
                            Password: '.$pass.'<br>
							You can <a href="https://sympholic.tech/Dashboard/login.php">Login Now </a> With above username
                            <br><br>
                            Change Your Password after login to Stay Secure:<a href="https://sympholic.tech/Dashboard-ui/sidebar.php?p=change-password">Click Here</a>
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