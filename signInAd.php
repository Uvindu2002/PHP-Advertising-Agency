<?php

include 'connection.php';

session_start();

if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
}

if (isset($_COOKIE["password"])) {
    $password = $_COOKIE["password"];
}



if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $password = $_POST['password'];


   if(empty($email)){
       $message[] = "Please enter your Email !";
   }else if(strlen($email) > 100){
       $message[] = "Email must have less than 100 characters.";
   }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
       $message[] = "Invalid Email !";
   }else if(empty($password)){
       $message[] = "Please enter your Password !";
   }else{

   $query = "SELECT * FROM `advertisers` WHERE email = '$email' AND password = '$password'";
   $rs = mysqli_query($conn,$query);

   if($rs->num_rows > 0){

      $d = $rs->fetch_assoc();
      $_SESSION['u'] = $d;

      if($_POST['rememberme'] != NULL){

         setcookie("email",$email,time()+(60*60*24*365));
         setcookie("password",$password,time()+(60*60*24*365));

      }else{

         setcookie("email","",-1);
         setcookie("password","",-1);

      }

      header('location:profileAd.php');
      
   }else{
      $message[] = 'incorrect email or password!';
   }

}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign In</title>

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
         <div class="ffeild">
            <button type="button" class="btn1" onclick="window.location.href = 'signUpAd.php';">Advertiser</button>
         </div>

         <div class="fheading">
            <h2 class="fh2">Sign In</h2>
            <p class="para2">as a advertiser</p>
         </div>
         <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '
                  <div class="message">
                     <span>'.$message.'</span>
                     <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                  </div>
                  ';
               }
            }
         ?>

         <form action="" method="post" enctype="multipart/form-data">
            <div class="col9">
               <label class="flable">Email</label>
               <?php if (isset($_SESSION['u'])) { ?>
                   <input type="email" class="fcontrol" name="email" value="<?php echo $_SESSION['u']['email']; ?>">
               <?php } else { ?>
                   <input type="email" class="fcontrol" name="email" value="">
               <?php } ?>
            </div>
            <div class="col9">
               <label class="flable">Password</label>
               <?php if (isset($_SESSION['u'])) { ?>
                   <input type="password" class="fcontrol" name="password" value="<?php echo $_SESSION['u']['password']; ?>">
               <?php } else { ?>
                   <input type="password" class="fcontrol" name="password" value="">
               <?php } ?>
            </div>
            <div class="ffeild">
               <div class="col2">
                   <div>
                      <input class="" type="checkbox" name="rememberme" />
                   <label class="flable">Remember Me</label>
                   </div>
               </div>
               <div class="col2">
                  <a href="forgotPasswordAd.php" class="" onclick="forgotPassword();">Forgot Password</a>
               </div>
            </div>
            <div class="ffeild">
               <div class="col4">
                  <button type="submit" class="fbtn" name="submit">Sign In</button>
               </div>
               <div class="col4">
                  <button type="button" class="fbtn" onclick="window.location.href = 'signUpAd.php';">Already have an account? Sign In</button>
               </div>
            
            </div>
         </form>

      </section>
   </div>


</body>
</html>