<html>
  <head>
   <title>Latihan Form dengan PHP</title>
  </head>
  <body>

   <form action="" method="post">
    Masukan nama : <input type="text" name="nama"><input type="submit" name="kirim" value="Kirim">
   </form>

    <?php

if (isset($_POST["kirim"]))
{
    $kesalahan = false;
    if (!empty($_POST["nama"]))
    {
        if (strlen($_POST["nama"]) < 7)
        {
            echo "kurang dari 7";
        }
        if (strlen($_POST["nama"]) >= 7)
        {
            echo $_POST["nama"];
        }
    }
    else
    {
        echo "kosong";
    }
}

?>
  </body>
</html>