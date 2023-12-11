<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Designing Campaigns</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "sideBarAdmin.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Designing Campaigns</h1>
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

                $query = "SELECT * FROM `campaigns` WHERE status = '1'";
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>{$row['campaign_id']}</td>
                                    <td>{$row['campaign_name']}</td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='viewAdvertiserCampOne.php?id={$row['campaign_id']}'\">View</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn2' onclick=\"window.location.href='completed.php?id={$row['campaign_id']}'\">Completed</button>
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