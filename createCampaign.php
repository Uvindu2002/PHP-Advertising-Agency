<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Campaign</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAd.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Create Campaign</h1>
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

               $budget = $_POST['budget'];
               $audience = $_POST['audience'];
               $campaign_name = $_POST['campaign_name'];
               $ad_unit = $_POST['ad_unit'];
               $period = $_POST['period'];
               $content = $_POST['content'];

                $query = "INSERT INTO `campaigns`(campaign_name, content, advertisers_email, ad_units, Budget_type_id, Audience_id, period_id, status) VALUES('$campaign_name','$content', '$email', '$ad_unit', '$budget', '$audience', '$period', '1')";
                $rs = mysqli_query($conn,$query);

                if ($rs) {
                    $message[] = 'Success';
                    header('location: createCampaign.php');
                } else {
                    $message[] = 'Failed to insert data into the database';
                }
              }


            ?>

            <div class="container create-background">
                <form action="" method="post" class="container col8">
                    
                    <div class="ffeild">
                        <div class="col4">
                            <label>Select Budget:</label><br><br>
                            <select name="budget">
                                <?php
                                $budget = "SELECT * FROM `budget_type`";
                                $rsbudget = mysqli_query($conn,$budget);

                                $n = $rsbudget->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $d = $rsbudget->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["b_id"]); ?>"><?php echo ($d["type"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col4">
                            <label>Select Audience:</label><br><br>
                            <select name="audience">
                                <?php
                                $audience = "SELECT * FROM `audience`";
                                $rsaudi = mysqli_query($conn,$audience);

                                $n = $rsaudi->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $d = $rsaudi->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["a_id"]); ?>"><?php echo ($d["catergory"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col9 margintop25">
                        <label>Campaign Name:  </label>
                        <input type="text" name="campaign_name" id="campaign_name" class="margintop25 size">
                    </div>
                    
                    <div class="ffeild margintop25">
                        <div class="col4">
                            <label>Ad unit category:</label><br><br>
                            <select name="ad_unit">
                                <?php
                                $cater = "SELECT * FROM `ad_unit`";
                                $rscater = mysqli_query($conn,$cater);

                                $n = $rscater->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $d = $rscater->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["a_id"]); ?>"><?php echo ($d["ad_units"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col4">
                            <label>Period:</label><br><br>
                            <select name="period">
                                <?php
                                $period = "SELECT * FROM `period`";
                                $rsperiod = mysqli_query($conn,$period);

                                $n = $rsperiod->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $d = $rsperiod->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["p_id"]); ?>"><?php echo ($d["type"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                            
                    </div>

                    <br>

                    <div class="col9">
                        <label>Ad content:</label><br><br>
                        <input type="text" name="content" class="size">
                    </div>
 
                    <div class="col4 margintop25">
                        <input type="submit" name="submit" class="fbtn">
                    </div>
                </form>
            </div>



        </div>

    </div>

</body>
</html>