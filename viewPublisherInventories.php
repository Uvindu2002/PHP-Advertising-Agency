<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Accounts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAdmin.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Manage Accounts</h1>
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
                if (!isset($_GET['email'])) {
                    header('location:viewAccountDetailsAd.php.php');
                    exit;
                }

                $email = $_GET['email'];

                $query = "SELECT * FROM `inventories` WHERE publisher_email = '$email'";
                $rs = mysqli_query($conn, $query);
            }
            ?>


            <div class="table-container">
                <div class="fheading">
                    <h4 class="fh2">Inventories</h4>
                </div>
                <table class="margintop25">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>View</th>
                            <th>Optimize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>{$row['inventory_id']}</td>
                                    <td>{$row['inventory_name']}</td>
                                    <td>{$row['website_url']}</td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='viewPublisherInvenOne.php?id={$row['inventory_id']}'\">View</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='col5'>
                                            <button class='btn2' onclick=\"window.location.href='deleteAdminInventory.php?id={$row['inventory_id']}'\">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>   
        </div>     


    </div>

</body>
</html>