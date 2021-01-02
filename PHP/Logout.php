<?php

include ('config.php');

session_start();
session_unset();
session_destroy();

echo "<script> alert (\"Logout Success\");

window.location.href = \"../index.html\";

</script>";

?>