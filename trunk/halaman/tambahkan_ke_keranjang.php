<?php
//echo "<pre>";
//var_dump($_POST);
if (isset($_POST["submit"]))
{
    if (!empty($_POST["kuantitas"]))
    {
        if (preg_match('|^[0-9]*$|', $_POST["kuantitas"]) )
        {
            $koman = mysql_query("SELECT * FROM produk WHERE no = '".$_POST["no_produk"]."'");
            while ($row = mysql_fetch_assoc($koman))
            {
                $kuantitas = $row["kuantitas"];
            }
            if ($_POST["kuantitas"] > $kuantitas)
            {
                ?>
                <script language="javascript">
                    alert("Maaf Stock kami Tidak Mencukupi");
                    location.href = "index.php?halaman=katalog"
                </script>
                <?php
            }   
            else
            {
            //block cek kuantitas
            //block cek kuantitas
            $nomer = $_POST["no_produk"];
            $kuantitas = $_POST["kuantitas"];
            $_SESSION["keranjang_belanja"][$_POST["no_produk"]] += $_POST["kuantitas"]; 
            header("location: " . buat_url("keranjang_belanja", array("nomer"=>$nomer,"kuantitas"=>$kuantitas)));
            }
        }
        else
        {
            ?>
        <script language="javascript">
            alert("Nilai Yang Anda Bukan Berupa Angka")
            location.href="index.php?halaman=katalog"
        </script>
        <?php
        }
    }
    else
    {
        ?>
        <script language="javascript">
            alert("Nilai Yang Anda masukkan Kosong")
            location.href="index.php?halaman=katalog"
        </script>
        <?php
    }
}
?>