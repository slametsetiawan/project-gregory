<?php

$sambung = mysql_connect("localhost", "root", "");
mysql_select_db("perdagangan_elektronik", $sambung);
//$session = $_POST["session"];
//var_dump($_POST);
$kode = $_POST["kode_unik"];
$kode2 = $_POST["harga_total"];
$kode3 = $_POST["id"];
$kode4 = $_POST["rekening"];
if ($kode4 == 1)
{
    $kode4 = "BCA REK: 1010648226 A/N: ADMIN BERBAJU";
} else
{
    $kode4 = "Mandiri REK: 1010648226 A/N: ADMIN BERBAJU";
}
//$assocArr = $_SESSION["keranjang_belanja"];
//foreach ($assocArr as $key => $value)
//{
//    $sql = "
//        SELECT * 
//        FROM
//        `produk` 
//        WHERE 
//        (no = $key)";
//    $sumber_data = mysql_query($sql);
//    $produk = mysql_fetch_assoc($sumber_data);
//
//    if ($produk == false)
//    {
//        echo ("Produk tidak ditemukan.");
//    } else
//    {
//        echo "Produk yang Anda Beli         :";
//        echo "<br/>";
//        echo $produk["kode"];
//        echo "<br/>";
//        echo "Rp    :";
//        echo $produk["harga"];
//        echo "<br/>";
//        $produk_harga = $produk["harga"];
//        $produk_kode = $produk["kode"];
//
//    }
//}
$kode5 = $_POST["produk_kode"];
$kode6 = $_POST["produk_harga"];
require ('../referensi/pdf/fpdf17/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$judul = "LAPORAN PENJUALAN BERBAJU";
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 20, $judul, '0', 1, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Kode Unik Transaksi Anda  :' . $kode);
$pdf->Ln();
$pdf->Cell(40, 10, 'Total Nilai Transfer Anda :' . $kode2);
$pdf->Ln();
$pdf->Cell(40, 10, 'ID Anda   :' . $kode3);
$pdf->Ln();
$pdf->Cell(40, 10, 'Kode Bank :' . $kode4);
$pdf->Ln();
$pdf->Cell(40, 10, 'Kode Produk Yang Anda Beli    :' . $kode5);
$pdf->Ln();
$pdf->Cell(40, 10, 'Harganya  :' . $kode6);
$pdf->Ln();
$pdf->Cell(40, 10, 'Harap mencantumkan kode pembelian pada saat melakukan transfer dana untuk memudahkan proses transaksi');
$pdf->Ln();
$pdf->Cell(40, 10, 'Harap Simpan Nota pembelian ini');
$pdf->Ln();
$pdf->Output();

?>