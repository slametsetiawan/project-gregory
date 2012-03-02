<?php

function url_dasar()
{
    return dirname($_SERVER["SCRIPT_NAME"]);
}

function buat_url($halaman="index", $get=array())
{
    $get_tambahan = "";
    
    if(count($get)>0)
    {
        foreach($get as $offset_get => $nilai_get)
        {
            $get_tambahan .= "&".$offset_get."=".$nilai_get;
        }
    }
    
    return url_dasar()."/index.php?halaman=".$halaman.$get_tambahan;    
}
/**
 * jika $get-halaman bernilai "index" 
 * maka fungsi ini harus memuat/load halaman index.php pada folder/direktori halaman
 * jika $get-halaman bernilai "cara_belanja" 
 * maka fungsi ini harus memuat/load halaman cara_belanja.php pada folder direktori halaman
 * dst
 */ 
function konten()
{
    if (isset($_GET["halaman"]))
    {
         $konten_filename = "./halaman/".$_GET["halaman"].".php";
         /**
          * diatas adalah pengecekan halaman melalui penelusuran direktori dan 
          * mengambil nama file yg sama dengan cara _GET
          */
        if(file_exists($konten_filename))
        {
            //jika ada maka dipanggil
            require_once($konten_filename);
        }
    }
    else
    {
        $konten_filename = "./halaman/index.php";
        if(file_exists($konten_filename))
        {
            //jika ada maka dipanggil
            require_once($konten_filename);
        }
    }
}
