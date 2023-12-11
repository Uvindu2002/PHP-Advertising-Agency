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
				<h1>Profile</h1>
			</div>
			<div class="navbar-item">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>            
                </a>
            </div>			
		</div>
		<!-- Header -->

		<!-- content -->
		<div class="container margintop25">

			<?php
            include 'connection.php';

            if (isset($_SESSION['u'])) {
                $email = $_SESSION['u']['email'];
            }

            $query = "SELECT * FROM `admin` WHERE email = '$email'";
            $rs = mysqli_query($conn, $query);

            $data = $rs->fetch_assoc();
            
            ?>

            <div class="col4">
                <div class="">
                    <div class="">
                        <img src="resource/profile_img/user.png" id="viewImg" class="profile-img col3" width="150px" height="150px">  
                    </div>

                    <center>
                        <span class="col4 margintop1"><?php echo ($data["fname"]); ?>&nbsp;<?php echo ($data["lname"]); ?></span>
                        <span class="col4 margintop1"><?php echo ($data["email"]); ?></span>
                    </center>
                </div>
            </div>

            <?php


                $query = "SELECT * FROM `admin` WHERE email = '$email'";
                $rs = mysqli_query($conn, $query);

                $data = $rs->fetch_assoc();

                if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mobile = $_POST['mobile'];

                $message = array();

                if (empty($fname) || empty($lname) || empty($mobile)) {
                    $message[] = 'All fields are required';
                } else {
                    $email = $_SESSION['u']['email'];

                    $query = "UPDATE `admin` SET fname = '$fname', lname = '$lname', mobile = '$mobile' WHERE email = '$email'";
                    $rs = mysqli_query($conn, $query);

                    if ($rs) {
                        $message[] = 'Data updated correctly';
                        header('location: profileAd.php');
                        exit;
                    } else {
                        $message[] = 'Error updating data: ' . mysqli_error($conn);
                    }
                }
            }
            ?>

            <div class="col6">
                <div class="">

                    <div class="fheading">
                        <h4 class="fh2">Profile Settings</h4>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mt-4">
                            <div class="container margintop25">
                                <div class="col3">
                                    <label class="flable">First Name</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["fname"]); ?>" name="fname"/>
                                </div>

                                <div class="col3">
                                    <label class="flable">Last Name</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["lname"]); ?>" name="lname"/>
                                </div>  
                            </div>

                            <div class="col8 margintop25">
                                <label class="flable">Mobile</label>
                                <input type="mobile" class="fcontrol" value="<?php echo ($data["mobile"]); ?>" name="mobile"/>
                            </div>
                            <div class="col8 margintop25">
                                <label class="flable">Email</label>
                                <input type="email" class="fcontrol" value="<?php echo ($data["email"]); ?>" readonly />
                            </div>
                                                
                            <div class="col3 margintop25">
                                <button class="fbtn" type="submit" name="submit">Update My Profile</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
		<!-- content -->

		
	</div>
	

</body>
</html>