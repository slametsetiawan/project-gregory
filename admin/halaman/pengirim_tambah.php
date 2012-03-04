<html>
    <head>
        Penambahan Pengirim
    </head>
    
    <body>
        <table bgcolor="white" border="1" width="660px">
            <form action="index.php?halaman=ketegori_tambah" name="form_tambah_kategori" method="post">
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
    $periksa = mysql_query("SELECT nama FROM kategori_produk WHERE nama='$kategori_baru' LIMIT 1");
    if ($periksa >= 1)
    {
        ?>
        <script language="javascript">
            alert("terjadi kesamaan nama Kode Pengiriman / nama sudah ada");
        </script>
        <?php
    }
    else
    {
        $sql = "INSERT INTO pengirim (no, kode, deskripsi ) VALUES ('', '$kategori_baru', '')";
        $jalan = mysql_query($sql) or die(mysql_error());
        ?>
        <script language="javascript">
            alert("Anda berhasil memasukkan Pengirim baru");
        </script>
        <?php
    }
}
else
{
    ?>
    <script language="javascript">
        alert("halaman ini untuk memasukkan keterangan jasa")
    </script>
    <?php
}
?>