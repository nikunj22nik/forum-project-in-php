<?php
session_start();
echo "logging you out.Please Wait......";
session_destroy();

header("location:/forumproject/index.php");

?>