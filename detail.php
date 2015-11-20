<?php
    session_start();

    $sname = "";
    $category = "";
    $license = $_GET['license'];
    $buid = "";
    $phone_h = "";
    $phone_m = "";
    $phone_t = "";
    $img = "";
    $addr = "";
    $qrcode = "";
    $lat = 0;
    $lng = 0;

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    include("function/dbconnect.php");

    $query  = "select SNAME, CATEGORY, BUID, QRCODE, TEL, ADDR, IMG, ";
    $query .= "LAT, LNG from STORE, BEACON ";
    $query .= "where BEACON.LICENSE='".$license."'";

    $result = selectQuery($conn, $query);

    if(!$result == null){
        $sname = $result[0]['SNAME'];
        $category = $result[0]['CATEGORY'];
        $buid = $result[0]['BUID'];
        $qrcode = $result[0]['QRCODE'];
        
        $tel = $result[0]['TEL'];
        $phone_h = substr($tel, 0, 3);
        $phone_m = substr($tel, 3, 4);
        $phone_t = substr($tel, 7, 4);
        
        $addr = $result[0]['ADDR'];
        $img = "function/uploads/".$result[0]['IMG'];
        $lat = $result[0]['LAT'];
        $lng = $result[0]['LNG'];
    }

    function drawMenu($conn, $license){
        $query  = "select IMG, ITEM, PRICE from MENU where ";
        $query .= "LICENSE='".$license."'";

        $result = selectQuery($conn, $query);

        if($result != null){
            for($i=0; $i<count($result); $i++){
                echo "<tr>";

                echo "<td align=\"center\" class=\"myform\" width=\"110\" height=\"110\">";
                echo "<img src=\"function/uploads/".$result[$i]['IMG']."\" height=\"100\" width=\"100\" />";
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo $result[$i]['ITEM'];
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo $result[$i]['PRICE'];
                echo "</td>";

                echo "</tr>";
            }
            if(count($result) < 4){
                for($i=0; $i<4-count($result); $i++){
                    echo "<tr>";

                    echo "<td align=\"center\" class=\"myform\" width=\"110\" height=\"110\">";
                    echo "</td>";

                    echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                    echo "</td>";

                    echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                    echo "</td>";

                    echo "</tr>";
                }
            }
        }
        else{
            for($i=0; $i<4; $i++){
                echo "<tr>";

                echo "<td align=\"center\" class=\"myform\" width=\"110\" height=\"110\">";
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo "</td>";

                echo "</tr>";
            }
        }
    }

    function drawReview($conn, $license){
        $query  = "select GRADE, NOTE, CID, DATE from REVIEW where ";
        $query .= "LICENSE='".$license."'";

        $result = selectQuery($conn, $query);

        if($result != null){
            for($i=0; $i<count($result); $i++){
                echo "<tr>";

                echo "<td align=\"center\" width=\"50\" height=\"110\" class=\"myform\">";
                $grade = (int)$result[$i]['GRADE'];
                for($j=0; $j<$grade; $j++)
                    echo "★";
                if($grade < $result[$i]['GRADE']){
                    echo "☆";
                }
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo $result[$i]['NOTE'];
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo $result[$i]['CID'];
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo $result[$i]['DATE'];
                echo "</td>";

                echo "</tr>";
            }
            if(count($result) < 4){
                for($i=0; $i<4-count($result); $i++){
                    echo "<tr>";

                    echo "<td align=\"center\" width=\"50\" height=\"110\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                    echo "</td>";

                    echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                    echo "</td>";

                    echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                    echo "</td>";

                    echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                    echo "</td>";

                    echo "</tr>";
                }
            }
        }
        else{
            for($i=0; $i<4; $i++){
                echo "<tr>";

                echo "<td align=\"center\" width=\"50\" height=\"110\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo "</td>";

                echo "<td align=\"center\" class=\"myform\" style=\"word-break:break-all;color:#000000\">";
                echo "</td>";

                echo "</tr>";
            }
        }
    }
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUWS8lvPsNsZEn0YKRi0YReesm6-GAZDU" type="text/javascript"></script>
    <script>
    window.onload = function(){
        document.ManagerForm.lat.value=<?php echo $lat; ?>;
        document.ManagerForm.lng.value=<?php echo $lng; ?>;
        document.ManagerForm.sname.value="<?php echo $sname; ?>";
        document.ManagerForm.category.value="<?php echo $category; ?>";
        document.ManagerForm.viewlicense.value="<?php echo $license; ?>";
        document.ManagerForm.license.value="<?php echo $license; ?>";
        document.ManagerForm.buid.value="<?php echo $buid; ?>";
        document.ManagerForm.phone_h.value="<?php echo $phone_h; ?>";
        document.ManagerForm.phone_m.value="<?php echo $phone_m; ?>";
        document.ManagerForm.phone_t.value="<?php echo $phone_t; ?>";
        document.ManagerForm.addr.value="<?php echo $addr; ?>";
    }
    function initMap(){
        var myLatlng = {lat:<?php echo $lat; ?>, lng:<?php echo $lng; ?>};
 
        var map = new google.maps.Map(document.getElementById('map'),{
            zoom:15,
            center: myLatlng
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Is this your store?'
        });

        map.addListener('click', function(event){
            marker.setPosition(event.latLng);
            document.ManagerForm.lat.value=marker.getPosition().lat();
            document.ManagerForm.lng.value=marker.getPosition().lng();
        });
    }
</script>
<script type="text/javascript">
    function addMenu(){
        location.replace("menuadd.php");
    }
    function Submit(){
        var ok=true;
        if(document.ManagerForm.sname.value=='')
            ok = false;
        else if(document.ManagerForm.category.value=='')
            ok = false;
        else if(document.ManagerForm.license.value=='')
            ok = false;
        else if(document.ManagerForm.phone_h.value=='')
            ok = false;
        else if(document.ManagerForm.phone_m.value=='')
            ok = false;
        else if(document.ManagerForm.phone_t.value=='')
            ok = false;
        else if(document.ManagerForm.buid.value=='')
            ok = false;
        else if(document.ManagerForm.addr.value=='')
            ok = false;
        if(!ok)
            alert("Please fill in all forms.");
        else{
            document.ManagerForm.submit();
            return true;
        }
    }
</script>

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
                <td height="114" width="100%" style="background-image:url(images/bg.png);backg8round-repeat:repeat-x;">                    
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
                Store Manager
            </td></tr>
            
            <tr><td height="40"></td></tr>
            
        	<tr><td>
            	<form enctype="multipart/form-data" name="ManagerForm" action="function/changestore.php" method="POST" onSubmit="Submit();return false">
                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                        <tr>
                            <td height="60" width="170" class="myform" align="right">Store name</td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="sname" maxlength="20" size="15"/>
                            </td>
                            <td width="50"></td>
                            <td height="60" width="170" class="myform" align="right">Category</td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="category" maxlength="10" size="15"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">Business license</td>
                            <td width="50"></td>
                            <td>
                                <input type="text" name="viewlicense" maxlength="10" size="15" disabled/>
                                <input type="hidden" name="license"/>
                            </td>
                            <td width="50"></td>
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
                            <td height="60" width="170" class="myform" align="right">
                                Tel
                            </td>
                            <td width="50"></td>
                            <td class="myform" colspan="6">
                                <input type="text" name="phone_h" maxlength="3" size="4"/> - 
                                <input type="text" name="phone_m" maxlength="4" size="4"/> - 
                                <input type="text" name="phone_t" maxlength="4" size="4"/>
                            </td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">
                                Address
                            </td>
                            <td width="50"></td>
                            <td class="myform" colspan="5">
                                <input type="text" name="addr" size="55"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right">Image</td>
                            <td width="50"</td>
                            <td>

                                <input type="file" name="upfile" onchange="document.all.filepath.value=document.all.upfile.value;" style="display:none;"/>
                            	<input type="text" name="filepath" style="font-size:15px; height:25px; width:200px; color:#808080;" readonly/>
                            	<input type="button" value="Upload" onclick="document.all.upfile.click();" style="font-size:15px; height:26px; color:white; background-color:#74416c; border:none;" />
                            </td>
                            <td width="50"></td>
                            <td height="60" width="170" class="myform" align="right">
                                QRCode
                            </td>
                            <td width="50" colspan="3"></td>
                        </tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right"></td>
                            <td width="50"</td>
                            <td height="220">
                                <img src="<?php echo $img; ?>" width="200" height="200"/>
                            </td>
                            <td width="50"></td>
                            <td colspan="4" style="padding-left:80px;">
                                <img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&choe=UTF-8&chld=H|0&chl=<?php echo $qrcode; ?>" width="200" height="200"/>
                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="right" valign="top">
                                Location
                            </td>
                            <td width="50"></td>
                            <td id="map" height="400" width="200" colspan="5">
                                <script> initMap(); </script>
                                <input type="hidden" name="lat"/>
                                <input type="hidden" name="lng"/>
                            </td>
                            <td width="50"></td>
                        </tr>
                        <tr>
                        	<td colspan="8" height="30">
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="8" align="center">
                            	<input type="submit" value="Modify" class="mymenu" style="height:50px; width:90%; color:white; background-color:#74416c; border:none;" />
                            </td>
                        </tr>
                        <tr><td height="100"></td></tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="center" colspan="8" style="font-size:25px;">Menu</td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <table border="3" cellpadding="0" cellspacing="0" width="100%" align="center" style="border-collapse:collapse;" rules="rows" frame="hsides">
                                    <tr bgcolor="#96638e"> 
                                        <td class="myform" align="center" height="30" width="110" style="font-size:15px; color:#ffffff;">Image</td>
                                        <td class="myform" align="center" height="30" width="400" style="font-size:15px; color:#ffffff;">Item</td>
                                        <td class="myform" align="center" height="30" width="200" style="font-size:15px; color:#ffffff;">Price</td>
                                    </tr>
                                    <?php drawMenu($conn, $license); ?>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                        <tr><td colspan="8" align="right">
                            <input type="button" value="Add Menu" onclick="addMenu();" class="mymenu" style="height:50px; width:150px; color:white; background-color:#74416c; border:none;" />
                        </td></tr>
                        <tr><td height="100"></td></tr>
                        <tr>
                            <td height="60" width="170" class="myform" align="center" colspan="8" style="font-size:25px;">Review</td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <table border="3" cellpadding="0" cellspacing="0" width="100%" align="center" style="border-collapse:collapse;" rules="rows" frame="hsides">
                                    <tr bgcolor="#96638e"> 
                                        <td class="myform" align="center" height="30" width="50" style="font-size:15px; color:#ffffff;">Grade</td>
                                        <td class="myform" align="center" height="30" width="430" style="font-size:15px; color:#ffffff;">Review</td>
                                        <td class="myform" align="center" height="30" width="100" style="font-size:15px; color:#ffffff;">Writer</td>
                                        <td class="myform" align="center" height="30" width="130" style="font-size:15px; color:#ffffff;">Date</td>
                                    </tr>
                                    <?php drawReview($conn, $license); ?>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="150"></td></tr>
                    </table>
                </form>
            </td></tr>
            
        </table>
	</body>
</html>
