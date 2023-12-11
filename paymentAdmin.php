<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAd.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Payment</h1>
            </div>
            <div class="navbar-item">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>            
                </a>
            </div>          
        </div>
        <!-- Header -->

        <div class="container">

            <?php
            include 'connection.php';

            if (isset($_GET['id'])) {
            $inventory_id = $_GET['id'];

            $query1 = "SELECT * FROM `inventories` WHERE inventory_id = '$inventory_id'";
            $rs1 = mysqli_query($conn,$query1);

            $data = $rs1->fetch_assoc();

            $email = $data["publisher_email"];

            $query2 = "SELECT * FROM `publisher_bank_acc` WHERE email = '$email'";
            $rs2 = mysqli_query($conn,$query2);

            $data1 = $rs2->fetch_assoc();

            $bankname = $data1["bank_name"];
            $accountnum = $data1["Account_number"];


            if (isset($_POST['submit'])) {
                $amount = $_POST['amount'];

                $query = "INSERT INTO `payforinventories`(inventory_id, bankname, accountnum, amount) VALUES('$inventory_id','$bankname','$accountnum','$amount')";
                $result = mysqli_query($conn,$query);

                $query3 = "UPDATE `inventories` SET status = '2' WHERE inventory_id = '$inventory_id'";
                $rs3 = mysqli_query($conn,$query3);

                if ($result) {
                    header("location: wantToPay.php");
                }
            }

}

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="col9">
                   <label class="flable">Bank Name</label>
                   <input type="text" class="fcontrol" value="<?php echo ($data1["bank_name"]); ?>" readonly >
                </div>

                <div class="col9">
                   <label class="flable">Account Number</label>
                   <input type="text" class="fcontrol" value="<?php echo ($data1["Account_number"]); ?>" readonly >
                </div>           
                
                <div class="col9">
                   <label class="flable">Amount</label>
                   <input type="text" class="fcontrol" name="amount">
                </div>
                <div class="ffeild">
                   <div class="col4">
                      <button type="submit" class="btn3" name="submit">Pay</button>
                   </div>
                </div>
             </form>



        </div>


    </div>

</body>
</html>