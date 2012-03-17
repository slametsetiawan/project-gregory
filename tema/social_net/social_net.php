<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.rocketwebsitetemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Berbaju Store</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
                <link rel="stylesheet" href="<?php echo(url_dasar())?>/tema/social_net/style.css" />
                <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
                <script type="text/javascript" src="js/script.js"></script>
                <!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
                <script type="text/javascript" src="js/cufon-yui.js"></script>
                <script type="text/javascript" src="js/arial.js"></script>
                <script type="text/javascript" src="js/cuf_run.js"></script>
                <!-- CuFon ends -->
    </head>
<body>
<div class="main">
  <div class="main_resize">
    <div class="header">
      <div class="logo" align="center">
        <h1>
            <a href="index.php?halaman=index">
                <span>Ber</span>baju<small>Toko Baju Yang Bersahabat</small>
            </a>
        </h1>
      </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="menu_nav" align="right">
       <?php widget_menu_utama(); ?>
       <div class="clr"></div>
      </div>
      <div class="hbg" align="center">
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
            </div>
            <div class="clr"></div>
          <div class="gadget">
          <ul class="sb_menu"><li>
          <b>
          <?php widget_menu_samping();?></b>
          </li>
          </div>
           <div class="clr"></div>
           <h2 class="star"><span>Menu</span> Pengguna</h2>
          <div class="gadget">
          <ul class="sb_menu"><li>
          <b>
          <?php widget_formulir_login();?></b>
          </li>
          </div>
          <div class="clr"></div>
           <div class="gadget">
          <ul class="sb_menu"><li>
          <b>
          <?php widget_menu_pengguna();?></b>
          </li>
          </div>
          <div class="clr"></div>
          <div class="gadget">
           <ul class="sb_menu"><li>
           <?php widget_pelayanan_pelanggan(14);?>
          </li>
          </div>
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
      <div class="col c1" style="width: 330px;">
       <?php widget_galeri_produk();?>
        </div>
      <div class="col c2">
        <?php echo($GLOBALS["deskripsi_situs"]);?>
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
