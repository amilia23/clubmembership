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
<?php $icon = 'icon2'; require('../sitebars/sitebarAdmin.php'); ?>
<center>
<h1>List Of Members</h1><br>
<div style="margin-left: 250px;">
<a href="admin.php" class="btn btn-dark">Back</a>
<br />
<table class="table">
  <tr>
    <th width="5%">Id</th>
    <th width="15%">Profile Picture</th>
    <th width="20%">Username</th>
    <th width="20%">Email</th>
    <th width="20%">Receipt</th>
    <th>Operation</th>
  </tr>

  <?php
  $result = mysqli_query($mysqli, "SELECT username FROM admin WHERE username = '$user_check'");
  if($result){
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if($row)
          $login_session = $row['username'];
    $i = 1;
    $result= mysqli_query($mysqli, "SELECT * FROM customers");
		  while ($row1 = mysqli_fetch_array($result)) {
        $pp = 'default_profile.png';
        if ($row1['photo']) {
          $pp = $row1['photo'];
        }
  ?>   
    <tr>
      <td>
        <?php
          echo $i;
        ?>
      </td>
      <td>
          <img src="../uploads/<?php echo $pp; ?>" style="max-width: 100px; max-height: 100px;">
      </td>
      <td>
        <input type = "hidden"  name = "username" value = "<?php echo $row1['username']; ?>">
        <?php echo $row1['username']; ?>
      </td>
      <td>
        <input type = "hidden"  name = "email" value = "<?php echo $row1['email'];?>">
        <?php echo $row1['email'];?>
      </td>
      <td>
          <input type = "hidden"  name = "receipt" value = "<?php echo $row1['receipt'];?>">
         <a target="_blank" href="../uploads/<?php echo $row1['receipt'];?>">Receipt</a>
      </td>
      <td>
          <a href = "viewDetail.php?id=<?php echo $row1['id'];?> ">
            <img src = "../images/eyes.png" style="max-width: 30px; max-height: 30px;" />
          </a>
          <a href = "updatecustomer.php?id=<?php echo $row1['id'];?>">
            <img src = "../images/pen.png" style="max-width: 30px; max-height: 30px;" />
          </a>
          <a href = "delete.php?id=<?php echo $row1['id'];?>" onclick = "return confirm('Are you sure you want to remove this data?')"> 
            <img src = "../images/delete.png" style="max-width: 30px; max-height: 30px;" />
          </a>
      </td>
    </tr> 
    </form>
  </center>
<?php
    $i++;
  }}
?>
    
</table>
</body>
</html>
