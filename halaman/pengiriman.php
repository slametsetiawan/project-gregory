<?php
//    echo "<pre>";
//    var_dump($_SESSION["keranjang_belanja"]);
//    echo "<br/>";
//	var_dump($_SESSION);
//    echo "<br/>";
//    var_dump($_GET);
//    echo "</pre>";
$panjangacak = 15;

$base= 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';

$max=strlen($base)-1;

$acak='';

mt_srand((double)microtime()*1000000);

while (strlen($acak)<$panjangacak)

$acak.=$base{mt_rand(0,$max)};

//echo $acak;

if (isset($_SESSION["pengguna"]))
{
    //echo "<pre>";
    //var_dump($_SESSION["pengguna"]);
    //echo "<br/>";
    //var_dump($_SESSION);
    /**
     * keluarkan data pengguna dan kasi pilihanmau kirim kemana?
     * isi data baru ta pake yang udah ada?
     */
     @$total = $_GET["total"];
	 ?>
	 <div>
    <form action="<?php echo buat_url("tambah_data_pengirim", array("total"=>$total,"kode_unik"=>$acak));?>"  method="post" name="reg" id="reg">
        <h3>Formulir Data Pengiriman</h3>
        <table>
            <tr>
                <td align="right">Nama Penerima: </td>
                <td>
                    <input name="nama" type="text" size="63" value="
                    <?php
                    $sql = "
                        SELECT
                            *
                        FROM
                            pengguna
                        WHERE
                            kode = '".$_SESSION["pengguna"]["kode"]."'
                        LIMIT 0, 1";
                    $sumber_data = mysql_query($sql);
                    $row = mysql_fetch_assoc($sumber_data);
                    
                    if($row!=FALSE)
                    {
                        echo $row["nama"];
                    }
                    else
                    {
                        echo "wew";
                    }
                    ?>
                    "/>
                </td>
            </tr>
            <tr>
                <td align="right">Alamat Pengiriman : </td>
                <td>
                    <input type="text" name="alamat" size="63" value="<?php
                    $sql = "
                        SELECT
                            *
                        FROM
                            pengguna
                        WHERE
                            kode = '".$_SESSION["pengguna"]["kode"]."'
                        LIMIT 0, 1";
                    $sumber_data = mysql_query($sql);
                    $produk = mysql_fetch_assoc($sumber_data); 
                    if($produk!=FALSE)
                    {
                        echo $produk["alamat"];
                    }
                    ?>
                      "/>
                </td>
            </tr>
            <tr>
                <td align="right">Kota Pengiriman : </td>
                <td>
                    <select name="kota">
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                kota";
                        $sumber_data = mysql_query($sql);
                        
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Kode Pos Pengiriman: </td>
                <td>
                    <input name="kodepos" type="text"size="10" value="
                     <?php
                    $sql = "
                        SELECT
                            *
                        FROM
                            pengguna
                        WHERE
                            kode = '".$_SESSION["pengguna"]["kode"]."'
                        LIMIT 0, 1";
                    $sumber_data = mysql_query($sql);
                    $produk = mysql_fetch_assoc($sumber_data);
                    
                    if($produk!=FALSE)
                    {
                        echo($produk["kode_pos"]);
                    }
                    ?>
                    "/>
                </td>
            </tr>
            <tr>
                <td align="right">Telepon Penerima: </td>
                <td>
                    <input name="telepon" type="text"size="15" value="
                    <?php
                    $sql = "
                        SELECT
                            *
                        FROM
                            pengguna
                        WHERE
                            kode = '".$_SESSION["pengguna"]["kode"]."'
                        LIMIT 0, 1";
                    $sumber_data = mysql_query($sql);
                    $produk = mysql_fetch_assoc($sumber_data);
                    
                    if($produk!=FALSE)
                    {
                        echo($produk["telepon"]);
                    }
                    ?>
                    "/>Format 031******* Tanpa Spasi
                </td>
            </tr>
            <tr>
                <td align="right">Pilih Pengirim : </td>
                <td>
                    <select name="pengirim">
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                pengirim";
                        $sumber_data = mysql_query($sql);
                        
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <option value="<?php echo($baris["no"]);?>"><?php echo($baris["kode"]);?></option>
                            <?php
                        }
                        ?>
                    </select>Semua Bertarif Rp 50.000 untuk P.Jawa
                </td>
            </tr>
            <tr>
                <td align="right">Pilih Metode Pembayaran : </td>
                <td>
                    <select name="metode">
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                metode_pembayaran";
                        $sumber_data = mysql_query($sql);
                        
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <option value="<?php echo($baris["no"]);?>"><?php echo($baris["kode"]);?></option>
                            <?php
                        }
                        ?>
                    </select>No Rekening Tujuan Akan Ditampilkan Pada Halaman Berikutnya
                </td>
            </tr>
            <tr>
                <td align="right">Pesan Pengiriman: </td>
                <td>
                    <input name="pesan" type="text"size="70"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Masukkan Data Pengiriman"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
}
else
{
    header("location: " . buat_url("keranjang_belanja"));
}