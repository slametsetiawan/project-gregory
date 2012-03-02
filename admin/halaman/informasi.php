<a href="../index.php" >Kembali</a>
<?php
require_once("../../konfigurasi.php");
require_once("../../referensi/fungsi.php");
$sambung = mysql_connect("localhost","root","");
mysql_select_db("perdagangan_elektronik",$sambung);
$sql = "
    SELECT
	P.*,
	SUM(DP.jumlah) AS dipesan
    FROM
	produk AS P
	LEFT OUTER JOIN detil_pemesanan AS DP ON
	    DP.produk=P.no
    GROUP BY P.no
    ORDER BY dipesan DESC
    LIMIT 0, 10";
    
$sumber_data_produk_terlaris = mysql_query($sql);
?>
    <h2>
	<b>
	    Produk Terlaris berbaju saat ini 	:
	</b>
    </h2>

<div id="pageContent" style="border-bottom: dashed; border-left: dashed; border-right: dashed; border-top: dashed; max-width: 330px; float: left;" >
    <?php while($baris_data = mysql_fetch_assoc($sumber_data_produk_terlaris)): ?>
    <?php $data = $baris_data["no"]; ?>
    <table border="0" width="330px">
        <tr>
            <td>
            <img src="<?php echo(url_dasar());?>/images/produk/<?php echo($baris_data["no"]);?>.jpg" height="100" width="100"/>
            </td>
            <td>
            <b>
            Kode Produk : <br />
            <?php echo($baris_data["kode"]);?><br />
            Harga Produk    : <br />
            <?php echo($baris_data["harga"]); ?><br />
            </td>
            <td width="100px">
            Keterangan Produk  :
            <?php echo($baris_data["deskripsi"]); ?><br />
            </b>
            </td>
	    <td>
	    <input type="hidden" value="" name="submit" />
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <!--<a href="<?php echo buat_url("produk", array("no"=>$baris_data["no"]))?>">
                    <strong>Lihat Detail Produk</strong>
                </a>-->
	    </td>
        </tr>
    </table>
    <?php endwhile;?>
</div>
<div style="max-width: 100px; float: left;"></div>

<div style="max-width: 330px; border: dashed; color: maroon; float: left;" >
<h3>Kuantitas Yang telah terjual</h3>
<?php
$sambung = mysql_connect("localhost","root","");
mysql_select_db("perdagangan_elektronik",$sambung);
$sql7 = "SELECT * FROM laporan_produk ";
$perintah = mysql_query($sql7);
while ($row = mysql_fetch_assoc($perintah)):?>
    <table>
        <form>
            <tr>
                <td> No Produk  :
                    <?php echo $row["no"]; ?>
                </td>
            </tr>
            <tr>
                <td> nama produk    :
                    <?php echo $row["nama"] ?>
                </td>
            </tr>
            <tr>
                <td> Kuantitas yang telah terjual   :
                    <?php echo $row["kuantitas"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    ==================================
                </td>
            </tr>
        </form>
    </table>
<?php
endwhile;
?>
</div>

<div>
    <a href="berdasar_tanggal.php">
        Berdasarkan Tanggal
    </a>
</div>