<?php

include('./config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.php");
    die();

}

$result = mysqli_query($mysqli, "SELECT username FROM customers WHERE username = '$user_check'");
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row) {
        $login_session = $row['username'];
    }

    //receive input from the form
    $id = $_POST ['id'];
    $fname = $_POST ['first_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    

    //start to upload file
    $file = rand(1000,100000)."-".$_FILES['photo']['name'];
    $file_loc = $_FILES['photo']['tmp_name'];
    $file_size = $_FILES ['photo']['size'];
    $file_type = $_FILES ['photo']['type'];
    $folder = "../uploads/";

    if ( ! is_dir($folder)) {
        mkdir($folder);
    }

    $new_size = $file_size/1024;
    $new_file_name =strtolower($file);
    $final_file =str_replace(' ', '-', $new_file_name);
    move_uploaded_file($file_loc, $folder.$final_file);

    $sql_pic = "";
    if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) {
        $Pic = $final_file;
        $sql_pic = ", photo='$Pic'";
    }

    //send it to the database---insert into
    $result = mysqli_query($mysqli, "UPDATE customers SET first_name='$fname', phone='$phone', email='$email'" . $sql_pic . " WHERE id='$id'");
    if ($result) {
        echo 
        "<script>
        alert ('Data has been updated');
        window.location.href='viewDetail.php?id=$id';
        </script>";
    } else { 
        echo 
        "<script>
        alert ('Problem to update data');
        window.location.href='editcustomer.php?id=$id';
        </script>";
    }
}
?>

