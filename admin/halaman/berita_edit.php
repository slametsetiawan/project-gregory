<?php 
/*
if (!isset($_SESSION["administrator"])) 
    { 
    exit();
    }
*/
$konek = mysql_connect("localhost","root","");
mysql_selectdb("perdagangan_elektronik",$konek);
error_reporting(E_ALL);
ini_set('display_errors', '1');
echo "<pre>";
var_dump($_POST);
?>

<?php 
//edit data
if (isset($_POST['no_berita']))
{
        $no_berita = mysql_real_escape_string($_POST['no_berita']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$penulis = mysql_real_escape_string($_POST['penulis']);
	$isi_berita = mysql_real_escape_string($_POST['isi_berita']);
	mysql_query("UPDATE berita SET no_berita='$no_berita', judul='$judul', penulis='$penulis', isi_berita='$isi_berita' WHERE no_berita='$no_berita'");
?>
<script language="javascript">alert('redirect ke manage artikel')
location.href="manage_artikel.php"
</script>

<?php
    exit();
}
?>
<?php 
//mengisi edit form
if (isset($_GET['pid']))
{
	$targetID = $_GET['pid'];
    $sql = mysql_query("SELECT * FROM berita WHERE no_berita='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql);
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             
			 $no_berita = $row["no_berita"];
			 $judul = $row["judul"];
			 $penulis = $row["penulis"];
			 $isi_berita = $row["isi_berita"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
        }
    } else {
	    echo "Sorry dude that crap dont exist.";
		//exit();
    }
}
?>
<?php 
//list di atas dengan menu edit delete
$product_list = "";
$sql = mysql_query("SELECT * FROM berita ORDER BY no_berita DESC");
$productCount = mysql_num_rows($sql);
if ($productCount > 0) 
{
	while($row = mysql_fetch_array($sql))
        { 
             $id = $row["no_berita"];
			 $judul = $row["judul"];
			 $penulis = $row["penulis"];
			 $isi_berita = $row["isi_berita"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $product_list .= "Product ID: $id - <strong>$no_berita</strong> - $judul - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; 
             <a href='http://localhost/perdagangan_elektronik/admin/halaman/berita_edit.php?pid=$id'>edit</a> &bull; 
             <a href='http://localhost/perdagangan_elektronik/admin/halaman/berita_edit.php?deleteid=$id'>delete</a><br />";
        }
} 
else 
{
	$product_list = "tabel berita masih kosong";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory List</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
<div align="left" style="margin-left:24px;">
        <center>
      <h2>List Artikel</h2>
      <?php echo $product_list; ?>
      </center>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr;edit Berita &darr;
    </h3>
    <form action="" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">NO Berita</td>
        <td width="80%"><label>
          <input name="no_berita" type="text" id="no_berita" size="64" value="<?php echo $no_berita; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">JUDUL</td>
        <td><label>
          <input name="judul" type="text" id="judul" size="12" value="<?php echo $judul; ?>" />
        </label></td>
      </tr>
       <tr>
        <td align="right">Penulis</td>
        <td><label>
          <input name="penulis" type="text" id="penulis" size="12" value="<?php echo $penulis; ?>" />
        </label></td>
      </tr>

      <tr>
        <td align="right">ISI Berita</td>
        <td><label>
          <textarea name="isi_berita" id="isi_berita" cols="64" rows="5"><?php echo $isi_berita; ?></textarea>
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
          <input type="submit" name="button" id="button" value="Make Changes" />
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