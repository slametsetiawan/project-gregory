<?php if(isset($_POST["lanjut_ke_langkah_1b"])):?>
    <div id="halaman_selesaikan_belanja_langkah_1b">
        <h3>Selesaikan belanja - Langkah 1B | Pengiriman</h3>
        <div>
            <form method="post" action="<?php echo(buat_url("selesaikan_belanja_langkah_1c"));?>">
                <input type="hidden" name="kota" value="<?php echo($_POST["kota"]);?>" />
                <table>
                    <tr>
                        <td align="right">Pilih Pengirim</td>
                        <td align="left">
                            <?php
                            $sql = "
                                SELECT DISTINCT
                                    P.*
                                FROM
                                    pengirim P
                                    INNER JOIN tarif_pengiriman TP ON
                                        TP.oleh_pengirim = P.no AND
                                        TP.ke_kota = '".$_POST["kota"]."'";
                            $sumber_data_pengirim = mysql_query($sql);
                            ?>
                            <?php if(mysql_num_rows($sumber_data_pengirim)>0):?>
                                <select name="pengirim">
                                    <?php while($pengirim = mysql_fetch_assoc($sumber_data_pengirim)):?>
                                        <option value="<?php echo($pengirim["no"]);?>" title="<?php echo($pengirim["deskripsi"]);?>"><?php echo($pengirim["kode"]);?></option>
                                    <?php endwhile;?>
                                </select>
                            <?php else:?>
                                <script>
                                    alert("Saat ini tidak ada Pengirim yang mengantar ke kota yang anda pilih, silahkan memilih ulang kota pengiriman.");
                                    location.href = "<?php echo(buat_url("selesaikan_belanja_langkah_1a"));?>";
                                </script>
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td align="left">
                            <input type="submit" name="lanjut_ke_langkah_1c" value="Lanjut ke Langkah Berikutnya >>" />
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

