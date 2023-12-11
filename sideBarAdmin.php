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

				header('location:admin.php');

			}
			
            $query = "SELECT * FROM `admin` WHERE email = '$email'";
   			$rs = mysqli_query($conn,$query);

   			$data = $rs->fetch_assoc();

            ?>
            <div>
                <img src="resource/profile_img/user.png" id="viewImg" class="user-img" >
            </div>

            
			<div>
				<p class="bold"><?php echo ($data["fname"]); ?>&nbsp;<?php echo ($data["lname"]); ?></p>
				<p><?php echo ($data["email"]); ?></p>
			</div>
		</div>
		<ul>
			<li>
				<a href="adminDashboard.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Dashboard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>
			<li>
				<a href="adminProfile.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Profile</span>
				</a>
				<span class="tooltip">Profile</span>
			</li>
			<li>
				<a href="manage.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Manage</span>
				</a>
				<span class="tooltip">Manage</span>
			</li>
			<li>
				<a href="designing.php">
					<i class='bx bxs-dashboard'></i>
					<span class="nav-item">Design</span>
				</a>
				<span class="tooltip">Design</span>
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