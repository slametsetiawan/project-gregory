<?php

function widget_formulir_login()
{
    if(@$_GET["halaman"]!="login")
    {
        ?>
        <div class="widget_formulir_login">
            <form method="post" action="<?php echo(buat_url("login"));?>">
                <table>
                    <tr>
                        <td align="right">Username</td>
                        <td>
                            <input type="text" name="kode"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Kata Kunci</td>
                        <td>
                            <input type="password" name="kata_kunci" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="login" value="Login"/>
                        </td>
                    </tr>
                </table>
                <a href="<?php echo(buat_url("pendaftaran"));?>">
                    Pendaftaran
                </a>
            </form>
        </div>
        <?php
    }
}


