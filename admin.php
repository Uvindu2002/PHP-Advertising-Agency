<?php

include 'connection.php';

session_start();

if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
}


if(isset($_POST['submit'])){

   $email = $_POST['email'];


   if(empty($email)){
       $message[] = "Please enter your Email !";
   }else if(strlen($email) > 100){
       $message[] = "Email must have less than 100 characters.";
   }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
       $message[] = "Invalid Email !";
   }else{

   $query = "SELECT * FROM `admin` WHERE email = '$email'";
   $rs = mysqli_query($conn,$query);

   if($rs->num_rows > 0){

      $d = $rs->fetch_assoc();
      $_SESSION["u"] = $d;

      setcookie("email",$email,time()+(60*60*24*365));

      header('location:adminDashboard.php');
      
   }else{
      $message[] = 'incorrect email!';
   }

}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

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
            <button class="btn1" onclick="window.location.href = 'signUpAd.php';">Advertiser</button>
            <button class="btn1" onclick="window.location.href = 'signUpPub.php';">Publisher</button>
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
   <!-- Header -->

   
   <div class="container">

      <section class="col5">

         <center><div class="section1"></div></center>
         
      </section>

      <section class="col5">

         <div class="fheading marginbottom15">
            <h2 class="fh2">Sign In</h2>
            <p class="para2">as a Admin</p>
         </div>
         <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '
                  <div class="message col5">
                     <span>'.$message.'</span>
                     <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                  </div>
                  ';
               }
            }
         ?>

         <form action="" method="post" enctype="multipart/form-data">
            <div class="col9 marginbottom15">
               <label class="flable marginbottom15">Email</label>
               <?php if (isset($_SESSION['u'])) { ?>
                   <input type="email" class="fcontrol" name="email" value="<?php echo $_SESSION['u']['email']; ?>">
               <?php } else { ?>
                   <input type="email" class="fcontrol" name="email" value="">
               <?php } ?>
            </div>
            <div class="col6">
               <button type="submit" class="fbtn" name="submit">Sign In</button>
            </div>
         </form>

      </section>
   </div>

</body>
</html>