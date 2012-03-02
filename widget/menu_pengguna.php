<?php

function widget_menu_pengguna()
{
    ?>
    <div class="widget_menu_pengguna">
        <ul>
            <?php if(isset($_SESSION["pengguna"])):?>
                <li><a href="<?php echo(buat_url("daftar_pemesanan")); ?>">Daftar Pemesanan</a></li>
                <li><a href="<?php echo(buat_url("logout")); ?>">Logout (<?php echo($_SESSION["pengguna"]["nama"]);?>)</a></li>
            <?php else:?>
                <li><a href="<?php echo(buat_url("login")); ?>">Login</a></li>
            <?php endif;?>
        </ul>
    </div>
    <?
}
