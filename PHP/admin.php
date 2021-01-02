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
    <head>
    <title>Admin Page</title>
    </head>


    <body>
        <table border = "1">
            <tr>
                <td colspan="3">
                    <h1>Admin Page</h1>
                </td>
            </tr>
            <tr>
                <td colspan = "3">
                    <h1>Welcome<?php echo $login_session; ?> </h1>
                </td>
            </tr>
            <tr>
                <td>
                    <a href = "listapplicant.php">View List Applicant</a>
                </td>
                <td>
                    <a href = "listmember.php">View Member </a>
                    
            
                </td>
                <td>
                    <a href = "Logout.php">Logout </a>
                    
            
                </td>
            </tr>


        </table>
    </body>

</html>
<?php
}
?>