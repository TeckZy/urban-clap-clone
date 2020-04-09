<?php
include "admin/AMframe/config.php";
session_destroy();
session_unset($_SESSION['pid']);
session_unset($_SESSION['pemail']);
session_unset($_SESSION['pfname']);
header("location: index");
echo "<script>location.href='index'</script>";
exit;
?>