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

?>
<html>
<?php require('../../header.php'); ?>
<body>
<?php $icon = 'icon2'; require('../../sitebars/sitebarCustomer.php'); ?>
    <center>
    <h1>Payment</h1><br>
    <div style="margin-left: 250px;">
	<form action ="receiptProcess.php" method = "POST" enctype = "multipart/form-data">
	<table>
		<tr>
			<td>
				<p>Upload Your Payment Receipt Here</p>
			</td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="username" value="<?php echo $user_check ?>" /> 
			</td>
		</tr>
		<tr>
			<td>
				<input type="file" name="receipt" />
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit" value="Upload" class="btn btn-primary" />
			</td>
		</tr>
		<tr>
			<td>
				<b><p>Notes</p></b>
				<ul>
					<li>Please screenshot / snap your payment receipt</li>
					<li>Upload your receipt screenshot / picture before submit</li>
				</ul>
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