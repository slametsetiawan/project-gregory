<?php if(isset($_POST["lanjut_ke_langkah_2"])):?>
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
                <input type="hidden" name="berat_total_keseluruhan" value="<?php echo($_POST["berat_total_keseluruhan"]);?>"/>
                <input type="hidden" name="tarif_pengiriman" value="<?php echo($_POST["tarif_pengiriman"]);?>"/>
                <input type="hidden" name="biaya_pengiriman" value="<?php echo($_POST["biaya_pengiriman"]);?>"/>
            </form>
        </div>
    </div>
<?php else:?>
<script>
    location.href = "<?php echo(buat_url("selesaikan_belanja_langkah_1a"));?>";
</script>
<?php endif;?>

