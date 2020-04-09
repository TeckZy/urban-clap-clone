<?php

/* session_destroy();
session_unset($_SESSION['id']);
session_unset($_SESSION['email']);
session_unset($_SESSION['fname']);
header("location: index");
echo "<script>location.href='index'</script>";
exit; */
setcookie("HmAcc","",0,"/");
include "admin/AMframe/config.php";
@session_destroy();
echo "<script>location.href='index'</script>";
?>