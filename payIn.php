<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendign Campaign</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAdmin.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Pendign Campaign</h1>
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

                $query = "SELECT * FROM `advertiser_payment`";
                $rs = mysqli_query($conn, $query);

            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>campaign_id</th>
                            <th>Card number</th>
                            <th>cvv</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['campaign_id']}</td>
                                    <td>{$row['card_number']}</td>
                                    <td>{$row['cvv']}</td>
                                    <td>{$row['amount']}</td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='viewAdvertiserCampOne.php?id={$row['campaign_id']}'\">View</button>
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