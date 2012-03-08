<form method="post" action="index.php?halaman=cek_belum_bayar">
    <table>
    <h3>
        Pemesanan Yang Ada Dalam Database
    </h3>
        Periksa Menurut :
        <tr>
            <td>
                <input type="button" value="menunggu_pembayaran" name="cek" />
                <input type="button" value="Diproses" name="cek" />
                <input type="button" value="Selesai" name="cek" />
                <input type="button" value="Semua" name="cek" />
            </td>
        </tr>
    </table>
</form>

<?php
//list yang sedang diproses
$sql = mysql_query("SELECT * FROM pemesanan WHERE status_pemesanan = '2'");
$productCount = mysql_num_rows($sql);
if ($productCount > 0)
    { ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Transaksi</title>
                <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    </head>
    <h3>
        pemesanan yang terjadi di sistem
    </h3>
<?php
        while ($row = mysql_fetch_array($sql)): ?>
        <table  width="50%" border="0" >
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
                                                    elseif ($dataku == 2)
                                                    {
                                                        echo "sedang diproses";
                                                    }
                                                    elseif ($dataku == 3)
                                                    {
                                                        echo "SELESAI";
                                                    } ?></b>
                </td>
            </tr>
        </table>
        <?php endwhile;
    }
    else
    {
        echo "Belum Ada Pemesanan";
    }

?>

<?php
//list yang sudah dikonfirmasi
$sql = mysql_query("SELECT * FROM pemesanan WHERE status_pemesanan = '3'");
$productCount = mysql_num_rows($sql);
if ($productCount > 0)
    { ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Transaksi</title>
                <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    </head>
    
<br />
<br />
    <h3>
        pemesanan yang terjadi di sistem dan sudah Dikonfirmasi
    </h3>
<?php
        while ($row = mysql_fetch_array($sql)): ?>
        <table  width="50%" border="0" >
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
                                                    elseif ($dataku == 2)
                                                    {
                                                        echo "sedang diproses";
                                                    }
                                                    elseif ($dataku == 3)
                                                    {
                                                        echo "SELESAI";
                                                    } ?></b>
                </td>
            </tr>
        </table>
        <?php endwhile;
    }
    else
    {
        echo "Belum Ada Pemesanan";
    }

//list masih menunggu pembayaran
$sql = mysql_query("SELECT * FROM pemesanan WHERE status_pemesanan = '1'");
$productCount = mysql_num_rows($sql);
if ($productCount > 0)
    { ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Transaksi</title>
                <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    </head>
    <h3>
        pemesanan yang terjadi di sistem
    </h3>
<?php
        while ($row = mysql_fetch_array($sql)): ?>
        <table  width="50%" border="0" >
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
                                                    elseif ($dataku == 2)
                                                    {
                                                        echo "sedang diproses";
                                                    }
                                                    elseif ($dataku == 3)
                                                    {
                                                        echo "SELESAI";
                                                    } ?></b>
                </td>
            </tr>
        </table>
        <?php endwhile;
    }
    else
    {
        echo "Belum Ada Pemesanan";
    }

?>
