<?php

$sql = "
    SELECT
        *
    FROM
        produk
    ORDER BY no DESC
    LIMIT 0, 50";
$sumber_data_produk_katalog = mysql_query($sql);
?>
<div class="halaman_katalog">
    <h3>Produk Katalog</h3>
    <div style="margin-bottom: 30px;">
        <table>
            <?php while($produk = mysql_fetch_assoc($sumber_data_produk_katalog)): ?>
                <tr>
                    <td valign="top">
                        <a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
                            <img
                                src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
                                width="90"
                                height="120"
                                alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
                            />
                        </a>
                    </td>
                    <td valign="top">
                        <form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
                            <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
                            <table>
                                <tr>
                                    <td align="left" colspan="2">
                                        <a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
                                            <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Kode</td>
                                    <td align="left"><?php echo($produk["kode"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Nama</td>
                                    <td align="left"><?php echo($produk["nama"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Tersedia</td>
                                    <td align="left"><?php echo($produk["kuantitas"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Harga</td>
                                    <td align="left">
                                        <span style="font-size: 16px;">
                                            Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Kuantitas</td>
                                    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
                                </tr>
                                <tr>
                                    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <?php $produk = mysql_fetch_assoc($sumber_data_produk_katalog); // NEXTING RECORD ?>
                    <?php if(!empty($produk["no"])):?>
                        <td valign="top">
                            <a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
                                <img
                                    src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/1.jpg"
                                    width="90"
                                    height="120"
                                    alt="<?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>"
                                />
                            </a>
                        </td>
                        <td valign="top">
                        <form method="post" action="<?php echo(buat_url("tambahkan_ke_keranjang"));?>">
                            <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
                            <table>
                                <tr>
                                    <td align="left" colspan="2">
                                        <a href="<?php echo buat_url("produk", array("no"=>$produk["no"]))?>">
                                            <?php echo($produk["kode"]);?> | <?php echo($produk["nama"]);?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Kode</td>
                                    <td align="left"><?php echo($produk["kode"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Nama</td>
                                    <td align="left"><?php echo($produk["nama"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Tersedia</td>
                                    <td align="left"><?php echo($produk["kuantitas"]);?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Harga</td>
                                    <td align="left">
                                        <span style="font-size: 16px;">
                                            Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight: bold;">Kuantitas</td>
                                    <td align="left"><input type="text" name="kuantitas" value="1" maxlength="2" size="2"/></td>
                                </tr>
                                <tr>
                                    <td align="left" colspan="2"><input type="submit" name="tambahkan_ke_keranjang" value="Tambahkan ke Keranjang"/></td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <?php else:?>
                    <td></td>
                    <td></td>
                    <?php endif;?>
                </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>