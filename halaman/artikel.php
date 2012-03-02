<?php
//mysql_connect("localhost","root","");
//mysql_select_db("perdagangan_elektronik");

$sql = mysql_query("SELECT * FROM berita ORDER BY no_berita DESC LIMIT 5");
$productCount = mysql_num_rows($sql);
    if ($productCount > 0) 
    {
		while($row = mysql_fetch_assoc($sql))
        { 
             $product_name = $row["no_berita"];
			 $price = $row["judul"];
			 $details = $row["penulis"];
			 $category = $row["isi_berita"];
             $lain = $row["date_added"];
             $list ='<table border="3" width="500px" align="center">
                    <tr>
                        <td>
                            <b>
                            Judul : '. $price .'
                            
                        </td>
                        <td width="20%">
                            Tanggal dimuat : '. $lain .'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="20%">
                            Penulis : '. $details .'    
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            isi berita : '. $category .'
                            </b>
                        </td>
                    </tr>
                </table>';
          echo $list;
          echo "<br/>";
         }
		 
	} 
    else 
    {
		echo "TABEL BERITA KOSONG.";
	    exit();
	}
mysql_close();
//echo $list;
?>

                