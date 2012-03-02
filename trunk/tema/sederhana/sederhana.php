<html>
    <head>
        <link rel="stylesheet" href="<?php echo(url_dasar())?>/tema/sederhana/sederhana.css" />
    </head>
    <body>
        <table width="1100px" border="1" align="center">
            <tbody>
                <tr>
                    <td align="left">
                    <b>
                    <a href="index.php">BERBAJU.COM</a>   
                    </b>
                    </td>
                    <td align="right">
                       <form method="get" id="search" action="">
                            <span>
                            <input type="text" value="Search..." name="s" id="s"/>
                            <input name="searchsubmit" type="image" src="images/search.gif" value="Go" id="searchsubmit" class="btn"/>
                            </span>
                      </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <?php widget_menu_utama("vertikal");?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" bgcolor="silver">
                        <h2>Selamat Datang di Toko Baju "BERBAJU"</h2>
                    </td>
                </tr>
                <tr>
                    <td width="300px" valign="top">
                        <div>
                            <?php widget_user_menu2();?>
                        </div>
                        <div>
                            <?php widget_keranjang_belanja(); ?>
                        </div>
                        <div>
                            <?php widget_konfirmasi_pembayaran();?>
                        </div>
                        <div>
                            <?php widget_register_user(); ?>
                        </div>
                        <div>
                            <?php widget_artikel();?>
                        </div>
                        <div>
                            <?php widget_konfirmasi_pembayaran();?>
                        </div>
                    </td>
                    <td width="800px" valign="top">
                        <?php konten(); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" bgcolor="silver">
                        Tema dibuat oleh Nobody
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>