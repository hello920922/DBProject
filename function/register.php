<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    else{
        include("dbconnect.php");

        $id = $_SESSION['id'];
        $sname = $_POST['name'];
        $category = $_POST['category'];
        $license = $_POST['license'];
        $tel = $_POST['phone_h'].$_POST['phone_m'].$_POST['phone_t'];
        $buid = $_POST['buid'];
        $addr = $_POST['addr'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
            
        if($result == null){
            echo "<script> alert(\"Wrong password\"); ";
            echo "location.replace(\"../account.php\"); </script>";
        }
        else if(!strcmp($newpasswd,"")){
            $updatequery  = "update OWNER set ";
            $updatequery .= "NAME='".$name."', ";
            $updatequery .= "BIRTH='".$birth."', ";
            $updatequery .= "PHONE='".$phone."', ";
            $updatequery .= "EMAIL='".$mail."' where ";
            $updatequery .= "OID='".$id."'";

            executeQuery($conn, $updatequery);
            echo $updatequery;
        }
        else{
            $updatequery  = "update OWNER set ";
            $updatequery .= "NAME='".$name."', ";
            $updatequery .= "PASSWORD=password('".$newpasswd."'), ";
            $updatequery .= "BIRTH='".$birth."', ";
            $updatequery .= "PHONE='".$phone."', ";
            $updatequery .= "EMAIL='".$mail."' where ";
            $updatequery .= "OID='".$id."'";

            executeQuery($conn, $updatequery);
            echo $updatequery;
        }
    }
?>
