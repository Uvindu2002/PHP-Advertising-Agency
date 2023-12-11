<?php

include 'connection.php';

if (isset($_GET['id'])) {
    $inventory_id = $_GET['id'];

    $query = "DELETE FROM `payforinventories` WHERE inventory_id = '$inventory_id'";
    $rs = mysqli_query($conn,$query);
    $query = "DELETE FROM `inventories` WHERE inventory_id = '$inventory_id'";
    $rs = mysqli_query($conn,$query);

}

header('location: manage.php');
exit;

?>