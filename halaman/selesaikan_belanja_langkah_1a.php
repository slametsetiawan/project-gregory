<div id="halaman_selesaikan_belanja_langkah_1a">
    <h3>Selesaikan belanja - Langkah 1A | Pengiriman</h3>
    <div>
        <form method="post" action="<?php echo(buat_url("selesaikan_belanja_langkah_1b"));?>">
            <table>
                <tr>
                    <td align="right">Pilih Kota</td>
                    <td align="left">
                        <select name="kota">
                            <?php
                            $sql = "
                                SELECT
                                    *
                                FROM
                                    propinsi";
                            $sumber_data_propinsi = mysql_query($sql);
                            ?>
                            <?php while($propinsi = mysql_fetch_assoc($sumber_data_propinsi)):?>
                                <optgroup label="<?php echo($propinsi["nama"]);?>">
                                    <?php
                                    $sql = "
                                        SELECT
                                            *
                                        FROM
                                            kota
                                        WHERE
                                            dipropinsi = '".$propinsi["no"]."'";
                                    $sumber_data_kota = mysql_query($sql);
                                    ?>
                                    <?php while($kota = mysql_fetch_assoc($sumber_data_kota)):?>
                                        <option value="<?php echo($kota["no"]);?>" title="<?php echo($kota["deskripsi"]);?>">
                                            <?php echo($kota["nama"]);?>
                                        </option>
                                    <?php endwhile;?>
                                </optgroup>
                            <?php endwhile;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="left">
                        <input type="submit" name="lanjut_ke_langkah_1b" value="Lanjut ke Langkah Berikutnya >>" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

