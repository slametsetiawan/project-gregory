<?php
if (isset($_POST["logout"]))
{
    session_start();
    session_destroy("administrator");
    session_unset("administrator");
    header("location:../admin_login.php");
}
session_start();
session_destroy("administrator");
session_unset("administrator");
header("location:../admin_login.php");
?>