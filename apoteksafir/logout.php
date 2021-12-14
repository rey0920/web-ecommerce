<?php
session_start();
error_reporting(0);
include("includes/config.php");
$_SESSION['login'] == "";

session_unset();
$_SESSION['errmsg'] = "You have successfully logout";
?>
<script language="javascript">
    document.location = "login.php";
</script>