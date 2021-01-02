<?php

include('config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.html");
    die();

}

$result = mysqli_query($mysqli, "SELECT username FROM admin WHERE username = '$user_check'");
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row)
        $login_session = $row['username'];


//Get id from URL to delete that user 
$id = $_GET['id'];

//Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM customers WHERE  id = $id");
if ($result) {
	echo "<script>alert (\"Data was successfully deleted\");
	
	window.location.href = \"listmember.php\";
	</script>";
} else
	echo "problem to delete data";
?>
<?php
}
?>