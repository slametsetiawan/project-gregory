<?php
session_start();
if(isset($_SESSION['administrator']))
{
//echo $_SESSION['administrator'];
$konek = mysql_connect("localhost","root","");
mysql_selectdb("perdagangan_elektronik",$konek);
?>

<?php 
//delete
if (isset($_GET['deleteid'])) 
{
	echo "<pre>";
	echo var_dump($_GET);
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? 
    <a href="http://localhost/perdagangan_elektronik/admin/halaman/manage_artikel.php?yesdelete=' . $_GET['deleteid'] . '">Yes
    </a> | <a href="http://localhost/perdagangan_elektronik/admin/halaman/manage_artikel.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) 
{
	$id_to_delete = $_GET['yesdelete'];
	mysql_query("DELETE FROM berita WHERE no_berita='$id_to_delete' LIMIT 1") or die (mysql_error());
	?>
<script language="javascript">alert('redirect ke manage artikel')
location.href="http://localhost/perdagangan_elektronik/admin/halaman/manage_artikel.php"
</script>
<?php
}

?>

<?php
//insert artikel 
if (isset($_POST['judul'])) 
{
	
    $judul = mysql_real_escape_string($_POST['judul']);
	$penulis = mysql_real_escape_string($_POST['penulis']);
	$isi_berita = mysql_real_escape_string($_POST['isi_berita']);
	$sql = mysql_query("SELECT judul FROM berita WHERE '$judul'=judul LIMIT 1");
	$productMatch = mysql_num_rows($sql);
    if ($productMatch > 0) 
        {
		echo 'Sorry you tried to place a duplicate "Judul" into the system, <a href="manage_artikel.php">click here</a>';
		exit();
        }
	mysql_query("INSERT INTO berita (no_berita, judul, penulis, isi_berita, date_added) 
        VALUES('','$judul','$penulis','$isi_berita',now())") or die (mysql_error());
	//header("location: index.php?halaman=manage_artikel.php"); 
    //exit();
}

?>

<?php 
//list berita
$product_list = "";
$sql = mysql_query("SELECT * FROM berita ORDER BY no_berita ASC");
$productCount = mysql_num_rows($sql);
if ($productCount > 0) 
{
	while($row = mysql_fetch_array($sql))
        { 
             $no_berita = $row["no_berita"];
			 $judul = $row["judul"];
			 $penulis = $row["penulis"];
             $isi_berita = $row["isi_berita"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $product_list .= "No Berita: $no_berita - <strong>Judul : $judul</strong> - Penulis :$penulis - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; 
             <a href='http://localhost/perdagangan_elektronik/admin/halaman/berita_edit.php?pid=$no_berita'>edit</a> &bull; 
             <a href='http://localhost/perdagangan_elektronik/admin/halaman/manage_artikel.php?deleteid=$no_berita'>delete</a><br />";
        }
} 
else 
{
	$product_list = "tabel berita kosong";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<a href="../index.php"> Kembali Ke Halaman Utama</a>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>List Artikel</title>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="ContentmainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="index.php?halaman=manage_artikel#inventoryForm">+ Tambah Berita Baru</a></div>
<div align="left" style="margin-left:24px;">
      <h2>list artikel</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Form Berita &darr;
    </h3>
    <form action="" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Judul</td>
        <td width="80%"><label>
          <input name="judul" type="text" id="judul" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Penulis</td>
        <td><label>
          <input name="penulis" type="text" id="penulis" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">ISI berita</td>
        <td><label>
          <textarea name="isi_berita" id="isi_berita" cols="64" rows="5"></textarea>
        </label></td>
      </tr>     
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Tambahkan Sekarang" />
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
</div>
</body>
</html>

<?php

}
else
{
    echo "login dulu!";
}
?>