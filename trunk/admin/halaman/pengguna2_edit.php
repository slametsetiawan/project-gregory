<?php 

session_start();
if (!isset($_SESSION["administrator"])) 
    {
		header("location: index.php"); 
    exit();
    }
$konek = mysql_connect("localhost","root","");
mysql_selectdb("perdagangan_elektronik",$konek);
//echo "(<pre>)";
//var_dump($_GET);
?>

<?php 

if (isset($_POST['button'])) 
{
    $no = mysql_real_escape_string($_POST['nomor']);
    $kode = mysql_real_escape_string($_POST['kode']);
    $nama = mysql_real_escape_string($_POST['nama']);
    $alamat = mysql_real_escape_string($_POST['alamat']);
    $email = mysql_real_escape_string($_POST['email']);
    $kota = mysql_real_escape_string($_POST['kota']);
    $telepon = mysql_real_escape_string($_POST['telepon']);
    $kodepos = mysql_real_escape_string($_POST['kodepos']);
    $jenis_pengguna = mysql_real_escape_string($_POST['jenis_pengguna']);
    $status_pengguna = mysql_real_escape_string($_POST['status_pengguna']);
    $sql = "UPDATE
    pengguna
    SET
    kode='$kode',
    nama='$nama',
    alamat='$alamat',
    kode_pos='$kodepos'
    email='$email',
    kota='$kota',
    telepon='$telepon',
    tanggal_disisipkan=now(),
    jenis_pengguna='$jenis_pengguna',
    status_akses='$status_pengguna'
    WHERE no='$no'";
    mysql_query($sql);
?>
<script>
    alert("user telah di Edit");
    location.href("pengguna2.php");
</script>
<?
}
?>
<?php 

if (isset($_GET['pid'])) 
{
    //echo ("sukses");
	$dapat = $_GET['pid'];
    $sqlku = mysql_query("SELECT * FROM pengguna WHERE no=".$dapat." LIMIT 1");
    $productCount = mysql_num_rows($sqlku);
    if ($productCount > 0) 
    {
	    while($row = mysql_fetch_assoc($sqlku))
        { 
             $n1 = $row["no"];
             $n2 = $row["kode"];
             $n3 = $row["nama"];
             $n31 = $row["kata_kunci"];
             $n4 = $row["jenis_pengguna"];
	         $n5 = $row["email"];
	         $n6 = $row["status_akses"];
             $n7 = $row["telepon"];
             $n8 = $row["alamat"];
             $n9 = $row["kota"];
             $n10 = $row["kode_pos"];
        }
    } 
    else 
    {
	    echo "Sorry dude that crap dont exist.";
		exit();
    }
}
?>
<?php 

$product_list = "";
$sql = mysql_query("SELECT * FROM pengguna ORDER BY no ASC");
$productCount = mysql_num_rows($sql);
if ($productCount > 0) 
{
	while($row = mysql_fetch_array($sql))
        { 
            $no = $row["no"];
	    $kode = $row["kode"];
	    $nama = $row["nama"];
	    $alamat = $row["alamat"];
        $email = $row["email"];
            $kota = $row["kota"];
	    $telepom = $row["telepon"];
            $tanggal_disisipkan = $row["tanggal_disisipkan"];
            $jenis_pengguna = $row["jenis_pengguna"];
	    $status_akses = $row["status_akses"]; 
	    $product_list .= "No Urut Pengguna: $no -
            <strong><br/>Username Pengguna : $kode</strong> -
            <br/>
            Nama Pengguna    : $nama - <br/>
            Status Pengguna    : $status_akses
            &nbsp; &nbsp; &nbsp; 
             <a href='pengguna2_edit.php?pid=$no'>edit</a> &bull;
             <a href='pengguna2.php?deleteid=$no'>delete</a><br />
             =======================================================<br/>"; 
        }
} 
else 
{
	$product_list = "Belum Ada Pengguna Yang Mendaftar";
}

?>

<a href="pengguna2.php">kembali ke menu pengguna</a>
<body>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="pengguna2.php#penggunaform">+ Tambahkan Pengguna</a></div>
<div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
    <a name="penggunaform" id="penggunaform"></a>
    <h3>
    &darr; Edit form &darr;
    </h3>
    <form action="pengguna2_edit.php" method="post">
        <table width="590" border="0">
        <tr bgcolor="#F0F0F0 ">
            <td colspan="2" align="left"><span class="style1">
                <b>Formulir Pendaftaran pengguna baru</b>
                </span>
            </td>
        </tr>
            <center>
            <tr>
            <td align="right">Kode : </td>
            <td><input name="kode" type="text" size="30" value="<?php echo @$n2; ?>"/> username anda</td>
            </tr>
        <tr bgcolor="#CCCCCC">
            <td align="right">Nama : </td>
            <td><input name="nama" type="text" size="30" value="<?php echo @$n3; ?>"/>Nama Asli dan lengkap</td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td align="right">Alamat Lengkap : </td>
            <td><input name="alamat" type="text"size="70" value="<?php echo @$n8; ?>"/></td>
        </tr>
            <td align="right">E Mail : </td>
            <td><input name="email" type="text"size="70" value="<?php echo @$n5; ?>"/></td>
            <tr bgcolor="#CCCCCC">
            <td align="right">Kota : </td>
            <td><select name="kota">
                <option value="<?php echo @$n9; ?>" selected="selected"><?php echo @$n9; ?></option>
                <option value="1">Surabaya(1)</option>
                <option value="2">jakarta(2)</option>
                <option value="3">semarang(3)</option>
                <option value="4">yogjakarta(4)</option>
                <option value="5">bandung(5)</option>
                </select></td>
            </tr>
            <tr bgcolor="#CCCCCC">
            <td align="right">Kode Pos : </td>
            <td><input name="kodepos" type="text"size="10" value="<?php echo @$n10; ?>"/></td>
        </tr>
            <td align="right">Telepon : </td>
            <td><input name="telepon" type="text"size="35" value="<?php echo @$n7; ?>"/></td>
            <tr bgcolor="#CCCCCC">
            <td align="right">Jenis Pengguna : </td>
            <td><select name="jenis_pengguna">
                <option value="<?php echo @$n4; ?>" selected="selected"><?php echo @$n4; ?></option>
                <option value="1">Administrator(1)</option>
                <option value="2">Pengguna Biasa(2)</option>
                </select></td>
            </tr>
            <tr bgcolor="#CCCCCC">
            <td align="right">Status Pengguna : </td>
            <td><select name="status_pengguna">
                <option value="<?php echo @$n6; ?>" selected="selected"><?php echo @$n6; ?></option>
                <option value="DIPERBOLEHKAN">Diperbolehkan</option>
                <option value="DITOLAK">Ditolak</option>
                </select></td>
            </tr>
            </tr>
            <tr>
            <td colspan="2" align="center">
            <input type="submit" name="button" id="button" value="Terapkan Perubahan" />
            <input type="hidden" name="nomor" id="nomor" value="<? echo @$n1; ?>" />
            <input type="reset" value="Reset"/>

            </td>
            </center>
            *Untuk diketahui bahwa alamat dibawah ini dan juga keterangan lainnya dapat digunakan sebagai alamat pengiriman barang
            <br />
            <br />
            </tr>
            </table>
    </form>
    <br />
  <br />
  </div>
</div>
</body>
</html>
