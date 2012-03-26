<script language="JavaScript"> 

 function validasiForm()
    	{
		if ((document.reg.uname.value != ""))
		{
		var user = /^[a-zA-Z0-9]{4,15}$/; 
		if ((user.test(document.reg.uname.value) == false))
				{
					alert("Terdapat kesalahan penulisan pada kolom Username.");
					return false;
				}
		}
		{
        formObj = document.reg;
        if ((formObj.uname.value == ""))
 
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
		
	function checkusername(){
	var status = document.getElementById("usernamestatus");
	var u = document.getElementById("uname").value;
	if(u != ""){
		status.innerHTML = 'checking...';
		var hr = new XMLHttpRequest();
		hr.open("POST", "http://localhost/gregory-ta/halaman/pendaftaran.php", true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				status.innerHTML = hr.responseText;
			}
		}
    var v = "name2check="+u;
    hr.send(v);
	}
}
</script>

<?php
if(isset($_POST["name2check"]) && $_POST["name2check"] != ""){
    //include_once 'my_folder/connect_to_mysql.php';
    $sql = mysql_connect("localhost","root","");
    mysql_select_db("perdagangan_elektronik",$sql);
    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['name2check']); 
    $sql_uname_check = mysql_query("SELECT kode FROM pengguna WHERE kode='$username' LIMIT 1"); 
    $uname_check = mysql_num_rows($sql_uname_check);
    if (strlen($username) < 6) {
	    echo '6 - 15 characters please';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo 'First character must be a letter';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong>' . $username . '</strong> is OK';
	    exit();
    } else {
	    echo '<strong>' . $username . '</strong> is taken';
	    exit();
    }
}
?>
<?php

if (isset($_POST["submit"]))
{
	if(md5($_POST['pin']) == $_SESSION['image_random_value'])
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
				'".$_POST["uname"]."',  
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
			?>
			<script language="javascript">
				alert("Pendaftaran anda berhasil!")
			</script>
			<?php
		}
		else
		{
			?>
			<script language="javascript">
				alert("Pendaftaran Gagal")
			</script>
			<?php
		}  
	}
	else
	{  
	 ?>
	 	<script language="javascript">
			alert("terjadi kesalahan pada captcha");
		</script>
	 <?php  
	} 
    
}
?>

<div>
    <form action="<?php echo buat_url("pendaftaran");?>"  method="post" onsubmit="return validasiForm();" name="reg" id="form1">
        <h3>Formulir Pendaftaran</h3>
        <table id="tbl">
            <tr>                
                <td align="right">Username : </td>
                <td>
                    <input type="text" name="uname" id="uname" onBlur="checkusername()" maxlength="15" />
					<span id="usernamestatus"></span>
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
                        <optgroup label="Jawa timur">
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
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            <?php
                        }
                        ?>
                        </optgroup>
                        <optgroup label="Jabodetabek">
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
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            <?php
                        }
                        ?>
                        </optgroup>
                        <optgroup label="Jawa tengah">
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
                            
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            <?php
                        }
                        ?>
                        </optgroup>
                        <optgroup label="Daerah Istimewa Yogjakarta">
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
                            
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            <?php
                        }
                        ?>
                        </optgroup>
                        <optgroup label="Jawa Barat">
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
                            
                                <option value="<?php echo($baris["no"]);?>"><?php echo($baris["nama"]);?></option>
                            <?php
                        }
                        ?>
                        </optgroup>
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
					<img src="<?php echo url_dasar(); ?>/halaman/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" />  
					<div>  
					Input Text Above: <input type="text" name="pin" /> 
					</div>
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
