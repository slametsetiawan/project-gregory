<?php

session_start();

if (!isset($_SESSION['administrator']))
{

?>

<script language="javascript">alert("Anda belum login, Please login dulu");
location.href="admin_login.php"</script>

<?

} else
{

?>

<?php

    $user = $_SESSION['administrator'];

?> 
          <!--<h2><span>Selamat datang <?php

    echo $user;

?> , apa yang ingin dilakukan?</span></h2>-->


<script language=’javascript’>alert('Anda belum login. Please login dulu');
document.location='admin_login.php'</script>



<html>
<head>
<title>Admin Area</title>
</head>
<?php

    //echo $_SESSION['administrator'];

?>
<!--<body>
    <div id="MainWrapper" align="center">      
<div id="pageContent">
    <div align="left" style="margin-left: 100px;">
        <td style="background-color:#EEEEEE;width:375px;text-align:top;">
        <br />
        <p><a href="halaman/inventori.php" >Manage Inventory</a>
        <br />
        <p><a href="halaman/manage_artikel.php">Edit berita</a>
        <br />
        <p><a href="halaman/pengguna.php">Manage User</a>
        <br />
        <p><a href="halaman/template.php">Manage tema</a>
        <br />
        <br />
        <br />
        <input type="button" value="Log Out" onclick="location.href='http://localhost/perdagangan_elektronik/admin/halaman/logout.php'" />
        
        </td>
    </div>


</div> 
    </div>
</body>-->

<table align="center" border="1" bgcolor="#5885FA" width="600px" >
<tr>
    <td align="center">
        <ul><h2>Pengaturan Administrator<br />
        Welcome admin <?php

    if (isset($_SESSION['administrator']))
    {
        echo ($_SESSION["administrator"]);
    } else
    {
        echo "hello ayo login dulu";
    }

?></h2>
    </td>
</tr>
<tr>
<td align="center" style="float: left;">
<h1>
<a href="halaman/pengguna2.php"><li>Mengatur Pengguna</li></a>
<a href="halaman/inventori.php"><li>Mengatur Inventori</li></a>
<a href="halaman/stok.php"><li>Mengatur Stock</li></a>
<a href="halaman/manage_artikel.php"><li>Mengatur artikel</li></a>
<a href="halaman/template.php"><li>Mengatur Tampilan</li></a>
<a href="halaman/transaksi.php"><li>Memantau Transaksi</li></a>
<a href="halaman/informasi.php"><li>Informasi</li></a>
<br />
<a href="halaman/logout.php">Logout</a>
<!--<form method="post" action="halaman/logout.php" >
    <input type="button" name="logout" value="Log Out" />
</form>-->      
</ul>
</h1>
</td>
</tr>
</table>



</html>

          </div>
          <br />
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php

}

?>
