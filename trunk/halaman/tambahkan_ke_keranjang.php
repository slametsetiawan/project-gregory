<?php
//echo "<pre>";
//var_dump($_POST);
if (isset($_POST["tambahkan_ke_keranjang"]))
{
    if(preg_match("/^[0-9]+$/i", $_POST["kuantitas"]) && $_POST["kuantitas"]>0)
    {
        $sumber_data_produk = mysql_query("
            SELECT
                *
            FROM
                produk
            WHERE
                no = '".$_POST["no_produk"]."'");
        $produk = mysql_fetch_assoc($sumber_data_produk);
        
        if ($_POST["kuantitas"] > $produk["kuantitas"])
        {
            ?>
            <script language="javascript">
                alert("Maaf persediaan tidak mencukupi untuk kuantitas yang anda minta.");
                location.href = "<?php echo(buat_url("katalog"));?>";
            </script>
            <?php
        }
        else
        {
            $nomer = $_POST["no_produk"];
            $kuantitas = $_POST["kuantitas"];
            @$_SESSION["keranjang_belanja"][$_POST["no_produk"]] += $_POST["kuantitas"]; 
            //header("location: " . buat_url("keranjang_belanja", array("nomer"=>$nomer,"kuantitas"=>$kuantitas)));
            ?>
            <script language="javascript">
                location.href = "<?php echo(buat_url("keranjang_belanja"));?>";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script language="javascript">
            alert("Kuantitas harus angka dan lebih besar dari nol.")
            location.href="<?php echo(buat_url("katalog"));?>"
        </script>
        <?php
    }
}