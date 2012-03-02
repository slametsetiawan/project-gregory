<?php

// << ...custom stream wrapper goes somewhere here...>>

echo '<pre>';
error_reporting(E_ALL);
ini_set('display_errors', true);
clearstatcache();
stream_register_wrapper('test', 'MemoryStream');

mkdir('test://aaa');
mkdir('test://aaa/cc');
mkdir('test://aaa/dd'); 
echo 'PHP '.PHP_VERSION;
echo '<br />node exists: '.file_exists('test://aaa/cc');
echo '<br />node is writable: '.is_writable('test://aaa/cc');
echo '<br />node is dir: '.is_dir('test://aaa/cc');
echo '<br />tempnam in dir: '.tempnam('test://aaa/cc', 'tmp');
echo "<br /></pre>";

?>