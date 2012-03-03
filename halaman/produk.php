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
                    <td valign="top" align="right">
                        <table>
                            <tr>
                                <td valign="bottom" align="right">
                                    <a href="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/1.jpg" target="_blank">
                                        <img
                                            src="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
                                            width="150"
                                            height="200"
                                            alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
                                        />
                                    </a>
                                </td>
                                <td valign="bottom" align="left">
                                    <a href="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/2.jpg" target="_blank">
                                        <img
                                            src="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/2.jpg"
                                            width="120"
                                            height="160"
                                            alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
                                        />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="right">
                                    <a href="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/3.jpg" target="_blank">
                                        <img
                                            src="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/3.jpg"
                                            width="105"
                                            height="140"
                                            alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
                                        />
                                    </a>
                                </td>
                                <td valign="top" align="left">
                                    <a href="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/4.jpg" target="_blank">
                                        <img
                                            src="<?php echo("url_dasar")?>/images/produk/<?php echo($produk["no"]);?>/4.jpg"
                                            width="90"
                                            height="120"
                                            alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
                                        />
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" align="left">
                        <form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
                            <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
                            <table>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Kode</td>
                                    <td align="left"><?php echo($produk["kode"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Nama</td>
                                    <td align="left"><?php echo($produk["nama"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Berat</td>
                                    <td align="left"><?php echo($produk["berat"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Deskripsi</td>
                                    <td align="left"><?php echo($produk["deskripsi"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Tersedia</td>
                                    <td align="left"><?php echo($produk["kuantitas"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Harga</td>
                                    <td align="left">
                                        <span style="font-size: 20px;">
                                            Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Kuantitas</td>
                                    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
                                </tr>
                                <tr>
                                    <td align="right"></td>
                                    <td align="left"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }
}
?>