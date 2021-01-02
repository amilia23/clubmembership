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


<html>
<body>
    
<h1><center> List Of Applicant </center></h1><br>
<table border = "1">
<tr>
	<td colspan="5" height="50px">
		<a href="admin.php" class="button">Back</a>
	</td>
</tr>

    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Password</th>
      <th>Email</th>
      <th>Status</th>
      <th>Update</th>

    </tr>

    <?php
        $i = 1;
        $result1= mysqli_query($mysqli, "SELECT * FROM apply");
		while ($row1 = mysqli_fetch_array($result1)) {

    ?>

    <form action = "update.php" method  = "POST">   
      <tr>
         <td>
             <?php
               echo $i;
          ?>
          </td>
         <td>
         <input type = "hidden"  name = "username" value = "<?php echo $row1['username']; ?>">
         <?php echo $row1['username']; ?>
        </td>
         <td>
         <input type = "hidden"  name = "pass" value = "<?php echo $row1['pass'];?>">
         <?php echo $row1['pass'];?>
        </td>
         <td>
         <input type = "hidden"  name = "email" value = "<?php echo $row1['email'];?>">
         <?php echo $row1['email'];?>
        </td>
         <td>
         <?php if($row1['status'] == "0"){
              echo "Waiting for Approval"; } 
         ?>
          <br>
          <select name = "status">
          <option value = "1">Approve</option>
          <option value = "2">Reject</option>
         </select>
        </td>
        <td>
            <input type ="submit"  name = "update" value = "update">
        </td>

      </tr> 
    </form>
<?php
    $i++;
}
?>
    
</table>
</body>
</html>

    <?php
    
}
    ?>