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

?>


<html>
<?php require('../../header.php'); ?>

    <body>
    <?php $icon = 'icon1'; require('../../sitebars/sitebarCustomer.php'); ?>
    <center>
    <h1>Customers Page</h1><br>
    <div style="margin-left: 250px;">
    <table class="table table-bordered">
            <tr>
                <td colspan = "2">
                    <h1><?php echo $login_session; ?> </h1>
                </td>
            </tr>
            <tr>
                <td>
                    Username:
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo($row['username']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo($row['pass']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo($row['email']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Status:
                    <?php 
                    if ($row['status']=="1"){
                        echo "Approved";
                    }
                    ?>
                </td>
                </tr>
              <tr>
                <td>
                    Payment:
                </td>
            </tr>
            <tr>
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
                    First Name:
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo($row['first_name']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Last Name:
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo($row['last_name']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number:
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo($row['phone']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <a href = "">Make a payment </a>
                    
            
                </td>
            </tr>
            <tr>
                <td>
                    <a href = "">Edit Profile </a>
                    
            
                </td>
            </tr>
            <tr>
                <td colspan = "2">
                    <a href = "">Logout </a>
                    
            
                </td>
            </tr>




        </table>
                    </div>
                    </center>
    </body>
</head>
</html>