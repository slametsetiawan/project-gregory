<?php
//echo "<pre>";
//var_dump($_POST);
if (isset($_POST["submit"]))
{
    /** 
     * $session keranjang itu dimulai dgn adanya array post no_produk 
     * dan nilai dari array tersebut adalah hasil penangkapan post kuantitas
     * PENTIIIING!!!!!
     */
    if ($_SESSION["keranjang_belanja"][$_POST["no_produk"]] >= 1 )
    {
        $_SESSION["keranjang_belanja"][$_POST["no_produk"]] -= 1;    
    } else
    {
        $_SESSION["keranjang_belanja"][$_POST["no_produk"]];
    }
    
//    echo "<pre>";
//    var_dump($_SESSION);   
}
header("location: " . buat_url("keranjang_belanja"));

?>