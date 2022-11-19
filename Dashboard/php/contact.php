<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once '../config/connection.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['msg'];
    $sql = "INSERT INTO contact (name,email,msg) VALUES ('$name','$email','$message')";
    if(mysqli_query($conn,$sql)){
        sendmail($email,$name,$message);
        threat_gen($name,$email,$message);
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Message Submit Succesfully');
                window.location.href='http://sympholic.tech';
                 </script>");
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

function sendmail($reciver_mail,$reciver_name,$message){

    
        require '../../mail/phpmailer/vendor/autoload.php';
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;									
            $mail->isSMTP();											
            $mail->Host	 = 'smtp.mailgun.org';					
            $mail->SMTPAuth = true;							
            $mail->Username = 'h';				
            $mail->Password = '';						
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;							
            $mail->Port	 = 465;
 
            $mail->setFrom('contact@sympholic.tech', 'Simpholic');		
            // $mail->addAddress('receiver1@gfg.com');
            $mail->addAddress($reciver_mail, $reciver_name);

            $mail->isHTML(true);								
            $mail->Subject = 'Thanks For Contacting Us';
            $mail->Body = '<h2>Dear '.$reciver_name.'</h2>
                            <p>Thanks for contacting us </p>
                            <p>Our team will get back to you soon.</p>
                            <br>Regards,
                            <br>Team Simpholic';
            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return 0;
}

function threat_gen($receiver_mal,$receiver_name,$message){

    
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

        $mail->setFrom('contact@sympholic.tech', 'Simpholic');		
        // $mail->addAddress('receiver1@gfg.com');
        $mail->addAddress('adarshbhardwaj285@gmail.com', 'Contact Smpholic');

        $mail->isHTML(true);								
        $mail->Subject = 'New Threat from Simpholic';
        $mail->Body = '<h2>New Threat Generated</h2><br><p><b>Name:</b>'.$receiver_name.'</p><p><b>Email:</b>'.$receiver_mal.'</p><p><b>Message:</b>'.$message.'</p>';
        $mail->send();
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    return 0;
}
?>
