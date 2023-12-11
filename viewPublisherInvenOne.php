<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAdmin.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Inventory</h1>
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

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (!isset($_GET['id'])) {
                    header('location:inventories.php');
                    exit;
                }

                $inventory_id = $_GET['id'];

                $query = "SELECT * FROM `inventories` WHERE inventory_id = '$inventory_id'";
                $rs = mysqli_query($conn, $query);

                $data = $rs->fetch_assoc();

                if (!$data) {
                    header('location:inventories.php');
                    exit;
                }

                $web_catergory_id = $data['web_catergory_id'];
                $inventory_name = $data['inventory_name'];
                $ad_units = $data['ad_units'];
                $website_url = $data['website_url'];
            }
            ?>

            <div class="container create-background">
                <form class="container col8">

                    <div class="col9 margintop25">
                        <label>Inventory Name:  </label>
                        <input type="text" name="inventory_name" id="inventory_name" class="margintop25 size" readonly value="<?php echo $inventory_name; ?>">
                    </div>

                    <div class="col5 margintop25">
                        <label>Website URL:  </label>
                        <input type="text" name="web_url" id="web_url" class="margintop25 size" readonly value="<?php echo $website_url; ?>">
                    </div>
                    
                    <div class="ffeild margintop25">
                        <div class="col4">
                            <label>Web Catergory</label><br><br>
                            <select name="web_catergory" readonly>
                                <?php
                                $cater = "SELECT * FROM `web_catergory`";
                                $rscater = mysqli_query($conn,$cater);

                                while ($catergoryRow = $rscater->fetch_assoc()) {
                                    $catergoryId = $catergoryRow["w_id"];
                                    $catergory = $catergoryRow["catergory"];
                                    $selected = ($catergoryId == $web_catergory_id) ? 'selected' : '';
                                    echo "<option value='$catergoryId' $selected>$catergory</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col4">
                            <label>Ad units:</label><br><br>
                            <select name="ad_units" readonly>
                                <?php
                                $adUnitQuery = "SELECT * FROM `ad_units`";
                                $rsAdUnit = mysqli_query($conn, $adUnitQuery);

                                while ($adUnitRow = $rsAdUnit->fetch_assoc()) {
                                    $adUnitId = $adUnitRow["a_id"];
                                    $adUnitName = $adUnitRow["type"];
                                    $selected = ($adUnitId == $ad_units) ? 'selected' : '';
                                    echo "<option value='$adUnitId' $selected>$adUnitName</option>";
                                }
                                ?>
                            </select>
                        </div>
                            
                    </div>
                </form>
            </div>



        </div>

    </div>

</body>
</html>