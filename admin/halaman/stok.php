
<head>
    <h1>
        <center>
            Halaman Manage Stok 
        </center>
    </h1>
</head>
<?php

if (isset($_SESSION["administrator"]))
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

    if (isset($_GET['deleteid']))
    {
        echo 'Yakin Menghapus Item ini ' . $_GET['deleteid'] . '? 
    <a href="inventori.php?yesdelete=' . $_GET['deleteid'] . '">Yes
    </a> | <a href="inventori.php">No</a>';
        exit();
    }
    if (isset($_GET['yesdelete']))
    {
        $id_to_delete = $_GET['yesdelete'];
        mysql_query("DELETE FROM produk WHERE no='$id_to_delete' LIMIT 1") or die(mysql_error());
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
        //$pid = mysql_real_escape_string($_POST['n1']);
        $kode_unik = mysql_real_escape_string($_POST['kode_unik']);
        $nama_produk = mysql_real_escape_string($_POST['nama_produk']);
        $category = mysql_real_escape_string($_POST['category']);
        $details = mysql_real_escape_string($_POST['details']);
        $berat = mysql_real_escape_string($_POST['berat']);
        $price = mysql_real_escape_string($_POST['price']);
        $sql = mysql_query("SELECT nama FROM produk WHERE nama='$nama_produk' LIMIT 1");
        $productMatch = mysql_num_rows($sql);
        if ($productMatch > 0)
        {
            echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="http://localhost/perdagangan_elektronik/admin/halaman/inventori.php">click here</a>';
            exit();
        }
        $sql = mysql_query("INSERT INTO produk (no, kode, nama, kategori_produk, deskripsi, berat, harga) 
        VALUES('','$kode_unik','$nama_produk','$category','$details','$berat','$price')") or
            die(mysql_error());
        $pid = mysql_insert_id();
        $newname = "$pid.jpg";
        move_uploaded_file($_FILES['fileField']['tmp_name'], "../../images/produk/$newname");
        //header("location: index.php?halaman=index");
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
            $kuantitas = $row["kuantitas"];
            $product_list .= "Product ID: $id - <strong>$product_name</strong> - $$price - Kuantitasnya : $kuantitas  &nbsp; &nbsp; &nbsp; 
             <a href='stok_edit.php?pid=$id'>edit</a>;
             <br />
            <br />";
        }
    } else
    {
        $product_list = "You have no products listed in your store yet";
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory List</title>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
<a href="../index.php">kembali ke menu utama</a>
</head>

<body>
<div align="center" id="ContentmainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="stok.php#stokform">Form Stock</a></div>
<div align="center" style="margin-left:24px;">
      <h2>List Yang bisa Di edit Stocknya</h2>
      <?php

    echo $product_list;

}

?>