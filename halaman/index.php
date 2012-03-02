<?php

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
<!--<div class="logo">
        <h1><a href="index.php"><span>Ber</span>baju</a></h1>
</div>-->
<div class="logo">
    <h2>
	<b>
	    Produk Terlaris berbaju saat ini 	:
	</b>
    </h2>
</div>
<div id="pageContent" style="border-bottom: dashed; border-left: dashed; border-right: dashed; border-top: dashed; float: left;" >
    <?php while($baris_data = mysql_fetch_assoc($sumber_data_produk_terlaris)): ?>
    <?php $data = $baris_data["no"]; ?>
    <table border="0">
        <tr>
            <td>
            <img src="<?php echo(url_dasar());?>/images/produk/<?php echo "1";echo($baris_data["no"]);?>.jpg" height="100" width="100"/>
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
            <td>
                STOK    :
                <?php if ($baris_data["kuantitas"] <= 0)
                        {
                            echo $baris_data["kuantitas"];
                            echo "<br/>";
                            echo "BARANG HABIS! ";
                        }
                        else
                        {
                            echo $baris_data["kuantitas"];
                            ?>
                            <input type="hidden" value="" name="submit" />
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <a href="<?php echo buat_url("produk", array("no"=>$baris_data["no"]))?>">
                    <strong>Lihat Detail Produk</strong>
                </a>
                            <?php
                        }; ?><br />
            </td>
            </td>
	    <td>
	    
	    </td>
        </tr>
    </table>
    <?php endwhile;?>
</div>