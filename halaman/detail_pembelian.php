<?php
$data = $_SESSION["pengguna"]["no"];
$sql = "SELECT * FROM pemesanan WHERE oleh_pengguna = '$data'";
$kueri = mysql_query($sql);
while ($row=mysql_fetch_assoc($kueri)):?>
<form action="index.php?halaman=detail_pembelian2" method="post">
        <table>
            <tr>
                <td>
                    <h3>No transaksi : <?php echo $no = $row["no"] ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    Tujuan rekening : <?php $bank = $row["metode_pembayaran"];
                                            if ($bank == 1)
                                            {
                                                echo "BCA";
                                            }
                                            else
                                            {
                                                echo "MANDIRI";
                                            }?>
                </td>
            </tr>
            <tr>
                <td>
                    ID Pemesan: <?php $user = $row["oleh_pengguna"];
                                        $sql55 = mysql_query("SELECT * FROM pengguna WHERE no='$user'");
                                        while ($row56 = mysql_fetch_assoc($sql55))
                                        {
                                            echo $row56["kode"];
                                        } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Penerima : <?php echo $row["nama_penerima"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat Penerima : <?php echo $row["alamat_pengiriman"] ?>
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
                    Telepon Penerima : <?php echo $row["telepon_penerima"] ?>
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
                    <input type="submit" value="Print Nota bentuk PDF" name="submit" />
                </td>
            </tr>
        </table>
        <hr />
</form>
<?php endwhile ?>