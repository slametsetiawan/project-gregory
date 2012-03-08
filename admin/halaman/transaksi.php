<?php

if (!isset($_SESSION["administrator"]))
{
    ?>
    <script language="javascript">
        alert("login dulu");
        location.href("../admin_login.php");
    </script>
    <?php
} 
else
{
    
?>
<?php
    //delete transaksi
    if (isset($_GET['deleteid']))
    {
        echo 'Yakin Menghapus Item ini ' . $_GET['deleteid'] . '? 
        <a href="index.php?halaman=transaksi&yesdelete=' . $_GET['deleteid'] . '">Yes
        </a> | <a href="index.php?halaman=transaksi">No</a>';
        exit();
    }
    if (isset($_GET['yesdelete']))
    {
        $id_to_delete = $_GET['yesdelete'];
        mysql_query("DELETE FROM pemesanan WHERE no='$id_to_delete' LIMIT 1") or die(mysql_error
            ());
        ?>
        <script language="javascript">
            alert("Transaksi Dibatalkan");
            location.href("index.php?halaman=transaksi");
        </script>
        <?php
    }
?>
<?php
    //list transaksi
$product_list = "";
$sql = mysql_query("SELECT * FROM pemesanan ORDER BY tanggal_disisipkan ASC limit 20");
$productCount = mysql_num_rows($sql);
if ($productCount > 0)
    { ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Transaksi</title>
                <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
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
        <table style="float: left;" width="50%" border="5" >
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
                    ID Pemesan: <?php $user = $row["oleh_pengguna"];
                                        $sql55 = mysql_query("SELECT * FROM pengguna WHERE no='$user'");
                                        while ($row56 = mysql_fetch_assoc($sql55))
                                        {
                                            echo $row56["kode"];
                                        } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Penerima : <?php echo $row["nama_penerima"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat Penerima : <?php echo $row["alamat_pengiriman"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Kota Pengiriman : <?php $a = $row["kota_pengiriman"];
                                            $kota = mysql_query("SELECT * FROM kota WHERE no='$a' ");
                                            while ($kow = mysql_fetch_assoc($kota))
                                            {
                                                echo $kow["nama"];
                                            }  ?>
                </td>
            </tr>
            <tr>
                <td>
                    Telepon Penerima : <?php echo $row["telepon_penerima"] ?>
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
                <form action="index.php?halaman=transaksi_edit" method="post">
                     <!--<a href="transaksi_edit.php?ID=<?php echo $no ?> "> Ubah Status </a>--> &bull;
                     <input type="hidden" value="<?php echo $kode4; ?>" name="kode" />
                     <input type="hidden" value="<?php echo $no ?>" name="ID" />
                     <input type="submit" name="submit" value="Ubah Statusnya" /> &bull;
                     <a href="index.php?halaman=transaksi&deleteid=<?php echo $no ?>"> Batalkan</a><br />
                </form>
                </td>
            </tr>
        </table>
        <?php endwhile;
    }
    else
    {
        echo "Belum Ada Pemesanan";
    }

}

?>