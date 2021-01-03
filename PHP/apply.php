<?php

include('config.php');

if (isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['pass'];
    $email = $_POST['email'];

    //start to upload file
    $file = rand(1000,100000)."-".$_FILES['receipt']['name'];
    $file_loc = $_FILES['receipt']['tmp_name'];
    $file_size = $_FILES ['receipt']['size'];
    $file_type = $_FILES ['receipt']['type'];
    $folder = "../uploads/";

    if ( ! is_dir($folder)) {
        mkdir($folder);
    }

    $new_size = $file_size/1024;
    $new_file_name =strtolower($file);
    $final_file =str_replace(' ', '-', $new_file_name);
    if (move_uploaded_file($file_loc, $folder.$final_file)) {
        $result = mysqli_query($mysqli, "INSERT INTO apply (username, pass, email, receipt) VALUES ('$username', '$password', '$email', '$final_file')");

        if ($result) {
            echo "<script>alert(\"Success\");
            window.location.href=\"../index.php\";
            </script>";
        }

        else{
            echo "<script>alert(\"Failed\");
            window.location.href=\"../register.php\";
            </script>";

        }
    } else{
        echo "<script>alert(\"Failed\");
        window.location.href=\"../register.php\";
        </script>";

    }
}

?>
