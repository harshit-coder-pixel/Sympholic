<?php
    require '../config/connection.php';
    require '../config/session.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    if(isset($_POST['submit']))
    {
        $oldPass = $_POST['o_pass'];
        $newPass = $_POST['n_pass'];
        $confirmPass = $_POST['c_pass'];
        $id = $_POST['id'];
        $name = $_SESSION['Name'];
        $email = $_SESSION['email'];
        $uname = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE uno = '$id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result))
        {
            while($row = mysqli_fetch_array($result))
            {
                $pass = $row['password'];
                $pass = password_verify($oldPass,$pass);
                if($pass || $row['password'] == $oldPass)
                {
                    if($newPass == $confirmPass)
                    {
                        sendmail($email,$name,$uname);
                        $enpass = password_hash($newPass,PASSWORD_DEFAULT);
                        $update = "UPDATE users SET password = '$enpass' WHERE uno = '$id'";
                        mysqli_query($conn,$update);
                        echo '<script type="text/JavaScript">
                        alert("Password Changed Successfully");
                        self.parent.location.replace("../login.php");
                        </script>';
                    }
                    else
                    {
                        echo '<script type="text/JavaScript">
                        alert("New Password and Confirm Password does not match");
                        window.location.replace("../passwordChange.php");
                        </script>';
                    }
                }
                else
                {
                    echo '<script type="text/JavaScript">
                    alert("Old Password is incorrect");
                    window.location.replace("../passwordChange.php");
                    </script>';
                }
            }
        }
    }
    else
    {
        echo '<script type="text/JavaScript">
        alert("Please Login First");
        </script>';
    }

    function sendmail($reciver_mail,$reciver_name,$uname){

    
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
            $mail->Subject = 'Password Changed';
            $mail->Body = '<h2>'.$uname.'</h2>
                            <h3>Your Password has been updated</h3>
							<p>
                            If this is not you Please <a href="https://sympholic.tech/Landing-site/contact.php">contact us</a> or Send us <a href="mailto:dummy@email.com">email us</a>
                            <br>
							</p>
                            <br>Regards,
                            <br>Team Simpholic';
            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return 0;
}

?>
