<?php
if (isset($_SESSION["administrator"]))
{
    $sql = mysql_query("SELECT * FROM berita");
    mysql_fetch_assoc($sql);
    $productCount = mysql_num_rows($sql);
        if ($productCount > 0) 
        {
    		while($row = mysql_fetch_array($sql))
            { 
                 $product_name = $row["no_berita"];
    			 $price = $row["judul"];
    			 $details = $row["penulis"];
    			 $category = $row["isi_berita"];
                 $lain = $row["date_added"];
                 $list .='<table width="660px" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                        <td width="80px" valign="top"><strong><a href="produk.php?id=' . $id .
                            '"></strong><img style="border:#666 1px solid;" src="http://localhost/perdagangan_elektronik/inventory_image/' . $id .
                            '.jpg" alt="' . $product_name .
                            '" width="77" height="102" border="1" /></a></td>
                        <td width="250px" valign="top">' . $product_name . '<br />
                            Rp ' . $price . '.<br />
                                <a href="index.php?halaman=produk&id=' . $id . '"><strong>Lihat Detail Produk</strong></a></td>
    					         
                    
    				</tr>
                    </table>';
    
             }
    		 
    	} 
        else 
        {
    		echo "That item does not exist.";
    	    exit();
    	}
    mysql_close();
    echo $list;
}
else
{
    ?>
    <script language="javascript">
        alert("harap login dulu");
        location.href("../admin_login.php");
    </script>
    <?php
}
?>