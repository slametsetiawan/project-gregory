<?php
if (isset($_POST['logout']))
{
    @session_destroy("pengguna");
    unset($_SESSION['pengguna']);
    unset($_SESSION['keranjang_belanja']);
?>
<script language="javascript"> alert("kembali ke index")
    location.href="http://localhost/perdagangan_elektronik/index.php"
</script>
<?php
    
}
?>