<?php
echo "<h3>";
//var_dump($_POST);
//var_dump($_SESSION);
////$kode_unik = $_GET["kode_unik"];
////echo $kode_unik;
//var_dump($_GET);
echo "Kode detail Pembelian anda :";
$ilmu = $_GET["kode_unik"];
echo $ilmu;
echo "<br/>";
echo "<br/>";
echo "total belanja + ongkos Kirim(50.000) + harga unik(tambahan harga untuk membantu admin mensortir transaksi anda dengan cepat)";
echo $_GET["harga_unik"];
echo "<br/>";
echo "<br/>";
echo "Total Yang Anda harus Transfer (Dengan Ongkir) : RP,      ";
$grand_totalku = $_GET["total"] + 50000;
echo $grand_totalku;
echo "<br/>";
echo "<br/>";
echo "ID Anda Saat ini :";
$id_anda = $_SESSION["pengguna"]["kode"];
echo $id_anda;
echo "<br/>";
echo "<br/>";
echo "Pilihan Rekening Tujuan Anda :";
echo "<br/>";
echo "<br/>";
if ($_GET["metode"] == 1)
{
    $data_bank = $_GET["metode"];
    echo "BCA REK: 1010648226 A/N: ADMIN BERBAJU";
}
else
{
    $data_bank = $_GET["metode"];
    echo "Mandiri REK: 1010648226 A/N: ADMIN BERBAJU";
}
echo "<br/>";
echo "<br/>";

    $kode_unik = $_GET["kode_unik"];
    $assocArr=$_SESSION["keranjang_belanja"];
    foreach($assocArr as $key=>$value)
    {
        $sql = "
        SELECT * 
        FROM
        `produk` 
        WHERE 
        (no = $key)";
       $sumber_data = mysql_query($sql);
        $produk = mysql_fetch_assoc($sumber_data);

        if ($produk==FALSE)
        {
        echo("Produk tidak ditemukan.");
    }
    else
    {
        echo "Produk yang Anda Beli         :";
        echo "<br/>";
        echo $produk["kode"];
        echo "<br/>";
        echo "Rp    :";
        echo $produk["harga"];
        echo "<br/>";
        $produk_harga = $produk["harga"];
        $produk_kode = $produk["kode"];
        
    }
    }
echo "</h3>";
//echo $ilmu;
//echo buat_url("buat_pdf");
?>
<form action="http://localhost/perdagangan_elektronik/halaman/buat_pdf.php" method="post">
    <table>
        <input type="hidden" name="kode_unik" value="<?php echo $ilmu; ?>" />
        <input type="hidden" name="harga_total" value="<?php echo $grand_totalku; ?>" />
        <input type="hidden" name="id" value="<?php echo $id_anda; ?>" />
        <input type="hidden" name="rekening" value="<?php echo $data_bank; ?>" />
        <input type="hidden" name="produk_kode" value="<?php echo $produk_kode; ?>" />
        <input type="hidden" name="produk_harga" value="<?php echo $produk_harga; ?>" />
        <input type="hidden" name="session" value="<?php $_SESSION["keranjang_belanja"] ?>" />
        <input type="submit" value="Print Nota bentuk PDF" name="submit" />
    </table>
</form>

<html>
<table align="center">
<tr>
    <td>
Shorcut Website BCA <a href="http://www.klikbca.com/" target="_blank">BCA</a>
    </td>
</tr>
    <tr>
    <td>
Shorcut Website Mandiri <a href="http://www.bankmandiri.co.id/" target="_blank">MANDIRI</a>
    </td>
</tr>
</table>
</html>