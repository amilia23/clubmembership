<?php

include('../config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.php");
    die();

}

$result = mysqli_query($mysqli, "SELECT username FROM customers WHERE username = '$user_check'");
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row)
        $login_session = $row['username'];

?>

<html>
	<body>
		<tr>
			<td colspan="2">
				<p class="a">Update your Profile Here</p>
			</td>
		</tr>
		<form action = "insertData.php" method  = "POST" enctype = "multipart/form-data">  
		<tr>
			<td colspan="2">
                <label for="photo">Upload Your Picture Here :</label><br>
				<input type="file"  name="photo" id = "photo" size ="30"><br>
			</td>
		</tr>
		<br>
		<tr>
			<td>
                <label for="first_name">First Name :</label>
                <input type="text" id="first_name" name="first_name">
			</td>
		</tr>
		<br>
		<tr>
			<td><br>
				<label for="last_name">Last Name :</label>
                <input type="text" id="last_name" name="last_name"><br>
			</td>
		</tr>
		<br>
		<tr>
			<td>
				<label for="email">Email :</label>
                <input type="text" id="email" name="email"><br>
			</td>
		<button type = "submit" class = "btn btn-primary btn-block" name = "update">Submit</button>
		 </form>
</body>
</html>
<?php
}
?>