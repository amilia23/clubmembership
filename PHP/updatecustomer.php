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

?>
<?php 


if (isset($_POST ['update2'])) {
	
	//get value from the post first
	$id = $_POST ['id'];
	$profile = $_POST ['profile'];
	$username = $_POST ['username'];
	$password = $_POST ['pass'];
	$email = $_POST ['email'];
	$status = $_POST ['status'];
	$payment = $_POST ['payment'];
	$fname = $_POST ['first_name'];
	$lname = $_POST ['last_name'];
	$phone = $_POST ['phone'];
	$receipt = $_POST ['receipt'];
	
	$result = mysqli_query($mysqli, "UPDATE customers SET profile = '$profile', username = '$username', pass = '$password', email = '$email', status = '$status', payment = '$payment', first_name = '$fname', last_name = '$lname', phone = '$phone, receipt = '$receipt' WHERE id = $id");
	if ($result) {
		echo "<script>alert (\"Data has been successfully updated\");
		
		window.location.href = \"listmember.php\";
		</script>";
	} else
		echo "problem to update data";
} else {
	//2) get the id from the request 
	$id = $_GET ['id'];
	//3) select data from database
	$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE id = $id");
	while ($user_data = mysqli_fetch_array($result)) {
?>

   <div class = "container">
       <h1> Update Data </h1>
	   <form action = "listmember.php" method = "POST">
	      <div class = "form group">
		     <input type = "hidden" class = "form-control" id = "id" name = "id" value = "<?php echo $user_data['id']; ?>">
		  </div>
		  <div class = "form-group">
		     <label for = "name">Profile Picture:</label><br>
			 <input type = "text" class = "form-control" id = "photo" name = "photo" value = "<?php echo $user_data['photo']; ?>" disabled><br><br>
		  </div>
		  <div class = "form-group">
		     <label for = "height">Username:</label><br>
			 <input type = "text" class = "form-control" id = "username" name = "username" value = "<?php echo $user_data['username']; ?>" disabled><br><br>
		   </div>
		   <div class = "form-group">
		     <label for = "weight">Password:</label><br>
			 <input type = "text" class = "form-control" id = "pass" name = "pass" value = "<?php echo $user_data['pass']; ?>" disabled><br><br>
		   </div>
		   <div class = "form-group">
		     <label for = "gender">Email:</label><br>
			 <input type = "text" class = "form-control" id = "email" name = "email" value = "<?php echo $user_data['email']; ?>">
		   </div>
		   <div class = "form-group">
		     <label for = "gender">Status:</label><br>
			 <input type = "text" class = "form-control" id = "status" name = "status" value = "<?php echo $user_data['status']; ?>" disabled><br><br>
		   </div>
		   <div class = "form-group">
		     <label for = "gender">Payment:</label><br>
			 <input type = "text" class = "form-control" id = "payment" name = "payment" value = "<?php echo $user_data['payment']; ?>" disabled><br><br>
		   </div>
		   <div class = "form-group">
		     <label for = "gender">First Name:</label><br>
			 <input type = "text" class = "form-control" id = "first_name" name = "first_name" value = "<?php echo $user_data['first_name']; ?>" disabled><br><br>
		   </div>
		   <div class = "form-group">
		     <label for = "gender">Last Name:</label><br>
			 <input type = "text" class = "form-control" id = "last_name" name = "last_name" value = "<?php echo $user_data['last_name']; ?>" disabled><br><br>
		   </div>
		   <div class = "form-group">
		     <label for = "gender">No Phone:</label><br>
			 <input type = "text" class = "form-control" id = "phone" name = "phone" value = "<?php echo $user_data['phone']; ?>">
		   </div>
		   <div class = "form-group">
		     <label for = "gender">Receipt:</label><br>
			 <input type = "text" class = "form-control" id = "receipt" name = "receipt" value = "<?php echo $user_data['receipt']; ?>" disabled><br><br>
		   </div>

		   <button type = "submit" class = "btn btn-primary btn-block" name = "update">Update</button>
		 </form>
		</div>

	<?php
	   }
	}
}

	?>
