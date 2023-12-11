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
            $campaign_id = $_GET['id'];

            if (isset($_POST['submit'])) {
                $cnumber = $_POST['cnumber'];
                $cvv = $_POST['cvv'];
                $amount = $_POST['amount'];

                $query = "INSERT INTO `advertiser_payment`(campaign_id, card_number, cvv, amount) VALUES('$campaign_id','$cnumber','$cvv','$amount')";
                $result = mysqli_query($conn,$query);

                if ($result) {
                    header("location: pendignCampaign.php");
                }
            }

}

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="col9">
                   <label class="flable">Card Number</label>
                   <input type="text" class="fcontrol" name="cnumber">
                </div>

                <div class="ffeild">
                   <div class="col4">
                      <label class="flable">Ex date</label>
                      <input type="text" class="fcontrol" name="date">
                   </div>
                   <div class="col4">
                      <label class="flable">cvv</label>
                      <input type="text" class="fcontrol" name="cvv">
                   </div>
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