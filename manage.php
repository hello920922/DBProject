<?php
    session_start();

    $stores = null;

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";
    else{
        include("function/dbconnect.php");

        $id = $_SESSION['id'];

        $query  = "select NAME, PHONE, EMAIL, GENDER from OWNER ";
        $query .= "where OID='".$id."'";

        $result = selectQuery($conn, $query);

        if($result == null){
            echo "<script> alert(\"Fail to bring user information\"); </script>";
            echo "<script> history.back(); </script>";
        }
        else{
            $name = $result[0]['NAME'];
            $phone = $result[0]['PHONE'];

            $phone_h = substr($phone,0,3);
            $phone_m = substr($phone,3,4);
            $phone_t = substr($phone,7,4);

            $phone = $phone_h."-".$phone_m."-".$phone_t;

            $mail = $result[0]['EMAIL'];
            $gender = $result[0]['GENDER'];
            if(!strcmp($gender,"M"))
                $gender="Male";
            else
                $gender="Female";
        }

        $query  = "select LICENSE, IMG, CATEGORY, SNAME, ADDR from STORE where ";
        $query .= "OID='".$id."'";

        $stores = selectQuery($conn, $query);
    }

    function drawTable($stores){
        if(!$stores==null){
            for($i=0; $i<count($stores); $i++){
                $img = "function/uploads/".$stores[$i]['IMG'];
                $category = $stores[$i]['CATEGORY'];
                $sname = $stores[$i]['SNAME'];
                $addr = $stores[$i]['ADDR'];
                $license = $stores[$i]['LICENSE'];

                echo "<tr>";

                echo "<td align=\"center\" class=\"myform\" width=\"200\" height=\"110\">";
                echo "<a href=\"detail.php?license=".$license."\" target=\"_self\">";
                echo "<img src=\"".$img."\" height=\"100\" width=\"100\" />";
                echo "</a>";
                echo "</td>";
                
                echo "<td align=\"center\" class=\"myform\" width=\"250\" style=\"word-break:break-all;\">";
                echo "<a href=\"detail.php?license=".$license."\" target=\"_self\" style=\"color:#000000;\">";
                echo $sname;
                echo "</a>";
                echo "</td>";
                
                echo "<td align=\"center\" class=\"myform\" width=\"130\" style=\"word-break:break-all;\">";
                echo "<a href=\"detail.php?license=".$license."\" target=\"_self\" style=\"color:#000000;\">";
                echo $category;
                echo "</a>";
                echo "</td>";
                
                echo "<td align=\"center\" class=\"myform\" width=\"450\" style=\"word-break:break-all;\">";
                echo "<a href=\"detail.php?license=".$license."\" target=\"_self\" style=\"color:#000000;\">";
                echo $addr;
                echo "</a>";
                echo "</td>";
                
                echo "<form method=\"POST\" action=\"function/deletestore.php\" onSubmit=\"Delete();return false\"/>\r\n";
                echo "<td align=\"center\" class=\"myform\" width=\"100\" style=\"word-break:break-all;\">";
                echo "<input type=\"hidden\" name=\"license\" value=\"".$license."\"/>";
                echo "<input type=\"submit\" value=\"Delete\" style=\"font-size:15px; height:26px; color:white; background-color:#74416c; border:none;\" />";
                echo "</td>";
                echo "</form>";
                
                echo "</tr>";
            }
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beacon Store</title>
<link rel="shortcut icon" href="images/title.ico"/>
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    function Delete(){
        if(confirm("Are you sure you want to delete?")==true){
            this.submit();
            return true;
        }
    }
</script>


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
                Store List
            </td></tr>
            
            <tr><td height="40"></td></tr>

        	<tr><td width="100%">
                <table border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td class="myform" style="font-size:25px;" align="center" colspan="8">User</td>
                    </tr>
                    <tr><td height="50"></td></tr>
                    <tr>
                        <td class="myform" align="right">Name </td>
                        <td width="30"></td>
                        <td class="myform"><font color="#000000"><?php echo $name; ?></font></td>
                        <td width="30"></td>

                        <td class="myform" align="right">Gender </td>
                        <td width="30"></td>
                        <td class="myform"><font color="#000000"><?php echo $gender; ?></font></td>
                        <td width="30"></td>
                    </tr>
                    <tr><td height="30"></td></tr>
                    <tr>
                        <td class="myform" align="right">Phone </td>
                        <td width="30"></td>
                        <td class="myform" colspan="6"><font color="#000000"><?php echo $phone; ?></font></td>
                    </tr>
                    <tr><td height="30"></td></tr>
                    <tr>
                        <td class="myform" align="right">E-Mail </td>
                        <td width="30"></td>
                        <td class="myform" colspan="6"><font color="#000000"><?php echo $mail; ?></font></td>
                    </tr>
                    <tr><td height="80"></td></tr>
                    <tr>
                        <td class="myform" style="font-size:25px;" align="center" colspan="8">Store</td>
                    </tr>
                    <tr><td height="50"></td></tr>
                	<tr><td width="100%" colspan="8">
                        <table border="3" cellpadding="0" cellspacing="0" width="100%" align="center" style="border-collapse:collapse;" rules="rows" frame="hsides">
                            <tr bgcolor="#96638e">
                                <td class="myform" align="center" height="30" width="200" style="font-size:15px; color:#ffffff;">Image</td>
                                <td class="myform" align="center" width="250" style="font-size:15px; color:#ffffff;">Name</td>
                                <td class="myform" align="center" width="130" style="font-size:15px; color:#ffffff;">Category</td>
                                <td class="myform" colspan="2" align="center" width="450" style="font-size:15px; color:#ffffff;">Address</td>
                            </tr>
                            <?php drawTable($stores); ?>
                        </table>
                    </td></tr>
                </table>
            </td></tr>
        </table>
	</body>
</html>
