<?php
include ('config.php');
session_start();
if(isset($_POST['submit'])){
    $user = $_POST ['username'];
    $pass = $_POST ['pass'];

    $select1 = "SELECT * FROM admin WHERE username = '$user' and pass = '$pass'";
    $select2 = "SELECT * FROM customers WHERE username = '$user' and pass = '$pass'";
    $select3 = "SELECT * FROM apply WHERE username = '$user' and pass = '$pass'";

    $result1 = mysqli_query($mysqli, $select1);
    $count1 = mysqli_num_rows ($result1);
    
    $result2 = mysqli_query($mysqli, $select2);
    $count2 = mysqli_num_rows ($result2);

    $result3 = mysqli_query($mysqli, $select3);
    $count3 = mysqli_num_rows ($result3);

    if ( $count1 == 1){
        $_SESSION['login_user'] = $user;
        header ("location: admin.php");

    }
    else if ( $count2 == 1){
        $_SESSION['login_user'] = $user;
        header ("location: customer/customer.php");
        
    }
    else if ( $count3 == 1){
        echo "<script>alert(\"Wait for Approval\");

        window.location.href = \"../index.php\";

        </script>";
    }


    else{
        echo "<script>alert(\"Your Login Name or Password is invalid\");
    
        window.location.href = \"../index.php\";
    
            </script>";


        
    }
}
    else{
        echo "<script>alert(\"Your Login Name or Password is invalid\");
    
            window.location.href = \"../index.php\";
    
            </script>";


    
    }



?>