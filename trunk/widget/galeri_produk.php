<?php

function widget_galeri_produk()
{
    $sumber_data_produk_acak = mysql_query("
        SELECT
            *
        FROM
            produk
        ORDER BY RAND()
        LIMIT 0, 8");
    ?>
    <div class="widget_galeri_produk">
        <table>
            <?php while($produk = mysql_fetch_assoc($sumber_data_produk_acak)):?>
                <tr>
                    <td>
                        <a href="<?php echo(buat_url("produk", array("no"=>$produk["no"])));?>">
                            <img
                                src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/<?php echo(rand(1,4));?>.jpg"
                                width="60"
                                height="80"
                                alt="<?php echo($produk["kode"])?> | <?php echo($produk["nama"]);?>"
                            />
                        </a>
                    </td>
                    <td>
                        <?php $produk = mysql_fetch_assoc($sumber_data_produk_acak);?>
                        <?php if(!empty($produk["no"])):?>
                            <a href="<?php echo(buat_url("produk", array("no"=>$produk["no"])));?>">
                                <img
                                    src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/<?php echo(rand(1,4));?>.jpg"
                                    width="60"
                                    height="80"
                                    alt="<?php echo($produk["kode"])?> | <?php echo($produk["nama"]);?>"
                                />
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php $produk = mysql_fetch_assoc($sumber_data_produk_acak);?>
                        <?php if(!empty($produk["no"])):?>
                            <a href="<?php echo(buat_url("produk", array("no"=>$produk["no"])));?>">
                                <img
                                    src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/<?php echo(rand(1,4));?>.jpg"
                                    width="60"
                                    height="80"
                                    alt="<?php echo($produk["kode"])?> | <?php echo($produk["nama"]);?>"
                                />
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php $produk = mysql_fetch_assoc($sumber_data_produk_acak);?>
                        <?php if(!empty($produk["no"])):?>
                            <a href="<?php echo(buat_url("produk", array("no"=>$produk["no"])));?>">
                                <img
                                    src="<?php echo(url_dasar());?>/images/produk/<?php echo($produk["no"]);?>/<?php echo(rand(1,4));?>.jpg"
                                    width="60"
                                    height="80"
                                    alt="<?php echo($produk["kode"])?> | <?php echo($produk["nama"]);?>"
                                />
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile;?>
        </table>
    </div>
    <?php
}