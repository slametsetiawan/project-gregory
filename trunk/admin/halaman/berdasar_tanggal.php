<html>
<a href="informasi.php">Kembali</a>
    <head>
        <h3>
            <center>Laporan Pembelian Antara tanggal :</center>
        </h3>
    </head>
    <body>
        <form method="post" action="berdasar_tanggal.php">
            <table border="0" bgcolor="silver" align="center">
                <tr>
                    <td>
                        Tanggal Awal : (FORMAT YYYYMMDD)
                    </td>
                    <td>
                        <input type="text" name="awal" size="10" maxlength="10" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Tanggal Akhir : (FORMAT YYYYMMDD)
                    </td>
                    <td>
                        <input type="text" name="akhir" size="10" maxlength="10" />
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td align="right">
                        <input type="submit" name="submit" value="Tampilkan" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
if (isset($_POST["submit"]))
{
    @$tanggal = $_POST["awal"];
    @$coba = $_POST["akhir"];
    if (!empty($_POST["awal"]))
    {
        if (!empty($_POST["akhir"]))
        {
            if (preg_match('|^[0-9]*$|', $_POST["awal"] , $_POST["akhir"]) )
            {
                echo "Pencarian dari tanggal    :";
                echo $tanggal;
                echo "<br/>";
                echo "sampai    :";
                echo $coba;
                echo "<br/>";
                echo "<br/>";
                $sambung = mysql_connect("localhost","root","");
                mysql_select_db("perdagangan_elektronik",$sambung);
                $kueri = "SELECT * FROM pemesanan WHERE tanggal_disisipkan BETWEEN '$tanggal' and '$coba'";
                $baris_data = mysql_query($kueri);
                while ($row = mysql_fetch_assoc($baris_data)):?>
                <table border="3" bgcolor="silver" width="400px" align="left">
                    <tr>
                        <td>
                            Pada Pemesanan  :
                        </td>
                        <td>
                            <?php echo $row["no"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tanggal Pemesanan   :
                        </td>
                        <td>
                            <?php echo $tanggal = $row["tanggal_disisipkan"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kode Pemesanan  :
                        </td>
                        <td>
                            <?php echo $kode = $row["kode"]; ?>
                        </td>
                    </tr>
                    <?php
                    //daftarnya
                    
                    $perintah = "SELECT * FROM detil_pemesanan WHERE kode ='$kode'";
                    $baris_data2 = mysql_query($perintah);
                    while ($row = mysql_fetch_assoc($baris_data2)):?>
                        <tr>
                            <td>
                                Kode Produknya  :
                            </td>
                            <td>
                                <?php echo $row["produk"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sejumlah    :
                            </td>
                            <td>
                                <?php echo $row["jumlah"]; ?>
                            </td>
                        </tr>
                    </table>
                    <?php endwhile;
                endwhile;
            }
            else
            {
                ?>
                <script>
                    alert("Input Harus Berupa Angka Sesuai Dengan Format");
                </script>
                <?php
            }    
        }
        else
        {
            ?>
            <script>
                alert("Masukkan Tanggal pada kolom akhir");
            </script>
            <?php    
        }
    }
    else
    {
        ?>
        <script>
            alert("Masukkan Tanggal pada kolom awal");
        </script>
        <?php
    }
    
}
else
{
    echo "welcome";
}
?>
