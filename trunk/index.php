<?php
session_start();

require_once("./konfigurasi.php");
require_once("./referensi/fungsi.php");

$GLOBALS["koneksi"] = mysql_connect($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"]);
mysql_select_db($GLOBALS["dbname"], $GLOBALS["koneksi"]);

$sql = "
    SELECT
        *
    FROM
        tema
    WHERE
        sebagai_default = 'YA'
    LIMIT 0, 1";
$hasil_sql = mysql_query($sql);
$tema = mysql_fetch_assoc($hasil_sql);

$array_widget_filename = scandir("./widget");
foreach($array_widget_filename as $widget_filename)
{
    if(is_file("./widget/".$widget_filename))
    {
        require_once("./widget/".$widget_filename);
    }
}

$tema_filename = "./tema/".$tema["kode"]."/".$tema["kode"].".php";
if(file_exists($tema_filename))
{
    require_once($tema_filename);
}

mysql_close();
?>
