<!------<link rel = "stylesheet" href = "../CSS/form.css">------>

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
//2) get the id from the request
$id = $_GET ['id'];
//3) select data from database
$result = mysqli_query($mysqli, "SELECT *  FROM customers WHERE id=$id");
while ($row1 = mysqli_fetch_array($result)) {
    $i = 1;
?>
 <td>
<head>
    <html>
        <body>
          <label for = "name"> Id:</label><br>
	      <input type= "text" id="id" name="id" value ="<?php echo $row1['id']?>" disabled><br><br>
	      <label for = "name"> Profile Picture:</label><br>
	      <input type= "text" id="photo" name="photo" value ="<?php echo $row1['photo']?>" disabled><br><br>
	      <label for = "height"> Username:</label><br>
	      <input type= "text" id="username" name="username" value="<?php echo $row1['username']?>" disabled><br><br>
          <label for = "weight"> Password:</label><br>
	      <input type= "text" id="pass" name="pass" value="<?php echo $row1['pass']?>" disabled><br><br>
		  <label for="gender">Email: </label><br>
		  <input type= "text" id="email" name="email" value="<?php echo $row1['email']?>" disabled><br><br>
          <label for = "name"> Status:</label><br>
	      <input type= "text" id="status" name="status" value ="<?php echo $row1['status']?>" disabled><br><br>
	      <label for = "name"> Payment Status:</label><br>
	      <input type= "text" id="payment" name="payment" value ="<?php echo $row1['payment']?>" disabled><br><br>
          <label for = "name"> First Name:</label><br>
	      <input type= "text" id="first_name" name="first_name" value ="<?php echo $row1['first_name']?>" disabled><br><br>
          <label for = "name"> Last Name:</label><br>
          <input type= "text" id="last_name" name="last_name" value ="<?php echo $row1['last_name']?>" disabled><br><br>
          <label for = "name"> No Phone:</label><br>
	      <input type= "text" id="phone" name="phone" value ="<?php echo $row1['phone']?>" disabled><br><br>
          <label for = "name"> Receipt:</label><br>
	      <input type= "text" id="receipt" name="receipt" value ="<?php echo $row1['receipt']?>" disabled><br><br>

<button onclick="window.location.href='listmember.php';">
        Back to Main Page
</button>
<?php
    $i++;
}
?>
</body>
</html>
</head>

<?php
}
?>
  