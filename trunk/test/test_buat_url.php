<?php
echo "<pre>";
require_once("../referensi/fungsi.php");

echo(buat_url("", array(
    "aksi"=>"perbarui",
    "pid"=>"2"
)));
echo "<br/>";
//echo buat_url("produk")."?id='. 2 .'";
echo "<br/>";
//echo(buat_url("produk")."&aksi=perbarui&pid=2");
?>
<br />
<!--<a href="http://localhost/perdagangan_elektronik/index.php?halaman=produk.php?id=' . $id . '">
-->

<a href="http://localhost/perdagangan_elektronik/index.php?halaman=produk.php?id=' . $id . '">
dari produk
</a>