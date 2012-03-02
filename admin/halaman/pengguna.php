<?php 

/**
 * penjelasan awal fitur2 yang ada di dalam halaman ini:
 * -terdapat fungsi search pada semua field.
 * -terdapat fungsi sorting pada semua field.
 * -selama admin belum logout semua search dan sorting yang dilakukan masih tersimpan,
 *  untuk mereset sehingga kembali ke default tekan tombol reset.
 * nb : -greg yang php di dalam html dan bagian-bagian yang sama g tak kasih dokumentasi.
 *      -kurang paging aja manage ini jadi lengkap, kalo mau ditambah silakan, tapi tambah sendiri ya.
 *      -kalo bingung tentang fungsi php yang ada disini tinggal buka aja phpmanual, liat contohnya dan dipelajari.
 */

/**
 * cek apakah terdapat aksi dari administrator atau tidak.
 */

if(isset($_GET["aksi"]))
{
    
    //$koneksi=mysql_connect($GLOBALS["dbhost"],$GLOBALS["dbuser"],$GLOBALS["dbpass"]);
    //mysql_select_db($GLOBALS["dbname"],$koneksi);
    $koneksi=mysql_connect("localhost","root","");
    mysql_selectdb("perdagangan-elektronik",$koneksi);
    if($_GET["aksi"] == "tambah" && isset($_POST["tambah"]))
    {
        
        /**
         * aksi tambah pengguna dimulai dari sini.
         */
        
        $kesalahan = false;
        
        /**
         * melakukan pengecekan, memastikan tidak ada form yang tidak diisi. bila ditemukan form yang tidak diisi,
         * mengaktifkan pesan peringatan dan proses penambahan pengguna batal.
         */
        
        foreach($_POST as $kunci => $nilai)
        {
            
            /**
             * menyimpan semua isi form di dalam session.
             */
            $_SESSION["pengguna"][$kunci] = $nilai;
            
            if(($$kunci = trim($nilai)) == "")
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = $kunci . " harus diisi.";
                
            }
            
        }
        
        if(!isset($_POST["status"]))
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "status harus diisi.";
            
        }
        
        /**
         * pengecekan field2 laen dalam form sesuai kriteria masing2, apabila tidak cocok dengan kriteria,
         * mengaktifkan pesan peringatan dan proses penambahan pengguna batal.
         */
        
        if(strlen($username) < 6)
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "username minimal 6 karakter.";
            
        }
        
        $cek=mysql_query("SELECT kode FROM pengguna WHERE kode='" . $username . "'");
        
        if(mysql_num_rows($cek) > 0)
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "username telah terpakai.";
            
        }
        
        mysql_free_result($cek);
        
        if(strlen($password) < 6)
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "password minimal 6 karakter.";
            
        }
        
        if(!is_numeric($telepon))
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "telepon harus berupa angka saja.";
            
        }
        
        if(strlen($telepon) < 7)
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "telepon minimal 7 digit.";
            
        }
        
        if(!preg_match("/^[^@]*@[^@]*\.[^@]*$/", $email))
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "email tidak valid.";
            
        }
        
        if(!$kesalahan)
        {
            
            /**
             * apabila tidak ada kesalahan pengisian maka akan dimasukkan ke dalam database.
             */
            
            $sql = "INSERT INTO pengguna
                    (kode,nama,kata_kunci,alamat,email,kota,telepon,tanggal_disisipkan,jenis_pengguna,status_akses)
                    VALUES
                    ('$username','$nama','" . md5($password) . "','$alamat','$email','$kota','$telepon',now(),'$jenis','$status')";
                    
            if(mysql_query($sql))
            {
                
                /**
                 * jika sukses masuk ke dalam database, maka session pengguna dilepaskan.
                 */
                unset($_SESSION["pengguna"]);
                $_SESSION["berhasil"] = "ditambahkan.";
                
            }
            else
            {
                
                /**
                 * jika gagal masuk ke dalam database, maka 
                 * mengaktifkan pesan peringatan dan proses penambahan pengguna batal.
                 */
                $kesalahan = true;
                $pesan_kesalahan[] = "terjadi kesalahan pada database.";
                
            }
            
        }
        
        if($kesalahan)
        {
            
            /**
             * memasukkan segala pesan kesalahan yang terjadi ke dalam session.
             */
            $_SESSION["kesalahan"] = $pesan_kesalahan;   
            
        }
        
    }
    elseif($_GET["aksi"] == "ubah")
    {
        
        /**
         * aksi ubah pengguna dimulai dari sini.
         */
         
         if(isset($_POST["ubah"]))
         {
            
            /**
             * ketika form sudah dikirim.
             */
            
            $kesalahan = false;
            
            /**
             * memastikan tetap pada halaman ubah.
             */
            $_SESSION["pengguna_ubah"] = true;
            
            /**
             * melakukan pengecekan, memastikan tidak ada form yang tidak diisi. bila ditemukan form yang tidak diisi,
             * mengaktifkan pesan peringatan dan proses penambahan pengguna batal.
             */
            
            foreach($_POST as $kunci => $nilai)
            {
                
                /**
                 * menyimpan semua isi form di dalam session.
                 */
                $_SESSION["pengguna"][$kunci] = $nilai;
                
                if(($$kunci = trim($nilai)) == "" && $kunci != "password")
                {
                    
                    $kesalahan = true;
                    $pesan_kesalahan[] = $kunci . " harus diisi.";
                    
                }
                
            }
            
            if(!isset($_POST["status"]))
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = "status harus diisi.";
                
            }
            
            /**
             * pengecekan field2 laen dalam form sesuai kriteria masing2, apabila tidak cocok dengan kriteria,
             * mengaktifkan pesan peringatan dan proses penambahan pengguna batal.
             */
            
            if(strlen($username) < 6)
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = "username minimal 6 karakter.";
                
            }
            
            $cek=mysql_query("SELECT kode FROM pengguna WHERE kode='" . $username . "' AND no!='" . $id . "'");
            
            if(mysql_num_rows($cek) > 0)
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = "username telah terpakai.";
                
            }
            
            mysql_free_result($cek);
            
            /**
             * apabila password terisi maka dilakukan pengecekan kriteria.
             */
            
            if($password != "" && strlen($password) < 6)
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = "password minimal 6 karakter.";
                
            }
            
            if(!is_numeric($telepon))
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = "telepon harus berupa angka saja.";
                
            }
            
            if(strlen($telepon) < 7)
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = "telepon minimal 7 digit.";
                
            }
            
            if(!preg_match("/^[^@]*@[^@]*\.[^@]*$/", $email))
            {
                
                $kesalahan = true;
                $pesan_kesalahan[] = "email tidak valid.";
                
            }
            
            if(!$kesalahan)
            {
                
                /**
                 * apabila tidak ada kesalahan pengisian maka akan dimasukkan ke dalam database.
                 */
                 
                $sql_add = "";
                
                if($password != "")
                {
                    
                    $sql_add = ",kata_kunci = '" . md5($password) . "'";
                    
                }
                
                $sql = "UPDATE pengguna
                        SET kode = '$username',
                            nama = '$nama',
                            alamat = '$alamat',
                            kota = '$kota',
                            telepon = '$telepon',
                            email = '$email',
                            jenis_pengguna = '$jenis',
                            status_akses = '$status'" . $sql_add . " 
                        WHERE no = '$id'";
                        
                if(mysql_query($sql))
                {
                    
                    /**
                     * jika sukses masuk ke dalam database, maka session pengguna dilepaskan.
                     */
                    unset($_SESSION["pengguna"],$_SESSION["pengguna_ubah"]);
                    $_SESSION["berhasil"] = "diubahkan.";
                    
                }
                else
                {
                    
                    /**
                     * jika gagal masuk ke dalam database, maka 
                     * mengaktifkan pesan peringatan dan proses penambahan pengguna batal.
                     */
                    $kesalahan = true;
                    $pesan_kesalahan[] = "terjadi kesalahan pada database.";
                    
                }
                
            }
            
            if($kesalahan)
            {
                
                /**
                 * memasukkan segala pesan kesalahan yang terjadi ke dalam session.
                 */
                $_SESSION["kesalahan"] = $pesan_kesalahan;   
                
            }
            
         }
         else
         {
            
            /**
             * memasukkan data dari database ke dalam variabel session untuk kemudian dimuat di dalam form.
             */
            
            $temp = mysql_query("SELECT * FROM pengguna WHERE kode='" . $_GET["id"] . "'");
            $pengguna = mysql_fetch_array($temp);
            $_SESSION["pengguna"]["id"] = $pengguna["no"];
            $_SESSION["pengguna"]["username"] = $pengguna["kode"];
            $_SESSION["pengguna"]["password"] = "";
            $_SESSION["pengguna"]["nama"] = $pengguna["nama"];
            $_SESSION["pengguna"]["alamat"] = $pengguna["alamat"];
            $_SESSION["pengguna"]["kota"] = $pengguna["kota"];
            $_SESSION["pengguna"]["telepon"] = $pengguna["telepon"];
            $_SESSION["pengguna"]["email"] = $pengguna["email"];
            $_SESSION["pengguna"]["jenis"] = $pengguna["jenis_pengguna"];
            $_SESSION["pengguna"]["status"] = strtolower($pengguna["status_akses"]);
            $_SESSION["pengguna_ubah"] = true;
            mysql_free_result($temp);       
            
         }
        
    }
    elseif($_GET["aksi"] == "hapus")
    {
        
        /**
         * aksi hapus pengguna dimulai dari sini.
         */
        
        $kesalahan = false;
        
        $sql = "DELETE FROM pengguna WHERE kode = '{$_GET["id"]}'";
                
        if(mysql_query($sql))
        {
            
            $_SESSION["berhasil"] = "dihapus.";
            
        }
        else
        {
            
            $kesalahan = true;
            $pesan_kesalahan[] = "terjadi kesalahan pada database.";
            
        }
        
        if($kesalahan)
        {
            
            $_SESSION["kesalahan"] = $pesan_kesalahan;   
            
        }
        
    }
    elseif($_GET["aksi"] == "sortir")
    {
        
        /**
         * aksi sortir pengguna dimulai dari sini.
         */
        
        foreach($_GET as $kunci => $nilai)
        {
            
            if($kunci != "halaman" && $kunci != "aksi")
            {
                
                /**
                 * memasukkan field yang ingin disortir ke dalam variabel temp.
                 */
                $temp[$kunci] = $nilai;
                
            }
            
        }
        
        if(isset($_SESSION["pengguna_sortir"]))
        {
            
            /**
             * jika session pengguna_sortir sudah ada maka session tersebut akan di merge dengan variabel temp.
             */
            $_SESSION["pengguna_sortir"] = array_merge($_SESSION["pengguna_sortir"],$temp);
            
        }
        else
        {
            
            /**
             * jika session pengguna_sortir belum ada maka dibuatlah session tersebut dengan variable temp.
             */
            $_SESSION["pengguna_sortir"] = $temp;
            
        }
        
    }
    elseif($_GET["aksi"] == "cari" && isset($_POST["cari"]))
    {
        
        /**
         * aksi cari pengguna dimulai dari sini.
         */
        
        $kesalahan = false;
        
        foreach($_POST as $kunci => $nilai)
        {
            
            if(trim($nilai) != "")
            {
                
                $_SESSION["pengguna_cari"][$kunci] = trim($nilai);
                
            }
            
        }
        
    }
    elseif($_GET["aksi"] == "reset")
    {
        
        /**
         * aksi reset pencarian dan sortir dimulai dari sini.
         */
        
        unset($_SESSION["pengguna_cari"]);
        unset($_SESSION["pengguna_sortir"]);    
            
    }    
    
    mysql_close();
    
    /**
     * merefresh halaman ini supaya urlnya bersih :D
     */
    
    header("location:index.php?halaman=pengguna");
    exit();
    
}

if(isset($_SESSION["pengguna_sortir"]))
{
    
    /**
     * jika terdapat session pengguna_sortir maka mulai menyusun sql bagian order by
     * dan memasukkannya ke dalam variable sortir.
     */
    
    foreach($_SESSION["pengguna_sortir"] as $kunci => $nilai)
    {
        
        if($kunci == "username")
        {
            
            $sortir[$nilai]["username"] = "P.kode";
            
        }
        
        if($kunci == "nama")
        {
            
            $sortir[$nilai]["nama"] = "P.nama";
            
        }
        
        if($kunci == "alamat")
        {
            
            $sortir[$nilai]["alamat"] = "P.alamat";
            
        }
        
        if($kunci == "kota")
        {
            
            $sortir[$nilai]["kota"] = "K.nama";
            
        }
        
        if($kunci == "propinsi")
        {
            
            $sortir[$nilai]["propinsi"] = "PR.nama";
            
        }
        
        if($kunci == "telepon")
        {
            
            $sortir[$nilai]["telepon"] = "P.telepon";
            
        }
        
        if($kunci == "email")
        {
            
            $sortir[$nilai]["email"] = "P.email";
            
        }
        
        if($kunci == "tanggal")
        {
            
            $sortir[$nilai]["tanggal"] = "P.tanggal_disisipkan";
            
        }
        
        if($kunci == "jenis")
        {
            
            $sortir[$nilai]["jenis"] = "JP.kode";
            
        }
        
        if($kunci == "status")
        {
            
            $sortir[$nilai]["status"] = "P.status_akses";
            
        }
        
    }
    
}

if(isset($_SESSION["pengguna_cari"]))
{
    
    /**
     * jika terdapat session pengguna_cari maka mulai menyusun sql bagian where atau limit
     * dan memasukkannya ke dalam variable where atau limit.
     */
    
    if(array_key_exists("dari_no",$_SESSION["pengguna_cari"]) && array_key_exists("ke_no",$_SESSION["pengguna_cari"]))
    {
        
        $limit = "LIMIT " . ($_SESSION["pengguna_cari"]["dari_no"] - 1) . "," . ($_SESSION["pengguna_cari"]["ke_no"] - ($_SESSION["pengguna_cari"]["dari_no"] - 1));
        
    }
    
    if(array_key_exists("username",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "P.kode LIKE '%" . $_SESSION["pengguna_cari"]["username"] . "%'";
        
    }
    
    if(array_key_exists("nama",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "P.nama LIKE '%" . $_SESSION["pengguna_cari"]["nama"] . "%'";
        
    }
    
    if(array_key_exists("alamat",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "P.alamat LIKE '%" . $_SESSION["pengguna_cari"]["alamat"] . "%'";
        
    }
    
    if(array_key_exists("kota",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "K.nama LIKE '%" . $_SESSION["pengguna_cari"]["kota"] . "%'";
        
    }
    
    if(array_key_exists("propinsi",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "PR.nama LIKE '%" . $_SESSION["pengguna_cari"]["propinsi"] . "%'";
        
    }
    
    if(array_key_exists("telepon",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "P.telepon LIKE '%" . $_SESSION["pengguna_cari"]["telepon"] . "%'";
        
    }
    
    if(array_key_exists("email",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "P.email LIKE '%" . $_SESSION["pengguna_cari"]["email"] . "%'";
        
    }
    
    if(array_key_exists("dari_tanggal",$_SESSION["pengguna_cari"]) && array_key_exists("ke_tanggal",$_SESSION["pengguna_cari"]))
    {
        
        $where[] = "P.tanggal_disisipkan BETWEEN '" . $_SESSION["pengguna_cari"]["dari_tanggal"] . "' AND '" . $_SESSION["pengguna_cari"]["ke_tanggal"] . "'";
        
    }
    
    if(array_key_exists("jenis",$_SESSION["pengguna_cari"]) && $_SESSION["pengguna_cari"]["jenis"] != "all")
    {
        
        $where[] = "P.jenis_pengguna='" . $_SESSION["pengguna_cari"]["jenis"] . "'";
        
    }
    
    if(array_key_exists("status",$_SESSION["pengguna_cari"]) && $_SESSION["pengguna_cari"]["status"] != "all")
    {
        
        $where[] = "P.status_akses='" . $_SESSION["pengguna_cari"]["status"] . "'";
        
    }
    
}

//$koneksi=mysql_connect($GLOBALS["dbhost"],$GLOBALS["dbuser"],$GLOBALS["dbpass"]);
//mysql_select_db($GLOBALS["dbname"],$koneksi);
$koneksi = mysql_connect("localhost","root","");
mysql_select_db("perdagangan_elektronik",$koneksi);

/**
 * untuk dropdown jenis pengguna.
 */
$jenis=mysql_query("SELECT * FROM jenis_pengguna");

/**
 * untuk dropdown kota.
 */
$kota=mysql_query("SELECT K.no, K.nama, P.nama AS 'propinsi'
                    FROM kota AS K
                    INNER JOIN propinsi AS P ON P.no = K.dipropinsi
                    ORDER BY P.nama");
                    
/**
 * jumlah seluruh pengguna di dalam database.
 */
$total=mysql_num_rows(mysql_query("SELECT no FROM pengguna"));

$sql_where = "";
$sql_limit = "";
$sql_order = "";

if(isset($sortir))
{
    
    /**
     * mulai menyusun sql bagian order dari variable sortir.
     */    
    $sql_order .= " ORDER BY ";
    
    /**
     * bagian sortir secara asc.
     */
    if(isset($sortir["asc"]))
    {
        
        $i = 1;
        $akhir = count($sortir["asc"]);
        
        foreach($sortir["asc"] as $nilai)
        {
            
            $sql_order .= $nilai;
            
            if($i < $akhir)
            {
                
                $sql_order .= ",";
                
            }
            
            $i++;
            
        }
        
        $sql_order .= " ASC";
        
    }
    
    /**
     * bagian sortir secara desc.
     */
    if(isset($sortir["desc"]))
    {
        
        if(isset($sortir["asc"]))
        {
            
            $sql_order .= ", ";
            
        }
        
        $i = 1;
        $akhir = count($sortir["desc"]);
        
        foreach($sortir["desc"] as $nilai)
        {
            
            $sql_order .= $nilai;
            
            if($i < $akhir)
            {
                
                $sql_order .= ",";
                
            }
            
            $i++;
            
        }
        
        $sql_order .= " DESC";
        
    }
    
    $sql_order .= " ";
    
}

if(isset($where))
{
    
    /**
     * mulai menyusun sql bagian where dari variable where.
     */
    $i = 1;
    $akhir = count($where);
    
    foreach($where as $nilai)
    {
        
        if($i == 1)
        {
            
            $sql_where .= "WHERE ";
            
        }
        
        $sql_where .= $nilai;
        
        if($i < $akhir)
        {
            
            $sql_where .= " AND ";
            
        }
        
        $i++;
        
    }
    
}

if(isset($limit))
{
    
    $sql_limit .= $limit;
    
}


/**
 * query utama untuk menampilkan data di dalam database.
 */
$sql = "SELECT P.kode, P.nama, P.alamat, P.email, P.telepon, P.tanggal_disisipkan, P.status_akses, JP.kode AS 'jenis', K.nama AS 'kota', PR.nama AS 'propinsi'
        FROM pengguna AS P
        INNER JOIN jenis_pengguna AS JP ON JP.no = P.jenis_pengguna
        INNER JOIN kota AS K ON K.no = P.kota
        INNER JOIN propinsi AS PR ON PR.no = K.dipropinsi " . $sql_where . $sql_order . $sql_limit;                    
                    
$query=mysql_query($sql);
                    
mysql_close();

?>

<div>
    <a href="../index.php"><h4>Kembali ke halaman awal.</h4></a>
    <?php echo (isset($_SESSION["pengguna_ubah"])) ? "<a href='index.php?halaman=pengguna'><h4>Tambah Pengguna</h4></a>" : "";?>
</div>

<?php

if(isset($_SESSION["kesalahan"]))
{
    
    /**
     * menampilkan pesan kesalahan.
     */
    echo "<div style='border:1px solid red; color: red;'>";
    echo "<ul><h4>Kesalahan terdeteksi :</h4>";
    foreach($_SESSION["kesalahan"] as $pesan)
    {   
        
        echo "<li>" . $pesan . "</li>";    
        
    }
    echo "</ul>";
    unset($_SESSION["kesalahan"]);
    
}
elseif(isset($_SESSION["berhasil"]))
{
    
    /**
     * menampilkan pesan berhasil.
     */
    echo "<div style='border:1px solid green; color:green;'>";
    echo "<ul><h4>Pengguna berhasil {$_SESSION["berhasil"]}</h4></ul>";
    unset($_SESSION["berhasil"]);
    
}

?>
</div>
<div>
<form action="index.php?halaman=pengguna&aksi=<?php echo (isset($_SESSION["pengguna_ubah"])) ? "ubah" : "tambah"; ?>" method="post">
<h3><?php echo (isset($_SESSION["pengguna_ubah"])) ? "Mengubah" : "Menambah"; ?> Pengguna</h3>
<hr />
<table cellpadding="3">
<tbody>
    <tr>
        <td align="right"><label for="username">Username :</label></td>
        <td><input type="text" name="username" id="username" value="<?php echo (isset($_SESSION["pengguna"])) ? $_SESSION["pengguna"]["username"] : ""; ?>" /></td>
    </tr>
    <tr>
        <td align="right"><label for="password">Password :</label></td>
        <td><input type="text" name="password" id="password" value="<?php echo (isset($_SESSION["pengguna"])) ? $_SESSION["pengguna"]["password"] : ""; ?>" /></td>
    </tr>
    <?php echo (isset($_SESSION["pengguna_ubah"])) ? "<tr><td></td><td>jika tidak ingin mengubah password tinggalkan tak terisi.</td></tr>" : ""; ?>
    <tr>
        <td align="right"><label for="name">Nama :</label></td>
        <td><input type="text" name="nama" id="name" value="<?php echo (isset($_SESSION["pengguna"])) ? $_SESSION["pengguna"]["nama"] : ""; ?>"/></td>
    </tr>
    <tr>
        <td align="right" valign="top"><label for="alamat">Alamat :</label></td>
        <td><textarea name="alamat" id="alamat" rows="5" cols="30"><?php echo (isset($_SESSION["pengguna"])) ? $_SESSION["pengguna"]["alamat"] : ""; ?></textarea></td>
    </tr>
    <tr>
        <td align="right"><label for="kota">Kota :</label></td>
        <td>
            <select name="kota" id="kota">
                <option value="">-Pilih Kota-</option>
                <?php
                
                $propinsi = "";
                while($temp = mysql_fetch_assoc($kota))
                {
                    
                    if($propinsi != $temp["propinsi"])
                    {
                        
                        if($propinsi != "")
                        {
                            
                            echo "</optgroup>";
                            
                        }
                        
                        echo "<optgroup label='" . $temp["propinsi"] . "'>";
                        $propinsi = $temp["propinsi"];    
                        
                    }
                    
                    if(isset($_SESSION["pengguna"]) && $_SESSION["pengguna"]["kota"] == $temp["no"])
                    {
                        
                        echo "<option value='" . $temp["no"] . "' selected='selected'>" . $temp["nama"] . "</option>";
                        
                    }
                    else
                    {
                        
                        echo "<option value='" . $temp["no"] . "'>" . $temp["nama"] . "</option>";   
                        
                    }
                    
                }
                echo "</optgroup>";
                mysql_free_result($kota);
                
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right"><label for="telepon">Telepon :</label></td>
        <td><input type="text" name="telepon" id="telepon" value="<?php echo (isset($_SESSION["pengguna"])) ? $_SESSION["pengguna"]["telepon"] : ""; ?>" /></td>
    </tr>
    <tr>
        <td align="right"><label for="email">Email :</label></td>
        <td><input type="text" name="email" id="email" value="<?php echo (isset($_SESSION["pengguna"])) ? $_SESSION["pengguna"]["email"] : ""; ?>" /></td>
    </tr>
    <tr>
        <td align="right"><label for="jenis">Jenis :</label></td>
        <td>
            <select name="jenis" id="jenis">
                <option value="">-Pilih Jenis-</option>
                <?php 
                
                while($temp = mysql_fetch_assoc($jenis)) 
                {
                        
                    if(isset($_SESSION["pengguna"]) && $_SESSION["pengguna"]["jenis"] == $temp["no"])
                    {
                        
                        echo "<option value='" . $temp["no"] . "' selected='selected'>" . ucwords(strtolower($temp["kode"])) . "</option>";
                        
                    }
                    else
                    {
                        
                        echo "<option value='" . $temp["no"] . "'>" . ucwords(strtolower($temp["kode"])) . "</option>";
                        
                    }    
                        
                }
                    
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right"><label for="status">Status :</label></td>
        <td>                                                                                                                       
            <label><input type="radio" name="status" id="status" value="diperbolehkan" <?php echo (isset($_SESSION["pengguna"]["status"]) && $_SESSION["pengguna"]["status"] == "diperbolehkan") ? "checked='checked'" : "checked='checked'"; ?> /> Diperbolehkan</label>
            <label><input type="radio" name="status" id="status" value="ditolak" <?php echo (isset($_SESSION["pengguna"]["status"]) && $_SESSION["pengguna"]["status"] == "ditolak") ? "checked='checked'" : ""; ?> /> Ditolak</label>
        </td>
    </tr>    
    <tr>
        <td></td>
        <td>
            <?php echo (isset($_SESSION["pengguna_ubah"])) ? "<input type='hidden' name='id' value='" . $_SESSION["pengguna"]["id"] . "' />" : ""; ?>
            <input type="submit" <?php echo (isset($_SESSION["pengguna_ubah"])) ? "name='ubah' value='Ubahkan'" : "name='tambah' value='Tambahkan'";?> />
        </td>
    </tr>
</tbody>
</table>
</form>
</div>

<?php

/**
 * melepaskan variabel session yang sudah tidak terpakai.
 */

unset($_SESSION["pengguna"],$_SESSION["pengguna_ubah"]);

/**
 * menampilkan pesan berapa baris yang ditunjukkan.
 */

if(($jumlah = mysql_num_rows($query))  > 0)
{
    
    echo "<div style='border:1px solid green; color:green;'>";
    echo "<ul><h4>$jumlah baris berhasil ditemukan dari total $total baris yang ada di dalam database.</h4></ul>";
    
}
else
{
    
    echo "<div style='border:1px solid red; color:red;'>";
    echo "<ul><h4>tidak ditemukan baris yang sesuai kriteria dari total $total baris yang ada di dalam database.</h4></ul>";
    
}

?>

</div>
<div>
<form action="index.php?halaman=pengguna&aksi=cari" method="post">
<h3>Mengatur Pengguna</h3>
<hr />
<table cellpadding="5">
<tbody>
    <tr bgcolor="gray">
        <th width="85">
            No
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&username=<?php echo (!isset($_SESSION["pengguna_sortir"]["username"]) || (isset($_SESSION["pengguna_sortir"]["username"]) && $_SESSION["pengguna_sortir"]["username"] == "desc")) ? "asc" : "desc"; ?>">
            Username
            <?php echo (!isset($_SESSION["pengguna_sortir"]["username"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["username"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&nama=<?php echo (!isset($_SESSION["pengguna_sortir"]["nama"]) || (isset($_SESSION["pengguna_sortir"]["nama"]) && $_SESSION["pengguna_sortir"]["nama"] == "desc")) ? "asc" : "desc"; ?>">
            Nama
            <?php echo (!isset($_SESSION["pengguna_sortir"]["nama"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["nama"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&alamat=<?php echo (!isset($_SESSION["pengguna_sortir"]["alamat"]) || (isset($_SESSION["pengguna_sortir"]["alamat"]) && $_SESSION["pengguna_sortir"]["alamat"] == "desc")) ? "asc" : "desc"; ?>">
            Alamat
            <?php echo (!isset($_SESSION["pengguna_sortir"]["alamat"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["alamat"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&kota=<?php echo (!isset($_SESSION["pengguna_sortir"]["kota"]) || (isset($_SESSION["pengguna_sortir"]["kota"]) && $_SESSION["pengguna_sortir"]["kota"] == "desc")) ? "asc" : "desc"; ?>">
            Kota
            <?php echo (!isset($_SESSION["pengguna_sortir"]["kota"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["kota"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&propinsi=<?php echo (!isset($_SESSION["pengguna_sortir"]["propinsi"]) || (isset($_SESSION["pengguna_sortir"]["propinsi"]) && $_SESSION["pengguna_sortir"]["propinsi"] == "desc")) ? "asc" : "desc"; ?>">
            Propinsi
            <?php echo (!isset($_SESSION["pengguna_sortir"]["propinsi"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["propinsi"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&telepon=<?php echo (!isset($_SESSION["pengguna_sortir"]["telepon"]) || (isset($_SESSION["pengguna_sortir"]["telepon"]) && $_SESSION["pengguna_sortir"]["telepon"] == "desc")) ? "asc" : "desc"; ?>">
            Telepon
            <?php echo (!isset($_SESSION["pengguna_sortir"]["telepon"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["telepon"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&email=<?php echo (!isset($_SESSION["pengguna_sortir"]["email"]) || (isset($_SESSION["pengguna_sortir"]["email"]) && $_SESSION["pengguna_sortir"]["email"] == "desc")) ? "asc" : "desc"; ?>">
            Email
            <?php echo (!isset($_SESSION["pengguna_sortir"]["email"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["email"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="150">
            <a href="index.php?halaman=pengguna&aksi=sortir&tanggal=<?php echo (!isset($_SESSION["pengguna_sortir"]["tanggal"]) || (isset($_SESSION["pengguna_sortir"]["tanggal"]) && $_SESSION["pengguna_sortir"]["tanggal"] == "desc")) ? "asc" : "desc"; ?>">
            Tanggal Disisipkan
            <?php echo (!isset($_SESSION["pengguna_sortir"]["tanggal"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["tanggal"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&jenis=<?php echo (!isset($_SESSION["pengguna_sortir"]["jenis"]) || (isset($_SESSION["pengguna_sortir"]["jenis"]) && $_SESSION["pengguna_sortir"]["jenis"] == "desc")) ? "asc" : "desc"; ?>">
            Jenis
            <?php echo (!isset($_SESSION["pengguna_sortir"]["jenis"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["jenis"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th width="90">
            <a href="index.php?halaman=pengguna&aksi=sortir&status=<?php echo (!isset($_SESSION["pengguna_sortir"]["status"]) || (isset($_SESSION["pengguna_sortir"]["status"]) && $_SESSION["pengguna_sortir"]["status"] == "desc")) ? "asc" : "desc"; ?>">
            Status
            <?php echo (!isset($_SESSION["pengguna_sortir"]["status"])) ? "" : 
            ((($_SESSION["pengguna_sortir"]["status"] == "asc")) ? "<img src='../img/asc.png' width='16' style='vertical-align: middle;' />" : "<img src='../img/desc.png' width='16' style='vertical-align: middle;' />"); ?>
            </a>
        </th>
        <th colspan="2">Aksi</th>
    </tr>
    <tr bgcolor="teal">
        <th align="right">
            <label>Dari : <input type="text" name="dari_no" style="width: 40px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["dari_no"])) ? $_SESSION["pengguna_cari"]["dari_no"] : ""; ?>" /></label><br />
            <label>Ke : <input type="text" name="ke_no" style="width: 40px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["ke_no"])) ? $_SESSION["pengguna_cari"]["ke_no"] : ""; ?>" /></label>
        </th>
        <th><input type="text" name="username" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["username"])) ? $_SESSION["pengguna_cari"]["username"] : ""; ?>" /></th>
        <th><input type="text" name="nama" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["nama"])) ? $_SESSION["pengguna_cari"]["nama"] : ""; ?>" /></th>
        <th><input type="text" name="alamat" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["alamat"])) ? $_SESSION["pengguna_cari"]["alamat"] : ""; ?>" /></th>
        <th><input type="text" name="kota" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["kota"])) ? $_SESSION["pengguna_cari"]["kota"] : ""; ?>" /></th>
        <th><input type="text" name="propinsi" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["propinsi"])) ? $_SESSION["pengguna_cari"]["propinsi"] : ""; ?>" /></th>
        <th><input type="text" name="telepon" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["telepon"])) ? $_SESSION["pengguna_cari"]["telepon"] : ""; ?>" /></th>
        <th><input type="text" name="email" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["email"])) ? $_SESSION["pengguna_cari"]["email"] : ""; ?>" /></th>
        <th align="right">
            <label>Dari : <input type="text" name="dari_tanggal" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["dari_tanggal"])) ? $_SESSION["pengguna_cari"]["dari_tanggal"] : ""; ?>" /></label><br />
            <label>Ke : <input type="text" name="ke_tanggal" style="width: 80px;" value="<?php echo (isset($_SESSION["pengguna_cari"]["ke_tanggal"])) ? $_SESSION["pengguna_cari"]["ke_tanggal"] : ""; ?>" /></label>
        </th>
        <th>
            <select name="jenis" style="width: 80px;">
                <option value="all">All</option>
                <?php 
                
                mysql_data_seek($jenis,0);
                while($temp = mysql_fetch_assoc($jenis)) 
                {
                    
                    if(isset($_SESSION["pengguna_cari"]["jenis"]) && $_SESSION["pengguna_cari"]["jenis"] == $temp["no"])
                    {
                        
                        echo "<option value='" . $temp["no"] . "' selected='selected'>" . ucwords(strtolower($temp["kode"])) . "</option>";
                        
                    }   
                    else
                    {
                        
                        echo "<option value='" . $temp["no"] . "'>" . ucwords(strtolower($temp["kode"])) . "</option>";
                        
                    }     
                            
                }
                
                mysql_free_result($jenis);
                    
                ?>
            </select>
        </th>
        <th>
            <select name="status" style="width: 80px;">
                <option value="all">All</option>                                                                                                                                  
                <option value="diperbolehkan" <?php echo (isset($_SESSION["pengguna_cari"]["status"]) && $_SESSION["pengguna_cari"]["status"] == "diperbolehkan") ? "selected='selected'" : "" ?>>Diperbolehkan</option>
                <option value="ditolak" <?php echo (isset($_SESSION["pengguna_cari"]["status"]) && $_SESSION["pengguna_cari"]["status"] == "ditolak") ? "selected='selected'" : "" ?>>Ditolak</option>
            </select>
        </th>
        <th colspan="2">
            <input type="submit" name="cari" value="Cari" style="width: 80px;" /><br />
            <a href="index.php?halaman=pengguna&aksi=reset"><input type="button" name="reset" value="Reset" style="width: 80px;" /></a>
     
<?php         

$count = mysql_num_rows($query);

if($count > 0)
{
    
    $i = (isset($_SESSION["pengguna_cari"]["dari_no"])) ? $_SESSION["pengguna_cari"]["dari_no"] : 1;
    while ($temp = mysql_fetch_assoc($query))
    {
        
        ?>

    <tr bgcolor="#<?php echo ($i % 2) == 0 ? 'BBBBBB' : 'DDDDDDD' ; ?>">
        <td align="right"><?php echo $i; ?></td>
        <td><?php echo $temp["kode"]; ?></td>
        <td><?php echo ucwords(strtolower($temp["nama"])); ?></td>
        <td><?php echo ucwords(strtolower($temp["alamat"])); ?></td>
        <td><?php echo ucwords(strtolower($temp["kota"])); ?></td>
        <td><?php echo ucwords(strtolower($temp["propinsi"])); ?></td>
        <td><?php echo $temp["telepon"]; ?></td>
        <td><?php echo strtolower($temp["email"]); ?></td>
        <td><?php echo $temp["tanggal_disisipkan"]; ?></td>
        <td><?php echo ucwords(strtolower($temp["jenis"])); ?></td>
        <td><?php echo ucwords(strtolower($temp["status_akses"])); ?></td>
        <td><a href="index.php?halaman=pengguna&aksi=ubah&id=<?php echo $temp["kode"]; ?>">Ubah</a></td>
        <td><a href="index.php?halaman=pengguna&aksi=hapus&id=<?php echo $temp["kode"]; ?>" onclick="return confirm('yakin ingin menghapus baris <?php echo $i; ?> ?');">Hapus</a></td>
    </tr>

        <?php
        
        $i++;
        
    }

    
}

mysql_free_result($query);

?>
</tbody>
</table>
</form>
</div>