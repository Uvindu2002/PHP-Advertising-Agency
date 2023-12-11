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

            $query = "SELECT * FROM `advertisers`";
            $rs = mysqli_query($conn, $query);


            ?>


            <div class="table-container">
                <div class="fheading">
                    <h4 class="fh2">Advertisers Accounts</h4>
                </div>
                <table class="margintop25">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>View</th>
                            <th>Optimize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>{$row['email']}</td>
                                    <td>{$row['fname']}</td>
                                    <td>{$row['lname']}</td>
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='viewAccountDetailsAd.php?email={$row['email']}'\">View</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='col5'>
                                            <button class='btn2' onclick=\"window.location.href='deleteAccountAd.php?email={$row['email']}'\">Delete</button>
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