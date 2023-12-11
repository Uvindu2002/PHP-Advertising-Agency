<?php

include 'connection.php';

if(isset($_POST['submit'])){

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $mobile = $_POST['mobile'];

   if(empty($fname)){
       $message[] = "Please enter your First Name !!!";
   }else if(strlen($fname) > 50){
       $message[] = "First Name must have less than 50 characters.";
   }else if(empty($lname)){
       $message[] = "Please enter your Last Name !!!";
   }else if(strlen($lname) > 50){
       $message[] = "Last Name must have less than 50 characters.";
   }else if(empty($email)){
       $message[] = "Please enter your Email !!!";
   }else if(strlen($email) >= 100){
       $message[] = "Email must have less than 100 characters.";
   }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
       $message[] = "Invalid Email !!!";
   }else if(empty($password)){
       $message[] = "Please enter your Password !!!";
   }else if(empty($mobile)){
       $message[] = "Please enter your Mobile Number !!!";
   }else if(strlen($mobile) !=10){
       $message[] = "Mobile Number must have 10 characters.";
   }else {   
      $query = "SELECT * FROM `publisher` WHERE email = '$email' or mobile = '$mobile'";
      $rs = mysqli_query($conn,$query);

      if($rs->num_rows > 0){
         $message[] = 'user already exist!';
      }else{

         $d = new DateTime();
         $tz = new DateTimeZone("Asia/Colombo");
         $d->setTimezone($tz);
         $date = $d->format("Y-m-d H:i:s");

         $insert = "INSERT INTO `publisher`(email, fname, lname, password, mobile, joined_date, status) VALUES('$email','$fname','$lname','$password','$mobile','$date','1')";
         $result = mysqli_query($conn,$insert);

         if ($result) {
            $message[] = 'Success';

            header('location:signInPub.php');
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign Up</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   <!-- Header -->
   <div>
      <div class="nav">
         <div class="nav-item">
            <button class="btn1" onclick="window.location.href = 'home.php';">Home</button>
            <button class="btn1" onclick="window.location.href = 'contactUs.php';">Contact Us</button>
         </div>
         <div class="nav-item">
            <button class="btn1" onclick="window.location.href = 'admin.php';">Go to Admin</button>
         </div>
      </div>
      <div class="content1">
         <div class="logo"></div>
            <div class="para1">
                <p class="">Hi, Welcome to adWorld</p>
            </div>
      </div>
   </div>
   <!-- Header -->


   <div class="container">
      <section class="col5">
         <center><div class="section1"></div></center>
      </section>
      <section class="col5">
         <div class="ffeild" >
            <button type="button" class="btn1" onclick="window.location.href = 'signUpAd.php';">Advertiser</button>
         </div>

         <div class="fheading">
            <h2 class="fh2">Sign Up</h2>
            <p class="para2">as a publisher</p>
         </div>

         <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '
                  <div class="message">
                     <span>'.$message.'</span>
                  </div>
                  ';
               }
            }
         ?>

         <form action="" method="post" enctype="multipart/form-data">
            <div class="ffeild">
               <div class="col4">
                  <label class="flable">First Name</label>
                  <input type="text" class="fcontrol" name="fname">
               </div>
               <div class="col4">
                  <label class="flable">Last Name</label>
                  <input type="text" class="fcontrol" name="lname">
               </div>
            </div>            
            <div class="col9">
               <label class="flable">Email</label>
               <input type="email" class="fcontrol" name="email">
            </div>
            <div class="col9">
               <label class="flable">Password</label>
               <input type="password" class="fcontrol" name="password">
            </div>
            <div class="col9">
               <label class="flable">Mobile</label>
               <input type="text" class="fcontrol" name="mobile">
            </div>
            <div class="ffeild">
               <div class="col4">
                  <button type="submit" class="fbtn" name="submit">Sign up</button>
               </div>
               <div class="col4">
                  <button type="button" class="fbtn" onclick="window.location.href = 'signInPub.php';">Already have an account? Sign In</button>
               </div>
            </div>
         </form>

      </section>
   </div>

   


</body>
</html>