<html>
    <head>
        Penambahan Pengirim
    </head>
    
    <body>
        <table bgcolor="white" border="0" width="660px">
            <form action="index.php?halaman=pengirim_tambah" name="form_tambah_pengirim" method="post">
                <tr>
                    <td align="right">
                       Nama Jasa pengiriman baru   : 
                    </td>
                    <td align="left">
                        <input name="nama" type="text" maxlength="35" size="20" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Deskripsinya    :
                    </td>
                    <td>
                        <input type="text" name="deskripsi" size="30" maxlength="200" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="submit" name="submit" value="Tambahkan" />
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>
<?php

if (isset($_POST["submit"]))
{
    $kategori_baru = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $periksa = mysql_query("SELECT kode FROM pengirim WHERE nama='$kategori_baru' LIMIT 1");
    if ($periksa == 1)
    {
        ?>
        <script language="javascript">
            alert("terjadi kesamaan nama Kode Pengiriman / nama sudah ada");
        </script>
        <?php
    }
    else
    {
        $sql = "INSERT INTO pengirim (no, kode, deskripsi ) VALUES ('', '$kategori_baru', '$deskripsi')";
        $jalan = mysql_query($sql) or die(mysql_error());
        $sql2 = "INSERT 
        INTO 
        tarif_pengiriman 
        (no, 
        kode, 
        nama, 
        tarif, 
        ) 
        VALUES 
        ('',
        '$kategori_baru', 
        '$deskripsi')";
        ?>
        <script language="javascript">
            alert("Anda berhasil memasukkan Pengirim baru");
        </script>
        <?php
    }
}
else
{

}

$sqlku = "SELECT * FROM pengirim";
$road = mysql_query($sqlku);
while ($row = mysql_fetch_assoc($road)): 
?>
<form>
    <table>
        <tr>
            <td width="19px">
                <?php echo $row["no"] ?>
            </td>
            <td width="90px">
                <?php echo $row["kode"] ?>
            </td>
            <td width="100px">
                <?php echo $row["deskripsi"] ?>
            </td>
            <td>
                <a href="index.php?halaman=pengirim_tambah">edit</a>
            </td>
            <td>
                <a href="index.php?halaman=pengirim_tambah">Hapus</a>
            </td>
        </tr>
    </table>
</form>
<?php
endwhile;