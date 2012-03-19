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
                        <?php include_once("template_menu.php") ?>
                    </div>
                    <div class="top-right-sheet">
                        <?php include_once("template_search.php") ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="top-middle-sheet">
                    <?php include_once("template_widget_menu.php") ?>
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