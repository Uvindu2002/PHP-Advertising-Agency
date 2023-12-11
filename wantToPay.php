<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Want to pay inventories</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAdmin.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Want to pay inventories</h1>
            </div>
            <div class="navbar-item">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>            
                </a>
            </div>          
        </div>
        <!-- Header -->

        <div class="container">

            <div class="container">

            <?php
            include 'connection.php';

                $query = "SELECT * FROM `inventories`";
                $rs = mysqli_query($conn, $query);

            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>view</th>
                            <th>pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                            if ($row['status'] < 2) {
                                echo "
                                    <tr>
                                        <td>{$row['inventory_id']}</td>
                                        <td>{$row['inventory_name']}</td>
                                        <td>
                                            <div class='col6'>
                                                <button class='btn4' onclick=\"window.location.href='viewPublisherInvenOne.php?id={$row['inventory_id']}'\">View</button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='col6'>
                                                <button class='btn2' onclick=\"window.location.href='paymentAdmin.php?id={$row['inventory_id']}'\">pay</button>
                                            </div>
                                        </td>
                                    </tr>
                                    ";
                            }
                        }
                        ?>
                    </tbody>
                </table>            
        </div>  


    </div>

</body>
</html>