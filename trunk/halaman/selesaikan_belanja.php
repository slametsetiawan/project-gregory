<?php
if(isset($_POST["selesaikan_belanja"]))
{
    $sql = "
        SELECT
            *
        FROM
            tarif_pengiriman
        WHERE
            no = '".$_POST["tarif_pengiriman"]."'";
    $sumber_data_tarif_pengiriman = mysql_query($sql);
    $tarif_pengiriman = mysql_fetch_assoc($sumber_data_tarif_pengiriman);
    
    $sql = "
        INSERT INTO
            pemesanan
            (
                no,
                kode,
                tanggal_disisipkan,
                oleh_pengguna,
                nama_penerima,
                alamat_pengiriman,
                kota_pengiriman,
                telepon_penerima,
                berat_keseluruhan,
                tarif_pengiriman,
                biaya_pengiriman,
                harga_keseluruhan,
                metode_pembayaran,
                status_pemesanan,
                pesan
            )
        VALUES
        (
            '',
            '".md5(rand())."',
            NOW(),
            '".$_SESSION["pengguna"]["no"]."',
            '".$_POST["nama_penerima"]."',
            '".$_POST["alamat_pengiriman"]."',
            '".$tarif_pengiriman["ke_kota"]."',
            '".$_POST["telepon_penerima"]."',
            '0',
            '".$_POST["tarif_pengiriman"]."',
            '0',
            '0',
            '".$_POST["metode_pembayaran"]."',
            (
                SELECT
                    no
                FROM
                    status_pemesanan
                WHERE
                    kode = 'MENUNGGU_PEMBAYARAN'
            ),
            '".$_POST["pesan"]."'
        )";
        
        if(mysql_query($sql))
        {
            $sql = "
                SELECT
                    LAST_INSERT_ID() AS no_pemesanan";
            $sumber_data_no_pemesanan = mysql_query($sql);
            $no_pemesanan = mysql_fetch_assoc($sumber_data_no_pemesanan);
            $no_pemesanan = $no_pemesanan["no_pemesanan"];
            
            
            $berat_total_keseluruhan = 0;
            $harga_total_keseluruhan = 0;
            
            foreach($_SESSION["keranjang_belanja"] as $no_produk => $kuantitas)
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
                
                $sql = "
                    INSERT INTO
                        detil_pemesanan
                        (
                            no,
                            produk,
                            jumlah,
                            berat,
                            harga,
                            pada_pemesanan
                        )
                    VALUES
                    (
                        '',
                        '".$produk["no"]."',
                        '".$kuantitas."',
                        '".$produk["berat"]."',
                        '".$produk["harga"]."',
                        '".$no_pemesanan."'
                    )";
                mysql_query($sql);
                
                $berat_total_keseluruhan += $kuantitas*$produk["berat"];
                $harga_total_keseluruhan += $kuantitas*$produk["harga"];
            }
            
            $sql = "
                UPDATE
                    pemesanan
                SET
                    kode = '".md5(md5($no_pemesanan))."',
                    berat_keseluruhan = '".$berat_total_keseluruhan."',
                    biaya_pengiriman = '".($tarif_pengiriman["tarif"]*ceil($berat_total_keseluruhan))."',
                    harga_keseluruhan = '".$harga_total_keseluruhan."'
                WHERE
                    no = '".$no_pemesanan."'";
            mysql_query($sql);
            
            $sql = "
                SELECT
                    *
                FROM
                    pemesanan
                WHERE
                    no = '".$no_pemesanan."'";
            $sumber_data_pemesanan = mysql_query($sql);
            $pemesanan = mysql_fetch_assoc($sumber_data_pemesanan);
            
            $_SESSION["keranjang_belanja"] = array();
            
            ?>
            <div id="halaman_selesaikan_belanja">
                <h3>Selesaikan Belanja</h3>
                <div>
                    Terima kasih Pemesanan anda telah kami terima.<br/>
                    Kode pemesanan anda:<br/>
                    <span style="font-size: 20px; font-weight: bold; color: #F00; ">
                        <?php echo($pemesanan["kode"]);?>
                    </span>
                </div>
            </div>
            <?
        }
}
else
{
    ?>
    <script>
        location.href = "<?php echo(buat_url("selesaikan_belanja_langkah_1a"));?>";
    </script>
    <?php
}?>

