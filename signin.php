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
        if(document.SigninForm.id.value=='')
            ok = false;
        else if(document.SigninForm.passwd.value=='')
            ok = false;
        if(ok){
            document.SigninForm.submit();
            return true;
        }
        else
            alert("양식을 모두 작성해주세요.");
    }


    function Signup(){
        location.href="signup.php";
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
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        </td>
	                    <td width="20%" align="center" class="mymenu">
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
        	<tr><td height="200"></td></tr>

            <tr><td height="303" width="100%" align="center">
                <img src="images/MainLogo.jpg" height="303" width="515"/>
            </td></tr>
            <tr>
            <td height="150" width="100%" align="center">
                <form name="SigninForm" action="function/signin.php" method="post" onSubmit="Submit();return false">
                <table height="150" width="515" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <tr><td height="40" width="100%" colspan="2" align="center">
                        <table height="40" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td height="40" width="25%" class="myform" align="right">
                                ID 
                            </td>
                            <td height="40" width="75%" align="center">
                                <input type="text" name="id" style="height:30px; width:80%;" />
                            </td>
                        </tr>

                        <tr>
                            <td height="40" width="25%" class="myform" align="right">
                                PASSWORD 
                            </td>
                            <td height="40" width="75%" align="center">
                                <input type="password" name="passwd" style="height:30px; width:80%;" />
                            </td>
                        </tr>
                        </table>
                    </td></tr>

                    <td height="70" width="50%" align="center">
                        <input type="submit" value="Sign in" class="mymenu" style="height:40px; width:90%; color:white; background-color:#74416c; border:none;" />
                    </td>

                    <td height="70" width="50%" align="center">
                        <input type="button" onclick="Signup();" value="Sign up" class="mymenu" style="height:40px; width:90%; color:white; background-color:#74416c; border:none;" />
                    </td>
                </tr>
                </table>
                </form>
            </td>
            </tr>

        </table>
	</body>
</html>
