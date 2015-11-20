<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beacon Store</title>
<link rel="shortcut icon" href="images/title.ico"/>
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
</head>

<script type="text/javascript">

    function Submit(){
        var ok=true;
        if(document.SignupForm.id.value=='')
            ok = false;
        else if(document.SignupForm.passwd.value=='')
            ok = false;
        else if(document.SignupForm.repeat.value=='')
            ok = false;
        else if(document.SignupForm.name.value=='')
            ok = false;
        else if(document.SignupForm.person_h.value=='')
            ok = false;
        else if(document.SignupForm.person_t.value=='')
            ok = false;
        else if(document.SignupForm.phone_h.value=='')
            ok = false;
        else if(document.SignupForm.phone_m.value=='')
            ok = false;
        else if(document.SignupForm.phone_t.value=='')
            ok = false;
        else if(document.SignupForm.mail_h.value=='')
            ok = false;
        else if(document.SignupForm.mail_t.value=='')
            ok = false;
        if(!ok){
            alert("Please fill in all forms.");
        }
        else if(document.SignupForm.repeat.value != document.SignupForm.passwd.value){
            alert("The Repeat password does not match!");
            ok = false;
        }
        if(ok){
            document.SignupForm.submit();
            return true;
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
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        	<a href="./" target="_self"><img src="images/logo.png" width="108" height="58"/></a>
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
        	<tr><td height="100"></td></tr>
        
            <tr><td align="center" class="mytitle">
                Sign up
            </td></tr>
            
            <tr><td height="40"></td></tr>
            
        	<tr><td>
            	<form name="SignupForm" action="function/signup.php" method="POST" onSubmit="Submit();return false">
                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                ID
                            </td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="id" size="15"/>
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
                                <input type="text" name="name" maxlength="30" size="15"/>
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
                                    <input type="text" name="person_h" maxlength="6" size="6"/>
                                </td>
                                <td> - </td>
                                <td>
                                    <input type="password" name="person_t" maxlength="7" size="7"/>
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
                                <label><input type="radio" name="gender" value="M" />Male</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="gender" value="F" />Female</label>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Phone
                            </td>
                            <td width="50"></td>
                            <td class="myform">
                                <input type="text" name="phone_h" maxlength="3" size="3"/> - 
                                <input type="text" name="phone_m" maxlength="4" size="4"/> - 
                                <input type="text" name="phone_t" maxlength="4" size="4"/>
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
                                    <option value="naver">naver.com</option>
                                    <option value="daum">hanmail.net</option>
                                    <option value="gmail">gmail.com</option>
                                    <option value="nate">nate.com</option>
                                    <option value="dreamwiz">dreamwiz.com</option>
                                    <option value="korea">korea.com</option>
                                    <option value="outlook">outlook.com</option>
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
                            	<input type="submit" value="Sign up" class="mymenu" style="height:50px; width:95%; color:white; background-color:#74416c; border:none;" />
                            </td>
                        </tr>
                    </table>
                </form>
            </td></tr>
            
        </table>
	</body>
</html>
