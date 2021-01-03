<?php

include('../config.php');
session_start ();

$user_check = $_SESSION ['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.php");
    die();
}

$login_session = "";
$row = "";

$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE username = '$user_check'");
if($result){
    $row = mysqli_fetch_array($result);
    if($row)
        $login_session = $row['username'];
}

$pp = 'default_profile.png';
if ($row['photo']) {
    $pp = $row['photo'];
}

?>


<html>
<?php require('../../header.php'); ?>

    <body>
    <?php $icon = 'icon1'; require('../../sitebars/sitebarCustomer.php'); ?>
    <center>
    <h1>Customers Page</h1><br>
    <div style="margin-left: 250px;">
    <h1><?php echo $login_session; ?> </h1>
    <table class="table">
            <tr>
                <td width="20%">
                    Profile Picture
                </td>
                <td width="2%">:</td>
                <td>
                    <img src="../../uploads/<?php echo $pp ?>" style="max-width: 100px; max-height: 100px;" />
                    
                </td>
            </tr>
            <tr>
                <td width="10%">
                    Username
                </td>
                <td width="2%">:</td>
                <td>
                    <?php echo($row['username']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Password
                    </td>
                <td>:</td>
                <td>
                    <?php echo($row['pass']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Email
                    </td>
                <td>:</td>
                <td>
                    <?php echo($row['email']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Status
                    </td>
                <td>:</td>
                <td>
                    <?php 
                    if ($row['status']=="1"){
                        echo "Approved";
                    }
                    ?>
                </td>
                </tr>
              <tr>
                <td>
                    Payment
                    </td>
                <td>:</td>
                <td>
                    <?php
                     if ($row['payment']=="0"){
                        echo "Unpaid";
                     }
                     else {
                         echo "Paid";
                     }
                     ?>
                </td>
                    </tr> 
            </tr>
            <tr>
                <td>
                    First Name
                    </td>
                <td>:</td>
                <td>
                    <?php echo($row['first_name']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number
                    </td>
                <td>:</td>
                <td>
                    <?php echo($row['phone']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Receipt
                    </td>
                <td>:</td>
                <td>
                     <?php if ($row['receipt']) { ?>
                    <a target="_blank" href="../../uploads/<?php echo($row['receipt']); ?>">Receipt</a>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a class="btn btn-primary" href = "">Make a payment </a>
                    <a class="btn btn-primary" href = "editprofile.php">Edit Profile </a>
                    <a class="btn btn-link" href = "../Logout.php">Logout </a>
                </td>
            </tr>




        </table>
                    </div>
                    </center>
    </body>
</head>
</html>