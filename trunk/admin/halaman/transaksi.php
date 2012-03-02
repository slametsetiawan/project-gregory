<?php

if (isset($_SESSION["administrator"]))
{
?>
<script language="javascript">
    alert("login dulu");
    location.href("../admin_login.php");
</script>
<?
} 
else
{
    //NOTIF CEK PEMESANAN
    $konek = mysql_connect("localhost", "root", "");
    mysql_selectdb("perdagangan_elektronik", $konek);
    $perintah = "SELECT * FROM konfirmasi_pembayaran";
    $laku = mysql_query($perintah);
    $hitung = mysql_num_rows($laku);
    echo "Cek Pemesanan INI :";
    echo "<br/>";
    if ($hitung > 0)
    {
        while ($row = mysql_fetch_assoc($laku))
        {
            $tampil = $row["pemesanan"];
            $tampil_nama = $row["atas_nama"];
            echo "No Transaksi  :";
            echo $tampil;
            echo "<br/>";
            echo "Pemesan   :";
            echo $tampil_nama;
            echo "<br/>";
            echo "<br/>";
        }
    }
?>
<?php
    //delete transaksi
    if (isset($_GET['deleteid']))
    {
        echo 'Yakin Menghapus Item ini ' . $_GET['deleteid'] . '? 
        <a href="inventori.php?yesdelete=' . $_GET['deleteid'] . '">Yes
        </a> | <a href="inventori.php">No</a>';
        exit();
    }
    if (isset($_GET['yesdelete']))
    {
        $id_to_delete = $_GET['yesdelete'];
        mysql_query("DELETE FROM produk WHERE no='$id_to_delete' LIMIT 1") or die(mysql_error
            ());
        $pictodelete = ("../../inventory_image/$id_to_delete.jpg");
        if (file_exists($pictodelete))
        {
            unlink($pictodelete);
        }
        ?>
        <script language="javascript">
            alert("Transaksi Dibatalkan");
            location.href("transaksi.php");
        </script>
        <?php
    }
?>
<?php
    //list transaksi
$konek = mysql_connect("localhost", "root", "");
mysql_select_db("perdagangan_elektronik", $konek);
$product_list = "";
$sql = mysql_query("SELECT * FROM pemesanan ORDER BY tanggal_disisipkan ASC limit 20");
$productCount = mysql_num_rows($sql);
if ($productCount > 0)
    { ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Transaksi</title>
                <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
            <a href="../index.php">
                <h2>
                kembali ke menu utama
                </h2>
            </a>
    </head>
        <table align="center" style="border: dashed; color: maroon;" width="660px">
            <tr>
                <td align="center">
                    Rekening Kode 1 adalah Rekening BCA <a href="http://www.klikbca.com/" target="_blank">Cek Rekening BCA</a>
                </td>
            </tr>
            <tr>
                <td align="center">
                    Rekening Kode 2 adalah Rekening Mandiri <a href="http://www.bankmandiri.co.id/" target="_blank">Cek Rekening Mandiri </a>
                </td>
            </tr>
        </table> <br />
<?php
        while ($row = mysql_fetch_array($sql)): ?>
        <table style="float: left;" width="500px" border="5" >
            <tr>
                <td>
                    <h3>No transaksi : <?php echo $no = $row["no"] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    Tujuan rekening : <?php $bank = $row["metode_pembayaran"];
                                            if ($bank == 1)
                                            {
                                                echo "BCA";
                                            }
                                            else
                                            {
                                                echo "MANDIRI";
                                            }?>
                </td>
            </tr>
            <tr>
                <td>
                    Pemesan: <?php echo $row["oleh_pengguna"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Kode Transaksi : <?php $kode4 = $row["kode"]; echo $kode4; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Status Pemesanan :<b> <?php $dataku = $row["status_pemesanan"];
                                                    if ($dataku == 1)
                                                    {
                                                        echo "menunggu pembayaran";
                                                    }
                                                    elseif ($dataku == 3)
                                                    {
                                                        echo "sedang diproses";
                                                    }
                                                    elseif ($dataku == 5)
                                                    {
                                                        echo "SELESAI";
                                                    } ?></b>
                </td>
            </tr>
            <tr>
                <td>
                <form action="transaksi_edit.php" method="get">
                     <!--<a href="transaksi_edit.php?ID=<?php echo $no ?> "> Ubah Status </a>--> &bull;
                     <input type="hidden" value="<?php echo $kode4; ?>" name="kode" />
                     <input type="hidden" value="<?php echo $no ?>" name="ID" />
                     <input type="submit" name="submit" value="Ubah Statusnya" /> &bull;
                     <a href="transaksi.php?deleteid=<?php echo $no ?>"> Batalkan   </a><br />
                </form>
                </td>
            </tr>
        </table>
        <?php endwhile;
    }
    else
    {
        $product_list = "Belum Ada Pemesanan";
    }

}

?>