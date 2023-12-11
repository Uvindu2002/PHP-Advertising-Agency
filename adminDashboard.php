<?php 

    include 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "sideBarAdmin.php"; ?>
	<div class="main-content">
		<!-- Header -->
		<div class="nav">
			<div class="navbar-item">
				<h1>Dashboard</h1>
			</div>
			<div class="navbar-item">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>            
                </a>
            </div>			
		</div>
		<!-- Header -->

		<!-- content -->
		<div class="">
            <div class="container margintop50">
                <div class="count-card col2">
                    <div class="count-part">
                        <?php

                            $query = "SELECT * FROM `advertisers`";
                            $rs = mysqli_query($conn,$query);

                            $data = $rs->num_rows;

                        ?>
                        <h1><?php echo "$data";?></h1>
                    </div>
                    <span>Advertisers</span>
                </div>
                <div class="count-card col2">
                    <div class="count-part">
                        <?php

                            $query = "SELECT * FROM `campaigns`";
                            $rs = mysqli_query($conn,$query);

                            $data = $rs->num_rows;

                        ?>
                        <h1><?php echo "$data";?></h1>
                    </div>
                    <span>Campaigns</span>
                </div>
                <div class="count-card col2">
                    <div class="count-part">
                        <?php

                            $query = "SELECT * FROM `publisher`";
                            $rs = mysqli_query($conn,$query);

                            $data = $rs->num_rows;

                        ?>
                        <h1><?php echo "$data";?></h1>
                    </div>
                    <span>Publishers</span>
                </div>
                <div class="count-card col2">
                    <div class="count-part">
                        <?php

                            $query = "SELECT * FROM `inventories`";
                            $rs = mysqli_query($conn,$query);

                            $data = $rs->num_rows;

                        ?>
                        <h1><?php echo "$data";?></h1>
                    </div>
                    <span>Inventories</span>
                </div>
            </div>
            <div class="container margintop50 most-user-cont">

                <div class="most-user col2">
                    <?php

                    $query = "SELECT advertisers_email, COUNT(*) AS email_count FROM `campaigns` GROUP BY advertisers_email ORDER BY email_count DESC LIMIT 1";
                    $rs = mysqli_query($conn,$query);

                    $data = $rs->fetch_assoc();

                    $email = $data['advertisers_email'];

                    $details = "SELECT * FROM `advertisers` WHERE email = '$email'";
                    $details_rs = mysqli_query($conn,$details);
                    $image_query = "SELECT * FROM `profilead_image` WHERE advertiser_email ='$email' ";
                    $image_rs = mysqli_query($conn, $image_query);

                    $details_data = $details_rs->fetch_assoc();
                    $image_data = $image_rs->fetch_assoc();

                    ?>
                    <div class="most-card">
                        <?php
                        if (empty($image_data["path_url"])) {
                        ?>
                            <img src="resource/profile_img/user.png" id="viewImg" class="most-user-Img">
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo ($image_data["path_url"]); ?>" id="viewImg" class="most-user-Img">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="">
                        <center>
                            <span><?php echo ($details_data['fname'])?>&nbsp;<?php echo ($details_data['lname'])?></span>
                            <br>
                            <span><?php echo ($data['advertisers_email']) ?></span>
                        </center>
                    </div>
                </div>

                <div class="most-user col2">
                    <?php

                    $query = "SELECT publisher_email, COUNT(*) AS email_count FROM `inventories` GROUP BY publisher_email ORDER BY email_count DESC LIMIT 1";
                    $rs = mysqli_query($conn,$query);

                    $data = $rs->fetch_assoc();

                    $email = $data['publisher_email'];

                    $details = "SELECT * FROM `publisher` WHERE email = '$email'";
                    $details_rs = mysqli_query($conn,$details);
                    $image_query = "SELECT * FROM `profilepub_image` WHERE publisher_email ='$email' ";
                    $image_rs = mysqli_query($conn, $image_query);

                    $details_data = $details_rs->fetch_assoc();
                    $image_data = $image_rs->fetch_assoc();

                    ?>
                    <div>
                        <?php
                        if (empty($image_data["path_url"])) {
                        ?>
                            <img src="resource/profile_img/user.png" id="viewImg" class="most-user-Img">
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo ($image_data["path_url"]); ?>" id="viewImg" class="most-user-Img">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="">
                        <center>
                            <span><?php echo ($details_data['fname'])?>&nbsp;<?php echo ($details_data['lname'])?></span>
                            <br>
                            <span><?php echo ($data['publisher_email']) ?></span>
                        </center>
                    </div>
                </div>
                
            </div>
        </div>


        <!-- content -->



		
	</div>
	

</body>
</html>