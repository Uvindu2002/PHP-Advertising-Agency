<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "sideBarAd.php"; ?>
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

            $query = "SELECT * FROM `publisher_bank_acc` WHERE email = '$email'";
            $rs = mysqli_query($conn,$query);

            if ($rs->num_rows > 0) {

                $data = $rs->fetch_assoc();

                if (isset($_POST['submit'])) {
                    $bank_name = $_POST['bank_name'];
                    $Account_number = $_POST['Account_number'];

                    $query2 = "UPDATE `publisher_bank_acc` SET bank_name = '$bank_name', Account_number = '$Account_number'  WHERE email = '$email'";
                    $rs2 = mysqli_query($conn,$query2);

                    if ($rs2) {
                        $message[] = 'Data updated correctly';
                        header('location: paymentPub.php');
                        exit;
                    } else {
                        $message[] = 'Error updating data: ' . mysqli_error($conn);
                    }

                }
            }else {


                if (isset($_POST['submit'])) {
                $bank_name = $_POST['bank_name'];
                $Account_number = $_POST['Account_number'];

                $message = array();

                if (empty($bank_name) || empty($Account_number)) {
                    $message[] = 'All fields are required';
                } else {

                    $query1 = "INSERT INTO `publisher_bank_acc`(bank_name, Account_number, email) VALUES('$bank_name','$Account_number', '$email')";
                    $rs1 = mysqli_query($conn, $query1);

                    if ($rs1) {
                        $message[] = 'Data updated correctly';
                        header('location: paymentPub.php');
                        exit;
                    } else {
                        $message[] = 'Error updating data: ' . mysqli_error($conn);
                    }
                }
            }
        }
            ?>

            <div class="col6">
                <div class="">
                    <div class="fheading">
                        <h4 class="fh2">Bank details</h4>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mt-4">
                            <div class="col8 margintop25">
                                <label class="flable">Bank Name</label>
                                <input type="text" class="fcontrol" value="<?php if ($rs->num_rows > 0) {
                                    echo ($data["bank_name"]);
                                } else {
                                    echo "enter bank name";
                                }

                                 ?>" name="bank_name" />
                            </div>

                            <div class="col8 margintop25">
                                <label class="flable">Account Number</label>
                                <input type="text" class="fcontrol" value="<?php  if ($rs->num_rows > 0) {
                                    echo ($data["Account_number"]);
                                } else {
                                    echo "enter Account_number";
                                } ?>" name="Account_number" />
                            </div>

                            <div class="col3 margintop25">
                                <button class="fbtn" type="submit" name="submit">Update</button>
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