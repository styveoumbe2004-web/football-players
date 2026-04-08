<?php
session_start();
session_destroy();
header("Location: htdocs/login.php");
exit();
?>