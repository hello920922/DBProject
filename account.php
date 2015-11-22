<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    else{
        include("function/dbconnect.php");

        $id = $_SESSION['id'];
        $name = $_SESSION['name'];
        
        $result = selectQuery($conn, "select BIRTH, GENDER, PHONE, EMAIL from OWNER WHERE OID='".$id."'");
        $user = $result[0];

        $birth = $user['BIRTH'];
        $gender = $user['GENDER'];
        $phone = $user['PHONE'];
        $mail = $user['EMAIL'];

        $phone_h = substr($phone, 0, 3);
        $phone_m = substr($phone, 3, 4);
        $phone_t = substr($phone, 7, 4);

        $mailtok = explode("@",$mail);
        $mail_h = $mailtok[0];
        $mail_t = $mailtok[1];
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beacon Store</title>
<link rel="shortcut icon" href="images/title.ico"/>
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
</head>

<script>    
    window.onload = function(){
        document.ChangeForm.viewid.value="<?php echo $id; ?>";
        document.ChangeForm.name.value="<?php echo $name; ?>"; 
        document.ChangeForm.person_h.value="<?php echo $birth; ?>";
        document.ChangeForm.person_t.value="*******";
        document.ChangeForm.gender.value="<?php echo $gender; ?>";
        document.ChangeForm.phone_h.value="<?php echo $phone_h; ?>";
        document.ChangeForm.phone_m.value="<?php echo $phone_m; ?>";
        document.ChangeForm.phone_t.value="<?php echo $phone_t; ?>";
        document.ChangeForm.mail_h.value="<?php echo $mail_h; ?>";
        document.ChangeForm.mail_t.value="<?php echo $mail_t; ?>";
    }
</script>

<script type="text/javascript">

    function Submit(){
        var ok=true;
        if(document.ChangeForm.passwd.value=='')
            ok = false;
        else if(document.ChangeForm.name.value=='')
            ok = false;
        else if(document.ChangeForm.person_h.value=='')
            ok = false;
        else if(document.ChangeForm.phone_h.value=='')
            ok = false;
        else if(document.ChangeForm.phone_m.value=='')
            ok = false;
        else if(document.ChangeForm.phone_t.value=='')
            ok = false;
        else if(document.ChangeForm.mail_h.value=='')
            ok = false;
        else if(document.ChangeForm.mail_t.value=='')
            ok = false;
        if(!ok){
            alert("Please fill in all forms.");
        }
        else if(document.ChangeForm.repeat.value != document.ChangeForm.newpasswd.value){
            alert("The Repeat password does not match!");
            ok = false;
        }
        if(ok){
            document.ChangeForm.submit();
            return true;
        }
    }

    function deleteAccount(){
        if(document.ChangeForm.passwd.value==''){
            alert("Please input password");
            return;
        }
        if(confirm("Are you sure you want to delete?") == true){
            document.DeleteForm.delpasswd.value = document.ChangeForm.passwd.value;
            document.DeleteForm.delid.value = "<?php echo $id; ?>";
            document.DeleteForm.submit();
        }
    }

</script>

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
                My Account
            </td></tr>
            
            <tr><td height="40"></td></tr>
            
        	<tr><td>
                    <table cellpadding="0" cellspacing="0" border="0" align="center">
            	        <form name="ChangeForm" action="function/changeacc.php" method="POST" onSubmit="Submit();return false">
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                ID
                            </td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="viewid" size="15" disabled/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Password 
                            </td>
                            <td width="50"></td>
                            <td>
                                <input type="password" name="passwd" maxlength="15" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                New Password
                            </td>
                            <td width="50"></td>
                            <td>
                                <input type="password" name="newpasswd" maxlength="15" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Repeat 
                            </td>
                            <td width="50"></td>
                            <td>
                                <input type="password" name="repeat" maxlength="15" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Name
                            </td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="name" maxlength="30" size="15" />
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Personal Number
                            </td>
                            <td width="50"></td>
                            <td height="60" class="myform">
                                <table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0"><tr>
                                <td width="92">
                                    <input type="text" name="person_h" maxlength="6" size="6" />
                                </td>
                                <td> - </td>
                                <td>
                                    <input type="password" name="person_t" maxlength="7" size="7" disabled />
                                </td>
                                </tr></table>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Gender
                            </td>
                            <td width="50"></td>
                            <td class="myform">
                                <label><input type="radio" name="gender" value="M" disabled />Male</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="gender" value="F" disabled />Female</label>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Phone
                            </td>
                            <td width="50"></td>
                            <td class="myform">
                                <input type="text" name="phone_h" maxlength="3" size="3" /> - 
                                <input type="text" name="phone_m" maxlength="4" size="4" /> - 
                                <input type="text" name="phone_t" maxlength="4" size="4" />
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                E-mail
                            </td>
                            <td width="50"></td>
                            <td class="myform">
                                <input type="text" name="mail_h" maxlength="15" size="15"/> @ 
                                <select name="mail_t">
                                    <option value="">Choose Email</option>
                                    <option value="naver.com">naver.com</option>
                                    <option value="hanmail.net">hanmail.net</option>
                                    <option value="gmail.com">gmail.com</option>
                                    <option value="nate.com">nate.com</option>
                                    <option value="dreamwiz.com">dreamwiz.com</option>
                                    <option value="korea.com">korea.com</option>
                                    <option value="outlook.com">outlook.com</option>
								</select>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" height="30">
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="4" align="center">
                            	<input type="submit" value="Save Changes" class="mymenu" style="height:50px; width:95%; color:white; background-color:#74416c; border:none;" />
                            </td>
                        </tr>
                        </form>
                        <tr><td height="10"></td></tr>
                        <tr>
                        	<td colspan="4" align="center">
                                <form name="DeleteForm" method="POST" action="function/deleteacc.php">
                                <input type="hidden" name="delpasswd"/><input type="hidden" name="delid"/>
                                <input type="button" onclick="deleteAccount();" value="Delete Account" class="mymenu" style="height:50px; width:95%; color:white; background-color:#74416c; border:none;" />
                                </form>
                            </td>
                        </tr>
                        <tr><td height="60"></td></tr>
                    </table>
            </td></tr>
            
        </table>
	</body>


</html>
