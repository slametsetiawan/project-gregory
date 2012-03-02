<?php

session_start();
if (!isset($_SESSION["administrator"]))
{
    header("location: index.php?halaman=index");
    exit();
}
$konek = mysql_connect("localhost", "root", "");
mysql_selectdb("perdagangan_elektronik", $konek);
?>
<?php
//block merubah kuantitas produk
    $kode_kuantitas = "";
    $jumlah_kuantitas = "";
    @$data = $_GET["kode"];
    $sql5 = "SELECT * FROM detil_pemesanan WHERE kode ='" . $data . "' ";
    $hitung =  mysql_query($sql5);
    while ($row = mysql_fetch_assoc($hitung))
    {
        $jumlah_kuantitas = $row["jumlah"];
        $kode_kuantitas = $row["produk"];
        
    }
    echo $jumlah_kuantitas;
    echo $kode_kuantitas;
?>

<?php
//  BLOCK MERUBAH STATUS PEMESANAN
if (isset($_POST['proses']))
{
    @$id = $_GET['ID'];
    $sql = "UPDATE 
    `perdagangan_elektronik`.`pemesanan` 
    SET 
    `status_pemesanan` = '3' 
    WHERE 
    `pemesanan`.`no` = ". $id. "
    ";
    mysql_query($sql);
    ?>
    <script language="javascript">
        alert("Transaksi Telah Di Ubah");
        location.href("transaksi.php");
    </script>
    <?
} 
elseif (isset($_POST["terkirim"]))
{
    @$id = $_GET["ID"];
    @$beta = $_POST["kode_k"];
    @$gamma = $_POST["jumlah_k"];
    $sql = "UPDATE
    `perdagangan_elektronik`.`pemesanan` 
    SET 
    `status_pemesanan` = '5' 
    WHERE 
    `pemesanan`.`no` = ". $id. "
    ";
    mysql_query($sql);
    //block merubah kuantitas
    //block pengurangan kuantitas
            $comand = "SELECT * FROM produk WHERE no = '".$beta."' ";
            $v = mysql_query($comand);
            while ($row = mysql_fetch_assoc($v))
            {
                $jumlah = $row["kuantitas"];
                $akhir = $jumlah - $gamma;
                //if ($akhir <= '0'');
//                {
//                    $akhir = "0";
//                }
            }
            //block ubah sesuai dengan pengurangan kuantitas produk
            $mysql = "UPDATE 
            produk 
            SET 
            kuantitas = '".$akhir."' 
            WHERE 
            no = '".$beta."'
            ";
            mysql_query($mysql);
            //pakai $beta buat mengambil nama produk dari tabel produk
            $malas = "SELECT * FROM produk WHERE no = '$beta'";
            $muales = mysql_query($malas);
            echo $malas;           
            while ($row = mysql_fetch_assoc($muales))
            {
                   ?>
                    <script>
                    alert("sblm while");
                    </script>
                    <? 
                $nama = $row["nama"];
                $gatel = mysql_query("SELECT * FROM laporan_produk WHERE nama = '$nama' ");
                while ($row = mysql_fetch_assoc($gatel))
                {
                    $nomor_e = $row["no"];
                    $saatini = $row["kuantitas"];
                    $yang_dimasukkan = $saatini + $gamma;
                    $update = mysql_query("UPDATE  laporan_produk SET  kuantitas =  '$yang_dimasukkan' WHERE  nama='$nama'");
                    ?>
                    <script>
                    alert("test");
                    </script>
                    <?                       
                }
                    
            }
            
    ?>
    <script language="javascript">
        alert("Transaksi Telah Di Ubah");
        location.href("transaksi.php");
    </script>
    <?
} 
elseif (isset($_POST['menunggu']))
{
    /** kerjakan disini perubahan detail pemesanan */
    $id = $_GET["ID"];
    $sql = "UPDATE 
    `perdagangan_elektronik`.`pemesanan` 
    SET 
    `status_pemesanan` = '1' 
    WHERE 
    `pemesanan`.`no` = ". $id. "
    ";
    mysql_query($sql);
    ?>
    <script language="javascript">
        alert("Transaksi Telah Di Ubah");
        location.href("transaksi.php");
    </script>
    <?
}
?>


<?php

if (isset($_GET['ID']))
{
    //echo ("sukses");
    $dapat = $_GET['ID'];
    $sqlku = mysql_query("SELECT * FROM pemesanan WHERE no=" . $dapat . " LIMIT 1");
    $productCount = mysql_num_rows($sqlku);
    if ($productCount > 0)
    {
        while ($row = mysql_fetch_assoc($sqlku))
        {
            $no = $row["no"];
            $kode = $row["kode"];
            $date_added = $row["tanggal_disisipkan"];
            $pengguna = $row["oleh_pengguna"];
            $alamat = $row["alamat_pengiriman"];
            $kota = $row["kota_pengiriman"];
            $tarif = $row["tarif_pengiriman"];
            $biaya = $row["biaya_pengiriman"];
            $harga = $row["harga_keseluruhan"];
            $method = $row["metode_pembayaran"];
            $status = $row["status_pemesanan"];
            $pesan = $row["pesan"];
        }
    } else
    {
        echo "Sorry dude that crap dont exist.";
        exit();
    }
}

?>
<?php
@$id = $_GET['ID'];
$product_list = "";
$sql = mysql_query("SELECT * FROM pemesanan WHERE no= '.$id.'");
$productCount = mysql_num_rows($sql);
if ($productCount > 0)
{
    while ($row = mysql_fetch_array($sql)):?>
    
        No Transaksi: <?php echo $row["no"]; ?>  <br/>
        <strong>Tanggal : <?php echo $row["tanggal_disisipkan"]; ?> <br/>  
        Ke Rekening Kode : <?php echo $row["metode_pembayaran"]; ?>  &nbsp; &nbsp; &nbsp; <br/>
        Total Uang Yang Harus Diterima : <?php echo $row["harga_keseluruhan"]; ?><br/>
        Pesan Dari Pemesanan : <?php echo $row["pesan"]; ?> <br/>
        kode : <?php echo $row["kode"]; ?> <br/>
        Status Saat INI     : <?php echo $row["status_pemesanan"]; ?> <br/>
        </strong>
        <form action="transaksi_edit.php" method="post">
            <table>
                <tr>
                    <td>
                        Ubah Statusnya  : 
                    </td>
                    <td>
                        <?php echo $jumlah_kuantitas; ?>
                        <?php echo $kode_kuantitas; ?>
                        <input type="hidden" value="<?php echo $jumlah_kuantitas; ?>" name="jumlah_k" />
                        <input type="hidden" value="<?php echo $kode_kuantitas; ?>" name="kode_k" />
                        <input type="submit" value="terkirim(5)" name="terkirim"  />
                        <input type="submit" value="Menunggu_Pembayaran(1)" name="menunggu"  />
                        <input type="submit" value="Diproses(3)" name="proses"  />
                    </td>
                </tr>
            </table>
         </form> <br />
        <?php endwhile;
} else
{
    $product_list = "perubahan Telah Dilakukan Harap Kembali Ke Halaman Transaksi Untuk Melihat statusnya";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transaksi</title>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <a href="transaksi.php">
        <h2>
        kembali ke daftar Transaksi
        </h2>
    </a>
</head>
<br />
<div id="content_top" align="center" style="border: dashed; color: maroon;">
    <table align="center">
        <tr>
            <td>
                Rekening Kode 1 adalah Rekening BCA <a href="http://www.klikbca.com/" target="_blank">Cek Rekening BCA</a>
            </td>
        </tr>
        <tr>
            <td>
                Rekening Kode 2 adalah Rekening Mandiri <a href="http://www.bankmandiri.co.id/" target="_blank">Cek Rekening Mandiri </a>
            </td>
        </tr>
    </table>
</div>
<body>
<div align="center" id="ContentmainWrapper">
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Daftar Transaksi</h2>
=======================================================<br />
<?php echo $product_list; ?>
