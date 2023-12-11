<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Accounts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAdmin.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Manage</h1>
            </div>
            <div class="navbar-item">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>            
                </a>
            </div>          
        </div>
        <!-- Header -->
        <div class="container">

            <div class="col8 margintop50">
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='manageAdAccounts.php'">Advertisers</button>
                </div>
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='managePubAccounts.php'">Publishers</button>
                </div>
            </div>
            <div class="col8 margintop50">
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='manageAdCampaigns.php'">Campaigns</button>
                </div>
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='managePubInventories.php'">Inventories</button>
                </div>
            </div>
            
        </div> 

        <div class="container">

            <div class="col8 margintop50">
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='payIn.php'">Pay In</button>
                </div>
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='payOut.php'">Pay Out</button>
                </div>
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='wantToPay.php'">Want to Out</button>
                </div>
            </div>
            
        </div>  




    </div>

</body>
</html>