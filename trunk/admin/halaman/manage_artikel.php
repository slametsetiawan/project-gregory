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
	mysql_query("DELETE FROM faq WHERE no='$id_to_delete' LIMIT 1") or die (mysql_error());
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
	$isi_berita = mysql_real_escape_string($_POST['isi_berita']);
	$sql = mysql_query(" SELECT * FROM faq WHERE pertanyaan = '$judul' ");
	$productMatch = mysql_num_rows($sql);
    if ($productMatch > 0) 
        {
    		echo 'Sorry you tried to place a duplicate "Judul" into the system, <a href="index.php?halaman=manage_artikel">click here</a>';
    		exit();
        }
	mysql_query("
    INSERT 
    INTO 
    faq 
    (no, 
    pertanyaan, 
    jawaban) 
    VALUES
    ('',
    '$judul',
    '$isi_berita'
    )") or die 
    (mysql_error());
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
    <form action="index.php?halaman=manage_artikel" method="post">
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
              <hr />
          <?php 
//list berita
$sql = mysql_query("SELECT * FROM faq ORDER BY no ASC");
$productCount = mysql_num_rows($sql);
if ($productCount > 0) 
{
	while($row = mysql_fetch_assoc($sql)):?>
    <form>
        <table>
            <tr>
                <td>
                    <?php echo $row["no"] ?>
                </td>
                <td>
                    Pertanyaan   : <?php echo $pertanyaan = $row["pertanyaan"]; ?>
                </td>
                <td>
                    Jawaban      : <?php echo $jawaban = $row["jawaban"]; ?>
                </td>
                <td>
                    <a href="index.php?halaman=berita_edit&pid=<?php echo $row["no"] ?>">edit</a>
                    <a href="index.php?halaman=manage_artikel&deleteid=<?php echo $row["no"] ?>">delete</a>
                </td>
            </tr>
        </table>
    </form>
    <?php endwhile;
} 
else 
{
	echo  "tabel faq kosong";
}

?>
        </div>


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