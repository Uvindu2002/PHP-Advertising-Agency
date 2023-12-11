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
		<div class="container">

			<?php
            include 'connection.php';

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (!isset($_GET['email'])) {
                    header('location:manageAccounts.php');
                    exit;
                }

                $email = $_GET['email'];

                $query = "SELECT * FROM `publisher` WHERE email = '$email'";
                $rs = mysqli_query($conn, $query);

                $image_query = "SELECT * FROM `profilepub_image` WHERE publisher_email ='$email' ";
                $image_rs = mysqli_query($conn, $image_query);

                $data = $rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
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

                    <div class="col5">
                        <button class="btn3" onclick="window.location.href='viewPublisherInventories.php?email=<?php echo "$email"; ?>'">View Inventories</button>
                    </div>
                </div>
            </div>

            <script>
                function changeImage() {
                    document.getElementById("profileimg").click();
                }
            </script>




            <div class="col6">
                <div class="">

                    <div class="fheading">
                        <h4 class="fh2">Profile</h4>
                    </div>

                    <form>
                        <div class="row mt-4">
                            <div class="container margintop25">
                                <div class="col3">
                                    <label class="flable">First Name</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["fname"]); ?>" name="fname" readonly/>
                                </div>

                                <div class="col3">
                                    <label class="flable">Last Name</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["lname"]); ?>" name="lname" readonly/>
                                </div>  
                            </div>

                            <div class="col8 margintop25">
                                <label class="flable">Mobile</label>
                                <input type="mobile" class="fcontrol" value="<?php echo ($data["mobile"]); ?>" name="mobile" readonly/>
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
                                <input type="text" class="fcontrol" readonly value="<?php echo ($data["joined_date"]); ?>" readonly/>
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