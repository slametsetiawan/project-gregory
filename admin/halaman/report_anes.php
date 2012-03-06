<?php if(isset($_POST["submit_static"]) || isset($_POST["submit_custom"])) : ?>
	<?php $error = false; ?>
	<?php if(isset($_POST["submit_static"])) : ?>

		<?php
		if($_POST["submit_static"] == "Hari")
		{
			$date1 = date("Y-m-d 00:00:00");
			$date2 = date("Y-m-d 23:59:59");
		}
		elseif($_POST["submit_static"] == "Minggu")
		{
			$date1 = date("Y-m-d H-i-s",mktime(0,0,0,date("m"),date("d")-6,date("Y")));
			$date2 = date("Y-m-d 23:59:59");
		}
		elseif($_POST["submit_static"] == "Bulan")
		{
			$date1 = date("Y-m-d H-i-s",mktime(0,0,0,date("m"),1,date("Y")));
			$date2 = date("Y-m-d H-i-s",mktime(0,0,0,date("m")+1,0,date("Y")));
		}
		elseif($_POST["submit_static"] == "Tahun")
		{
			$date1 = date("Y-m-d H-i-s",mktime(0,0,0,1,1,date("Y")));
			$date2 = date("Y-m-d H-i-s",mktime(0,0,0,12,31,date("Y")));
		}
		?>

	<?php else : ?>

		<?php
		if(checkdate($_POST["dari_tanggal"][1],$_POST["dari_tanggal"][0],$_POST["dari_tanggal"][2]))
			$date1 = "{$_POST["dari_tanggal"][2]}-{$_POST["dari_tanggal"][1]}-{$_POST["dari_tanggal"][0]}";
		else
			$error = true;
		if(checkdate($_POST["ke_tanggal"][1],$_POST["ke_tanggal"][0],$_POST["ke_tanggal"][2]))
			$date2 = "{$_POST["ke_tanggal"][2]}-{$_POST["ke_tanggal"][1]}-{$_POST["ke_tanggal"][0]}";
		else
			$error = true;
		?>

	<?php endif; ?>

		<?php
		if(!$error) :
			$sambung = mysql_connect("localhost","root","");
			mysql_select_db("perdagangan_elektronik",$sambung);
			$sql = "SELECT P.no,P.tanggal_disisipkan,P.harga_keseluruhan,PE.nama
						FROM pemesanan P
						INNER JOIN pengguna PE ON PE.no = P.oleh_pengguna
						WHERE
							P.tanggal_disisipkan BETWEEN '$date1' AND '$date2'
							AND P.status_pemesanan > 1";
			$query = mysql_query($sql);
		?>
			<table cellpadding="3">
			<thead>
				<tr>
					<th colspan="5"><?php echo "$date1 - $date2"; ?></th>
				</tr>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Pembeli</th>
					<th>Produk</th>
					<th>Pendapatan</th>
				</tr>
			</thead>
			<?php $i = 1; ?>
			<?php $total = 0; ?>
			<?php $produk = array(); ?>
			<?php while($result = mysql_fetch_assoc($query)) : ?>
				<?php
					$sql = "SELECT PR.nama,DP.jumlah
						FROM pemesanan P
						INNER JOIN detil_pemesanan DP ON DP.kode = P.kode
						INNER JOIN produk PR ON PR.no = DP.produk
						WHERE
							P.no = {$result["no"]}";
					$innerquery = mysql_query($sql);
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $result["tanggal_disisipkan"]; ?></td>
					<td><?php echo $result["nama"]; ?></td>
					<td>
						<ul style="margin:0 0 0 15px; padding:0;">
							<?php while($innerresult = mysql_fetch_assoc($innerquery)) : ?>
								<li><?php echo "{$innerresult["nama"]}({$innerresult["jumlah"]} buah)"; ?></li>
								<?php
									if(isset($produk[$innerresult["nama"]]))
										$produk[$innerresult["nama"]] += $innerresult["jumlah"];
									else
										$produk[$innerresult["nama"]] = $innerresult["jumlah"];
								?>
							<?php endwhile; ?>
						</ul>
					</td>
					<td><?php echo "Rp.{$result["harga_keseluruhan"]}"; $total += $result["harga_keseluruhan"]; ?></td>
				</tr>
			<?php endwhile; ?>
				<tr>
					<td colspan="3"></td>
					<td align="right">Total : </td>
					<td><?php echo "Rp.$total"; ?></td>
				</tr>
			</table>
			<table cellpadding="3">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php $total = 0; ?>
				<?php foreach($produk as $key => $value) : ?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $key; ?></td>
					<td><?php echo "$value buah"; $total += $value; ?></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>
					<td align="right">Total : </td>
					<td><?php echo "$total buah"; ?></td>
				</tr>
			</tbody>
			</table>
		<?
		else :
		?>
			<script language="javascript">
			alert("Kesalahan pada tanggal");
			location.href("index.php?halaman=report_anes");
			</script>
		<?
		endif;
		?>

<?php else : ?>
	<form action="" method="post">
	<table cellpadding="3">
		<thead>
			<tr>
				<th colspan="2">Laporan Penjualan</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan="2">Static</th>
			</tr>
			<tr>
				<th colspan="2">
					<input type="submit" name="submit_static" value="Hari" />
					<input type="submit" name="submit_static" value="Minggu" />
					<input type="submit" name="submit_static" value="Bulan" />
					<input type="submit" name="submit_static" value="Tahun" />
				</th>
			</tr>
			<tr>
				<th colspan="2">Custom</th>
			</tr>
			<tr>
				<td align="right">Dari tanggal : </td>
				<td>
					<select name="dari_tanggal[0]">
						<?php for($i=1;$i<=31;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="dari_tanggal[1]">
						<?php for($i=1;$i<=12;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="dari_tanggal[2]">
						<?php for($i=2012;$i<=intval(date("Y"));$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Ke tanggal : </td>
				<td>
					<select name="ke_tanggal[0]">
						<?php for($i=1;$i<=31;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="ke_tanggal[1]">
						<?php for($i=1;$i<=12;$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					-
					<select name="ke_tanggal[2]">
						<?php for($i=2012;$i<=intval(date("Y"));$i++) : ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit_custom" value="Submit" /></td>
			</tr>
		</tbody>
	</table>
	</form>
<?php endif; ?>