<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "sideBarPub.php"; ?>
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
		<div class="container">

			<?php
            include 'connection.php';

            if (isset($_SESSION['u'])) {
                $email = $_SESSION['u']['email'];
            }

            $query = "SELECT * FROM `publisher` WHERE email = '$email'";
            $rs = mysqli_query($conn, $query);

            $image_query = "SELECT * FROM `profilepub_image` WHERE publisher_email ='$email' ";
            $image_rs = mysqli_query($conn, $image_query);

            $data = $rs->fetch_assoc();
            $image_data = $image_rs->fetch_assoc();

            if (isset($_FILES["image"])) {
                $image = $_FILES["image"];

                $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
                $file_ex = $image["type"];

                if (!in_array($file_ex, $allowed_image_extensions)) {
                    echo "Please select a valid image.";
                } else {
                    $new_file_extension = "";

                    if ($file_ex == "image/jpg") {
                        $new_file_extension = ".jpg";
                    } else if ($file_ex == "image/jpeg") {
                        $new_file_extension = ".jpeg";
                    } else if ($file_ex == "image/png") {
                        $new_file_extension = ".png";
                    } else if ($file_ex == "image/svg+xml") {
                        $new_file_extension = ".svg";
                    }

                    $file_name = "resource/profile_img/" . $_SESSION['u']['fname'] . "_" . uniqid() . $new_file_extension;

                    move_uploaded_file($image["tmp_name"], $file_name);

                    $image_query = "SELECT * FROM `profilepub_image` WHERE publisher_email = '".$_SESSION['u']['email']."'";
                    $image_rs = mysqli_query($conn, $image_query);
                    $image_num = mysqli_num_rows($image_rs);

                    if ($image_num == 1) {
                        $update = "UPDATE `profilepub_image` SET path_url = '$file_name' WHERE publisher_email = '".$_SESSION['u']['email']."'";
                        $update_rs = mysqli_query($conn, $update);
                    } else {
                        $insert = "INSERT INTO `profilepub_image` (path_url, publisher_email) VALUES ('$file_name', '".$_SESSION['u']['email']."')";
                        $insert_rs = mysqli_query($conn, $insert);
                    }
                    
                    // Redirect to prevent duplicate image submission on refresh
                    header('location: profilePub.php');
                    exit;
                }
            }
            ?>

            <div class="col4">
                <div class="">
                    <div class="">
                    <?php
                    if (empty($image_data["path_url"])) {
                    ?>
                        <img src="resource/profile_img/user.png" id="viewImg" class="profile-img col3" width="150px" height="150px">
                    <?php
                    } else {
                    ?>
                        <img src="<?php echo ($image_data["path_url"]); ?>" id="viewImg" class="profile-img col3" width="150px" height="150px">
                    <?php
                    }
                    ?>   
                    </div>

                    <center>
                        <span class="col4 margintop1"><?php echo ($data["fname"]); ?>&nbsp;<?php echo ($data["lname"]); ?></span>
                        <span class="col4 margintop1"><?php echo ($data["email"]); ?></span>
                    </center>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="col5">
                            <input type="file" class="hide" id="profileimg" accept="image/*" name="image">
                            <label for="profileimg" class="btn3 col5 margintop25 padtop10 padleft15" onclick="changeImage();">Update Image</label>

                        </div>
                        <div class="col4">
                            <input type="submit" value="Submit" class="fbtn">
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function changeImage() {
                    document.getElementById("profileimg").click();
                }
            </script>

            <?php


                $query = "SELECT * FROM `publisher` WHERE email = '$email'";
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

                    $query = "UPDATE `publisher` SET fname = '$fname', lname = '$lname', mobile = '$mobile' WHERE email = '$email'";
                    $rs = mysqli_query($conn, $query);

                    if ($rs) {
                        $message[] = 'Data updated correctly';
                        header('location: profilePub.php');
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

                            <div class="col8 margintop25">
                                <label class="flable">Password</label>
                                <div class="">
                                    <input type="password" class="fcontrol" id="npi" value="<?php echo ($data["password"]); ?>" readonly>
                                </div>
                            </div>

                            <div class="col8 margintop25">
                                <label class="flable">Registered Date</label>
                                <input type="text" class="fcontrol" readonly value="<?php echo ($data["joined_date"]); ?>" />
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