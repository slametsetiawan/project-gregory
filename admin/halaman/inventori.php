<?php

if (!isset($_SESSION["administrator"]))
{

?>
<script language="javascript">
    alert("login dulu");
    location.href("../admin_login.php");
</script>
<?

} else
{
    $konek = mysql_connect("localhost", "root", "");
    mysql_selectdb("perdagangan_elektronik", $konek);
?>


<?php

    if (isset($_GET['delete_p']))
    {
        echo 'Yakin Menghapus Item ini ' . $_GET['delete_p'] . '? 
    <a href="index.php?halaman=inventori&yesdelete=' . $_GET['delete_p'] . '">Yes
    </a> | <a href="index.php?halaman=inventori">No</a>';
        exit();
    }
    if (isset($_GET['yesdelete']))
    {
        $id_to_delete = $_GET['yesdelete'];
        mysql_query("DELETE FROM produk WHERE no='$id_to_delete' LIMIT 1") or die(mysql_error());
        mysql_query("DELETE FROM
                    laporan_produk
                    WHERE
                    nama='".$_POST["nama"]."'
                    ");
        $pictodelete = ("../../images/produk/$id_to_delete.jpg");
        if (file_exists($pictodelete))
        {
            unlink($pictodelete);
        }

?>
<script language="javascript">
    alert("item telah terhapus");
    location.href("inventori.php");
</script>
<?php

    }

?>

<?php

    if (isset($_POST['nama_produk']))
    {
        $pid = mysql_real_escape_string($_POST['pid']);
        $kode_unik = mysql_real_escape_string($_POST['kode_unik']);
        $nama_produk = mysql_real_escape_string($_POST['nama_produk']);
        $category = mysql_real_escape_string($_POST['category']);
        $details = mysql_real_escape_string($_POST['details']);
        $berat = mysql_real_escape_string($_POST['berat']);
        $price = mysql_real_escape_string($_POST['price']);
        $kuantitas = mysql_real_escape_string($_POST['kuantitas']);
        $sql = mysql_query("SELECT nama FROM produk WHERE nama='$nama_produk' LIMIT 1");
        $productMatch = mysql_num_rows($sql);
        if ($productMatch > 0)
        {
            echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="index.php?halaman=inventori">click here</a>';
            exit();
        }
        $sql = mysql_query("INSERT INTO produk (no, kode, nama, kategori_produk, deskripsi, berat, harga, kuantitas) 
        VALUES('','$kode_unik','$nama_produk','$category','$details','$berat','$price','$kuantitas')") or
            die(mysql_error());
            mysql_query("INSERT INTO laporan_produk
                    VALUES
                    ('', '$nama_produk', '')
                    ");
        $pid = mysql_insert_id();
        $newname = "$pid.jpg";
        move_uploaded_file($_FILES['fileField']['tmp_name'], "../../images/produk/3$newname");
        move_uploaded_file($_FILES['fileField2']['tmp_name'], "../../images/produk/2$newname");
        move_uploaded_file($_FILES['fileField3']['tmp_name'], "../../images/produk/1$newname");
        ?>
<script language="javascript">
    alert("item telah Ditambahkan");
    location.href("inventori.php");
</script>
<?php
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
            $product_name = $row["nama"];
            $price = $row["harga"];
            $deskripsi = $row["deskripsi"];
            $product_list .= "Product ID: $id - <strong>$product_name</strong> - RP$price -  &nbsp; &nbsp; &nbsp; 
             <a href='index.php?halaman=inventori_edit&edit_P=$id'>edit</a> &bull;
             <a href='index.php?halaman=inventori&delete_p=$id'>delete</a><br />";
        }
    } else
    {
        $product_list = "You have no products listed in your store yet";
    }

?>


<body>
<div align="center" id="ContentmainWrapper">
  <div id="pageContent"><br />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Add New Inventory Item Form &darr;
    </h3>
    <form action="inventori.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Nama Produk</td>
        <td width="80%"><label>
          <input name="nama_produk" type="text" id="nama_produk" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">
            Kode unik barang
        </td>
        <td>
            <input name="kode_unik" type="text" id="kode_unik" size="64" />
        </td>
      </tr>
      <tr>
        <td align="right">Harga Produk</td>
        <td><label>
          RP
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
          <option value=""></option>
          <option value="4">Kemeja</option>
          <option value="1">Celana</option>
          <option value="2">jaket</option>
          <option value="3">lainnya</option>
          </select>
        </label></td>
      </tr>
      <!--<tr>
        <td align="right">Subcategory</td>
        <td><select name="subcategory" id="subcategory">
        <option value=""></option>
          <option value="Atasan">Atasan</option>
          <option value="Pakaian">Pakaian</option>
          <option value="Bawahan">Bawahan</option>
          </select></td>
      </tr>-->
      <tr>
        <td align="right">Deskripsi</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">
            Beratnya
        </td>
        <td>
            <select name="berat" id="berat">
                <option value="1">1 kg</option>
                <option value="0.5">0.5 kg</option>
                <option value="1.5">1.5 kg</option>
            </select>
        </td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image 2</td>
        <td><label>
          <input type="file" name="fileField2" id="fileField2" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image 3</td>
        <td><label>
          <input type="file" name="fileField3" id="fileField3" />
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
          <input type="submit" name="button" id="button" value="Tambahkan Sekarang" />
          <input type="hidden" name="pid" id="pid" value="<?php echo $no ?>" />
          <!--<input type="reset" value="Reset"/>-->
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
</div>
<div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
    </div>
    <hr />
<title>Inventory List</title>
<?

    echo $product_list;
}

?>
</body>
</html>