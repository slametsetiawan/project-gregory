<?php if(isset($_POST["lanjut_ke_langkah_3"])):?>
    <style>
    div#halaman_selesaikan_belanja_langkah_3 table tr th,
    div#halaman_selesaikan_belanja_langkah_3 table tr td
    {
        padding: 2px 3px;
    }
    div#halaman_selesaikan_belanja_langkah_3 table tr th
    {
        background-color: #CCC;
    }
    div#halaman_selesaikan_belanja_langkah_3 table tr:nth-child(odd)
    {
        background-color: #EEE;
    }
    div#halaman_selesaikan_belanja_langkah_3 table tr:nth-child(even)
    {
        background-color: #DDD;
    }
    </style>
    <div id="halaman_selesaikan_belanja_langkah_3">
        <h3>Selesaikan belanja - Langkah 3 | Ringkasan Belanja</h3>
        <div>
            <form method="post" action="<?php echo(buat_url("selesaikan_belanja"));?>">
                <input type="hidden" name="nama_penerima" value="<?php echo($_POST["nama_penerima"]);?>"/>
                <input type="hidden" name="alamat_pengiriman" value="<?php echo($_POST["alamat_pengiriman"]);?>"/>
                <input type="hidden" name="kota" value="<?php echo($_POST["kota"]);?>"/>
                <input type="hidden" name="telepon_penerima" value="<?php echo($_POST["telepon_penerima"]);?>"/>
                <input type="hidden" name="pengirim" value="<?php echo($_POST["pengirim"]);?>"/>
                <input type="hidden" name="tarif_pengiriman" value="<?php echo($_POST["tarif_pengiriman"]);?>"/>
                <input type="hidden" name="metode_pembayaran" value="<?php echo($_POST["metode_pembayaran"]);?>"/>
                <br/>
                <div>
                    <div style="font-size: 16px; font-weight: bold; font-variant: small-caps;">Ringkasan Produk</div>
                    <div>
                        <table width="100%">
                            <tr>
                                <th>No.</th>
                                <th>Kode<br/>Produk</th>
                                <th>Nama<br/>Produk</th>
                                <th>Kuantitas</th>
                                <th>Berat<br/>per<br/>Satuan</th>
                                <th>Berat<br/>Total</th>
                                <th>Harga<br/>per<br/>Satuan</th>
                                <th>Harga<br/>Total</th>
                            </tr>
                            <?php
                            if(isset($_SESSION["keranjang_belanja"]))
                            {
                                @$nomer = $_GET["nomer"];
                                @$kuantitas = $_GET["kuantitas"];
                                if(count($_SESSION["keranjang_belanja"])>0)
                                {
                                    $no_urut = 1;
                                    $berat_total_keseluruhan = 0;
                                    $harga_total_keseluruhan = 0;
                                    foreach($_SESSION["keranjang_belanja"] as $no_produk=>$kuantitas_produk)
                                    {
                                        $sql = "
                                            SELECT
                                                *
                                            FROM
                                                produk
                                            WHERE
                                                no = '".$no_produk."'";
                                        $sumber_data_produk = mysql_query($sql);
                                        $produk = mysql_fetch_assoc($sumber_data_produk);
                                        
                                        if($produk!=FALSE)
                                        {
                                            $berat_total_keseluruhan = $berat_total_keseluruhan + ($produk["berat"]*$kuantitas_produk);
                                            $harga_total_keseluruhan = $harga_total_keseluruhan + ($produk["harga"]*$kuantitas_produk);
                                            ?>
                                            <tr>
                                                <td align="right"><?php echo($no_urut++);?></td>
                                                <td align="left"><?php echo($produk["kode"]);?></td>
                                                <td align="left"><?php echo($produk["nama"]); ?></td>
                                                <td align="right"><?php echo($kuantitas_produk);?></td>
                                                <td align="right"><?php echo(number_format($produk["berat"], 2, ",", "."));?>Kg</td>
                                                <td align="right"><?php echo(number_format(($produk["berat"]*$kuantitas_produk), 2, ",", "."));?>Kg</td>
                                                <td align="right">Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?></td>
                                                <td align="right">Rp.<?php echo(number_format(($produk["harga"]*$kuantitas_produk), 2, ",", "."));?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="4"></td>
                                <td align="left" style="font-weight: bold;">Berat<br/>Total<br/>Keseluruhan</td>
                                <td align="right"><?php echo(number_format(@$berat_total_keseluruhan, 2, ",", "."));?>Kg</td>
                                <td align="left" style="font-weight: bold;">Harga<br/>Total<br/>Keseluruhan</td>
                                <td align="right">Rp.<?php echo(number_format(@$harga_total_keseluruhan, 2, ",", "."));?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br/>
                <div>
                    <div style="font-size: 16px; font-weight: bold; font-variant: small-caps;">Ringkasan Pengiriman</div>
                    <div>
                        <?php
                        $sql = "
                            SELECT
                                TP.*,
                                P.kode AS pengirim,
                                K.nama AS kota
                            FROM
                                tarif_pengiriman TP
                                INNER JOIN pengirim P ON
                                    TP.oleh_pengirim = P.no
                                INNER JOIN kota K ON
                                    TP.ke_kota = K.no
                            WHERE
                                TP.no = '".$_POST["tarif_pengiriman"]."'";
                        
                        $sumber_data_tarif_pengiriman = mysql_query($sql);
                        $tarif_pengiriman = mysql_fetch_assoc($sumber_data_tarif_pengiriman);
                        ?>
                        <table width="100%">
                            <tr>
                                <th>Tarif<br/>Pengiriman</th>
                                <th>Tarif<br/>per<br/>Kg</th>
                                <th>Oleh<br/>Pengirim</th>
                                <th>Ke<br/>Kota</th>
                                <th>Berat<br/>Pengiriman</th>
                                <th>Biaya<br/>Pengiriman</th>
                            </tr>
                            <tr>
                                <td align="left"><?php echo($tarif_pengiriman["nama"]);?></td>
                                <td align="right">Rp.<?php echo(number_format($tarif_pengiriman["tarif"], 2, ",", "."));?></td>
                                <td align="left"><?php echo($tarif_pengiriman["pengirim"]);?></td>
                                <td align="left"><?php echo($tarif_pengiriman["kota"]);?></td>
                                <td align="right"><?php echo(number_format($berat_total_keseluruhan, 2, ",", "."));?>Kg</td>
                                <td align="right">Rp.<?php echo(number_format($tarif_pengiriman["tarif"]*ceil($berat_total_keseluruhan), 2, ",", "."));?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br/>
                <div>
                    <div style="font-size: 16px; font-weight: bold; font-variant: small-caps;">Ringkasan Metode Pembayaran</div>
                    <div>
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                metode_pembayaran
                            WHERE
                                no = '".$_POST["metode_pembayaran"]."'";
                        
                        $sumber_data_metode_pembayaran = mysql_query($sql);
                        $metode_pembayaran = mysql_fetch_assoc($sumber_data_metode_pembayaran);
                        ?>
                        <table width="100%">
                            <tr>
                                <th>Metode<br/>Pembayaran</th>
                                <th>Deskripsi</th>
                                <th>Total yang<br/>harus dibayar</th>
                            </tr>
                            <tr>
                                <td align="left"><?php echo($metode_pembayaran["kode"]);?></td>
                                <td align="left"><?php echo($metode_pembayaran["deskripsi"]);?></td>
                                <td align="right">Rp.<?php echo(number_format(($harga_total_keseluruhan+($tarif_pengiriman["tarif"]*ceil($berat_total_keseluruhan))), 2, ",", "."));?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br/>
                <div style="text-align: center;">
                    <div style="font-size: 16px; font-weight: bold; font-variant: small-caps;">Pesan</div>
                    <textarea name="pesan" cols="50" rows="5" style="resize: none;"></textarea><br/>
                    <input type="submit" name="selesaikan_belanja" value="Selesaikan Belanja"/>
                </div>
            </form>
        </div>
    </div>
<?php else:?>
<script>
    location.href = "<?php echo(buat_url("selesaikan_belanja_langkah_1a"));?>";
</script>
<?php endif;?>

