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
        while ($row = mysql_fetch_assoc($laku)):?>
        <table>
            <tr>
                <td>
                    No Transaksi    :
                </td>
                <td>
                    <?php echo $row["pemesanan"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Pemesan    :
                </td>
                <td>
                    <?php echo $row["atas_nama"] ?>
                </td>
            </tr>
        </table>
        <hr />
        <?php endwhile; 
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
?>

<table width="100%">
    <tr align="left">
        <td>
            Konten
        </td>
    </tr>
    <tr>
        <td align="right">
            Untuk Bantuan teknis Harap Hubungi <a href="http://www.greyzher.com">Greyzher</a>
        </td>
    </tr>
</table>