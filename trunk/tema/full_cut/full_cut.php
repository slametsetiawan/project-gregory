<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_once("template_header.php"); ?>
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
                        <!--
                        Search <input type="text" />
                        -->
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
                    <?php include_once("template_sidebar.php") ?>
                </div>
                <div class="footer-sheet">
                    <?php include_once("template_footer.php") ?>
                </div>
                <div class="bottom-sheet">
                    <?php include_once("template_maker.php")?>
                </div>
            </div>
        </div>
    </body>
</html>