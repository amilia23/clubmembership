<?php

include('../config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.php");
    die();

}

$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE username = '$user_check'");
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row)
        $login_session = $row['username'];


$pp = 'default_profile.png';
if ($row['photo']) {
    $pp = $row['photo'];
}
?>

<html>
<?php require('../../header.php'); ?>
	<body>
	<?php $icon = 'icon1'; require('../../sitebars/sitebarCustomer.php'); ?>
    <center>
	<h1>Update your Profile Here</h1><br>
    <div style="margin-left: 250px;">
		<form action = "insertData.php" method  = "POST" enctype = "multipart/form-data">  
		<table class="table">
		<tr>
			<td width="25%">
                <label for="photo">Upload Your Picture Here</label>
				</td>
                <td width="2%">:</td>
                <td>
				<img src="../../uploads/<?php echo $pp ?>" style="max-width: 100px; max-height: 100px;" /> <br />
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
}
?>