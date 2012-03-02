<?php
$panjangacak = 4;

$base= '123456789';

$max=strlen($base)-1;

$acakku='';

mt_srand((double)microtime()*1000000);

while (strlen($acakku)<$panjangacak)

$acakku.=$base{mt_rand(0,$max)};

//echo $acakku;
?>
<?php

//echo "<pre>";
//$kode_unik = $_GET["kode_unik"];
//$assocArr=$_SESSION["keranjang_belanja"];
//foreach($assocArr as $key=>$value)
//{
//    echo "$key: $value<br>";
//    $sql = "
//    INSERT 
//    INTO 
//    `perdagangan_elektronik`.`detil_pemesanan` 
//    (`produk`, `jumlah`, `berat`, `harga`, `kode`) 
//    VALUES 
//    ('$key', '$value', '1', '150000','$kode_unik' )";
//    $return = mysql_query($sql);
//
//    if ($return)
//    {
//        echo ("Pemesanan berhasil!");
//    } else
//    {
//        echo ("Pemesanan gagal!");
//        echo mysql_error();
//    }
//}

//echo $acakku;
//echo "<br/>";
//echo $_GET["total"];
//echo "<br/>";
$kode_unik = $_GET["kode_unik"];
$total_keseluruhan = $_GET["total"];
$grand_total = $acakku + $total_keseluruhan + 50000;
echo $grand_total;
//echo $kode_unik;
//require_once("keranjang_belanja");
//echo "<br/>";
//$coba = array_filter($_SESSION["keranjang_belanja"]);
//print_r ($coba);
//echo "<br/>";

if (isset($_POST["submit"]))
{
    require_once ("./konfigurasi.php");

    $sql = "
        INSERT INTO 
            `perdagangan_elektronik`.`pemesanan`
            (
                `no`,
                `kode`,
                `tanggal_disisipkan`,
                `oleh_pengguna`,
                `alamat_pengiriman`,
                `kota_pengiriman`,
                `telepon`,
                `berat_keseluruhan`,
                `tarif_pengiriman`,
                `biaya_pengiriman`,
				`harga_keseluruhan`,
                `metode_pembayaran`,
                `status_pemesanan`,
                `pesan`
            )
        VALUES
        (   
            '', 
            '" . $kode_unik . "',  
            NOW(),  
            '" . $_SESSION["pengguna"]["no"] . "',
			'" . $_POST["alamat"] . "',
            '" . $_POST["kota"] . "',
            '" . $_POST["telepon"] . "',  
            '1',
            '1',
            '50000',
            '" . $grand_total . "',
            '" . $_POST["metode"] . "',
            '1',
            '" . $_POST["pesan"] . "'
            
            
        )";

    $return = mysql_query($sql);

    if ($return)
    {
        echo ("Pemesanan berhasil!");
    } else
    {
        echo ("Pemesanan gagal!");
        echo mysql_error();
    }
    //memasukkan detil penjualan
    $kode_unik = $_GET["kode_unik"];
    $assocArr=$_SESSION["keranjang_belanja"];
    foreach($assocArr as $key=>$value)
    {
        echo "$key: $value<br>";
        $sql = "
        INSERT 
        INTO 
        `perdagangan_elektronik`.`detil_pemesanan` 
        (`produk`, `jumlah`, `berat`, `harga`, `kode`) 
        VALUES 
        ('$key', '$value', '1', '150000','$kode_unik' )";
        $return = mysql_query($sql);

        if ($return)
        {
            echo (" DETIL Pemesanan berhasil!");
        } else
        {
            echo ("Pemesanan gagal!");
            echo mysql_error();
        }
    }
}
header("location: " . buat_url("detail_pembelian",array("kode_unik"=>$kode_unik,"total"=>$grand_total,"metode"=>$_POST["metode"],"harga_unik"=>$acakku)));


?>