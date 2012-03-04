<?php

if (isset($_SESSION["administrator"]))
{
    //NOTIF CEK PEMESANAN
    $konek = mysql_connect("localhost", "root", "");
    mysql_selectdb("perdagangan_elektronik", $konek);
    $perintah = "SELECT * FROM konfirmasi_pembayaran";
    $laku = mysql_query($perintah);
    $hitung = mysql_num_rows($laku);
    echo "Konfirmasi Pemesanan yang sudah terjadi :";
    echo "<br/>";
    if ($hitung > 0)
    {
        while ($row = mysql_fetch_assoc($laku))
        {
            $tampil = $row["pemesanan"];
            $tampil_nama = $row["atas_nama"];
            echo "No Transaksi  :";
            echo $tampil;
            echo "<br/>";
            echo "Pemesan   :";
            echo $tampil_nama;
            echo "<br/>";
            echo "<br/>";
        }
    } 
}
else
{
    ?>
    <script>
        alert("Harap Login Dahulu");
        location.href "../admin_login.php";
    </script>
    <?php
}