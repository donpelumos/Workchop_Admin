<?php
//session_save_path("/home/users/web/b1621/ipg.fab8thproductionscom/cgi-bin/tmp");
session_start();
session_destroy();
header("Location: admin.php");
?>