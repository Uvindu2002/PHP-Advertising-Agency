

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

            <form action="" method="post" class="col4 margintop50" enctype="multipart/form-data">
                <div class="col9">
                   <label class="flable">Verification Code</label>
                   <input type="text" class="fcontrol" name="verification_code">
                </div>
                <div class="col9">
                   <label class="flable">New password</label>
                   <input type="password" class="fcontrol" name="npassword">
                </div>
                <div class="col9">
                   <label class="flable">Retype Password</label>
                   <input type="password" class="fcontrol" name="rpassword">
                </div>
                <div class="col4">
                   <button type="submit" class="btn4" name="submit">Reset</button>
                </div>
            </form>

    </div>

</body>
</html>

<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $verification_code = $_POST['verification_code'];
    $npassword = md5($_POST['npassword']);
    $rpassword = md5($_POST['rpassword']);

    if ($npassword == $rpassword) {
        $query = "UPDATE `advertisers` SET password = '$rpassword' WHERE verification_code = '$verification_code'";
        $rs = mysqli_query($conn,$query);

        header('location:signInAd.php');
    }

    
}else {
    exit(); 
}

?>