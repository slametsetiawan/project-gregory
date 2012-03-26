<?php

if (isset($_GET["edit"]))
{
    $a = $_GET["edit"];
    $sqlku = mysql_query("SELECT * FROM kota WHERE no='$a' LIMIT 1");
    $productCount = mysql_num_rows($sqlku);
    if ($productCount > 0)
    {
        while ($row = mysql_fetch_assoc($sqlku))
        {
            $n1 = $row["no"];
            $n2 = $row["kode"];
            $n3 = $row["nama"];
            $n4 = $row["deskripsi"];
        }
    } 
    else
    {
        echo "Sorry dude that crap dont exist.";
        exit();
    }
    
}
elseif (isset($_GET["hapus"]))
{
    echo 'Yakin Menghapus Kategori ini ' . $_GET["hapus"] . '? 
    <a href="index.php?halaman=tambah_kota&yesdelete=' . $_GET["hapus"] . '">Yes
    </a> | <a href="index.php?halaman=tambah_kota">No</a>';
    exit();
}
elseif (isset($_GET["yesdelete"]))
{
    $id_to_delete = $_GET['yesdelete'];
    mysql_query("DELETE FROM kota WHERE no='$id_to_delete' LIMIT 1") or die(mysql_error());
    ?>
    <script language="javascript">
        alert("Kota telah terhapus");
    </script>
    <?php
}
?>
<html>
    <head>
        Penambahan Pengirim
    </head>
    
    <body>
        <table bgcolor="white" border="0" width="660px">
            <form action="index.php?halaman=tambah_kota" name="tambah_kota" method="post">
                <tr>
                    <td align="right">
                        Kode Kota Baru  :
                    </td>
                    <td>
                        <input type="text" name="kode_kota" maxlength="35" size="20" value="<?php echo @$n2;  ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                       Nama Kota Baru  : 
                    </td>
                    <td align="left">
                        <input name="nama" type="text" maxlength="35" size="20" value="<?php echo @$n3;  ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Deskripsinya    :
                    </td>
                    <td>
                        <input type="text" name="deskripsi" size="50" maxlength="200" value="<?php echo @$n4; ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Di Provinsi :
                    </td>
                    <td>
                        <select name="kota">
                        <option value="<?php  ?>"></option>
                        <?php $kue = "SELECT * FROM propinsi";
                        $jalan = mysql_query($kue);
                        while($row = mysql_fetch_assoc($jalan))
                        {
                            ?>
                            <option value="<?php echo $row["no"]; ?>"><?php echo $row["nama"]; ?></option>
                            <?php 
                        } ?>"
                        </select>
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
    $prop = $_POST["kota"];
    $kodek = $_POST["kode_kota"];
    $periksa = mysql_query("SELECT * FROM kota WHERE nama='$kategori_baru' LIMIT 1");
    if ($periksa = 1)
    {
        ?>
        <script language="javascript">
            alert("terjadi kesamaan nama Kode Kota / nama sudah ada");
        </script>
        <?php
    }
    else
    {
        $sql = "INSERT INTO kota (no, kode, nama, deskripsi, dipropinsi ) 
        VALUES ('', '$kodek', '$kategori_baru', '$deskripsi', '$prop')";
        $jalan = mysql_query($sql) or die(mysql_error());
        $sql2 = "INSERT 
        INTO 
        propinsi 
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
            alert("Anda berhasil memasukkan kota baru");
        </script>
        <?php
    }
}
else
{

}
?>
<h3>List Kota</h3>
<?php
$kue = "SELECT * FROM kota";
$jalun = mysql_query($kue);
while ($cek = mysql_fetch_assoc($jalun)):
?>
<form>
    <table border="0">
        <tr>
            <td width="20px">
                <?php echo $cek["no"] ?>
            </td>
            <td width="100px">
                <?php echo $cek["kode"] ?>
            </td>
            <td width="100px">
                <?php echo $cek["nama"] ?>
            </td>
            <td>
                <a href="index.php?halaman=tambah_kota&edit=<?php echo($cek["no"]) ?>">edit</a>
            </td>
            <td>
                <a href="index.php?halaman=tambah_kota&hapus=<?php echo($cek["no"]) ?>">delete</a>
            </td>
        </tr>
    </table>
</form>
<?php
endwhile;
