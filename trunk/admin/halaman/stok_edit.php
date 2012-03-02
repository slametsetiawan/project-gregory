<?php

session_start();
if (!isset($_SESSION["administrator"]))
{
    header("location: index.php?halaman=index");
    exit();
}
$konek = mysql_connect("localhost", "root", "");
mysql_selectdb("perdagangan_elektronik", $konek);
//echo "(<pre>)";
//var_dump($_GET);


?>
<?php

if (isset($_POST['button']))
{
     if (preg_match('|^[0-9]*$|', $_POST["kuantitas"]) )
        {
            $pid = mysql_real_escape_string($_POST['thisID']);
            $kuantitas_produk = mysql_real_escape_string($_POST['kuantitas']);
            $sql = "
            UPDATE
            produk
            SET
            kuantitas='$kuantitas_produk'
            WHERE no='$pid'
            ";
            mysql_query($sql);
        }
        else
        {
            ?>
            <script language="javascript">
                alert("Nilai Yang Anda Input Bukan Berupa Angka")
                location.href="stok_edit.php"
            </script>
            <?php     
        }

?>
<script>
    alert("Stock telah di edit");
    location.href("stok.php");
</script>
<?

}

?>
<?php

if (isset($_GET['pid']))
{
    //echo ("sukses");
    $dapat = $_GET['pid'];
    $sqlku = mysql_query("SELECT * FROM produk WHERE no=" . $dapat . " LIMIT 1");
    $productCount = mysql_num_rows($sqlku);
    if ($productCount > 0)
    {
        while ($row = mysql_fetch_assoc($sqlku))
        {
            $n1 = $row["no"];
            $n2 = $row["kode"];
            $n3 = $row["nama"];
            $n4 = $row["kategori_produk"];
            $n5 = $row["deskripsi"];
            $n6 = $row["berat"];
            $n7 = $row["harga"];
            $n8 = $row["kuantitas"];
        }
    } else
    {
        echo "Sorry dude that crap dont exist.";
        exit();
    }
}

?>
<?php

$product_list = "";
$sql = mysql_query("SELECT * FROM produk ORDER BY no ASC");
$productCount = mysql_num_rows($sql);
if ($productCount > 0)
{
    while ($row = mysql_fetch_array($sql))
    {
        $id = $row["no"];
        $kode_unik = $row["kode"];
        $product_name = $row["nama"];
        $category = $row["kategori_produk"];
        $subcategory = $row["deskripsi"];
        $berat = $row["berat"];
        $price = $row["harga"];
        $kuantitas = $row["kuantitas"];
        $product_list .= "Product ID: $id - <strong>$product_name</strong> - $price - $kode_unik -<br/>  JUMLAH SAAT INI :$kuantitas > &nbsp; &nbsp; &nbsp; 
             <a href='http://localhost/perdagangan_elektronik/admin/halaman/stok_edit.php?pid=$id'>edit</a> &bull; 
             <br />
             <br />";
    }
} else
{
    $product_list = "You have no products listed in your store yet";
}

?>

<a href="../index.php">kembali ke menu utama</a>
<body>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="inventori.php#inventoryForm">+ Add New Inventory Item</a></div>
<div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Pilih Salah Satu Agar Muncul Di Edit form &darr;
    </h3>
    <form action="stok_edit.php" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Nama Produk</td>
        <td><label>
          <input disabled="1" name="nama_produk" type="text" id="nama_produk" size="64" value="<? echo @$n3; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">
            Kode unik barang
        </td>
        <td>
            <input disabled="1" name="kode_unik" type="text" id="kode_unik" size="64" value="<? echo @$n2; ?>" />
        </td>
      </tr>
      <tr>
        <td align="right">Harga Produk</td>
        <td><label>
          RP
          <input disabled="1" name="harga" type="text" id="price" size="12" value="<? echo @$n7; ?>" />
        </label></td>
      </tr> 
      <tr>
        <td align="right">
             Kuantitas Saat Ini :
        </td>
        <td>
            <input disabled="1" type="text" name="kuantitas_awal" size="5" value="<?php echo @$n8 ?>" />
        </td>
      </tr>
      <tr>
        <td align="right">
              Ubah Kuantitas Menjadi :
        </td>
        <td>
            <input type="text" name="kuantitas" size="5" />
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="thisID" type="hidden" value="<?php echo @$n1; ?>" />
          <input type="submit" name="button" id="button" value="Rubah Sekarang" />
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
