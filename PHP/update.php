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

}
 if (isset ($_POST['update'])){
     $user = $_POST ['username'];
     $pass = $_POST ['pass'];
     $email = $_POST ['email'];
     $status = $_POST ['status'];
     $receipt = $_POST ['receipt'];
     $payment = 0;

     if ($_POST ['receipt']) {
         $payment = 1;
     }

    if ($status == "1"){

        $result = mysqli_query($mysqli, "INSERT into customers(username, pass, email, status, payment, receipt) VALUES ('$user', '$pass', '$email', '$status', '$payment', '$receipt')");

            if ($result){

            $result1 = mysqli_query($mysqli, "DELETE FROM apply WHERE username ='$user'");

                if($result1){

                    echo "<script>alert (\"Approve successfully\");
                    window.location.href = \"listapplicant.php\";

                    </script>";
                }
            }  
        }
    else if ($status == "2"){

            $result2 = mysqli_query($mysqli, "DELETE FROM apply WHERE username = '$user'");

            if ($result2){

                echo "<script>alert (\"Reject successfully\");
                window.location.href = \"listapplicant.php\";

                </script>";
            }
        }
 }

 else {

    echo "<script>alert (\"Failed to update\");
    window.location.href = \"listapplicant.php\";

    </script>";
 }
?>
