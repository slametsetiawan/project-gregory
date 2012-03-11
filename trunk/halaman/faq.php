<?php

$sql = mysql_query("SELECT * FROM faq ORDER BY no ASC LIMIT 5");
$productCount = mysql_num_rows($sql);
    if ($productCount > 0) 
    {
		while($row = mysql_fetch_assoc($sql)):?>
            <table width="500px">
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
                        <b>
                            <?php echo $details = $row["jawaban"]; ?>
                        </b>
                    </td>
                </tr>
            </table>
            <hr />
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

                