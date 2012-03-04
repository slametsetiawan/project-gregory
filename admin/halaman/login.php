<?php

if(isset($_POST["login"]))
{
    
    $koneksi=mysql_connect($GLOBALS["dbhost"],$GLOBALS["dbuser"],$GLOBALS["dbpass"]);
    mysql_select_db($GLOBALS["dbname"],$koneksi);
    
    $query=mysql_query("SELECT P.kode
                        FROM pengguna AS P
                        INNER JOIN jenis_pengguna AS JP ON JP.no = P.jenis_pengguna
                        WHERE P.kode='" . trim($_POST["user"]) . "' AND P.kata_kunci='" . md5(trim($_POST["pass"])) . "' AND P.status_akses='DIPERBOLEHKAN' AND JP.kode='ADMIN'");
    mysql_close();
    $ada=@mysql_num_rows($query);
    
    if($ada)
    {
        
        $temp = mysql_fetch_object($query);
        $_SESSION["administrator"] = $temp->kode;
        
    }
    
    mysql_free_result($query);
    header("location:index.php");
    
}
else
{
    
    ?>
    <form action="index.php?halaman=login" method="post">
    <table align="center" bgcolor="#5885FA" width="500px" border="0">
    <tr>
        <td align="center" colspan="3">
        <b>ADMIN LOGIN</b><br />
        =====================================<br />
        =           <label>Username : <input type="text" name="user" /></label>         =<br/>
        =           <label>Password : <input type="password" name="pass" /></label>         =<br/>
        =====================================
        </td>
    </tr>
    <tr>
        <td><a href="../">Home</a></td>
        <td align="right">
            <label></label><input name="login" type="submit" value="Login" />
        </td>
    </tr>
    </table>
    </form>
    <?php
    
}