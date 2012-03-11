<?php
//datanya

$kode = $_POST["nomer"];
$kode2 = $_POST["bank"];
$kode3 = $_POST["pengguna"];
$kode4 = $_POST["nama_penerima"];
$kode5 = $_POST["alamat_penerima"];
$kode6 = $_POST["kota_pengiriman"];
$kode7 = $_POST["telepon"];
$kode8 = $_POST["kode_transaksi"];
$kode9 = $_POST["harga_total"];
$kode10 = $_POST["status_pemesanan"];
$kode11 = $_POST["rekening"];
$sambung = mysql_connect("localhost", "root", "");
mysql_select_db("perdagangan_elektronik", $sambung);



//mulai buat pdf

require ('../referensi/pdf/fpdf17/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$judul = "LAPORAN PENJUALAN BERBAJU";
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 20, $judul, '0', 1, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Kode Unik Transaksi Anda  :' . $kode8 );
$pdf->Ln();
$pdf->Cell(40, 10, 'Total Nilai Transfer Anda  Rp:' . $kode9 );
$pdf->Ln();
$pdf->Cell(40, 10, 'ID Anda   :' . $kode3 );
$pdf->Ln();
$pdf->Cell(40, 10, 'Pilihan Bank :' . $kode2);
$pdf->Ln();
$pdf->Cell(40, 10, ':' . $kode11);
$pdf->Ln();
$pdf->Cell(40, 10, 'Harap mencantumkan kode pembelian pada saat melakukan transfer');
$pdf->Ln();
$pdf->Cell(40, 10, 'Detail Pembelian Anda');
$pdf->Ln();
$pdf->Ln();
$sql = "SELECT * FROM detil_pemesanan WHERE pada_pemesanan='$kode'";
$mysql = mysql_query($sql);
while ($row = mysql_fetch_assoc($mysql))
{
    $pdf->Cell(40, 10, 'kode Produk :' . $a = $row["produk"]);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'jumlah Produk :' . $b = $row["jumlah"]);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'berat Produk :' . $c = $row["berat"]);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'harga Produk :' . $d = $row["harga"]);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
}
#output file PDF
$pdf->Output();

?>