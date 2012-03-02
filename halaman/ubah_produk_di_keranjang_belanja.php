<?php
//echo "<pre>";
//var_dump($_POST);
@$nomer = $_GET["nomer"];
@$kuantitas = $_GET["kuantitas"];
@$nomerku = $_POST["no_produk"];
//if (isset($_POST["kuantitas"]))
//{
//    
//}
if (isset($_POST["submit"]))
{
    if (!empty($_POST["kuantitas"]))
    {
        if (preg_match('|^[0-9]+$|', $_POST["kuantitas"]) )
        {
            $koman = mysql_query("SELECT * FROM produk WHERE no = '".$nomerku."'");
            while ($row = mysql_fetch_assoc($koman))
            {
                $kuantitas22 = $row["kuantitas"];
            }
            if ($_POST["kuantitas"] > $kuantitas22)
            {
                ?>
                <script language="javascript">
                    alert("Maaf Stock kami Tidak Mencukupi");
                    location.href = "index.php?halaman=keranjang_belanja"
                </script>
                <?php
            }   
            else
            {
            
                /** 
                * $session keranjang itu dimulai dgn adanya array post no_produk 
                * dan nilai dari array tersebut adalah hasil penangkapan post kuantitas
                * PENTIIIING!!!!!
                */
            $_SESSION["keranjang_belanja"][$_POST["no_produk"]] = $_POST["kuantitas"]; 
            header("location: " . buat_url("keranjang_belanja"));
            }
        }
        else
        {
            ?>
            <script language="javascript">
                alert("Maaf Input Bukan Berupa Angka");
                location.href = "index.php?halaman=keranjang_belanja"
            </script>
            <?php  
        }   
    }
    else
    {
        ?>
        <script language="javascript">
            alert("field kosong");
            location.href="index.php?halaman=keranjang_belanja";
        </script>
        <?php
    }
}
header("location: " . buat_url("keranjang_belanja"));

?>