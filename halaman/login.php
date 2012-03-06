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
    ?>
    <div id="halaman_login">
        <h3>Formulir Login</h3>
        <div>
            <?php
            if(isset($_POST["login"]))
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
                
                if($pengguna==FALSE)
                {
                    ?><div style="padding: 5px; background-color: #FDB;">Akun tidak ditemukan.</div><?php
                }
                else
                {
                    $_SESSION["pengguna"] = $pengguna;
                    //header("location:".buat_url($redirect)); <-- mestinya header already sent cos pake template
                    ?>
                    <script>
                        alert("Selamat datang, <?php echo($_SESSION["pengguna"]["nama"]);?>.");
                        location.href = "<?php echo(buat_url($redirect));?>";
                    </script>
                    <?php
                }
            }
            ?>
        </div>
        <form method="post" action="<?php echo(buat_url("login", array("redirect"=>$redirect)));?>">
            <table>
                <tr>
                    <td align="right">Username</td>
                    <td>
                        <input type="text" name="kode" />
                    </td>
                </tr>
                <tr>
                    <td align="right">Kata Kunci</td>
                    <td>
                        <input type="password" name="kata_kunci" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="login" value="Login"/>
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
    //header("location:".buat_url($redirect));
    ?>
    <script>
        //alert("Anda sudah login, <?php echo($_SESSION["pengguna"]["nama"]);?>.");
        location.href = "<?php echo(buat_url($redirect));?>";
    </script>
    <?php
}