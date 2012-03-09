<?php 

if (!isset($_SESSION["administrator"])) 
    { 
    ?>
    <script>
        alert("Login dahulu");
        location.href "index.php?halaman=index"
    </script>
    <?php
    }

?>

<?php 
//edit data
if (isset($_POST["button"]))
{
    $no_berita = mysql_real_escape_string($_POST["thisID"]);
    $judul = mysql_real_escape_string($_POST['judul']);
    $isi_berita = mysql_real_escape_string($_POST['isi_berita']);
    mysql_query("UPDATE faq SET pertanyaan='$judul', jawaban='$isi_berita' WHERE no='$no_berita'");
    ?>
    <script language="javascript">alert('redirect ke manage artikel')
    location.href="index.php?halaman=manage_artikel"
    </script>
    <?php
    exit();
}
?>
<?php 
//mengisi edit form
if (isset($_GET["pid"]))
{
	$targetID = $_GET["pid"];
    $sql = mysql_query("SELECT * FROM faq WHERE no='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql);
    if ($productCount > 0) 
    {
	    while($row = mysql_fetch_array($sql))
        { 
             
			 $no_berita = $row["no"];
			 $judul = $row["pertanyaan"];
			 $isi_berita = $row["jawaban"];
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
$sql = mysql_query("SELECT * FROM faq ORDER BY no ASC");
$productCount = mysql_num_rows($sql);
if ($productCount > 0) 
{
	while($row = mysql_fetch_array($sql))
        { 
             $id = $row["no"];
			 $judul = $row["pertanyaan"];
			 $isi_berita = $row["jawaban"];
			 $product_list .= "ID: $id - $judul -  &nbsp; &nbsp; &nbsp; 
             <a href='index.php?halaman=berita_edit&pid=$id'>edit</a> &bull; 
             <a href='index.php?halaman=manage_artikel&deleteid=$id'>delete</a><br />";
        }
} 
else 
{
	$product_list = "tabel berita masih kosong";
}

?>
<body>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="index.php?halaman=berita_edit&inventoryForm">+ Add New Artikel Item</a></div>
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr;edit FAQ &darr;
    </h3>
    <form action="index.php?halaman=berita_edit" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td align="right">Pertanyaan</td>
        <td><label>
          <input name="judul" type="text" id="judul" size="12" value="<?php echo @$judul; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">jawaban</td>
        <td>
        <label>
          <textarea name="isi_berita" id="isi_berita" cols="64" rows="5"><?php echo @$isi_berita; ?></textarea>
        </label>
        </td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="thisID" type="hidden" value="<?php echo $id; ?>" />
          <input type="submit" name="button" id="button" value="Make Changes" />
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
</div>
<div align="left" style="margin-left:24px;">
      <h2>List Artikel</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
</body>
</html>