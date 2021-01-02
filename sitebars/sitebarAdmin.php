<link rel='stylesheet' href='../CSS/bootstrap.min.css' type='text/css'>

<?php
$icon1 = 'btn-primary';
$icon2 = 'btn-primary';
$icon3 = 'btn-primary';
if (isset($icon) && $icon == 'icon1') {
    $icon1 = 'btn-success';
}
if (isset($icon) && $icon == 'icon2') {
    $icon2 = 'btn-success';
}
if (isset($icon) && $icon == 'icon3') {
    $icon3 = 'btn-success';
}
?>

<div style="position: fixed;
    border-style: solid;
    border-width: 1px;
    margin: -1;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    background-color: aliceblue;
    color: white;
    padding: 20px;">
    <a href = "listapplicant.php"><button class="btn <?=$icon1?>">View List Applicant</button></a> 
    <br /><br />
    <a href = "listmember.php"><button class="btn <?=$icon2?>">View Member</button></a> 
    <br /><br />
    <a href = "Logout.php"><button class="btn <?=$icon3?>">Logout</button></a> <br />
</div>