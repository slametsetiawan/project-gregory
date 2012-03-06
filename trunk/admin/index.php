<?php
session_start();

if (isset($_SESSION["administrator"]))
{
    require_once("../konfigurasi.php");
    require_once("../referensi/fungsi.php");
    
    $GLOBALS["koneksi"] = mysql_connect($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"]);
    mysql_select_db($GLOBALS["dbname"], $GLOBALS["koneksi"]);
    
    $array_widget_filename = scandir("../widget");
    foreach($array_widget_filename as $widget_filename)
    {
        if(is_file("../widget/".$widget_filename))
        {
            require_once("../widget/".$widget_filename);
        }
    }
    
    //echo $_SESSION["administrator"];
    ?>
    
    <div class="main-body">
    <table border="1" bgcolor="silver" width="100%" align="center">
        <tr>
            <td colspan="3" align="center" height="100px">
                <h3>· Administrator Cpanel ·</h3>
                <?php echo $_SESSION["administrator"]?><br />
                <a href="index.php?halaman=logout">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="23%" valign="top" >
                <h3>Notifikasi</h3>
                <?php
                    //NOTIF CEK PEMESANAN
                    $konek = mysql_connect("localhost", "root", "");
                    mysql_selectdb("perdagangan_elektronik", $konek);
                    $perintah = "SELECT * FROM konfirmasi_pembayaran";
                    $laku = mysql_query($perintah);
                    $hitung = mysql_num_rows($laku);
                    echo "Konfirmasi Pemesanan yang sudah terjadi :";
                    echo "<br/>";
                    if ($hitung > 0)
                    {
                        while ($row = mysql_fetch_assoc($laku))
                        {
                            $tampil = $row["pemesanan"];
                            $tampil_nama = $row["atas_nama"];
                            echo "No Transaksi  :";
                            echo $tampil;
                            echo "<br/>";
                            echo "Pemesan   :";
                            echo $tampil_nama;
                            echo "<br/>";
                            echo "<br/>";
                        }
                    } 
                ?>
                <h3>Side menu</h3>
                <li><a href="index.php?halaman=kategori_tambah">tambah Kategori barang</a></li>
                <li><a href="index.php?halaman=pengirim_tambah">pengaturan pengirim</a></li>
                <li><a href="index.php?halaman=tambah_kota">tambah kota</a></li>
                <li><a href="index.php?halaman=report">REPORT </a></li> &nbsp;
                <li><a href="index.php?halaman=template">Tampilan Website </a></li>
                <a href="index.php?halaman=pengguna"><li>Mengatur Pengguna</li></a>
                <a href="index.php?halaman=inventori"><li>Mengatur Inventori</li></a>
                <a href="index.php?halaman=manage_artikel"><li>Mengatur artikel</li></a>
                <a href="index.php?halaman=stok"><li>Mengatur stok</li></a>
                <a href="index.php?halaman=transaksi"><li>Mengatur transaksi</li></a>
                <br />
            </td>
            <td valign="top">
                <?php konten();?>
            </td>
        </tr>
        <div></div>
        <tr>
            <td colspan="3" align="center">
                Copyrights 2012 <a target="_blank" href="http://www.greyzher.com">Greyzher</a>
            </td>
        </tr>
    </table>
    </div>
<?php
}
else
{
    ?>
    <script language="javascript">
        alert("Harap Login Dahulu");
        location.href="admin_login.php";x
    </script>
    <?php
}
?>

