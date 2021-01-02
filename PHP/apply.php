<?php

include('config.php');

if (isset($_POST['submit'])){

    $customer = $_POST['username'];
    $password = $_POST['pass'];
    $email = $_POST['email'];


    $result = mysqli_query($mysqli, "INSERT INTO apply (username, pass, email) VALUES ('$name', '$password', '$email')");

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
