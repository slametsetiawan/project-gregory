<?php

function widget_user_menu2()
{
    if (isset($_SESSION["pengguna"]))
    {
        echo ("SELAMAT DATANG KEMBALI");
        echo "</br>";
        echo $_SESSION["pengguna"];
?>

    <form action="<?php echo(buat_url("logout")); ?>" method="post">
        <input type="submit" name="logout" value="Log Out" />
    </form>
    
<?php
        
    }
    else
    {
           
    }
}