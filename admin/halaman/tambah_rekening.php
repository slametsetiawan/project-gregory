<form method="post" action="index.php?halaman=tambah_rekening">
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
                <input type="text" name="nama_bank" />
            </td>
        </tr>
        <tr>
            <td>
                Deskripsinya    : 
            </td>
            <td>
                <input type="text" maxlength="200" size="50" name="deskripsi" />
            </td>
            <td>
                (Isi dengan nomor rekening dan nama pemegang rekening)
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td align="right">
                <input type="submit" name="submit" value="submit" />
            </td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST["submit"]))
{
    if(!empty($_POST["nama_bank"]))
    {
        if (!empty($_POST["deskripsi"]))
        {
            $nama_bank = $_POST["nama_bank"];
            $deskripsi = $_POST["deskripsi"];
            $kueriku = mysql_query("SELECT * FROM metode_pembayaran WHERE kode='$nama_bank' LIMIT 1");
            $hitung = mysql_num_rows($kueriku);
            if ($hitung > 0)
            {
                ?>
                <script language="javascript">
                    alert("terjadi kesamaan data pada database")
                </script>
                <?php
            }
            else
            {
                $sqlku = "
                INSERT INTO 
                metode_pembayaran 
                (
                no ,
                kode ,
                deskripsi
                )
                VALUES 
                (
                '' ,  
                '$nama_bank',  
                '$deskripsi'
                )";
                mysql_query($sqlku);
                ?>
                <script>
                    alert("berhasil Memasukkan data baru")
                </script>
                <?php
            }   
        }
        else
        {
            ?>
            <script language="javascript">
                alert("Harap mengiri Kolom Diskripsi")
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script language="javascript">
            alert("Harap mengiri kolom nama bank")
        </script>
        <?php
    }
}
if (isset($_GET["delete"]))
    {
        echo 'Yakin Menghapus Item ini ' . $_GET["delete"] . '? 
        <a href="index.php?halaman=tambah_rekening&yesdelete=' . $_GET["delete"] . '">Yes
        </a> | <a href="index.php?halaman=tambah_rekening">No</a>';
        exit();
    }
    if (isset($_GET["yesdelete"]))
    {
        $id_to_delete = $_GET["yesdelete"];
        $sqlkuuu = "
        DELETE 
        FROM 
        metode_pembayaran 
        WHERE 
        no='$id_to_delete'
        "; 
        mysql_query($sqlkuuu);
        ?>
        <script language="javascript">
            alert("item telah terhapus");
            location.href("inventori.php");
        </script>
        <?php
    }
?>
<hr />
<h3>
    Daftar Rekening yang sudah ada  :
</h3>
<hr />
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