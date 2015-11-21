<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    else{
        include("dbconnect.php");

        $id = $_SESSION['id'];
        $passwd = $_POST['passwd'];
        $newpasswd = $_POST['newpasswd'];
        $name = $_POST['name'];
        $birth = $_POST['person_h'];
        $mail = $_POST['mail_h']."@".$_POST['mail_t'];
        $phone = $_POST['phone_h'].$_POST['phone_m'].$_POST['phone_t'];

        $selectquery = "select BIRTH, GENDER, PHONE, EMAIL from OWNER where OID='".$id."' and PASSWORD=password('".$passwd."')";
        $result = selectQuery($conn, $selectquery);

        if($result == null){
            echo "<script> alert(\"Wrong password\"); ";
        }
        else if(!strcmp($newpasswd,"")){
            $updatequery  = "update OWNER set ";
            $updatequery .= "NAME='".$name."', ";
            $updatequery .= "BIRTH='".$birth."', ";
            $updatequery .= "PHONE='".$phone."', ";
            $updatequery .= "EMAIL='".$mail."' where ";
            $updatequery .= "OID='".$id."'";

            executeQuery($conn, $updatequery);
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
        }
        echo "location.replace(\"../account.php\"); </script>";
    }
?>
