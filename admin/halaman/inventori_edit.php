<?php

if (!isset($_SESSION["administrator"]))
{
    header("location: index.php?halaman=index");
    exit();
}

else
{
?>
<?php

if (isset($_POST['button']))
{
    $awak = $_POST['nama_awal'];
    echo $awak;
    $pid = mysql_real_escape_string($_POST['thisID']);
    $kode_unik = mysql_real_escape_string($_POST['kode_unik']);
    $nama_produk = $_POST['nama_produk'];
    $category = mysql_real_escape_string($_POST['kategori']);
    $details = mysql_real_escape_string($_POST['deskripsi']);
    $berat = mysql_real_escape_string($_POST['berat']);
    $price = mysql_real_escape_string($_POST['harga']);
    $kuantitas = mysql_real_escape_string($_POST['kuantitas']);
    $sql = "UPDATE
    produk
    SET
    kode='$kode_unik',
    nama='$nama_produk',
    kategori_produk='$category',
    deskripsi='$details',
    berat='$berat',
    harga='$price'
    WHERE 
    no='$pid'
    ";
    mysql_query($sql);
    mysql_query("UPDATE 
                    laporan_produk
                    SET
                    nama='$nama_produk'
                    WHERE
                    nama='$awak'
                    ");
    if ($_FILES['gambar']['tmp_name'] != "")
    {
        $newname = "$pid.jpg";
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../../images/produk/$newname");
    } else
    {
        echo "Gambar KOsong";
    }

?>
<script>
    alert("item telah di edit");
    location.href("inventori.php");
</script>
<?

}

?>
<?php

if (isset($_GET["edit_P"]))
{
    //echo ("sukses");
    $dapat = $_GET["edit_P"];
    //echo $dapat;
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
$productCount = mysql_num_rows($sql);?>
<a href="index.php?halaman=index">kembali ke menu utama</a><br /><br />
<?php
if ($productCount > 0)
{
    while ($row = mysql_fetch_array($sql)):?>
        Product ID: <?php echo $row["no"]; ?> - <strong><?php echo $row["nama"]; ?></strong> - <?php echo $row["harga"]; ?> 
        - <?php echo $row["kode"]; ?> - <?php echo $row["deskripsi"]; ?> 
        <!--<table border="0">
            <tr>
                <form action="index.php?halaman=inventori_edit" method="get" name="pengubah">
                    <input type="hidden" value="<?php echo $row["no"] ?>" name="edit_P" />
                    <input type="submit" name="edit" value="edit" />
                </form>
                <form action="inventori.php" method="get" name="penghapus">
                    <input type="hidden" value="<?php echo $row["no"] ?>" name="delete_p" />
                    <input type="hidden" value="<?php echo $row["nama"] ?>" />
                    <input type="submit" name="delete" value="delete" />
                </form>
            </tr>
        </table>--> 
        
             <a href="index.php?halaman=inventori_edit&edit_P=<?php echo $row["no"] ?>">edit</a>  
             <a href="index.php?halaman=inventori&delete_p=<?php echo $row["no"] ?>">delete</a><br />
    <?php endwhile;
} else
{
    $product_list = "You have no products listed in your store yet";
}

?>


<body>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;">
        <a href="index.php?halaman=inventori&inventoryForm">+ Add New Inventory Item</a></div>
            <div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
            </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Edit form &darr;
    </h3>
    <form action="index.php?halaman=inventori_edit" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Nama Produk</td>
        <td width="80%"><label>
          <input name="nama_produk" type="text" id="nama_produk" size="64" value="<? echo @$n3; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">
            Kode unik barang
        </td>
        <td>
            <input name="kode_unik" type="text" id="kode_unik" size="64" value="<? echo @$n2; ?>" />
        </td>
      </tr>
      <tr>
        <td align="right">Harga Produk</td>
        <td><label>
          RP
          <input name="harga" type="text" id="price" size="12" value="<? echo @$n7; ?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="kategori" id="category">
          <option value="<?php echo @$n4; ?>"><?php echo @$n4;?></option>
          <option value="kemeja">Kemeja</option>
          <option value="celana">Celana</option>
          <option value="jas">Jas</option>
          <option value="dasi">Dasi</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td align="right">Deskripsi</td>
        <td><label>
          <textarea name="deskripsi" id="details" cols="64" rows="5"><?php echo @$n5;?></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">
            Beratnya
        </td>
        <td>
            <select name="berat" id="berat">
                <option value="<?php echo @$n6;?>"><?php echo @$n6;?></option>
                <option value="1">1 kg</option>
                <option value="0.5">0.5 kg</option>
                <option value="1.5">1.5 kg</option>
            </select>
        </td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="gambar" id="fileField" />
        </label></td>
      </tr> 
      <tr>
        <td align="right">
            Kuantitas Produknya :
        </td>
        <td>
            <input type="text" name="kuantitas" size="3" />
        </td>
      </tr>     
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="nama_awal" type="hidden" value="<?php echo @$n3; ?>"/>
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
<?php
}
?>