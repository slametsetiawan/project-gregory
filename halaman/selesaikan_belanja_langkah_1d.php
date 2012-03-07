<?php if(isset($_POST["lanjut_ke_langkah_1d"])):?>
    <div id="halaman_akhiri_belanja_langkah_1d">
        <h3>Selesaikan belanja - Langkah 1D | Pengiriman</h3>
        <div>
            <form method="post" action="<?php echo(buat_url("selesaikan_belanja_langkah_2"));?>">
                <table>
                    <tr>
                        <td align="right">Nama Penerima</td>
                        <td align="left"><input type="text" name="nama_penerima" value="<?php echo($_SESSION["pengguna"]["nama"]);?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Alamat Pengiriman</td>
                        <td align="left"><textarea name="alamat_pengiriman"><?php echo($_SESSION["pengguna"]["alamat"]);?></textarea></td>
                    </tr>
                    <tr>
                        <td align="right">Kota Pengiriman</td>
                        <td align="left">
                            <?php
                            $sql = "
                                SELECT
                                    K.*
                                FROM
                                    kota K
                                    INNER JOIN tarif_pengiriman TP ON
                                        TP.ke_kota = K.no AND
                                        TP.no = '".$_POST["tarif_pengiriman"]."'";
                            $sumber_data_kota = mysql_query($sql);
                            $kota = mysql_fetch_assoc($sumber_data_kota);
                            ?>
                            <input type="hidden" name="kota" value="<?php echo($kota["no"]);?>"/>
                            <input type="text" disabled="disabled" value="<?php echo($kota["nama"]);?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Telepon Penerima</td>
                        <td align="left"><input type="text" name="telepon_penerima" value="<?php echo($_SESSION["pengguna"]["telepon"]);?>"/></td>
                    </tr>
                    <tr>
                        <td align="right">Pengirim</td>
                        <td align="left">
                            <?php
                            $sql = "
                                SELECT
                                    P.*
                                FROM
                                    pengirim P
                                    INNER JOIN tarif_pengiriman TP ON
                                        TP.oleh_pengirim = P.no AND
                                        TP.no = '".$_POST["tarif_pengiriman"]."'";
                            $sumber_data_pengirim = mysql_query($sql);
                            $pengirim = mysql_fetch_assoc($sumber_data_pengirim);
                            ?>
                            <input type="hidden" name="pengirim" value="<?php echo($pengirim["no"]);?>"/>
                            <input type="text" disabled="disabled" value="<?php echo($pengirim["kode"]);?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Berat Total Keseluruhan</td>
                        <td align="left">
                            <?php
                            $berat_total_keseluruhan = 0;
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
                                }
                            }
                            ?>
                            <input type="text" name="berat_total_keseluruhan" value="<?php echo(number_format($berat_total_keseluruhan, 2, ",", "."));?>" disabled="disabled" size="4"/>Kg
                            ~>
                            <input type="text" value="<?php echo(number_format(ceil($berat_total_keseluruhan), 2, ",", "."));?>" disabled="disabled" size="4"/>Kg
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Biaya Pengiriman</td>
                        <td align="left">
                            <?php
                            $sql = "
                                SELECT
                                    *
                                FROM
                                    tarif_pengiriman
                                WHERE
                                    no = '".$_POST["tarif_pengiriman"]."'";
                            $sumber_data_tarif_pengiriman = mysql_query($sql);
                            $tarif_pengiriman = mysql_fetch_assoc($sumber_data_tarif_pengiriman);
                            ?>
                            <input type="hidden" name="tarif_pengiriman" value="<?php echo($_POST["tarif_pengiriman"]);?>" />
                            Rp.<input type="text" name="biaya_pengiriman" value="<?php echo(ceil($berat_total_keseluruhan)*$tarif_pengiriman["tarif"]);?>" disabled="disabled"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td align="left">
                            <input type="submit" name="lanjut_ke_langkah_2" value="Lanjut ke Langkah Berikutnya >>" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php else:?>
<script>
    location.href = "<?php echo(buat_url("selesaikan_belanja_langkah_1a"));?>";
</script>
<?php endif;?>

