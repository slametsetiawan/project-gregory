<h1>
    <center>
        Halaman Manage Stok 
    </center>
</h1>
<?php

if (!isset($_SESSION["administrator"]))
{
    ?>
    <script language="javascript">
        alert("login dulu");
        location.href("../admin_login.php");
    </script>
    <?
} 
else
{
    //delete stok
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
             <a href='index.php?halaman=stok_edit&pid=$id'>edit</a>;
             <br />";
        }
    } else
    {
        $product_list = "You have no products listed in your store yet";
    }

?>
<title>Edit Stok</title>
<body>
    <div align="right" style="margin-right:32px;"><a href="stok.php#stokform">Form Stock</a></div>
     <h2>List Yang bisa Di edit Stocknya</h2>
      <?php
    echo $product_list;
}
?>