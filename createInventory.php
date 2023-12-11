<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarPub.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Create Inventory</h1>
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

            }

            if(isset($_POST['submit'])){

               $inventory_name = $_POST['inventory_name'];
               $ad_units = $_POST['ad_units'];
               $web_catergory = $_POST['web_catergory'];
               $web_url = $_POST['web_url'];

                $query = "INSERT INTO `inventories`(inventory_name, website_url, publisher_email, web_catergory_id, ad_units, status) VALUES('$inventory_name','$web_url', '$email', '$web_catergory', '$ad_units', '1')";
                $rs = mysqli_query($conn,$query);

                if ($rs) {
                    $message[] = 'Success';
                    header('location: createInventory.php');
                } else {
                    $message[] = 'Failed to insert data into the database';
                }
              }


            ?>

            <div class="container create-background">
                <form action="" method="post" class="container col8">

                    <div class="col9 margintop25">
                        <label>Inventory Name:  </label>
                        <input type="text" name="inventory_name" id="inventory_name" class="margintop25 size">
                    </div>

                    <div class="col5 margintop25">
                        <label>Website URL:  </label>
                        <input type="text" name="web_url" id="web_url" class="margintop25 size">
                    </div>
                    
                    <div class="ffeild margintop25">
                        <div class="col4">
                            <label>Web Catergory</label><br><br>
                            <select name="web_catergory">
                                <?php
                                $cater = "SELECT * FROM `web_catergory`";
                                $rscater = mysqli_query($conn,$cater);

                                $n = $rscater->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $d = $rscater->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["w_id"]); ?>"><?php echo ($d["catergory"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col4">
                            <label>Ad units:</label><br><br>
                            <select name="ad_units">
                                <?php
                                $period = "SELECT * FROM `ad_units`";
                                $rsperiod = mysqli_query($conn,$period);

                                $n = $rsperiod->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $d = $rsperiod->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["a_id"]); ?>"><?php echo ($d["type"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                            
                    </div>

                    <br>
 
                    <div class="col4 margintop25">
                        <input type="submit" name="submit" class="fbtn">
                    </div>
                </form>
            </div>



        </div>

    </div>

</body>
</html>