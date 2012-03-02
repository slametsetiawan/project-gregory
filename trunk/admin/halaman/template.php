<?php
if (isset($_SESSION["administrator"]))
{
    ?>
    <script language="javascript">
        alert("Harap Login Dulu");
        document.href("../admin_login.php");
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
            <a href="../index.php">Kembali ke menu awal</a>
        </td>
    </tr>
</table>
<?php 
require_once("../fungsi.php");
//echo url_dasar();
echo "<br>";
//echo buat_url("index");?>
</html>
<?php
$konek = mysql_connect("localhost","root","");
mysql_selectdb("perdagangan_elektronik",$konek);
$dynamicList = "";
$sql = mysql_query("SELECT * FROM tema"); 
$productCount = mysql_num_rows($sql);
    if ($productCount > 0)
    {
        while($row = mysql_fetch_array($sql))
        { 
             $no = $row["no"];
             $nama = $row["kode"];
			 $keterangan = $row["deskripsi"];
			 $details = $row["sebagai_default"];
             $dynamicList .= '<table width="660px" border="1" cellspacing="0" cellpadding="6" align="center">
                <tr>
                    <td width="80px" valign="top" align="center">
                    <img style="border:#666 1px solid;" src="http://localhost/perdagangan_elektronik/img/' . $no .
                        '.jpg"  width="200" height="300" border="1" />
                    </td>
                    <td width="250px" valign="top"><h3><b>' . $nama . '</b></h3><br />
                        Keterangan : ' . $keterangan . '.<br />
                            <form action="http://localhost/perdagangan_elektronik/admin/halaman/template.php" method="get" name="form21">
                            <input name="pilih" type="submit" align="right" value="Pilih Template"/>
			                 <input name="ID" type="hidden" align="right" value=" ' . $no . ' "/>
                            </form>
                    </td>
					         
                
				</tr>
                </table>';
         }
    }
    else 
    {
		$dynamicList = "We have no products listed in our store yet";
	}
 mysql_close();
 echo $dynamicList;
 
 if(isset($_GET['pilih']))
 {
    $konek = mysql_connect("localhost","root","");
    mysql_selectdb("perdagangan_elektronik",$konek);
    $sqlku = mysql_query(" ");
    $id = $_GET['ID'];
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
