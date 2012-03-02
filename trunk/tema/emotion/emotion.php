<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo($GLOBALS["nama_situs"]);?></title>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta name="language" content="id" />
        <link rel="shortcut icon" href="<?php echo(url_dasar());?>/tema/emotion/favicon.png" />
        <link rel="stylesheet" href="<?php echo(url_dasar());?>/tema/emotion/layout.css" />
    </head>
    <body>
        <div class="wrapper">
            <div class="sheet">
                <div class="top-sheet">
                    <div class="top-left-sheet">
                        <div class="site-name">
                            <?php echo($GLOBALS["nama_situs"]);?>
                        </div>
                        <div class="site-sub-name">
                            <?php echo($GLOBALS["slogan_situs"]);?>
                        </div>
                    </div>
                    <div class="top-right-sheet">
                        
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="top-middle-sheet">
                    <div>
                        <?php widget_menu_utama();?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="header-sheet"></div>
                <div class="body-sheet">
                    <div class="side-body">
                        <div class="widget">
                            <div class="title">
                                Menu Samping
                            </div>
                            <div class="content">
                                <?php widget_menu_samping();?>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="title">
                                Menu Pengguna
                            </div>
                            <div class="content">
                                <?php widget_menu_pengguna();?>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="title">
                                Pelayanan Pelanggan
                            </div>
                            <div class="content">
                                <?php widget_pelayanan_pelanggan(14);?>
                            </div>
                        </div>
                    </div>
                    <div class="main-body">
                        <?php konten();?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="footer-sheet">
                    <div class="left-footer">
			<div class="title">
			    Galeri Produk
			</div>
			<div class="content">
			    <?php widget_galeri_produk();?>
			</div>
		    </div>
                    <div class="center-footer">
			<div class="title">
			    <?php echo($GLOBALS["nama_situs"]);?>
			</div>
			<div class="content">
			    <?php echo($GLOBALS["deskripsi_situs"]);?>
			</div>
		    </div>
                    <div class="right-footer">
			<div class="title">
			    Tentang kami
			</div>
			<div class="content">
			    <?php echo($GLOBALS["tentang_situs"]); ?>
			</div>
		    </div>
                    <div class="clear"></div>
                </div>
                <div class="bottom-sheet">
                    Web template created by ddQ.<br/>
                    Berbaju.Com &copy;2012 by XvixProject.Com
                </div>
            </div>
        </div>
    </body>
</html>