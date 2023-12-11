<?php

include 'connection.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $query = "SELECT * FROM `campaigns` WHERE advertisers_email = '$email'";
    $rs = mysqli_query($conn,$query);

    $data = $rs->fetch_assoc();

    $campaign_id = $data['campaign_id'];

    $query = "DELETE FROM `advertiser_payment` WHERE campaign_id = '$campaign_id'";
    $rs = mysqli_query($conn,$query);
    $query = "DELETE FROM `campaigns` WHERE advertisers_email = '$email'";
    $rs = mysqli_query($conn,$query);
    $query2 = "DELETE FROM `profilead_image`WHERE advertiser_email = '$email'";
    $rs2 = mysqli_query($conn,$query2);
    $query3 = "DELETE FROM `advertisers`WHERE email = '$email'";
    $rs3 = mysqli_query($conn,$query3);

}

header('location: manageAdAccounts.php');
exit;

?>