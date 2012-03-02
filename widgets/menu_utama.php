<?php

function widget_menu_utama()
{
    ?>
    <div class="widget_menu_utama">
        <ul>
            <li><a href="<?php echo(buat_url("index")); ?>">Beranda</a></li>
            <li><a href="<?php echo(buat_url("katalog")); ?>">Katalog</a></li>
            <li><a href="<?php echo(buat_url("cara_belanja")); ?>">Cara Belanja</a></li>
            <li><a href="<?php echo(buat_url("kontak")); ?>">Kontak</a></li>
        </ul>
    </div>
    <?
}
