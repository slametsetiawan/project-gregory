<form method="post" action="index.php?halaman=report">
    <table>
    <h3>
        Pemesanan Yang Ada Dalam Database
    </h3>
        <tr>
            <td>
                Menurut Status  :
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="menunggu_pembayaran" name="cek1" />
                <input type="submit" value="Diproses" name="cek2" />
                <input type="submit" value="Selesai" name="cek3" />
                <input type="submit" value="Semua" name="cek4" />
            </td>
        </tr>
        <tr>
            <td>
                Periksa Menurut :
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Hari" name="hari" />
                <input type="submit" value="minggu" name="minggu" />
                <input type="submit" value="Bulan" name="bulan" />
                <input type="submit" value="Tahun" name="tahun" />
            </td>
        </tr>
        <tr>
            <td>
                Manual  :
            </td>
        </tr>
        <tr>Dari tanggal :
				<td>
					<select name="dari_tanggal[0]">
						<?php for($i=1;$i<=31;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="dari_tanggal[1]">
						<?php for($i=1;$i<=12;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="dari_tanggal[2]">
						<?php for($i=2012;$i<=intval(date("Y"));$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
				</td>
			</tr>
			<tr>Ke tanggal :
				<td>
					<select name="ke_tanggal[0]">
						<?php for($i=1;$i<=31;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="ke_tanggal[1]">
						<?php for($i=1;$i<=12;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="ke_tanggal[2]">
						<?php for($i=2012;$i<=intval(date("Y"));$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
				</td>
            </tr>
            <tr align="center">
				<td><input type="submit" name="submit_custom" value="Submit" /></td>
			</tr>
    </table>
</form>
<?php

if (isset($_POST["cek1"]))
{

    //list yang sedang diproses
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
    
}
elseif (isset($_POST["cek2"]))
{
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
}
elseif (isset($_POST["cek3"]))
{
    //list yang sedang diproses
    $sql = mysql_query("SELECT * FROM pemesanan WHERE status_pemesanan = '3'");
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
}
elseif (isset($_POST["cek4"]))
{
    //list yang sedang diproses
    $sql = mysql_query("SELECT * FROM pemesanan");
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
}
elseif (isset($_POST["hari"]))
{
    $date1 = date("Y-m-d 00:00:00");
    $date2 = date("Y-m-d 23:59:59");
    echo "$date1 - $date2";
    $sambung = mysql_connect("localhost","root","");
    mysql_select_db("perdagangan_elektronik",$sambung);
	$sql = "SELECT * FROM pemesanan WHERE tanggal_disisipkan BETWEEN '$date1' AND '$date2'";
	$query = mysql_query($sql);
    while ($row = mysql_fetch_array($query)): ?>
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
elseif (isset($_POST["minggu"]))
{
    $date1 = date("Y-m-d H-i-s",mktime(0,0,0,date("m"),date("d")-6,date("Y")));
    $date2 = date("Y-m-d 23:59:59");
    echo "$date1 - $date2";
    $sambung = mysql_connect("localhost","root","");
    mysql_select_db("perdagangan_elektronik",$sambung);
	$sql = "SELECT * FROM pemesanan WHERE tanggal_disisipkan BETWEEN '$date1' AND '$date2'";
	$query = mysql_query($sql);
    while ($row = mysql_fetch_array($query)): ?>
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
elseif (isset($_POST["bulan"]))
{
    $date1 = date("Y-m-d H-i-s",mktime(0,0,0,date("m"),1,date("Y")));
    $date2 = date("Y-m-d H-i-s",mktime(0,0,0,date("m")+1,0,date("Y")));
    echo "$date1 - $date2";
    $sambung = mysql_connect("localhost","root","");
    mysql_select_db("perdagangan_elektronik",$sambung);
	$sql = "SELECT * FROM pemesanan WHERE tanggal_disisipkan BETWEEN '$date1' AND '$date2'";
	$query = mysql_query($sql);
    while ($row = mysql_fetch_array($query)): ?>
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
elseif (isset($_POST["tahun"]))
{
    $date1 = date("Y-m-d H-i-s",mktime(0,0,0,1,1,date("Y")));
	$date2 = date("Y-m-d H-i-s",mktime(0,0,0,12,31,date("Y")));
    echo "$date1 - $date2";
    $sambung = mysql_connect("localhost","root","");
    mysql_select_db("perdagangan_elektronik",$sambung);
	$sql = "SELECT * FROM pemesanan WHERE tanggal_disisipkan BETWEEN '$date1' AND '$date2'";
	$query = mysql_query($sql);
    while ($row = mysql_fetch_array($query)): ?>
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
elseif (isset($_POST["submit_custom"]))
{
    $error = false;
    if(checkdate($_POST["dari_tanggal"][1],$_POST["dari_tanggal"][0],$_POST["dari_tanggal"][2]))
			$date1 = "{$_POST["dari_tanggal"][2]}-{$_POST["dari_tanggal"][1]}-{$_POST["dari_tanggal"][0]}";
		else
			$error = true;
		if(checkdate($_POST["ke_tanggal"][1],$_POST["ke_tanggal"][0],$_POST["ke_tanggal"][2]))
			$date2 = "{$_POST["ke_tanggal"][2]}-{$_POST["ke_tanggal"][1]}-{$_POST["ke_tanggal"][0]}";
		else
			$error = true;
   echo "$date1 - $date2";
    $sambung = mysql_connect("localhost","root","");
    mysql_select_db("perdagangan_elektronik",$sambung);
	$sql = "SELECT * FROM pemesanan WHERE tanggal_disisipkan BETWEEN '$date1' AND '$date2'";
	$query = mysql_query($sql);
    while ($row = mysql_fetch_array($query)): ?>
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