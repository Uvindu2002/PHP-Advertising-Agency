<?php

include 'connection.php';

if (isset($_GET['id'])) {
    $campaign_id = $_GET['id'];

    $query = "UPDATE `campaigns` SET status = '1' WHERE campaign_id = '$campaign_id'";
    $rs = mysqli_query($conn,$query);

}

header("location: pendignCampaign.php");
exit;

?>