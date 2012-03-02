<?php

if(isset($_GET["redirect"]))
{
    $redirect = $_GET["redirect"];
}
else
{
    $redirect = "index";
}

if(!isset($_SESSION["pengguna"]))
{
    if(isset($_POST["submit"]))
    {
        $sql = "
            SELECT
                *
            FROM
                pengguna
            WHERE
                kode = '".$_POST["kode"]."' AND
                kata_kunci = '".md5($_POST["kata_kunci"])."'
            LIMIT 0, 1";
        
        $sumber_data = mysql_query($sql);
        
        $pengguna = mysql_fetch_assoc($sumber_data);
        
        $pesan_umpan_balik = "";
        
        if($pengguna==FALSE)
        {
            $pesan_umpan_balik = "<div class=\"warning\">Akun tidak ditemukan.</div>";
        }
        else
        {
            $_SESSION["pengguna"] = $pengguna;
            header("location:".buat_url($redirect)); 
        }
    }
    ?>
    <div id="halaman_login">
        <h3>Formulir Login</h3>
        <div>
            <?php echo($pesan_umpan_balik); ?>
        </div>
        <form method="post" action="<?php echo(buat_url("login", array("redirect"=>$redirect)));?>">
            <table>
                <tr>
                    <td align="right">Username : </td>
                    <td>
                        <input type="text" name="kode" />
                    </td>
                </tr>
                <tr>
                    <td align="right">Kata Kunci : </td>
                    <td>
                        <input type="password" name="kata_kunci" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Login"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
}
else
{
    //echo("Anda sudah login sebagai ".$_SESSION["pengguna"]["nama"]);
    header("location:".buat_url($redirect));
}