<?php if(isset($_POST["lanjut_ke_langkah_1c"])):?>
    <style>
    div#halaman_selesaikan_belanja_langkah_1c table tr th,
    div#halaman_selesaikan_belanja_langkah_1c table tr td
    {
        padding: 2px 3px;
    }
    div#halaman_selesaikan_belanja_langkah_1c table tr th
    {
        background-color: #CCC;
    }
    div#halaman_selesaikan_belanja_langkah_1c table tr:nth-child(odd)
    {
        background-color: #EEE;
    }
    div#halaman_selesaikan_belanja_langkah_1c table tr:nth-child(even)
    {
        background-color: #DDD;
    }
    </style>
    <div id="halaman_selesaikan_belanja_langkah_1c">
        <h3>Selesaikan belanja - Langkah 1C | Pengiriman</h3>
        <div>
            <form method="post" action="<?php echo(buat_url("selesaikan_belanja_langkah_1d"));?>">
                <?php
                $sql = "
                    SELECT
                        TP.*,
                        P.kode AS pengirim,
                        K.nama AS kota
                    FROM
                        tarif_pengiriman TP
                        INNER JOIN pengirim P ON
                            TP.oleh_pengirim = P.no AND
                            TP.oleh_pengirim = '".$_POST["pengirim"]."'
                        INNER JOIN kota K ON
                            TP.ke_kota = K.no AND
                            TP.ke_kota = '".$_POST["kota"]."'";
                $sumber_data_tarif_pengiriman = mysql_query($sql);
                ?>
                <?php if(mysql_num_rows($sumber_data_tarif_pengiriman)>0):?>
                    <table width="100%">
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tarif<br/>per<br/>Kg</th>
                            <th>Oleh<br/>Pengirim</th>
                            <th>Ke<br/>Kota</th>
                        </tr>
                        <?php while($tarif_pengiriman = mysql_fetch_assoc($sumber_data_tarif_pengiriman)):?>
                            
                                <tr>
                                    <td align="center"><input id="tp_<?php echo($tarif_pengiriman["no"]);?>" type="radio" name="tarif_pengiriman" value="<?php echo($tarif_pengiriman["no"]);?>" checked="checked"/></td>
                                    <td><?php echo($tarif_pengiriman["nama"]);?></td>
                                    <td><?php echo($tarif_pengiriman["deskripsi"]);?></td>
                                    <td><?php echo($tarif_pengiriman["tarif"]);?></td>
                                    <td><?php echo($tarif_pengiriman["pengirim"]);?></td>
                                    <td><?php echo($tarif_pengiriman["kota"]);?></td>
                                </tr>
                        <?php endwhile;?>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="3">
                                <input type="submit" name="lanjut_ke_langkah_1d" value="Lanjut ke Langkah Berikutnya >>" />
                            </td>
                        </tr>
                    </table>
                <?php else:?>
                    <script>
                        location.href = "<?php echo(buat_url("selesaikan_belanja_langkah_1a"));?>";
                    </script>
                <?php endif;?>
            </form>
        </div>
    </div>
<?php else:?>
<script>
    location.href = "<?php echo(buat_url("selesaikan_belanja_langkah_1a"));?>";
</script>
<?php endif;?>

