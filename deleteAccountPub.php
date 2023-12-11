<?php

include 'connection.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $query = "SELECT * FROM `inventories` WHERE publisher_email = '$email'";
    $rs = mysqli_query($conn,$query);

    $data = $rs->fetch_assoc();

    $inventory_id = $data['inventory_id'];

    $query = "DELETE FROM `payforinventories` WHERE inventory_id = '$inventory_id'";
    $rs = mysqli_query($conn,$query);
    $query = "DELETE FROM `publisher_bank_acc` WHERE email = '$email'";
    $rs = mysqli_query($conn,$query);
    $query = "DELETE FROM `inventories` WHERE publisher_email = '$email'";
    $rs = mysqli_query($conn,$query);
    $query2 = "DELETE FROM `profilepub_image`WHERE publisher_email = '$email'";
    $rs2 = mysqli_query($conn,$query2);
    $query3 = "DELETE FROM `publisher`WHERE email = '$email'";
    $rs3 = mysqli_query($conn,$query3);

}

header('location: managePubAccounts.php');
exit;

?>