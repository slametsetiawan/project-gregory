<?php
if (isset($_POST["submit"]))
{
        $impostor = $_POST["submiter"];
        $sql = "SELECT * FROM pemesanan WHERE kode = '$impostor'";
        $jalan = mysql_query($sql);
        while ($row = mysql_fetch_assoc($jalan)):?>
        <form action="index.php?halaman=daftar_pemesanan" method="post">
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
                            <input type="hidden" value="sudah_transfer" name="sudah"/>
                            <input type="hidden" value="<?php echo $no ?>" name="nomer_pesanan"/>
                            <input type="hidden" value="<?php echo $bank ?>" name="metode_pembayaran"/>
                            <input type="hidden" value="<?php echo $_SESSION["pengguna"]["nama"] ?>" name="atas_nama"/>
                            <input type="hidden" value="<?php echo $hargatotal ?>" name="sejumlah"/>
                            <input type="hidden" value="" name="tanggal"/>
                                <?php
                                if ($dataku == 1)
                                {
                                    echo "Menunggu Pembayaran";
                                    ?>
                                    <br />
                                    <b>masukkan no Rekening yang Anda Gunakan Untuk Mentransfer :</b>
                                    <br />
                                    <input type="text" name="no_akun" maxlength="16" size="18"/>
                                    <input type="submit" name="submit" value="Konfirmasi pesanan" />
                                    <?php
                                } 
                                elseif ($dataku == 2)
                                {
                                    echo "Diproses";
            
                                ?>
                                <?php
            
                                } 
                                elseif ($dataku == 3)
                                {
                                    echo " transaksi ini sudah Selesai";
                                }
            
                                ?>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endwhile;
}
elseif (isset($_POST["semua"]))
{
    $user = $_SESSION["pengguna"]["no"];
    $sql = "SELECT * FROM pemesanan WHERE oleh_pengguna = '$user'";
    $jalan = mysql_query($sql);
    while ($row = mysql_fetch_assoc($jalan)):?>
        <form action="index.php?halaman=konfirmasi" method="post">
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
                            <input type="hidden" value="sudah_transfer" name="sudah"/>
                            <input type="hidden" value="<?php echo $no ?>" name="nomer_pesanan"/>
                            <input type="hidden" value="<?php echo $bank ?>" name="metode_pembayaran"/>
                            <input type="hidden" value="<?php echo $_SESSION["pengguna"]["nama"] ?>" name="atas_nama"/>
                            <input type="hidden" value="<?php echo $hargatotal ?>" name="sejumlah"/>
                            <input type="hidden" value="" name="tanggal"/>
                                <?php
                                if ($dataku == 1)
                                {
                                    echo "Menunggu Pembayaran";
                                    ?>
                                    <br />
                                    <b>masukkan no Rekening yang Anda Gunakan Untuk Mentransfer :</b>
                                    <br />
                                    <input type="text" name="no_akun" maxlength="16" size="18"/>
                                    <input type="submit" name="submit" value="<?php echo $kode4 ?>" />
                                    <?php
                                } 
                                elseif ($dataku == 2)
                                {
                                    echo "Diproses";
            
                                ?>
                                <?php
            
                                } 
                                elseif ($dataku == 3)
                                {
                                    echo " transaksi ini sudah Selesai";
                                }
            
                                ?>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endwhile;
    
}
elseif (isset($_POST["proses"]))
{
    $user = $_SESSION["pengguna"]["no"];
    $sql = "SELECT * FROM pemesanan WHERE status_pemesanan = '2' AND oleh_pengguna='$user'";
    $jalan = mysql_query($sql);
    while ($row = mysql_fetch_assoc($jalan)):?>
        <form action="index.php?halaman=daftar_pemesanan2" method="post">
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
                            <input type="hidden" value="sudah_transfer" name="sudah"/>
                            <input type="hidden" value="<?php echo $no ?>" name="nomer_pesanan"/>
                            <input type="hidden" value="<?php echo $bank ?>" name="metode_pembayaran"/>
                            <input type="hidden" value="<?php echo $_SESSION["pengguna"]["nama"] ?>" name="atas_nama"/>
                            <input type="hidden" value="<?php echo $hargatotal ?>" name="sejumlah"/>
                            <input type="hidden" value="" name="tanggal"/>
                                <?php
                                if ($dataku == 1)
                                {
                                    echo "Menunggu Pembayaran";
                                    ?>
                                    <br />
                                    <b>masukkan no Rekening yang Anda Gunakan Untuk Mentransfer :</b>
                                    <br />
                                    <input type="text" name="no_akun" maxlength="16" size="18"/>
                                    <input type="submit" name="submit" value="Konfirmasi pesanan" />
                                    <?php
                                } 
                                elseif ($dataku == 2)
                                {
                                    echo "Diproses";
            
                                ?>
                                <?php
            
                                } 
                                elseif ($dataku == 3)
                                {
                                    echo " transaksi ini sudah Selesai";
                                }
            
                                ?>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endwhile;
    
}
elseif (isset($_POST["menunggu"]))
{
    $user = $_SESSION["pengguna"]["no"];
    $sql = "SELECT * FROM pemesanan WHERE status_pemesanan = '1' AND oleh_pengguna='$user'";
    $jalan = mysql_query($sql);
    while ($row = mysql_fetch_assoc($jalan)):?>
        <form action="index.php?halaman=konfirmasi" method="post">
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
                            <input type="hidden" value="sudah_transfer" name="sudah"/>
                            <input type="hidden" value="<?php echo $no ?>" name="nomer_pesanan"/>
                            <input type="hidden" value="<?php echo $bank ?>" name="metode_pembayaran"/>
                            <input type="hidden" value="<?php echo $_SESSION["pengguna"]["nama"] ?>" name="atas_nama"/>
                            <input type="hidden" value="<?php echo $hargatotal ?>" name="sejumlah"/>
                            <input type="hidden" value="" name="tanggal"/>
                                <?php
                                if ($dataku == 1)
                                {
                                    echo "Menunggu Pembayaran";
                                    ?>
                                    <br />
                                    <b>masukkan no Rekening yang Anda Gunakan Untuk Mentransfer :</b>
                                    <br />
                                    <input type="text" name="no_akun" maxlength="16" size="18"/>
                                    <input type="submit" name="submit" value="Konfirmasi pesanan" />
                                    <?php
                                } 
                                elseif ($dataku == 2)
                                {
                                    echo "Diproses";
            
                                ?>
                                <?php
            
                                } 
                                elseif ($dataku == 3)
                                {
                                    echo " transaksi ini sudah Selesai";
                                }
            
                                ?>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endwhile;
    
}
elseif (isset($_POST["selesai"]))
{
    $user = $_SESSION["pengguna"]["no"];
    $sql = "SELECT * FROM pemesanan WHERE status_pemesanan = '3' AND oleh_pengguna='$user'";
    $jalan = mysql_query($sql);
    while ($row = mysql_fetch_assoc($jalan)):?>
        <form action="index.php?halaman=daftar_pemesanan2" method="post">
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
                            <input type="hidden" value="sudah_transfer" name="sudah"/>
                            <input type="hidden" value="<?php echo $no ?>" name="nomer_pesanan"/>
                            <input type="hidden" value="<?php echo $bank ?>" name="metode_pembayaran"/>
                            <input type="hidden" value="<?php echo $_SESSION["pengguna"]["nama"] ?>" name="atas_nama"/>
                            <input type="hidden" value="<?php echo $hargatotal ?>" name="sejumlah"/>
                            <input type="hidden" value="" name="tanggal"/>
                                <?php
                                if ($dataku == 1)
                                {
                                    echo "Menunggu Pembayaran";
                                    ?>
                                    <br />
                                    <b>masukkan no Rekening yang Anda Gunakan Untuk Mentransfer :</b>
                                    <br />
                                    <input type="text" name="no_akun" maxlength="16" size="18"/>
                                    <input type="submit" name="submit" value="Konfirmasi pesanan" />
                                    <?php
                                } 
                                elseif ($dataku == 2)
                                {
                                    echo "Diproses";
            
                                ?>
                                <?php
            
                                } 
                                elseif ($dataku == 3)
                                {
                                    echo " transaksi ini sudah Selesai";
                                }
            
                                ?>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endwhile;
    
}
?>