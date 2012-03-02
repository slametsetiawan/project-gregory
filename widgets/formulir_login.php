<?php
function login_form_widget()
{

if(isset($_POST["login2"]))
{
    $koneksi=mysql_connect($GLOBALS["dbhost"],$GLOBALS["dbuser"],$GLOBALS["dbpass"]);
    mysql_select_db($GLOBALS["dbname"],$koneksi);
    
    $query=mysql_query("SELECT P.kode
                        FROM pengguna AS P
                        INNER JOIN jenis_pengguna AS JP ON JP.no = P.jenis_pengguna
                        WHERE P.kode='" . trim($_POST["nama"]) . "' AND P.kata_kunci='" . md5(trim($_POST["password"])) . "' AND P.status_akses='DIPERBOLEHKAN'");
    mysql_close();
    $ada=@mysql_num_rows($query);
    
    if($ada)
    {
        
        $temp = mysql_fetch_object($query);
        $_SESSION["pengguna"] = $temp->kode;
        
    
    mysql_free_result($query);
    //header("location:index.php");
?>
<script language="javascript"> alert("Berhasil login")
location.href="index.php?halaman=konfirmasi"
</script>

<?php
    }
    else
    {
        ?>
        <script language="javascript"> alert("username atau password salah")
        location.href="index.php?halaman=index"
        </script>
        <?php
    }
}
else
{
    
    ?>
    <html>
<form method="post" action="" name="form11">
    <h3>Login Pengguna</h3>
    <table align="left" border="0">
        <tr>
            <td align="right">Kode</td>
            <td><input type="text" name="nama"/></td>
        </tr>
        <tr>
            <td align="right">Kata Kunci</td>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td></td>
            <td align="right">
            <input type="submit" value="login" name="login2" />
            </td>
        </tr>
    </table>
</form>
</html>
    <?php
    
}
}


