<?php
session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
    echo "<script> location.replace(\"./\"); </script>";
else{
    if(strcmp($_FILES['upfile']['name'],"")){
        if(!(strpos($_FILES['upfile']['type'], "image")!==false)){
            echo "<script> alert(\"Please upload Image file\"); </script>";
            echo "<script> history.back(); </script>";
        }
    }

    include("dbconnect.php");
    $sname = $_POST['sname'];
    $category = $_POST['category'];
    $license = $_POST['license'];
    $buid = $_POST['buid'];
    $tel = $_POST['phone_h'].$_POST['phone_m'].$_POST['phone_t'];
    $addr = $_POST['addr'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    $img = $buid.$license."store";

    $uploadfile = "uploads/".$img; 

    $query  = "update STORE set ";
    $query .= "SNAME='".$sname."', ";
    $query .= "CATEGORY='".$category."', ";
    $query .= "TEL='".$tel."', ";
    $query .= "ADDR='".$addr."', ";
    $query .= "LAT=".$lat.", ";
    $query .= "LNG=".$lng.", ";
    $query .= "IMG='".$img."' ";
    $query .= "where LICENSE='".$license."'";

    $success = executeQuery($conn, $query);

    if(!$success){
        echo "<script> alert(\"Modify Failure\"); </script>";
        echo "<script> history.back(); </script>";
    }
    else{
        $qrcode = $buid.$license."qrcode";

        $query  = "update BEACON set ";
        $query .= "BUID='".$buid."', ";
        $query .= "QRCODE='".$qrcode."' ";
        $query .= "where LICENSE='".$license."'";

        $success = executeQuery($conn, $query);

        if(!$success){
            echo "<script> alert(\"Modify Failure\"); </script>";
            echo "<script> history.back(); </script>";
        }
        else{
            if(strcmp($_FILES['upfile']['name']."","")){
                if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
                }
                if(!move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile)){
                    echo "<script> alert(\"Upload fail....\"); </script>";
                    echo "<script> history.back(); </script>";
                }
            }
            echo "<script> location.replace(\"../detail.php?license=".$license."\"); </script>";
        }
    }
}
?>
