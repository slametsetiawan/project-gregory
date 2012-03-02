<!--<table bgcolor="#5B4FFF" 
style="border-bottom: dashed; border-left: dashed; border-right: dashed; border-top: dashed;">
        <center>
        <h2>Untuk Akses lebih lanjut harap Login dahulu</h2>
        <form id="form1" name="form1" method="post" action="cek_log.php">
      Username:
        <input name="username" type="text" />
        <br />
        Password:
        <input name="password" type="password" />
        <br />
        <br />
        <br />
        <input type="submit" name="button" id="button" value="Log In" />
        <br />
        <a href="../index.php" name="Back to Index">Back to Index</a>
        </center>
        </form>
       </table>-->
      

<form action="cek_log.php" method="post">
    <table align="center" bgcolor="#5885FA" width="500px" border="0">
    <tr>
        <td align="center" colspan="3">
        <b>ADMIN LOGIN</b><br />
        =====================================<br />
        =           <label>Username : <input type="text" name="username" /></label>         =<br/>
        =           <label>Password : <input type="password" name="password" /></label>         =<br/>
        =====================================
        </td>
    </tr>
    <tr>
        <td><a href="../">Home</a></td>
        <td align="right">
            <label></label><input type="submit" name="button" id="button" value="Log In" />
        </td>
    </tr>
    </table>
    </form>