<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Campaign</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAd.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Update Campaign</h1>
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
                    header('location:pendignCampaign.php');
                    exit;
                }

                $campaign_id = $_GET['id'];

                $query = "SELECT * FROM `campaigns` WHERE campaign_id = '$campaign_id'";
                $rs = mysqli_query($conn, $query);

                $data = $rs->fetch_assoc();

                if (!$data) {
                    header('location:pendignCampaign.php');
                    exit;
                }

                $budget = $data['Budget_type_id'];
                $audience = $data['Audience_id'];
                $campaign_name = $data['campaign_name'];
                $ad_unit = $data['ad_units'];
                $period = $data['period_id'];
                $content = $data['content'];
            } else {
                $budget = $_POST['budget'];
                $audience = $_POST['audience'];
                $campaign_name = $_POST['campaign_name'];
                $ad_unit = $_POST['ad_unit'];
                $period = $_POST['period'];
                $content = $_POST['content'];

                $message = array();

                if (empty($budget) || empty($audience) || empty($campaign_name) || empty($ad_unit) || empty($period) || empty($content)) {
                    $message[] = 'All fields are required';
                } else {
                    $campaign_id = $_GET['id'];

                    $query = "UPDATE `campaigns` SET campaign_name = '$campaign_name', content = '$content', ad_units = '$ad_unit', Budget_type_id = '$budget', Audience_id = '$audience', period_id = '$period', status = '1' WHERE campaign_id = '$campaign_id'";
                    $rs = mysqli_query($conn, $query);

                    if ($rs) {
                        $message[] = 'Data updated correctly';
                        header('location:pendignCampaign.php');
                        exit;
                    } else {
                        $message[] = 'Error updating data: ' . mysqli_error($conn);
                    }
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
                                $budgetQuery = "SELECT * FROM `budget_type`";
                                $rsBudget = mysqli_query($conn, $budgetQuery);

                                while ($budgetRow = $rsBudget->fetch_assoc()) {
                                    $budgetId = $budgetRow["b_id"];
                                    $budgetType = $budgetRow["type"];
                                    $selected = ($budgetId == $budget) ? 'selected' : '';
                                    echo "<option value='$budgetId' $selected>$budgetType</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col4">
                            <label>Select Audience:</label><br><br>
                            <select name="audience">
                                <?php
                                $audienceQuery = "SELECT * FROM `audience`";
                                $rsAudience = mysqli_query($conn, $audienceQuery);

                                while ($audienceRow = $rsAudience->fetch_assoc()) {
                                    $audienceId = $audienceRow["a_id"];
                                    $audienceCategory = $audienceRow["catergory"];
                                    $selected = ($audienceId == $audience) ? 'selected' : '';
                                    echo "<option value='$audienceId' $selected>$audienceCategory</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col9 margintop25">
                        <label>Campaign Name:</label>
                        <input type="text" name="campaign_name" class="margintop25 size" value="<?php echo $campaign_name; ?>">
                    </div>

                    <div class="ffeild margintop25">

                        <div class="col4">
                            <label>Ad unit category:</label><br><br>
                            <select name="ad_unit">
                                <?php
                                $adUnitQuery = "SELECT * FROM `ad_unit`";
                                $rsAdUnit = mysqli_query($conn, $adUnitQuery);

                                while ($adUnitRow = $rsAdUnit->fetch_assoc()) {
                                    $adUnitId = $adUnitRow["a_id"];
                                    $adUnitName = $adUnitRow["ad_units"];
                                    $selected = ($adUnitId == $ad_unit) ? 'selected' : '';
                                    echo "<option value='$adUnitId' $selected>$adUnitName</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col4">
                            <label>Period:</label><br><br>
                            <select name="period">
                                <?php
                                $periodQuery = "SELECT * FROM `period`";
                                $rsPeriod = mysqli_query($conn, $periodQuery);

                                while ($periodRow = $rsPeriod->fetch_assoc()) {
                                    $periodId = $periodRow["p_id"];
                                    $periodType = $periodRow["type"];
                                    $selected = ($periodId == $period) ? 'selected' : '';
                                    echo "<option value='$periodId' $selected>$periodType</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="col9">
                        <label>Ad content:</label><br><br>
                        <input type="text" name="content" class="size" value="<?php echo $content; ?>">
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