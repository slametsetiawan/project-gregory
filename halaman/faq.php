<?php
//mysql_connect("localhost","root","");
//mysql_select_db("perdagangan_elektronik");

$sql = mysql_query("SELECT * FROM faq ORDER BY no ASC LIMIT 5");
$productCount = mysql_num_rows($sql);
    if ($productCount > 0) 
    {
		while($row = mysql_fetch_assoc($sql)):?>
            <table border="1" width="500px">
                <tr>
                    <td>No  :
                        <?php echo $product_name = $row["no"]; ?>
                    </td>
                </tr>
                <tr>
                    <td>Pertanyaan  :
                        <?php echo $price = $row["pertanyaan"]; ?>
                    </td>
                </tr>
                <tr>
                    <td>jawaban :
                        <?php echo $details = $row["jawaban"]; ?>
                    </td>
                </tr>
            </table>
         <?php endwhile;
		 
	} 
    else 
    {
		echo "TABEL FAQ KOSONG.";
	    exit();
	}
mysql_close();
//echo $list;
?>

                