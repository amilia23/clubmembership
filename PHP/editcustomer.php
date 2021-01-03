<?php

include('./config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.php");
    die();

}

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE username = '$user_check'");
if($result){
    $row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row1)
        $login_session = $row['username'];


//2) get the id from the request
$id = $_GET ['id'];
//3) select data from database
$result = mysqli_query($mysqli, "SELECT *  FROM customers WHERE id=$id");
if ($row = mysqli_fetch_array($result)) {
    $i = 1;

    $pp = 'default_profile.png';
    if ($row['photo']) {
        $pp = $row['photo'];
    }
?>

<html>
<?php require('../header.php'); ?>
	<body>
	<?php $icon = 'icon2'; require('../sitebars/sitebarAdmin.php'); ?>
    <center>
	<h1>Update Customer Profile Here</h1><br>
    <div style="margin-left: 250px;">
    <button class="btn btn-link" onclick="window.location.href='viewDetail.php?id=<?php echo $id; ?>';">
                Back
        </button>
		<form action = "updateDataCustomer.php" method  = "POST" enctype = "multipart/form-data">  
        <input type="hidden" name="id" value="<?php echo $id ?>" />
		<table class="table">
		<tr>
			<td width="25%">
                <label for="photo">Upload Picture Here</label>
				</td>
                <td width="2%">:</td>
                <td>
				<img src="../uploads/<?php echo $pp ?>" style="max-width: 100px; max-height: 100px;" /> <br />
				<input type="file"  name="photo" id = "photo" size ="30">
			</td>
		</tr>
		<tr>
			<td>
                <label for="first_name">First Name</label>
				</td>
                <td width="2%">:</td>
                <td>
                <input value="<?php echo $row['first_name'] ?>" type="text" id="first_name" name="first_name" class="form-control" placeholder="Update first name here">
			</td>
		</tr>
		<tr>
			<td><br>
				<label for="phone">Phone No.</label>
				</td>
                <td width="2%">:</td>
                <td>
                <input value="<?php echo $row['phone'] ?>" type="text" id="phone" name="phone" class="form-control" placeholder="Update phone number here">
			</td>
		</tr>
		<tr>
			<td>
				<label for="email">Email</label>
				</td>
                <td width="2%">:</td>
                <td>
                <input  value="<?php echo $row['email'] ?>" type="text" id="email" name="email" class="form-control" placeholder="Update email here">
			</td>
		</tr>
		<tr>
			<td colspan="3">
			<button type = "submit" class = "btn btn-primary" name = "update">Submit</button>
			</td>
		</tr>
		</table>
		 </form>
		 </div>
		 </center>
</body>
</html>
<?php
}}
?>