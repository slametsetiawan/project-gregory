<?php
if (!isset($_SESSION["administrator"]))
{
    ?>
    <script language="javascript">
        alert("Harap Login Dulu");
        location.href("index.php?halaman=index");
    </script>
    <?php
}
else
{
?>

<html>
<table>
    <tr>
        <td>
            <a href="index.php?halaman=index">Kembali ke menu awal</a>
        </td>
    </tr>
</table>
<?php 
//echo url_dasar();
echo "<br>";
//echo buat_url("index");?>
</html>
<?php
$dynamicList = "";
$sql = mysql_query("SELECT * FROM tema"); 
$productCount = mysql_num_rows($sql);
    if ($productCount > 0)
    {
        while($row = mysql_fetch_assoc($sql)):?> 
             <table width="660px" border="1" cellspacing="0" cellpadding="6" align="center">
                <tr>
                    <td width="80px" valign="top" align="center">
                        <img style="border:#666 1px solid;" src="..<?php echo url_dasar() ?>"  width="200" height="300" border="1" />
                    </td>
                    <td width="250px" valign="top"><h3><b>NO :<?php echo $row["no"]?></b></h3><br />
                        Keterangan :<?php echo $row["deskripsi"] ?><br />
                            <form action="<?php echo buat_url("template") ?>" method="post" name="form21">
                            <input name="pilih" type="submit" align="right" value="Terapkan Template"/>
			                 <input name="ID" type="hidden" value="<?php echo $row["no"] ?>"/>
                            </form>
                    </td>
					         
                
				</tr>
                </table>
         <?php endwhile;
    }
    else 
    {
		$dynamicList = "Tema Kosong";
	}
 echo $dynamicList;
 
if(isset($_POST["pilih"]))
 {
    $id = $_POST["ID"];
    $sql1 = mysql_query("select * from tema where sebagai_default='YA'");
    while($row=mysql_fetch_array($sql1))
    {
	mysql_query("update tema set sebagai_default='TIDAK'");
    }
    mysql_query("update tema set sebagai_default='YA' where no='$id'");
?>
<script language="javascript">
    alert("Sukses Mengganti Tema");
</script>
<?php
 }

 }
 ?>
