<?php
session_start();
if (isset($_SESSION["administrator"])) 
{
    header("location: index.php"); 
    exit();
}
    $koneksi = mysql_connect("localhost","root","");
    mysql_select_db("perdagangan_elektronik",$koneksi);
    if(isset($_POST['button'])) 
    {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysql_query("SELECT P.kode
                        FROM pengguna AS P
                        INNER JOIN jenis_pengguna AS JP ON JP.no = P.jenis_pengguna
                        WHERE P.kode='" . trim($_POST["username"]) . "' AND P.kata_kunci='" . md5(trim($_POST["password"])) . "' AND P.status_akses='DIPERBOLEHKAN' AND JP.kode='ADMIN'");
  
    $num = mysql_num_rows($query);
        if($num==1) 
            {
                $_SESSION['administrator'] = $username;
                $_SESSION['password'] = $password;
                ?>
                <script language="JavaScript">
                    alert('Anda berhasil login'); 
                    document.location='index.php'
                </script>
                <?
            } 
            else 
                {
                ?>
                <script language="JavaScript">
                    alert('Username atau password Anda salah'); 
                    document.location='admin_login.php'
                </script>
                <?php
            }
    }
?>