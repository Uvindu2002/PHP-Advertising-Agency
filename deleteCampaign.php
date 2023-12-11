<?php

include 'connection.php';

if (isset($_GET['id'])) {
    $campaign_id = $_GET['id'];

    $query = "DELETE FROM `advertiser_payment` WHERE campaign_id = '$campaign_id'";
    $rs = mysqli_query($conn,$query);

    $query1 = "DELETE FROM `campaigns` WHERE campaign_id = '$campaign_id'";
    $rs1 = mysqli_query($conn,$query1);

}

header('location: campaigns.php');
exit;

?>
