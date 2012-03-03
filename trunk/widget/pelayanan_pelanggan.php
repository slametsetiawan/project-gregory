<?php

function widget_pelayanan_pelanggan($jenis=0)
{
    ?>
    <div class="widget_pelayanan_pelanggan">
        <?php if(isset($GLOBALS["ym_cs"])):?>
            <?php foreach($GLOBALS["ym_cs"] as $ym_id => $ym_name):?>
                <div style="text-align: center; margin: 10px; border: solid 1px #ACE; padding: 10px;">
                    <a href="ymsgr:sendIM?<?php echo($ym_id);?>">
                        <img
                            src="http://opi.yahoo.com/online?u=<?php echo($ym_id);?>&t=<?php echo($jenis);?>"
                            style="border: none;"
                            alt="<?php echo($ym_name);?>"
                        />
                        <div>
                            <?php echo($ym_name);?>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <?php
}