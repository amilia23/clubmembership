<?php

include('config.php');
session_start();

$user_check = $_SESSION['login_user'];

if (!isset($_SESSION['login_user'])){
    header("location:../login.php");
    die();

}

?>


<html>
<?php require('../header.php'); ?>
<body>
<?php $icon = 'icon1'; require('../sitebars/sitebarAdmin.php'); ?>
<center>
<h1>List Of Applicant</h1><br>
<div style="margin-left: 250px;">
<a href="admin.php" class="btn btn-dark">Back</a>
<br />
<table class="table">

    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Password</th>
      <th>Email</th>
      <th>Receipt</th>
      <th>Status</th>
      <th>Update</th>

    </tr>

    <?php
    $result = mysqli_query($mysqli, "SELECT username FROM admin WHERE username = '$user_check'");
    if($result){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($row)
            $login_session = $row['username'];

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
          <input type = "hidden"  name = "receipt" value = "<?php echo $row1['receipt'];?>">
          <?php if ($row1['receipt']) { ?>
         <a target="_blank" href="../uploads/<?php echo $row1['receipt'];?>">Receipt</a>
         <?php } ?>
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
    }}
?>
    
</table>
</div>
</center>
</body>
</html>