<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beacon Store</title>
<link rel="shortcut icon" href="images/title.ico"/>
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
</head>
	<body>
    <font color="#900090">
    	<table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr height="114">
                <td height="114" width="100%" style="background-image:url(images/bg.png);background-repeat:repeat-x;">                    
                	<table width="100%" height="90" cellpadding="0" cellspacing="0" border="0">
                    <tr>
	                    <td width="20%" align="center" class="mymenu">
                        	<a href="function/signout.php" target="_self" class="mymenu">Sign out</a>
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        	<a href="account.php" target="_self" class="mymenu">My Account</a>
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        	<a href="./" target="_self"><img src="images/logo.png" width="108" height="58"/></a>
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        	<a href="register.php" target="_self" class="mymenu">Register</a>
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        	<a href="manage.php" target="_self" class="mymenu">Manage</a>
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
        	<tr><td height="100"></td></tr>
        
            <tr><td align="center" class="mytitle">
                Register Store
            </td></tr>
            
            <tr><td height="40"></td></tr>
            
        	<tr><td>
            	<form action="REGISTER PROCESS" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                        <tr>
                            <td height="60" width="170" class="myform" align="right">Store name</td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="name" maxlength="20" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">Category</td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="category" maxlength="20" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">Business license</td>
                            <td width="50"></td>
                          <td>
                                <input type="text" name="stno" maxlength="10" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Tel
                            </td>
                            <td width="50"></td>
                            <td class="myform">
                                <input type="text" name="phone_h" maxlength="3" size="4"/> - 
                                <input type="text" name="phone_m" maxlength="4" size="4"/> - 
                                <input type="text" name="phone_t" maxlength="4" size="4"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Beacon ID
                            </td>
                            <td width="50"></td>
                            <td class="myform">
                                <input type="text" name="buid" maxlength="15" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" height="30">
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="4" align="center">
                            	<input type="submit" value="Register" class="mymenu" style="height:50px; width:95%; color:white; background-color:#74416c; border:none;" />
                            </td>
                        </tr>
                    </table>
                </form>
            </td></tr>
            
        </table>
	</body>
</html>
