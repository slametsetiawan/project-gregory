<?php
$koneksi = mysql_connect("localhost","root","");
mysql_select_db("perdagangan_elektronik", $koneksi);
if (isset($_POST["kurangi"]))
        {
            
            echo "?";
            $data = $_POST["nomer"];
            $data2 = $_POST["kuantitas"];
            //block pengurangan kuantitas
            $comand = "SELECT * FROM produk WHERE no = '$data' ";
            $v = mysql_query($comand);
            while ($row = mysql_fetch_assoc($v))
            {
                $jumlah = $row["kuantitas"];
                $akhir = $jumlah - $data2;
                echo $akhir;
            }
            //block ubah sesuai dengan pengurangan kuantitas produk
            $mysql = "UPDATE 
            produk 
            SET 
            kuantitas = '$akhir' 
            WHERE 
            no = '$data'
            ";
            mysql_query($mysql);
            ?>
            <script language="javascript">
                alert("berhasil");
                location.href"transaksi.php"
            </script>
            <?php
        }
?>