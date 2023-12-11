<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendign Campaign</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAd.php"; ?>
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

            if (isset($_SESSION['u'])) {
                $email = $_SESSION['u']['email'];

                $query = "SELECT * FROM `campaigns` WHERE advertisers_email = '$email'";
                $rs = mysqli_query($conn, $query);
            }

            ?>

            <div class="table-container">
                <center><h1>Pendign Campaigns</h1></center>
                <table>
                    <thead>
                        <tr>
                            <th>Campaign Id</th>
                            <th>Campaign Name</th>
                            <th></th>
                            <th>Optimize</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                            if ($row['status'] == 2) { // Check if status value is greater than 1
                                echo "
                                <tr>
                                    <td>{$row['campaign_id']}</td>
                                    <td>{$row['campaign_name']}</td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='updateCampaign.php?id={$row['campaign_id']}'\">Update</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='col5'>
                                            <button class='btn3' onclick=\"window.location.href='publishCampaign.php?id={$row['campaign_id']}'\">Publish</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn2' onclick=\"window.location.href='redesign.php?id={$row['campaign_id']}'\">Redesign</button>
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


        <div class="container">
            <?php
            include 'connection.php';

            if (isset($_SESSION['u'])) {
                $email = $_SESSION['u']['email'];

                $query = "SELECT * FROM `campaigns` WHERE advertisers_email = '$email'";
                $rs = mysqli_query($conn, $query);
            }

            ?>

            <div class="table-container">
                <center><h1>Designing Campaigns</h1></center>
                <table>
                    <thead>
                        <tr>
                            <th>Campaign Id</th>
                            <th>Campaign Name</th>
                            <th>Optimize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                            if ($row['status'] == 1) { // Check if status value is greater than 1
                                echo "
                                <tr>
                                    <td>{$row['campaign_id']}</td>
                                    <td>{$row['campaign_name']}</td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='updateCampaign.php?id={$row['campaign_id']}'\">View & Update</button>
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


    </div>

</body>
</html>