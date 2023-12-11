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

				header('location:signInAd.php');

			}
			
            $query = "SELECT * FROM `advertisers` WHERE email = '$email'";
   			$rs = mysqli_query($conn,$query);

   			$image_query = "SELECT * FROM `profilead_image` WHERE advertiser_email ='$email' ";
            $image_rs = mysqli_query($conn, $image_query);

   			$data = $rs->fetch_assoc();
   			$image_data = $image_rs->fetch_assoc();

            ?>

            <div>
            	<?php
                if (empty($image_data["path_url"])) {
                ?>
                    <img src="resource/profile_img/user.png" id="viewImg" class="user-img" >
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
				<a href="profileAd.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Profile</span>
				</a>
				<span class="tooltip">Profile</span>
			</li>
			<li>
				<a href="campaigns.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Campaigns</span>
				</a>
				<span class="tooltip">Campaigns</span>
			</li>
			<li>
				<a href="pendignCampaign.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Pendign</span>
				</a>
				<span class="tooltip">Pendign</span>
			</li>
			<li>
				<a href="createCampaign.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Create</span>
				</a>
				<span class="tooltip">Create</span>
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