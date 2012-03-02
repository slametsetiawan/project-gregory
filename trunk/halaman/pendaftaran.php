<script language="JavaScript"> 

 function validasiForm()
    	{
		if ((document.reg.kode.value != ""))
		{
		var user = /^[a-zA-Z0-9]{4,15}$/; 
		if ((user.test(document.reg.kode.value) == false))
				{
					alert("Terdapat kesalahan penulisan pada kolom Username.");
					return false;
				}
		}
		{
        formObj = document.reg;
        if ((formObj.kode.value == ""))
 
        { 
            alert("Username tisak boleh kosong.");
            return false;
        }
		 
		{
        formObj = document.reg;
        if ((formObj.kata_kunci.value != formObj.ulangi_kata_kunci.value))
 
        { 
            alert("Konfirmasi password salah.");
            return false;
        }
		 
		if ((document.reg.kata_kunci.value != ""))
		{
		var pass = /^[a-zA-Z0-9]{6,20}$/; 
		if ((pass.test(document.reg.kata_kunci.value) == false))
				{
					alert("Password tidak boleh kurang dari 6 karakter dan maksimal 20 karakter.");
					return false;
				}
		}
    	{
        formObj = document.reg;
        if ((formObj.kata_kunci.value == ""))
 
        {
            alert("Password tidak boleh kosong.");
 
            return false;
        }	
 
 
    	{
        formObj = document.reg;
        if ((formObj.ulangi_kata_kunci.value == ""))
 
        {
            alert("Anda belum mengkonfirmasi password.");
 
            return false;
        }	
		
		
    	{
        formObj = document.reg;
        if ((document.reg.email.value != ""))
		{
		var em = /^.+\@(\[?)[a-zA-Z0-9\-\_\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/; 
		if ((em.test(document.reg.email.value) == false))
				{
					alert("Terdapat kesalahan penulisan pada kolom Email.");
					return false;
				}
		}
		{
        formObj = document.reg;
        if ((formObj.email.value == ""))
 
        {
            alert("Email tidak boleh kosong.");
 
            return false;
        }
		
		{
        formObj = document.reg;
        if ((formObj.nama.value == ""))
 
        {
            alert("nama tidak boleh kosong.");
 
            return false;
        }
		
		{
        formObj = document.reg;
        if ((formObj.alamat.value == ""))
 
        {
            alert("Alamat tidak boleh kosong.");
 
            return false;
        }
		
		if ((document.reg.kodepos.value != ""))
		{
		var telp = /^[0-9]{5,5}$/; 
		if ((telp.test(document.reg.kodepos.value) == false))
				{
					alert("Terdapat kesalahan penulisan pada kolom Kodepos.");
					return false;
				}
		}
		
		{
        formObj = document.reg;
        if ((formObj.kodepos.value == ""))
 
        {
            alert("Kode Pos tidak boleh kosong.");
 
            return false;
        }
		
		if ((document.reg.telepon.value != ""))
		{
		var telp = /^[0-9]{10,15}$/; 
		if ((telp.test(document.reg.telepon.value) == false))
				{
					alert("Terdapat kesalahan penulisan pada kolom Telepon/HP.");
					return false;
				}
		}
		{
        formObj = document.reg;
        if ((formObj.telepon.value == ""))
 
        {
            alert("Telepon/HP tidak boleh kosong.");
 
            return false;
        }
		
		else
            return true;
						
		}}}}}}}}}}}
</script>
<?php

if (isset($_POST["submit"]))
{
    require_once ("./konfigurasi.php");

    $sql = "
        INSERT INTO 
            `perdagangan_elektronik`.`pengguna`
            (
                `kode`,
                `nama`,
                `kata_kunci`,
                `alamat`,
				`kode_pos`,
                `email`,
                `kota`,
                `telepon`,
                `tanggal_disisipkan`,
                `jenis_pengguna`,
                `status_akses`
            )
        VALUES
        (   
            '".$_POST["kode"]."',  
            '".$_POST["nama"]."',  
            '".md5($_POST["kata_kunci"])."',  
            '".$_POST["alamat"]."',
			'".$_POST["kodepos"]."',
            '".$_POST["email"]."',
            '".$_POST["kota"]."',  
            '".$_POST["telepon"]."',  
            NOW(),  
            '2',
            'DIPERBOLEHKAN'
        )";
    
    $return = mysql_query($sql);
    
    if($return)
    {
        echo("Pendaftaran berhasil!");
    }
    else
    {
        echo("Pendaftaran gagal!");
    }
}
?>
<div>
    <form action="<?php echo buat_url("pendaftaran");?>"  method="post" onsubmit="return validasiForm();" name="reg">
        <h3>Formulir Pendaftaran</h3>
        <table>
            <tr>                
                <td align="right">Username : </td>
                <td>
                    <input name="kode" type="text" size="31"/>
                </td>
            </tr>
            <tr>
                <td align="right">Kata Kunci : </td>
                <td>
                    <input name="kata_kunci" type="password" size="31"/>
                </td>
            </tr>
            <tr>
                <td align="right">Ulangi Kata Kunci : </td>
                <td>
                    <input name="ulangi_kata_kunci" type="password" size="31"/>
                </td>
            </tr>
            <tr>
                <td align="right">Email : </td>
                <td>
                    <input name="email" type="text"size="63"/>
                </td>
            </tr>
            <tr>
                <td align="right">Nama : </td>
                <td>
                    <input name="nama" type="text" size="63"/>
                </td>
            </tr>
            <tr>
                <td align="right">Alamat Lengkap : </td>
                <td>
                    <input type="text" name="alamat" size="63"/>
                </td>
            </tr>
            <tr>
                <td align="right">Kota : </td>
                <td>
                    <select name="kota">
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                kota
                            WHERE dipropinsi='1'";
                        $sumber_data = mysql_query($sql);
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <optgroup label="Jawa timur">
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            </optgroup>
                            <!--<option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>-->
                            <?php
                        }
                        ?>
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                kota
                            WHERE dipropinsi='2'";
                        $sumber_data = mysql_query($sql);
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <optgroup label="Jabodetabek">
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            </optgroup>
                            <!--<option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>-->
                            <?php
                        }
                        ?>
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                kota
                            WHERE dipropinsi='3'";
                        $sumber_data = mysql_query($sql);
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <optgroup label="Jawa tengah">
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            </optgroup>
                            <!--<option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>-->
                            <?php
                        }
                        ?>
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                kota
                            WHERE dipropinsi='4'";
                        $sumber_data = mysql_query($sql);
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <optgroup label="Daerah Istimewa Yogjakarta">
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            </optgroup>
                            <!--<option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>-->
                            <?php
                        }
                        ?>
                        <?php
                        $sql = "
                            SELECT
                                *
                            FROM
                                kota
                            WHERE dipropinsi='5'";
                        $sumber_data = mysql_query($sql);
                        while($baris = mysql_fetch_assoc($sumber_data))
                        {
                            ?>
                            <optgroup label="Jawa Barat">
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            </optgroup>
                            <!--<option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>-->
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Kode Pos : </td>
                <td>
                    <input type="text" name="kodepos" size="63"/>
                </td>
            </tr>
            <tr>
                <td align="right">Telepon : </td>
                <td>
                    <input name="telepon" type="text"size="15"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Daftar"/>
                </td>
            </tr>
        </table>
    </form>
</div>