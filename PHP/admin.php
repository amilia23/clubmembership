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
    if($row)
        $login_session = $row['username'];

?>
<html>

<?php require('../header.php'); ?>

    <body>
    <?php require('../sitebars/sitebarAdmin.php'); ?>
        <center>
    <h1>Admin Page</h1>
    <hr />
    <h2>Welcome <?php echo $login_session; ?> </h2>
</center>
    </body>

</html>
<?php
}
?>