<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.rocketwebsitetemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Berbaju</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo(url_dasar())?>/tema/IT/style.css" rel="stylesheet" type="text/css">
        <!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
            <script type="text/javascript" src="js/cufon-yui.js"></script>
            <script type="text/javascript" src="js/arial.js"></script>
            <script type="text/javascript" src="js/cuf_run.js"></script>
            <!-- CuFon ends -->
</head>
<body>
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="logo"><h1><a href="index.html">Ber<span>baju</span></a> <small>toko baju yang bersahabat</small></h1></div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
        <?php widget_menu_utama(); ?>
        </ul></div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize">
      <img src="<?php echo(url_dasar());?>/tema/IT/images/26.jpg" width="948" height="295" alt="image" class="hbg_img">
      <!--<img src="images/readmore.jpg" width="120" height="45" alt="read more" class="readmore"></a>-->
      <div class="clr"></div>
      <div class="mainbar">
        <?php konten(); ?>
      </div>
      <div class="sidebar">
        <!--<div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="">
            <span><input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our site:" type="text"></span>
            <input name="button_search" src="<?php echo(url_dasar())?>/tema/IT/images/search_btn.gif" class="button_search" type="image"></form>
        </div>-->
        <div class="clr"></div>
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2><div class="clr"></div>
          <ul class="sb_menu">
            <?php widget_user_menu2(); ?>
          </ul></div>
          <div class="gadget">
            <div class="clr"></div>
          <ul class="sb_menu">
            <li>
            <?php widget_keranjang_belanja(); ?></li>
          </ul></div>
          <div class="gadget">
            <div class="clr"></div>
          <ul class="sb_menu">
            <li>
            <?php widget_register_user();?></li>
          </ul></div>
          <div class="gadget">
            <div class="clr"></div>
          <ul class="sb_menu">
            <li>
            <?php widget_artikel();?></li>
          </ul></div>
          <div class="gadget">
            <div class="clr"></div>
          <ul class="sb_menu">
            <li>
            <?php widget_konfirmasi_pembayaran();?></li>
          </ul></div>
          
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image Gallery</span></h2>
        <a href="#"><img src="<?php echo(url_dasar())?>/tema/IT/images/pix1.jpg" width="58" height="58" alt="pix"></a>
        <a href="#"><img src="<?php echo(url_dasar())?>/tema/IT/images/pix2.jpg" width="58" height="58" alt="pix"></a>
        <a href="#"><img src="<?php echo(url_dasar())?>/tema/IT/images/pix3.jpg" width="58" height="58" alt="pix"></a>
        <a href="#"><img src="<?php echo(url_dasar())?>/tema/IT/images/pix4.jpg" width="58" height="58" alt="pix"></a>
        <a href="#"><img src="<?php echo(url_dasar())?>/tema/IT/images/pix5.jpg" width="58" height="58" alt="pix"></a>
        <a href="#"><img src="<?php echo(url_dasar())?>/tema/IT/images/pix6.jpg" width="58" height="58" alt="pix"></a>
      </div>
      <div class="col c2">
        <h2><span>Lorem Ipsum</span></h2>
        <p>Lorem ipsum dolor<br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam</a>, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
      </div>
      <div class="col c3">
        <h2><span>Contact</span></h2>
        <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue.</p>
        <p><a href="mailto:support@yoursite.com">support@yoursite.com</a></p>
        <p>+1 (123) 444-5677<br>+1 (123) 444-5678</p>
        <p>Address: 123 TemplateAccess Rd1</p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">© Copyright <a href="#">MyWebSite</a>. <span>Layout by Rocket <a href="http://www.rocketwebsitetemplates.com/">Website Templates</a></span><!--%@##--> Design provided by <a href="http://www.freewebtemplates.com">Free Website Templates</a>.<!--##@%--></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body></html>
