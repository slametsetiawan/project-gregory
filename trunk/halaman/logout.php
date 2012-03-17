<?php

$nama = $_SESSION["pengguna"]["nama"];

unset($_SESSION['pengguna']);
unset($_SESSION['keranjang_belanja']);
@session_destroy("pengguna");
?>
<script>
    alert("Terima kasih, <?php echo($nama);?>.");
    location.href = "<?php echo(buat_url());?>";
</script>
<?php
