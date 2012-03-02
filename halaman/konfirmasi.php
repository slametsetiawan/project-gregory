<?php

if (isset($_POST["submit"]))
{
    if (!empty($_POST["no_akun"]))
    {
        if (!preg_match('|^[0-9]{10,16}$|', $_POST["no_akun"]))
        {
?>
        <script language="javascript">
            alert("HARAP MENGISI LABEL NO AKUN DENGAN ANGKA SAJA")
        </script>
<?php
        } else
        {
            $sql = "INSERT 
        INTO 
        `perdagangan_elektronik`.`konfirmasi_pembayaran` 
        (
        `no`,
        `pemesanan`, 
        `metode_pembayaran`, 
        `atas_nama`, 
        `no_akun`, 
        `sejumlah`, 
        `tanggal_disisipkan`
        ) 
        VALUES 
        (
        '', 
        '" . $_POST["nomer_pesanan"] . "', 
        '2', 
        '" . $_SESSION["pengguna"] . "', 
        '" . $_POST["no_akun"] . "', 
        '" . $_POST["sejumlah"] . "', 
        NOW()
        )";
            $coba = mysql_query($sql);
            //mysql_error();
        ?>
        <script language="javascript">
            alert("Berhasil KONFIRMASI")
        </script>
        <?php
        }
    } else
    {
?>
        <script language="javascript">
            alert("HARAP MENGISI LABEL NO AKUN")
        </script>
<?php
    }
}

?>
<?php

    if (isset($_SESSION["pengguna"]))
    {
        $nilai = $_SESSION['pengguna'];
        //    mysql_connect("localhost", "root", "");
        //    mysql_select_db("perdagangan_elektronik");
        //$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
        $sql2 = mysql_query("SELECT no,kode FROM pengguna WHERE kode = '" . $nilai .
            "' LIMIT 1");
        $cocok = mysql_num_rows($sql2);
        if ($cocok == 1)
        {
            while ($row = mysql_fetch_array($sql2))
            {

                $huhu = $row['no'];
                $haha = $row['kode'];
                //var_dump($huhu);
                $sql = mysql_query("SELECT * FROM pemesanan WHERE oleh_pengguna = '" . $huhu .
                    "' LIMIT 100");
                $productCount = mysql_num_rows($sql);
                if ($productCount > 0)
                {
                    while ($row = mysql_fetch_array($sql))
                    {
                        $no = $row['no'];
                        $kode = $row['kode'];
                        $tanggal = $row['tanggal_disisipkan'];
                        $oleh = $row['oleh_pengguna'];
                        $alamatp = $row['alamat_pengiriman'];
                        $kota = $row['kota_pengiriman'];
                        $telepon = $row['telepon'];
                        $berat = $row['berat_keseluruhan'];
                        $tarif = $row['tarif_pengiriman'];
                        $biaya = $row['biaya_pengiriman'];
                        $hargatotal = $row['harga_keseluruhan'];
                        $method = $row['metode_pembayaran'];
                        $status = $row['status_pemesanan'];
                        $pesan = $row['pesan'];

?>
<table width="660px" border="1">
    <caption>Pesanan anda pengguna  :   <?php

                        echo $_SESSION["pengguna"];

?></caption>
    <caption>lakukan Konfirmasi pemesanan pada saat anda sudah melakukan transfer dana yang dibutuhkan untuk menyelesaikan transaksi</caption>
    <tr>
        <!--<td width="100px" bgcolor="white">
        </td>-->
        <td bgcolor="white">
            <b>
            <?

                        echo ("nomor pesanan    :   ") . $no;
                        echo "<br/>";
                        //echo ("kode unik pesanan    :   ") . $kode;
                        //echo "<br/>";
                        echo ("tanggal pesanan    :   ") . $tanggal;
                        echo "<br/>";
                        //echo ("pemohon pesanan    :   ") . $oleh;
                        //echo "<br/>";
                        echo ("alamat pesanan    :   ") . $alamatp;
                        echo "<br/>";
                        echo ("kota tujuan pesanan    :   ");
                        if ($kota == 1)
                        {
                            echo "surabaya";
                        } elseif ($kota == 2)
                        {
                            echo "jakarta";
                        } elseif ($kota == 3)
                        {
                            echo "bandung";
                        } elseif ($kota == 4)
                        {
                            echo "semarang";
                        } elseif ($kota == 5)
                        {
                            echo "jogjakarta";
                        } else
                        {
                            echo "";
                        }
                        echo "<br/>";
                        //echo ("telepon untuk pesanan    :   ") . $telepon;
                        //echo "<br/>";
                        //echo ("berat total pesanan    :   ") . $berat;
                        //echo "<br/>";
                        //echo ("tarif kirim pesanan    :   ") . $tarif;
                        //echo "<br/>";
                        //echo ("biaya total pesanan    :   ") . $biaya;
                        //echo "<br/>";
                        echo ("harga total pesanan    :   ") . $hargatotal;
                        echo "<br/>";
                        echo ("metode pembayaran pesanan    :   ");
                        if ($method == 1)
                        {
                            echo "Transfer Ke rekening BCA";
                        } elseif ($method == 2)
                        {
                            echo "Transfer Ke rekening Mandiri";
                        } else
                        {
                            echo "";
                        }
                        echo "<br/>";
                        echo ("status pesanan    :   ");
                        if ($status == 1)
                        {
                            echo "Menunggu Pembayaran";
                        } elseif ($status == 3)
                        {
                            echo "Diproses";
                        } elseif ($status == 5)
                        {
                            echo "Selesai";
                        } else
                        {
                            echo "";
                        }
                        echo "<br/>";
                        echo ("pesan penting untuk pesanan    :   ") . $pesan;
                        echo "<br/>";

?>
            </b>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
            <br />
            <form action="<?php echo buat_url("konfirmasi")?>" method="post">
                <input type="hidden" value="sudah_transfer" name="sudah"/>
                <input type="hidden" value="<?php echo $no ?>" name="nomer_pesanan"/>
                <input type="hidden" value="<?php echo $method ?>" name="metode_pembayaran"/>
                <input type="hidden" value="<?php echo $_SESSION["pengguna"] ?>" name="atas_nama"/>
                <input type="hidden" value="<?php echo $hargatota ?>" name="sejumlah"/>
                <input type="hidden" value="" name="tanggal"/>
                    <?php
                    if ($status == 1)
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
                    elseif ($status == 3)
                    {
                        echo "Diproses";

                    ?>
                    <?php

                    } 
                    elseif ($status == 5)
                    {
                        echo " transaksi ini sudah Selesai";
                    }

                    ?>
            </form>
            <br />
            <br />
            
        </td>
    </tr>
</table>
<?php

                    }

                } else
                {
                    echo "ga ada";
                }
            }
            /*else
            {
            echo "";
            exit();
            }*/
        }
    } else
    {
        widget_user_menu();
    }

?>