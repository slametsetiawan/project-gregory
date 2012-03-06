<?php if(isset($_POST["lanjut_ke_langkah_2"])):?>
    <style>
    div#halaman_selesaikan_belanja_langkah_2 table tr th,
    div#halaman_selesaikan_belanja_langkah_2 table tr td
    {
        padding: 2px 3px;
    }
    div#halaman_selesaikan_belanja_langkah_2 table tr th
    {
        background-color: #CCC;
    }
    div#halaman_selesaikan_belanja_langkah_2 table tr:nth-child(odd)
    {
        background-color: #EEE;
    }
    div#halaman_selesaikan_belanja_langkah_2 table tr:nth-child(even)
    {
        background-color: #DDD;
    }
    </style>
    <div id="halaman_selesaikan_belanja_langkah_2">
        <h3>Selesaikan belanja - Langkah 2 | Metode Pembayaran</h3>
        <div>
            <form method="post" action="<?php echo(buat_url("selesaikan_belanja_langkah_3"));?>">
                <input type="hidden" name="nama_penerima" value="<?php echo($_POST["nama_penerima"]);?>"/>
                <input type="hidden" name="alamat_pengiriman" value="<?php echo($_POST["alamat_pengiriman"]);?>"/>
                <input type="hidden" name="kota" value="<?php echo($_POST["kota"]);?>"/>
                <input type="hidden" name="telepon_penerima" value="<?php echo($_POST["telepon_penerima"]);?>"/>
                <input type="hidden" name="pengirim" value="<?php echo($_POST["pengirim"]);?>"/>
                <input type="hidden" name="berat_total_keseluruhan" value="<?php echo($_POST["berat_total_keseluruhan"]);?>"/>
                <input type="hidden" name="tarif_pengiriman" value="<?php echo($_POST["tarif_pengiriman"]);?>"/>
                <input type="hidden" name="biaya_pengiriman" value="<?php echo($_POST["biaya_pengiriman"]);?>"/>
                <?php
                $sql = "
                    SELECT
                        *
                    FROM
                        metode_pembayaran";
                $sumber_data_metode_pembayaran = mysql_query($sql);
                ?>
                <table>
                    <tr>
                        <th></th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                    </tr>
                    <?php while($metode_pembayaran = mysql_fetch_assoc($sumber_data_metode_pembayaran)):?>
                        <tr>
                            <td align="center"><input type="radio" name="metode_pembayaran" value="<?php echo($metode_pembayaran["no"]);?>" checked="checked"/></td>
                            <td><?php echo($metode_pembayaran["kode"]);?></td>
                            <td><?php echo($metode_pembayaran["deskripsi"]);?></td>
                        </tr>
                    <?php endwhile;?>
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <input type="submit" name="lanjut_ke_langkah_3" value="Lanjut ke Langkah Berikutnya >>" />
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

