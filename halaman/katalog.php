<?php

$sql = "SELECT * 
FROM  `produk` 
ORDER BY  `produk`.`no` DESC 
LIMIT 0 , 30 ";

$sql2 = "SELECT * 
FROM  `produk` 
ORDER BY  `produk`.`harga` ASC 
LIMIT 0 , 30";

$tampilan_produk_terbaru = mysql_query($sql);
$tampilan_produk_termurah = mysql_query($sql2);
?>

<div id="pageContent" style="border-bottom: dashed; border-left: dashed; border-right: dashed; border-top: dashed; float: left;" >
	<h3>produk terbaru :<br /><br />
	<?php while($baris_data = mysql_fetch_assoc($tampilan_produk_terbaru)): ?>
    <form name="katalog_baru" method="get" action="http://localhost/perdagangan_elektronik/halaman/produk.php">
    <table width="310px" border="0">
        <tr>
            <td>
		      <img src="<?php echo(url_dasar());?>/images/produk/<?php echo"1";echo($baris_data["no"]);?>.jpg" width="77" height="102" border="1"/>
	        </td>
            <td>
                <?php echo($baris_data["nama"]);?>
            <br />
                <?php echo($baris_data["harga"]);?>
                <?php $id = $baris_data["no"]; ?>
            </td>
         </tr>
         <tr>
            <td>
                STOK    :
                <?php if ($baris_data["kuantitas"] <= 0)
                        {
                            echo $baris_data["kuantitas"];
                            echo "<br/>";
                            echo "BARANG HABIS! ";
                        }
                        else
                        {
                            echo $baris_data["kuantitas"];
                            ?>
                            <input type="hidden" value="" name="submit" />
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <a href="<?php echo buat_url("produk", array("no"=>$baris_data["no"]))?>">
                    <strong>Lihat Detail Produk</strong>
                </a>
                            <?php
                        }; ?><br />
            </td>
         </tr>
         <!--<tr>
            <td>
                <a href="<?php echo buat_url("produk", array("no"=>$baris_data["no"]))?>">
                    <strong>Lihat Detail Produk</strong>
                </a>
            </td>
        </tr>-->
    </table>
    </form>
    <?php endwhile;?>
	</h3>
</div>

<div id="pageContent" style="border-bottom: dashed; border-left: dashed; border-right: dashed; border-top: dashed; float: left;" >
	<h3>produk termurah    :<br /><br />
	<?php while($baris_data = mysql_fetch_assoc($tampilan_produk_termurah)): ?>
		 <table width="310px" border="0">
        <tr>
            <td>
		      <img src="<?php echo(url_dasar());?>/images/produk/<?php echo"1";echo($baris_data["no"]);?>.jpg" width="77" height="102" border="1"/>
	        </td>
            <td>
                <?php echo($baris_data["nama"]);?>
            <br />
                <?php echo($baris_data["harga"]);?>
            </td>
         </tr>
         <tr>
            <td>
                STOK    :
                <?php if ($baris_data["kuantitas"] <= 0)
                        {
                            echo $baris_data["kuantitas"];
                            echo "<br/>";
                            echo "BARANG HABIS! ";
                        }
                        else
                        {
                            echo $baris_data["kuantitas"];
                            ?>
                            <input type="hidden" value="" name="submit" />
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <a href="<?php echo buat_url("produk", array("no"=>$baris_data["no"]))?>">
                    <strong>Lihat Detail Produk</strong>
                </a>
                            <?php
                        }; ?><br />
            </td>
         </tr>
         <!--<tr>
            <td>
                <a href="<?php echo buat_url("produk", array("no"=>$baris_data["no"]))?>">
                    <strong>Lihat Detail Produk</strong>
                </a>
            </td>
        </tr>-->
    </table>
    <?php endwhile;?>
	</h3>
</div>