<?php
//session_start();
if(isset($_SESSION['administrator']))
{
?>

<?php 
//delete
if (isset($_GET['deleteid'])) 
{
	echo 'Yakin Menghapus FaQ Nomor ini ' . $_GET['deleteid'] . '? 
    <a href="index.php?halaman=manage_artikel&yesdelete=' . $_GET['deleteid'] . '">Yes
    </a> | <a href="index.php?halaman=manage_artikel">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) 
{
	$id_to_delete = $_GET['yesdelete'];
	mysql_query("DELETE FROM faq WHERE no_berita='$id_to_delete' LIMIT 1") or die (mysql_error());
	?>
    <script language="javascript">alert('redirect ke manage artikel')
    location.href="index.php?halaman=manage_artikel"
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
	$sql = mysql_query("SELECT judul FROM faq WHERE '$judul'=judul LIMIT 1");
	$productMatch = mysql_num_rows($sql);
    if ($productMatch > 0) 
        {
    		echo 'Sorry you tried to place a duplicate "Judul" into the system, <a href="index.php?halaman=manage_artikel">click here</a>';
    		exit();
        }
	mysql_query("INSERT INTO faq (no_berita, judul, penulis, isi_berita, date_added) 
        VALUES('','$judul','$penulis','$isi_berita',now())") or die (mysql_error());
}

?>

<?php 
//list berita
$product_list = "";
$sql = mysql_query("SELECT * FROM faq ORDER BY no ASC");
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
             <a href='index.php?halaman=berita_edit&pid=$no_berita'>edit</a> &bull; 
             <a href='index.php?halaman=manage_artikel&deleteid=$no_berita'>delete</a><br />";
        }
} 
else 
{
	$product_list = "tabel faq kosong";
}

?>
<title>List Artikel</title>
<body>
<div align="center" id="ContentmainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="index.php?halaman=manage_artikel#inventoryForm">+ Tambah FAQ</a></div>
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Form FaQ &darr;
    </h3>
    <form action="" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Pertanyaan</td>
        <td width="80%"><label>
          <input name="judul" type="text" id="judul" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Jawaban</td>
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
        <div align="left" style="margin-left:24px;">
          <h2>list artikel</h2>
          <?php echo $product_list; ?>
        </div>
    <hr />

<?php

}
else
{
    ?>
    <script>
        alert("Harap login dahulu");
        location.href="index.php?halaman=index";
    </script>
    <?php
}
?>