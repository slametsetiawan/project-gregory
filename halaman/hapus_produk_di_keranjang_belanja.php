<?php
//echo "<pre>";
//var_dump($_GET);
if (isset($_GET["no_produk"]))
{
    //var_dump($_SESSION["keranjang_belanja"]);
    unset($_SESSION["keranjang_belanja"][$_GET["no_produk"]]);
    header("location: " . buat_url("keranjang_belanja"));
}
?>