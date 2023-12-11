<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Side bar</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="sidebar">
		<div class="top">
			<div class="sidebar-logo">
				<i class='bx bxs-plane-take-off'></i>
				<span>Ad World</span>
			</div>
			<i class='bx bx-menu' id="sidebar-btn"></i>
		</div>
		<div class="user">
			<?php

			include 'connection.php';

			session_start();

			$email = $_SESSION['u']['email'];

			if(!isset($email)){

				header('location:signInPub.php');

			}

            $query = "SELECT * FROM `publisher` WHERE email = '$email'";
   			$rs = mysqli_query($conn,$query);

   			$image_query = "SELECT * FROM `profilepub_image` WHERE publisher_email ='$email' ";
            $image_rs = mysqli_query($conn, $image_query);

   			$data = $rs->fetch_assoc();
   			$image_data = $image_rs->fetch_assoc();

            ?>

            <div>
            	<?php
                if (empty($image_data["path_url"])) {
                ?>
                    <img src="resource/profile_img/user.png" id="viewImg" class="user-img">
                <?php
                } else {
                ?>
                    <img src="<?php echo ($image_data["path_url"]); ?>" id="viewImg" class="user-img">
                <?php
                }
                ?>
            </div>
			<div>
				<p class="bold"><?php echo ($data["fname"]); ?>&nbsp;<?php echo ($data["lname"]); ?></p>
				<p><?php echo ($data["email"]); ?></p>
			</div>
		</div>
		<ul>
			<li>
				<a href="profilePub.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Profile</span>
				</a>
				<span class="tooltip">Profile</span>
			</li>
			<li>
				<a href="inventories.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Invetories</span>
				</a>
				<span class="tooltip">Invetories</span>
			</li>
			<li>
				<a href="createInventory.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Create</span>
				</a>
				<span class="tooltip">Create</span>
			</li>
			<li>
				<a href="paymentPub.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Payments</span>
				</a>
				<span class="tooltip">Payments</span>
			</li>
		</ul> 
		
	</div>

	


	<script type="text/javascript">
		let btn = document.querySelector('#sidebar-btn')
		let sidebar = document.querySelector('.sidebar')

		btn.onclick = function () {
			sidebar.classList.toggle('active');
		};
	</script>

</body>
</html>