<?php

include('config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.php");
    die();

}

$result = mysqli_query($mysqli, "SELECT username FROM admin WHERE username = '$user_check'");
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row) {
        $login_session = $row['username'];
    }

//2) get the id from the request
$id = $_GET ['id'];
//3) select data from database
$result = mysqli_query($mysqli, "SELECT *  FROM customers WHERE id=$id");
if ($row1 = mysqli_fetch_array($result)) {
    $i = 1;

    $pp = 'default_profile.png';
    if ($row1['photo']) {
        $pp = $row1['photo'];
    }
?>

    <html>
    <?php require('../header.php'); ?>
        <body>
        <?php $icon = 'icon2'; require('../sitebars/sitebarAdmin.php'); ?>
        <center>
        <h1>View Member</h1><br>
        <div style="margin-left: 250px;">
        <button class="btn btn-link" onclick="window.location.href='listmember.php';">
                Back
        </button>
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
                    <?php echo($row1['username']); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                    </td>
                <td>:</td>
                <td>
                    <?php echo($row1['pass']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Email
                    </td>
                <td>:</td>
                <td>
                    <?php echo($row1['email']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Status
                    </td>
                <td>:</td>
                <td>
                    <?php 
                    if ($row1['status']=="1"){
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
                     if ($row1['payment']=="0"){
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
                    <?php echo($row1['first_name']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Phone Number
                    </td>
                <td>:</td>
                <td>
                    <?php echo($row1['phone']); ?>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Receipt
                    </td>
                <td>:</td>
                <td>
                     <?php if ($row1['receipt']) { ?>
                    <a target="_blank" href="../uploads/<?php echo($row1['receipt']); ?>">Receipt</a>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a class="btn btn-primary" href = "editcustomer.php?id=<?php echo $id ?>">Edit Member </a>
                </td>
            </tr>
        </table>
</div>
</center>
</body>
</html>
<?php
}}
?>
  