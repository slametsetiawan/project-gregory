<?php

//$sql = "
//    SELECT
//	P.*,
//	SUM(DP.jumlah) AS dipesan
//    FROM
//	produk AS P
//	LEFT OUTER JOIN detil_pemesanan AS DP ON
//	    DP.produk=P.no
//    GROUP BY P.no
//    ORDER BY dipesan DESC
//    LIMIT 0, 4";
//
$month = date("m");
$sql = "
    SELECT
    P.*,
    SUM(DP.jumlah) AS dipesan
    FROM
    produk AS P
    LEFT JOIN detil_pemesanan AS DP ON DP.produk=P.no AND DP.kode IN 
    (SELECT PE.kode FROM pemesanan AS PE WHERE PE.tanggal_disisipkan LIKE '%-$month-%')
    GROUP BY P.no
    ORDER BY dipesan ASC
    LIMIT 4
    ";
$sumber_data_produk_terlaris = mysql_query($sql);

$sql = "
    SELECT
	*
    FROM
	produk
    ORDER BY no DESC
    LIMIT 0, 4";
$sumber_data_produk_terbaru = mysql_query($sql);

$sql = "
    SELECT
	*
    FROM
	produk
    ORDER BY harga ASC
    LIMIT 0, 4";
$sumber_data_produk_termurah = mysql_query($sql);
?>
<div class="halaman_index">
    <h3>Selamat datang di <?php echo($GLOBALS["nama_situs"]);?></h3>
    <div style="margin-bottom: 30px;">
	<?php echo($GLOBALS["deskripsi_situs"]);?>
    </div>
    <h3>Produk Terlaris</h3>
    <div style="margin-bottom: 30px;">
	<table>
	    <?php while($produk = mysql_fetch_assoc($sumber_data_produk_terlaris)): ?>
		<tr>
		    <td valign="top">
			<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
			    <img
				src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
				width="90"
				height="120"
				alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
			    />
			</a>
		    </td>
		    <td valign="top">
			<form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
			    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
			    <table>
				<tr>
				    <td align="left" colspan="2">
					<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
					    <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
					</a>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kode</td>
				    <td align="left"><?php echo($produk["kode"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Nama</td>
				    <td align="left"><?php echo($produk["nama"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Tersedia</td>
				    <td align="left"><?php echo($produk["kuantitas"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Harga</td>
				    <td align="left">
					<span style="font-size: 16px;">
					    Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
					</span>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kuantitas</td>
				    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
				</tr>
				<tr>
				    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
				</tr>
			    </table>
			</form>
		    </td>
		    <?php $produk = mysql_fetch_assoc($sumber_data_produk_terlaris); // NEXTING RECORD ?>
		    <?php if(!empty($produk["no"])):?>
			<td valign="top">
			    <a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
				<img
				    src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
				    width="90"
				    height="120"
				    alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
				/>
			    </a>
			</td>
			<td valign="top">
			<form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
			    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
			    <table>
				<tr>
				    <td align="left" colspan="2">
					<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
					    <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
					</a>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kode</td>
				    <td align="left"><?php echo($produk["kode"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Nama</td>
				    <td align="left"><?php echo($produk["nama"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Tersedia</td>
				    <td align="left"><?php echo($produk["kuantitas"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Harga</td>
				    <td align="left">
					<span style="font-size: 16px;">
					    Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
					</span>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kuantitas</td>
				    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
				</tr>
				<tr>
				    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
				</tr>
			    </table>
			</form>
		    </td>
		    <?php else:?>
		    <td></td>
		    <td></td>
		    <?php endif;?>
		</tr>
	    <?php endwhile;?>
	</table>
    </div>
    <h3>Produk Terbaru</h3>
    <div style="margin-bottom: 30px;">
	<table>
	    <?php while($produk = mysql_fetch_assoc($sumber_data_produk_terbaru)): ?>
		<tr>
		    <td valign="top">
			<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
			    <img
				src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
				width="90"
				height="120"
				alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
			    />
			</a>
		    </td>
		    <td valign="top">
			<form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
			    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
			    <table>
				<tr>
				    <td align="left" colspan="2">
					<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
					    <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
					</a>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kode</td>
				    <td align="left"><?php echo($produk["kode"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Nama</td>
				    <td align="left"><?php echo($produk["nama"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Tersedia</td>
				    <td align="left"><?php echo($produk["kuantitas"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Harga</td>
				    <td align="left">
					<span style="font-size: 16px;">
					    Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
					</span>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kuantitas</td>
				    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
				</tr>
				<tr>
				    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
				</tr>
			    </table>
			</form>
		    </td>
		    <?php $produk = mysql_fetch_assoc($sumber_data_produk_terbaru); // NEXTING RECORD ?>
		    <?php if(!empty($produk["no"])):?>
			<td valign="top">
			    <a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
				<img
				    src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
				    width="90"
				    height="120"
				    alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
				/>
			    </a>
			</td>
			<td valign="top">
			<form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
			    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
			    <table>
				<tr>
				    <td align="left" colspan="2">
					<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
					    <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
					</a>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kode</td>
				    <td align="left"><?php echo($produk["kode"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Nama</td>
				    <td align="left"><?php echo($produk["nama"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Tersedia</td>
				    <td align="left"><?php echo($produk["kuantitas"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Harga</td>
				    <td align="left">
					<span style="font-size: 16px;">
					    Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
					</span>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kuantitas</td>
				    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
				</tr>
				<tr>
				    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
				</tr>
			    </table>
			</form>
		    </td>
		    <?php else:?>
		    <td></td>
		    <td></td>
		    <?php endif;?>
		</tr>
	    <?php endwhile;?>
	</table>
    </div>
    <h3>Produk Termurah</h3>
    <div style="margin-bottom: 30px;">
	<table>
	    <?php while($produk = mysql_fetch_assoc($sumber_data_produk_termurah)): ?>
		<tr>
		    <td valign="top">
			<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
			    <img
				src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
				width="90"
				height="120"
				alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
			    />
			</a>
		    </td>
		    <td valign="top">
			<form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
			    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
			    <table>
				<tr>
				    <td align="left" colspan="2">
					<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
					    <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
					</a>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kode</td>
				    <td align="left"><?php echo($produk["kode"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Nama</td>
				    <td align="left"><?php echo($produk["nama"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Tersedia</td>
				    <td align="left"><?php echo($produk["kuantitas"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Harga</td>
				    <td align="left">
					<span style="font-size: 16px;">
					    Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
					</span>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kuantitas</td>
				    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
				</tr>
				<tr>
				    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
				</tr>
			    </table>
			</form>
		    </td>
		    <?php $produk = mysql_fetch_assoc($sumber_data_produk_termurah); // NEXTING RECORD ?>
		    <?php if(!empty($produk["no"])):?>
			<td valign="top">
			    <a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
				<img
				    src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
				    width="90"
				    height="120"
				    alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
				/>
			    </a>
			</td>
			<td valign="top">
			<form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
			    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
			    <table>
				<tr>
				    <td align="left" colspan="2">
					<a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
					    <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
					</a>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kode</td>
				    <td align="left"><?php echo($produk["kode"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Nama</td>
				    <td align="left"><?php echo($produk["nama"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Tersedia</td>
				    <td align="left"><?php echo($produk["kuantitas"]);?></td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Harga</td>
				    <td align="left">
					<span style="font-size: 16px;">
					    Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
					</span>
				    </td>
				</tr>
				<tr>
				    <td align="right" style="font-weight: bold;">Kuantitas</td>
				    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
				</tr>
				<tr>
				    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
				</tr>
			    </table>
			</form>
		    </td>
		    <?php else:?>
		    <td></td>
		    <td></td>
		    <?php endif;?>
		</tr>
	    <?php endwhile;?>
	</table>
    </div>
</div>