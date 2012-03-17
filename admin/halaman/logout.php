<?php
/*
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
}*/
$nama = $_SESSION["administrator"]["kode"];
//session_start();
//session_destroy("administrator");
//session_unset("administrator");
unset($_SESSION['administrator']);
@session_destroy("administrator");
?>
<script>
    alert("Terima kasih, <?php echo($nama);?>.");
    location.href = "<?php echo(buat_url());?>";
</script>