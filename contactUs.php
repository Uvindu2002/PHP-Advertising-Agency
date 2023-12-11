<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  display: flex;
}

.col5 {
  width: 50%;
  margin: auto;
  display: flex;
  flex-direction: column;
  margin: 0 75px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <div class="col5">
    <form action="" method="post">
      <label for="fname">Name</label>
      <input type="text" id="fname" name="name" placeholder="Your name..">

      <label for="email">Email</label>
      <input type="text" id="email" name="email" placeholder="Your email..">

      <label for="subject">Massege</label>
      <textarea id="subject" name="massege" placeholder="Write something.." style="height:200px"></textarea>

      <input type="submit" value="Submit" name="submit">
    </form>
  </div>
  <div class="col5">
    <h1>Contact Us</h1>  
    <p>We would be delighted to hear from you! At AdWorld, we value open communication and are always eager to assist you. Whether you have inquiries, require assistance, or want to explore the possibilities of collaborating with our agency, we're just a message away.<br>Feel free to reach out to our dedicated team through the following channels:</p>

    <h3>Phone: +94 2505352562</h3>
    <h3>Email: contactus@adworld.com</h3>

    <p>Our knowledgeable and friendly representatives are available during business hours to answer your questions, provide guidance, and address any concerns you may have. We understand that every client is unique, so we take the time to listen attentively and understand your specific needs.</p>  
  </div>
</div>

</body>
</html>

<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $massege = $_POST['massege'];
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
    $mail->setFrom($email);
    $mail->addAddress('wup0327@gmail.com');     


    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Massege from contact us page';
    $mail->Body    = '<h3>Name : '.$name.' <br> Email : '.$email.' <br> Massege : '.$massege.' <br></h3>';

    $mail->send();
    echo 'Message has been sent';
    header('location:home.php');
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



?>