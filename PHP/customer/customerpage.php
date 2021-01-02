<?php

include('../config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.html");
    die();

}

$result = mysqli_query($mysqli, "SELECT username FROM customers WHERE username = '$user_check'");
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row)
        $login_session = $row['username'];

?>

<html>
<head>
<title>Customer Site</title>
</head>

<body>
		<tr>
			<td colspan="2">
				<p class="a">Customer Page</p>
			</td>
		</tr>
		<tr bgcolor="#ffd0d2">
			<td colspan="2">
				<p>Welcome</p>
			</td>
		</tr>
		<tr>
			<td>
                <label for="first_name">First Name :</label>
                <input type="text" id="first_name" name="first_name">
			</td>
		</tr>
		<br>
		<tr>
			<td>
				<label for="first_name">Last Name :</label>
                <input type="text" id="last_name" name="last_name">
			</td>
		</tr>
		<br>
		<tr>
			<td>
				<label for="email">Email :</label>
                <input type="text" id="email" name="email">
            </td>
		</tr>
		<br>
		<tr>
			<td>
                <label for="Status">Status :</label>
                <input type="text" id="status" name="status">
			</td>
		</tr>
		<br>
		<tr>
			<td>
				<label for="payment">Payment Status :</label>
                <input type="text" id="email" name="email">
			</td>
		</tr>
		<br>
		<br>
		<tr>
			<td colspan="2">
				<a href="../Logout.php" class="c">Log Out</a>
			</td>
		</tr>
	</table>
</body>
</html>
<?php
}
?>

