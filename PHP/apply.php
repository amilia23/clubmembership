<?php

include('config.php');

if (isset($_POST['submit'])){

    $customer = $_POST ['username'];
    $password = $_POSt['pass'];
    $email = S_POST ['email'];


    $result = mysqli_query ($mysqli, "INSERT INTO apply (username, password, email) VALUES ('$name', '$password', '$email')");

    if ($result) {
        echo "<script>alert(\"Success\");
        window.location.href=\"../index.html\";
        </script>";
    }

	else{
        echo "<script>alert(\"Failed\");
        window.location.href=\"../register.html\";
        </script>";

    }
}

?>
