


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

            <form action="" method="post" class="col4 margintop50" enctype="multipart/form-data">
                <div class="col9">
                   <label class="flable">Email</label>
                   <input type="email" class="fcontrol" name="email">
                </div>
                <div class="col4">
                   <button type="submit" class="btn4" name="submit">Reset</button>
                </div>
            </form>

    </div>

</body>
</html>

<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
}else {
    exit(); 
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$query = "SELECT * FROM `advertisers` WHERE email = '$email'";
$rs = mysqli_query($conn,$query);

if ($rs->num_rows == 1) {

    $code = uniqid();

    $query1 = "UPDATE `advertisers` SET verification_code = '$code' WHERE email = '$email'";
    $rs1 = mysqli_query($conn,$query1);

    $mail = new PHPMailer(true);

    try {                    
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'wup0327@gmail.com';                     
    $mail->Password   = 'gopwqpqididmzhwq';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('ravindumaleesha06270107@gmail.com', 'Admin');
    $mail->addAddress($email);     


    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Forgot Password verification code';
    $mail->Body    = '<h1 style="color:green">Your Verification Code is '.$code.'</h1>';

    $mail->send();
    echo 'Message has been sent';
    header('location:forgotPasswordProcessAd.php');
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}else {
    echo("Success");
}

?>