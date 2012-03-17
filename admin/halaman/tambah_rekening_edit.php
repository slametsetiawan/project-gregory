<?php 
if (isset($_GET["edit"]))
{
    //echo ("sukses");
    $dapat = $_GET["edit"];
    //echo $dapat;
    $sqlku = mysql_query("SELECT * FROM metode_pembayaran WHERE no=" . $dapat . " LIMIT 1");
    $productCount = mysql_num_rows($sqlku);
    if ($productCount > 0)
    {
        while ($row = mysql_fetch_assoc($sqlku))
        {
            $n1 = $row["no"];
            $n2 = $row["kode"];
            $n3 = $row["deskripsi"];
        }
    } else
    {
        echo "Sorry dude that crap dont exist.";
        exit();
    }
}
?>
<form method="post" action="index.php?halaman=tambah_rekening_edit">
    <table>
        <tr>
            <td>
                Masukkan Data Rekening Baru :
            </td>
        </tr>
        <tr>
            <td>
                Kode bank / Nama Bank    :
            </td>
            <td>
                <input type="text" name="nama_bank" value="<?php echo @$n2 ?>" />
            </td>
        </tr>
        <tr>
            <td>
                Deskripsinya    : 
            </td>
            <td>
                <input type="text" maxlength="200" size="50" name="deskripsi" value="<?php echo @$n3 ?>" />
            </td>
            <td>
                (Isi dengan nomor rekening dan nama pemegang rekening)
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td align="right">
                <input type="hidden" name="id" value="<?php echo $n1 ?>" />
                <input type="submit" name="submit" value="submit" />
            </td>
        </tr>
    </table>
</form>
<hr />
<h3>
    Daftar Rekening yang sudah ada  :
</h3>
<hr />
<?php
if (isset($_POST["submit"]))
{
    $dataku = mysql_real_escape_string($_POST["id"]);
    $data = mysql_real_escape_string($_POST["nama_bank"]);
    $datata = mysql_real_escape_string($_POST["deskripsi"]);
    $sql_update = "
    UPDATE
    metode_pembayaran
    SET
    kode='$data',
    deskripsi='$datata'
    WHERE
    no='$dataku'
    ";
    mysql_query($sql_update);
    ?>
    <script language="javascript">
        alert("item telah di edit");
        location.href("index.php?halaman=tambah_rekening");
    </script>
    <?php
}
?>
<?php
$sql ="SELECT * FROM metode_pembayaran";
$kueri = mysql_query($sql);
while ($row=mysql_fetch_assoc($kueri)):?>
<form method="post" action="index.php?halaman=tambah_rekening">
    <table>
        <tr>
            <td width="50px">
                <?php echo $dataku = $row["no"] ?>
            </td>
            <td width="100px">
                <?php echo $data1 = $row["kode"]; ?>
            </td>
            <td width="250px">
                <?php echo $data2 = $row["deskripsi"]; ?>
            </td>
            <td>
                <a href="index.php?halaman=tambah_rekening_edit&edit=<?php echo $dataku ?>">Edit</a>
                <a href="index.php?halaman=tambah_rekening&delete=<?php echo $dataku ?>">Delete</a>
            </td>
        </tr>
    </table>
</form>
<?php endwhile;
?>