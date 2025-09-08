<?php
session_start();
session_unset();
session_destroy();
header("Location: /tracksen/login/index.php");
exit();
?>
