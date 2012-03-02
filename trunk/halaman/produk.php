<?php
//var_dump($_GET);
//var_dump($_SESSION);
if (isset($_GET["no"])) 
{
    $sql = "
        SELECT
            P.*,
            KP.nama AS kategori
        FROM
            produk P
            LEFT OUTER JOIN kategori_produk KP ON
                KP.no = P.kategori_produk
        WHERE
            P.no = '".$_GET["no"]."'
        LIMIT 0, 1";
    
//    echo("<pre>");
//    var_dump($sql);
    
    $sumber_data = mysql_query($sql);
    $produk = mysql_fetch_assoc($sumber_data);
    
    if($produk==FALSE)
    {
        echo("Produk tidak ditemukan.");
    }
    else
    {
        ?>
        <div id="halaman_produk">
            <h3>Produk <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?></h3>
            <table>
                <tr>
                    <td>
                        <img src="<?php echo(url_dasar())?>/images/produk/<?php echo "1";echo($produk["no"])?>.jpg" width="142" height="188" />
                        <br />
                        <a href="<?php echo(url_dasar())?>/images/produk/<?php echo "1";echo($produk["no"])?>.jpg">Lihat gambar penuhnya</a>
                    </td>
                    <td>
                        <img src="<?php echo(url_dasar())?>/images/produk/<?php echo "2";echo($produk["no"])?>.jpg" width="142" height="188" />
                        <br />
                        <a href="<?php echo(url_dasar())?>/images/produk/<?php echo "2";echo($produk["no"])?>.jpg">Lihat gambar penuhnya</a>
                    </td>
                    <td>
                        <img src="<?php echo(url_dasar())?>/images/produk/<?php echo "3";echo($produk["no"])?>.jpg" width="142" height="188" />
                        <br />
                        <a href="<?php echo(url_dasar())?>/images/produk/<?php echo "3";echo($produk["no"])?>.jpg">Lihat gambar penuhnya</a>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
                            <table align="left">
                                <tr>
                                    <td align="right"><strong>Kode : </strong></td>
                                    <td><?php echo($produk["kode"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right"><strong>Nama : </strong></td>
                                    <td><?php echo($produk["nama"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right"><strong>Kategori : </strong></td>
                                    <td><?php echo($produk["kategori"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right"><strong>Deskripsi : </strong></td>
                                    <td><?php echo($produk["deskripsi"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right"><strong>Berat : </strong></td>
                                    <td><?php echo($produk["berat"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right"><strong>Harga : </strong></td>
                                    <td><?php echo($produk["harga"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right"><strong>Beli sebanyak : </strong></td>
                                    <td>
                                        <input type="hidden" name="no_produk" value="<?php echo $produk["no"]; ?>" />
                                        <input type="text" name="kuantitas" value="1" size="4" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" value="Tambahkan Ke Keranjang" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                <tr>
            </table>
        </div>
        <?php
    }
}
?>