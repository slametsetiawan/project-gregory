<html>
    <head>
        Penambahan Pengirim
    </head>
    
    <body>
        <table bgcolor="white" border="0" width="660px">
            <form action="index.php?halaman=pengirim_tambah" name="form_tambah_pengirim" method="post">
                <tr>
                    <td align="right">
                        Kode Kota Baru  :
                    </td>
                    <td>
                        <input type="text" name="kode_kota" maxlength="35" size="20" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                       Nama Kota Baru  : 
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
                        <input type="text" name="deskripsi" size="50" maxlength="200" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Di Provinsi :
                    </td>
                    <td>
                        <select name="kota">
                        <?php $kue = "SELECT * FROM propinsi";
                        $jalan = mysql_query($kue);
                        while($row = mysql_fetch_assoc($jalan))
                        {
                            ?>
                            <option value="<?php echo $row["nama"]; ?>"><?php echo $row["nama"]; ?></option>
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
    $periksa = mysql_query("SELECT nama FROM kota WHERE nama='$kategori_baru' LIMIT 1");
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
        $sql = "INSERT INTO kota (no, kode, nama, deskripsi, dipropinsi ) VALUES ('', '', '')";
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
    ?>
    <script language="javascript">
        alert("halaman ini untuk memasukkan kota Tujuan baru")
    </script>
    <?php
}
?>