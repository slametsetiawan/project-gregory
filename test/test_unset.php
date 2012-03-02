<?php
session_start();
//echo $bar;
$bar = array(4=>3,44=>14,444=>99);
echo "<pre>";
var_dump($bar);

unset($bar[44]);

var_dump($bar);
?> 