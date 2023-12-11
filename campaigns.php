<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campaigns</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAd.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Campaigns</h1>
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

            if (isset($_SESSION['u'])) {
                $email = $_SESSION['u']['email'];

                $query = "SELECT * FROM `campaigns` WHERE advertisers_email = '$email'";
                $rs = mysqli_query($conn, $query);
            }

            ?>

            <!-- card -->

            <?php

            echo "<div class='card-container '>";

            while ($row = $rs->fetch_assoc()) {
                if ($row['status'] == 3) { // Check if status value is greater than 1
                    echo "
                    <div class='card'>
                        <div class='card-header col1'>
                            <span class='card-id'>{$row['campaign_id']}</span>
                        </div>
                        <div class='card-body'>
                            <div class='card-main'>
                                <span class='card-name'>{$row['campaign_name']}</span>
                            </div>
                            <p class='card-content'>{$row['content']}</p>
                            <div class='card-actions'>
                                <div class='col3'>
                                    <button class='btn3 ' onclick=\"window.location.href='updateCampaign.php?id={$row['campaign_id']}'\">Update</button>
                                </div>
                                <div class='col3'>
                                    <button class='btn2' onclick=\"window.location.href='deleteCampaign.php?id={$row['campaign_id']}'\">Delete</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    ";
                }
            }

            echo "</div>";


            ?>


    </div>

</body>
</html>