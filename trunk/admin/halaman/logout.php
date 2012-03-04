<?php
if (isset($_POST["logout"]))
{
    session_start();
    session_destroy("administrator");
    session_unset("administrator");
    ?>
    <script language="javascript">
        alert("terima Kasih Admin <?php echo $_SESSION["administrator"]?>");
        location.href("../index.php");
    </script>
    <?php
}
session_start();
session_destroy("administrator");
session_unset("administrator");
header("location:../admin/admin_login.php");
?>