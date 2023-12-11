<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventories</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarPub.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Inventories</h1>
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

                $query = "SELECT * FROM `inventories` WHERE publisher_email = '$email'";
                $rs = mysqli_query($conn, $query);
            }

            ?>

            <!-- card -->

            <?php

            echo "<div class='card-container '>";

            while ($row = $rs->fetch_assoc()) {
                echo "
                <div class='card'>
                    <div class='card-header col1'>
                        <span class='card-id'>{$row['inventory_id']}</span>
                    </div>
                    <div class='card-body'>
                        <div class='card-main'>
                            <span class='card-name'>{$row['inventory_name']}</span>
                        </div>
                        <p class='card-content'>{$row['website_url']}</p>
                        <div class='card-actions'>
                            <div class='col3'>
                                <button class='btn3 ' onclick=\"window.location.href='updateInventory.php?id={$row['inventory_id']}'\">Update</button>
                            </div>
                            <div class='col3'>
                                <button class='btn2' onclick=\"window.location.href='deleteInventory.php?id={$row['inventory_id']}'\">Delete</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                ";
            }

            echo "</div>";


            ?>


    </div>

</body>
</html>