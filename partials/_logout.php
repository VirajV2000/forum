<?php
 echo "logging out ..please wait..";
 session_start();
 session_unset();
 session_destroy();
 header("location:/forum/index.php")
?>