<?php
//edit
if (isset($_GET["edit"]))
{
    $a = $_GET["edit"];
    $sqlku = mysql_query("SELECT * FROM tarif_pengiriman WHERE no='$a' LIMIT 1");
    $productCount = mysql_num_rows($sqlku);
    if ($productCount > 0)
    {
        while ($row = mysql_fetch_assoc($sqlku))
        {
            $n1 = $row["no"];
            $n2 = $row["nama"];
            $n3 = $row["deskripsi"];
            $n4 = $row["tarif"];
            $n5 = $row["oleh_pengirim"];
            $n6 = $row["ke_kota"];
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
    <a href="index.php?halaman=tarif_pengirim&yesdelete=' . $_GET["hapus"] . '">Yes
    </a> | <a href="index.php?halaman=tarif_pengirim">No</a>';
    exit();
}
elseif (isset($_GET["yesdelete"]))
{
    $id_to_delete = $_GET['yesdelete'];
    mysql_query("DELETE FROM tarif_pengiriman WHERE no='$id_to_delete' LIMIT 1") or die(mysql_error());
    ?>
    <script language="javascript">
        alert("Pengirim telah terhapus");
    </script>
    <?php
}
?>
<html>
    <head>
        Penambahan Tarif Pengirim
    </head>
    
    <body>
        <table bgcolor="white" border="0" width="660px">
            <form action="index.php?halaman=tarif_pengirim" name="form_tambah_pengirim" method="post">
                <tr>
                    <td align="right">
                       Nama paket pengiriman   : 
                    </td>
                    <td align="left">
                        <input name="nama" type="text" maxlength="35" size="20" value="<?php echo @$n2 ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Deskripsinya    :
                    </td>
                    <td>
                        <input type="text" name="deskripsi" size="30" maxlength="200" value="<?php echo @$n3 ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        tarif    :
                    </td>
                    <td>
                        <input type="text" name="tarif" size="30" maxlength="200" value="<?php echo @$n4 ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Oleh Pengirim    :
                    </td>
                    <td>
                        <select name="olehp">
                        <option value="<?php  ?>"></option>
                        <?php $kue = "SELECT * FROM pengirim";
                        $jalan = mysql_query($kue);
                        while($row = mysql_fetch_assoc($jalan))
                        {
                            ?>
                            <option value="<?php echo $row["no"]; ?>"><?php echo $row["kode"]; ?></option>
                            <?php 
                        } ?>"
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Kota Tujuan    :
                    </td>
                    <td>
                        <select name="kekota">
                        <option value="<?php  ?>"></option>
                        <?php $kue = "SELECT * FROM kota";
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
    if (!empty($_POST["nama"]))
    {
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $tarif = $_POST["tarif"];
    $olehp = $_POST["olehp"];
    $kekota = $_POST["kekota"];
        $sql2 = "INSERT 
        INTO 
        tarif_pengiriman 
        (no, 
        nama, 
        deskripsi, 
        tarif,
        oleh_pengirim,
        ke_kota 
        ) 
        VALUES 
        ('',
        '$nama', 
        '$deskripsi',
        '$tarif',
        '$olehp',
        '$kekota'
        )";
        $jalan = mysql_query($sql2) or die(mysql_error());
        
        ?>
        <script language="javascript">
            alert("Anda berhasil memasukkan Pengirim baru");
        </script>
        <?php
    }
    else
    {
        ?>
        <script language="javascript">
            alert("Terjadi Kesalahan Input Harap Diulangi");
        </script>
        <?php
    }
}
else
{

}

$sqlku = "SELECT * FROM tarif_pengiriman";
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
                <?php echo $row["nama"] ?>
            </td>
            <td width="100px">
                <?php echo $row["deskripsi"] ?>
            </td>
            <td>
                <a href="index.php?halaman=tarif_pengirim&edit=<?php echo $row["no"] ?>">edit</a>
            </td>
            <td>
                <a href="index.php?halaman=tarif_pengirim&hapus=<?php echo $row["no"] ?>">Hapus</a>
            </td>
        </tr>
    </table>
</form>
<?php
endwhile;