<?php
$data = $_SESSION["pengguna"]["no"];
$sql = "SELECT * FROM pemesanan WHERE oleh_pengguna = '$data'";
$kueri = mysql_query($sql);
while ($row=mysql_fetch_assoc($kueri)):?>
<form action="http://localhost/Gregory-ta/halaman/buat_pdf.php" method="post">
        <table>
            <tr>
                <td>
                    <h3>No transaksi : <?php echo $no = $row["no"] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    Tujuan rekening : <?php $bank = $row["metode_pembayaran"];
                                        $sql555 = mysql_query("SELECT * FROM metode_pembayaran WHERE no='$bank'");
                                        while ($row22 = mysql_fetch_assoc($sql555))
                                        {
                                            echo $nama_bank = $row22["kode"];
                                            $rekening = $row22["deskripsi"];
                                        } ?>
                </td>
            </tr>
            <tr>
                <td>
                    ID Pemesan: <?php $user = $row["oleh_pengguna"];
                                        $sql55 = mysql_query("SELECT * FROM pengguna WHERE no='$user'");
                                        while ($row56 = mysql_fetch_assoc($sql55))
                                        {
                                            echo $nama = $row56["kode"];
                                        } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Penerima : <?php echo $namap = $row["nama_penerima"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat Penerima : <?php echo $alamatp = $row["alamat_pengiriman"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Kota Pengiriman : <?php $a = $row["kota_pengiriman"];
                                            $kota = mysql_query("SELECT * FROM kota WHERE no='$a' ");
                                            while ($kow = mysql_fetch_assoc($kota))
                                            {
                                                echo $kow["nama"];
                                            }  ?>
                </td>
            </tr>
            <tr>
                <td>
                    Telepon Penerima : <?php echo $telp = $row["telepon_penerima"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Kode Transaksi : <?php $kode4 = $row["kode"]; echo $kode4; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Total Transfer : <?php echo $hargatotal = $row["harga_keseluruhan"] + $row["biaya_pengiriman"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Status Pemesanan :<b> <?php $dataku = $row["status_pemesanan"];
                                                    if ($dataku == 1)
                                                    {
                                                        echo "menunggu pembayaran";
                                                    }
                                                    elseif ($dataku == 2)
                                                    {
                                                        echo "sedang diproses";
                                                    }
                                                    elseif ($dataku == 3)
                                                    {
                                                        echo "SELESAI";
                                                    } ?></b>
                </td>
            </tr>
            <tr>
                <td>
                    <form name="21" method="post" action="index.php?halaman=buat_pdf">
                        <input type="hidden" value="<?php echo $no ?>" name="nomer" />
                        <input type="hidden" value="<?php echo $nama_bank ?>" name="bank" />
                        <input type="hidden" value="<?php echo $rekening ?>" name="rekening" />
                        <input type="hidden" value="<?php echo $nama ?>" name="pengguna" />
                        <input type="hidden" value="<?php echo $namap ?>" name="nama_penerima" />
                        <input type="hidden" value="<?php echo $alamatp ?>" name="alamat_penerima" />
                        <input type="hidden" value="<?php echo $kow ?>" name="kota_pengiriman" />
                        <input type="hidden" value="<?php echo $telp ?>" name="telepon" />
                        <input type="hidden" value="<?php echo $kode4 ?>" name="kode_transaksi" />
                        <input type="hidden" value="<?php echo $hargatotal ?>" name="harga_total" />
                        <input type="hidden" value="<?php echo $dataku ?>" name="status_pemesanan" />
                        <input type="submit" value="Print Nota bentuk PDF" name="submit" />
                    </form>
                </td>
            </tr>
        </table>
        <hr />
</form>
<?php endwhile ?>