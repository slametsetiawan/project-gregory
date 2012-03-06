<b>Penambahan kategori</b>
<br />
<br />
kategori akan muncul saat anda memasukkan item baru
<table bgcolor="white" border="0">
<form action="index.php?halaman=kategori_tambah" name="form_tambah_kategori" method="post">
    <tr>
        <td align="right">
           Nama kategori baru   : 
        </td>
        <td align="left">
            <input name="kategori" type="text" maxlength="35" size="20" />
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" name="submit" value="Tambahkan" />
        </td>
    </tr>
</form>
</table>
<?php

if (isset($_POST["submit"]))
{
    if (!empty($_POST["kategori"]))
    {
        $kategori_baru = $_POST["kategori"];
        $periksa = mysql_query("SELECT nama FROM kategori_produk WHERE nama = '$kategori_baru' ");
        echo htmlspecialchars (mysql_error ());
        if ($periksa == 1)
        {
            ?>
            <script language="javascript">
                alert("terjadi kesamaan kategori produk / katagori sudah ada");
            </script>
            <?php
        }
        elseif ($periksa != 1)
        {
            $sql = "INSERT INTO kategori_produk (no, nama) VALUES ('', '$kategori_baru')";
            $jalan = mysql_query($sql) or die(mysql_error());
            ?>
            <script language="javascript">
                alert("Anda berhasil memasukkan Kategori baru");
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("nama tidak Boleh Kosong");
        </script>
        <?php
    }
}
else
{

}
?>