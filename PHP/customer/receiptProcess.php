<?php

include('../config.php');

if (isset($_FILES['receipt']['name']) && !empty($_FILES['receipt']['name'])){

    $username = $_POST['username'];

    //start to upload file
    $file = rand(1000,100000)."-".$_FILES['receipt']['name'];
    $file_loc = $_FILES['receipt']['tmp_name'];
    $file_size = $_FILES ['receipt']['size'];
    $file_type = $_FILES ['receipt']['type'];
    $folder = "../../uploads/";

    if ( ! is_dir($folder)) {
        mkdir($folder);
    }

    $new_size = $file_size/1024;
    $new_file_name =strtolower($file);
    $final_file = null;
    if (isset($_FILES['receipt']['name']) && !empty($_FILES['receipt']['name'])) {
        $final_file = str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder.$final_file)) {
            $result = mysqli_query($mysqli, "UPDATE customers SET receipt='$final_file', payment='1' WHERE username='$username'");
    
            if ($result) {
                echo "<script>alert(\"Success\");
                window.location.href=\"customer.php\";
                </script>";
            }
    
            else{
                echo "<script>alert(\"Failed\");
                window.location.href=\"receipt.php\";
                </script>";
    
            }
        } else {
            echo "<script>alert(\"Please upload a valid file!\");
                window.location.href=\"receipt.php\";
                </script>";
        }
    } else {
        echo "<script>alert(\"Please upload a valid file!\");
                window.location.href=\"receipt.php\";
                </script>";
    }
} else {
    echo "<script>alert(\"Please upload a valid file!\");
                window.location.href=\"receipt.php\";
                </script>";
}

?>
