<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.rocketwebsitetemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Berbaju Store</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="<?php echo(url_dasar())?>/tema/social_net/layout.css" />
        <script type="text/javascript" src="http://localhost/perdagangan_elektronik/js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="http://localhost/perdagangan_elektronik/js/script.js"></script>
        <!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
        <script type="text/javascript" src="http://localhost/perdagangan_elektronik/js/cufon-yui.js"></script>
        <script type="text/javascript" src="http://localhost/perdagangan_elektronik/js/arial.js"></script>
        <script type="text/javascript" src="http://localhost/perdagangan_elektronik/js/cuf_run.js"></script>
        <!-- CuFon ends -->
    </head>
<body>
<div class="main">
    <div class="main_resize">
        <div class="header">
            <div class="logo">
                <h1><a href="index.php"><span>Ber</span>baju<small>Toko Baju Yang Bersahabat</small></a></h1>
            </div>
            <div class="search">
                <form method="get" id="search" action="">
                  <span>
                  <input type="text" value="Search..." name="s" id="s"/>
                  <input name="searchsubmit" type="image" src="<?php echo(url_dasar())?>/tema/social_net/images/search.gif" value="Go" id="searchsubmit" class="btn"/>
                  </span>
                </form>
                <!--/searchform -->
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
            <div class="menu_nav" align="right">
                <?php widget_menu_utama(); ?>
                <div class="clr"></div>
            </div>
            <div class="hbg">
                <img src="<?php echo(url_dasar())?>/tema/social_net/images/26.jpg" width="923" height="291" alt="header images"/>
            </div>
        </div>
        <div class="content">
            <div class="content_bg">
                <div class="mainbar">
                    <?php konten(); ?>
                </div>
                <div class="sidebar">
                    <div class="gadget" align="center">
                        <h2 class="star"><span>Sidebar</span> Menu</h2>
                        <div class="clr"></div>
                        <?php widget_user_menu2();?>
                    </div>
                    <div class="clr"></div>
                    <div class="gadget">
                        <ul class="sb_menu">
                            <li><b><?php widget_keranjang_belanja(); ?></b></li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                    <div class="gadget">
                        <ul class="sb_menu">
                            <li>
          <b>
          <?php widget_register_user(); ?></b>
          </li>
          </div>
          <div class="clr"></div>
          <div class="gadget">
           <ul class="sb_menu"><li>
           <?php widget_artikel();?>
           <br/>
          <?php widget_konfirmasi_pembayaran();?>
          </li>
          </div>
          <!--<div class="gadget">
            <h2 class="star"><span>Pojok Iklan</span></h2>
            <div class="clr"></div>
            <ul class="ex_menu"><li><a href="#">Iklan disini<br/>
                Iklan disini</a></li>
              <li><a href="3">Iklan disini<br/>
               Iklan disini</a></li>
              <li><a href="3">Iklan disini<br/>
                Iklan disini</a></li>
              <li><a href="3">Iklan disini<br/>
                Iklan disini</a></li>
              <li><a href="3">Iklan disini<br/>
                Iklan disini</a></li>
              <li><a href="3">Iklan disini<br/>
                Iklan disini</a></li>
            </ul></div>-->
          <div class="gadget">
            <h2 class="star"><span>Berbaju</span></h2>
            <div class="clr"></div>
            <div class="testi">
              <p><span class="q">
              <img src="<?php echo url_dasar();?>/tema/social_net/images/qoute_1.gif" width="20" height="15" alt="quote"/>
              </span> Selalu Menjual Produk yang bersahabat dengan anda <span class="q">
              <img src="<?php echo url_dasar();?>/tema/social_net/images/qoute_2.gif" width="20" height="15" alt="quote">
              </span></p>
              <p class="title"><strong>Gregory Adrianto</strong></p>
            </div>
          </div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image Gallery</span></h2>
        <a href="#"><img src="<?php echo(url_dasar())?>/images/produk/1.jpg" width="58" height="58" alt="pix"></a>
        <a href="#"><img src="<?php echo(url_dasar())?>/images/produk/2.jpg" width="58" height="58" alt="pix"></a> 
        <a href="#"><img src="<?php echo(url_dasar())?>/images/produk/3.jpg" width="58" height="58" alt="pix"></a> 
        <a href="#"><img src="<?php echo(url_dasar())?>/images/produk/4.jpg" width="58" height="58" alt="pix"></a> 
        <a href="#"><img src="<?php echo(url_dasar())?>/images/produk/5.jpg" width="58" height="58" alt="pix"></a> 
        <a href="#"><img src="<?php echo(url_dasar())?>/images/produk/16.jpg" width="58" height="58" alt="pix"></a> 
        </div>
      <div class="col c2">
        <h2><span>Berbaju</span></h2>
        <p>Sejarah Berbaju<br/>
            sejarah berbaju terdapat disini sejarah berbaju terdapat disini sejarah berbaju terdapat disini sejarah berbaju terdapat disini 
      </div>
      <div class="col c3">
        <h2><span>About</span></h2>
        <p>Anda Bisa Membuka Halaman Cara Berbelanja Untuk Bantuan Lainnya</p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<div class="footer">
  <div class="footer_resize">
    <p class="lf">© Copyright <a href="#">MyWebSite</a>.<!--%@##--> Design provided by <a href="http://www.freewebtemplates.com">Free Website Templates</a>.<!--##@%--></p>
    <p class="rf">Layout by Rocket <a href="http://www.rocketwebsitetemplates.com/">Website Templates</a></p>
    <div class="clr"></div>
  </div>
</div>
</body></html>
