<style>
div.halaman_keranjang_belanja table tr th,
div.halaman_keranjang_belanja table tr td
{
    padding: 1px 2px;
}
div.halaman_keranjang_belanja table tr th
{
    background-color: #CCC;
}
div.halaman_keranjang_belanja table tr:nth-child(odd)
{
    background-color: #EEE;
}
div.halaman_keranjang_belanja table tr:nth-child(even)
{
    background-color: #DDD;
}
</style>
<div class="halaman_keranjang_belanja">
    <h3>Keranjang Belanja</h3>
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
                            <td align="center">
                                <form method="post" action="<?php echo(buat_url("ubah_kuantitas_produk_di_keranjang_belanja")) ?>">
                                    <input type="hidden" name="no_produk" value="<?php echo($produk["no"]);?>"/>
                                    <input type="text" name="kuantitas" value="<?php echo($kuantitas_produk);?>" size="4" />
                                    <input type="submit" name="ubah_kuantitas_produk_di_keranjang_belanja" value="Ubah" />
                                </form>
                            </td>
                            <td align="right"><?php echo(number_format($produk["berat"], 2, ",", "."));?>Kg</td>
                            <td align="right"><?php echo(number_format(($produk["berat"]*$kuantitas_produk), 2, ",", "."));?>Kg</td>
                            <td align="right">Rp.<?php echo(number_format($produk["harga"], 2, ",", "."));?></td>
                            <td align="right">Rp.<?php echo(number_format(($produk["harga"]*$kuantitas_produk), 2, ",", "."));?></td>
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
            <td align="left" style="font-weight: bold;">Berat<br/>Total<br/>Keseluruhan</td>
            <td align="right"><?php echo(number_format(@$berat_total_keseluruhan, 2, ",", "."));?>Kg</td>
            <td align="left" style="font-weight: bold;">Harga<br/>Total<br/>Keseluruhan</td>
            <td align="right">Rp.<?php echo(number_format(@$harga_total_keseluruhan, 2, ",", "."));?></td>
            <td></td>
        </tr>
    </table>
    <div>
        <strong>
            <center>
                <a href="<?php echo(buat_url("katalog"));?>">&lt;&lt; Kembali ke Katalog</a></a>
                <?php if(isset($_SESSION["keranjang_belanja"]) && count($_SESSION["keranjang_belanja"])>0):?>
                    | <a href="<?php echo(buat_url("login", array("redirect"=>"selesaikan_belanja_langkah_1a")));?>">Selesaikan Belanja &gt;&gt;</a>
                <?php endif;?>
            </center>
        </strong>
    </div>
</div>