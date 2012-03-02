<div id="halaman_keranjang_belanja">
    <h3>Keranjang Belanja</h3>
    <table width="100%" border="1">
        <tr>
            <th>No.</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Kuantitas</th>
            <th>Harga per Item</th>
            <th>Harga Total</th>
            <th>Hapus</th>
        </tr>
        <?php
        if(isset($_SESSION["keranjang_belanja"]))
        {
            @$nomer = $_GET["nomer"];
            @$kuantitas = $_GET["kuantitas"];
            if(count($_SESSION["keranjang_belanja"])>0)
            {
                $no_urut = 1;
                $total_keseluruhan = 0;
                foreach($_SESSION["keranjang_belanja"] as $no_produk=>$kuantitas_produk)
                {
                    $sql = "
                        SELECT
                            *
                        FROM
                            produk
                        WHERE
                            no = '".$no_produk."'
                        LIMIT 0, 1";
                    $sumber_data = mysql_query($sql);
                    $produk = mysql_fetch_assoc($sumber_data);
                    
                    if($produk!=FALSE)
                    {
                        $total_keseluruhan = $total_keseluruhan + ($produk["harga"]*$kuantitas_produk);
                        ?>
                        <tr>
                            <td><?php echo($no_urut++);?></td>
                            <td><?php echo($produk["kode"]);?></td>
                            <td><?php echo($produk["nama"]); ?></td>
                            <td>
                                <form method="post" action="<?php echo(buat_url("ubah_produk_di_keranjang_belanja", array("nomer"=>$nomer,"kuantitas"=>$kuantitas))) ?>">
                                    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
                                    <input type="text" name="kuantitas" value="<?php echo($kuantitas_produk);?>" size="3" />
                                    <input type="submit" name="submit" value="Ubah Kuantitas" />
                                </form>
                            </td>
                            <td><?php echo($produk["harga"]);?></td>
                            <td><?php echo($produk["harga"]*$kuantitas_produk);?></td>
                            <td align="center">
                                <input type="button" value="Hapus" onclick="location.href='<?php echo(buat_url("hapus_produk_di_keranjang_belanja", array("no_produk"=>$produk["no"])))?>';" />
                            </td>
                        </tr>
                        <?php
                    }
                }
            }
        }
        ?>
        <tr>
            <td colspan="4"></td>
            <td>Total Keseluruhan</td>
            <td>
                <?php
                         if(isset($_SESSION["keranjang_belanja"]))
                         {
                            echo(@$total_keseluruhan);
                         }
                    ?>
            </td>
            <td></td>
        </tr>
    </table>
    <div>
        <strong>
            <center>
                <a href="<?php echo(buat_url("katalog"));?>">&lt;&lt; Kembali ke Katalog</a></a> |
                <?php
                        if(isset($_SESSION["keranjang_belanja"]))
                        {
                            if (@$total_keseluruhan == 0)
                            {
                                ?>
                                <script language="javascript"> alert("Anda belum Berbelanja")
                                location.href="index.php?halaman=katalog"
                                </script>
                                <?php
                            }
                            else
                            {
                            ?>
                <a href="<?php echo(buat_url("login", array("redirect"=>"pengiriman","total"=>$total_keseluruhan)));?>">Selesaikan Belanja &gt;&gt;</a>
                        <?php
                            }
                        }
                        ?>
            </center>
        </strong>
    </div>
</div>