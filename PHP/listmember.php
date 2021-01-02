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
    <th>Id</th>
    <th>Profile Picture</th>
    <th>Username</th>
    <th>Email</th>
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
  ?>   
    <tr>
      <td>
        <?php
          echo $i;
        ?>
      </td>
      <td>
          <img src="../uploads/<?php echo $row1['photo']  ?>" width ="10%">
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
          <a href = "viewDetail.php?id=<?php echo $row1['id'];?> ">
            <img src = "../images/eyes.png" width="2%" >
          </a>
          <a href = "updatecustomer.php?id=<?php echo $row1['id'];?>">
            <img src = "../images/pen.png" width="2%">
          </a>
          <a href = "delete.php?id=<?php echo $row1['id'];?>" onclick = "return confirm('Are you sure you want to remove this data?')"> 
            <img src = "../images/delete.png"width = "2%">
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
