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

        $uploaddir = '/var/www/uploads/';
        $uploadfile = $uploaddir.basename($_FILES['upfile']['name']);

        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            echo "Upload filename : ".$_FILES['upfile']['name']."<br>";
            echo "Upload filesize : ".$_FILES['upfile']['size']."<br>";
            echo "Upload file MIME type : ".$_FILES['upfile']['type']."<br>";
            echo "TEMP FILE : ".$_FILES['upfile']['tmp_name']."<br>";
        }
        if(move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile)){
            echo "<script> alert(\"Upload success!\"); </script>";
        }
        print_r($_FILES);
        echo "hello";
       /* 
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
        }*/
    }
?>
