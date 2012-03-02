<?php

function widget_user_menu()
{
    if (isset($_SESSION["pengguna"]))
    {
        echo ("SELAMAT DATANG");
        echo "</br>";
        //echo $_SESSION["pengguna"];
        //var_dump($_SESSION["pengguna"]);
?>

    <form action="<?php echo(buat_url("Log Out")); ?>" method="post">
        <input type="submit" name="logout" value="logout" />
    </form>
    
<?php
        
    }
    else
    {
        login_form_widget();
?>
<br />
<br />
<br />
<br />
<br />
<html>
        <table border="0" style="border:dashed;color: maroon;">
            <tr align="left">
                <td>
                <b>Bagi yang Belum memiliki account bisa mendaftarkan diri melalui link di sidebar menu</b>
                </td>
            </tr>
        </table>
        
</html>
<?php         
        //widget_register_user();
 
    }
}