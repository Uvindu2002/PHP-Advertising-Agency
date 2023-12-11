<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarPub.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>payment</h1>
            </div>
            <div class="navbar-item">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>            
                </a>
            </div>          
        </div>
        <!-- Header -->
        <div class="container">

            <div class="col8 margintop50">
                <div class="col5">
                    <button class='fbtn' onclick="window.location.href='publisherBank.php'">Bank Details</button>
                </div>
            </div>
            
            
        </div> 

        <div class="container">

            <div class="container">

            <?php
            include 'connection.php';

                $query = "SELECT * FROM `payforinventories`";
                $rs = mysqli_query($conn, $query);

            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Inventory ID</th>
                            <th>Bank name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['inventory_id']}</td>
                                    <td>{$row['bankname']}</td>
                                    <td>{$row['amount']}</td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='viewPublisherInvenOne.php?id={$row['inventory_id']}'\">View</button>
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

</body>
</html>