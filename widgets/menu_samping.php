<?php

function widget_menu_samping()
{
    ?>
    <div class="widget_menu_samping">
        <ul>
            <li><a href="<?php echo(buat_url("keranjang_belanja")); ?>">Keranjang Belanja</a></li>
            <li><a href="<?php echo(buat_url("pendaftaran")); ?>">Pendaftaran</a></li>
            <li><a href="<?php echo(buat_url("faq")); ?>">FAQ</a></li>
        </ul>
    </div>
    <?
}
