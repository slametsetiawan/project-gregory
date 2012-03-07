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
            <input name="kategori" type="text" maxlength="35" size="20" value="<?php echo @$kodeku ?>" />
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

$sql = "SELECT * FROM kategori_produk";
$jalan = mysql_query($sql);
while ($row=mysql_fetch_assoc($jalan)):
?>
<form>
    <table>
        <tr>
            <td>
                <?php echo $row["no"] ?>
            </td>
            <td width="100px">
                <?php echo $row["nama"] ?>            
            </td>
            <td>
                <a href="index.php?halaman=kategori_tambah&edit=<?php echo $row["no"] ?>">Edit</a>
            </td>
            <td>
                <a href="index.php?halaman=kategori_tambah&hapus=<?php echo $row["no"] ?>">Hapus</a>
            </td>
        </tr>
    </table>
</form>
<?php
endwhile;

if (isset($_GET["edit"]))
{
    $dapat = $_GET["edit"];
    $kueri = "SELECT * FROM kategori_produk WHERE no = '$dapat'";
    $count = mysql_query($kueri);
    while ($row_count=mysql_fetch_assoc($count))
    {
        $namaku = $row["no"];
        $kodeku = $row["nama"];
    }
}
elseif (isset($_GET["hapus"]))
{
    echo 'Yakin Menghapus Kategori ini ' . $_GET["hapus"] . '? 
    <a href="index.php?halaman=kategori_tambah&yesdelete=' . $_GET["hapus"] . '">Yes
    </a> | <a href="index.php?halaman=kategori_tambah">No</a>';
    exit();
}
elseif (isset($_GET["yesdelete"]))
{
    $id_to_delete = $_GET['yesdelete'];
    mysql_query("DELETE FROM kategori_produk WHERE no='$id_to_delete' LIMIT 1") or die(mysql_error());
    ?>
    <script language="javascript">
        alert("Kategori telah terhapus");
    </script>
    <?php
}
?>