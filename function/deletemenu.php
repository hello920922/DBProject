<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    else{
        $license = $_POST['license'];
        $item = $_POST['item'];

        include("dbconnect.php");

        $query  = "delete from MENU where LICENSE='".$license."' and ITEM='".$item."'";

        $result = executeQuery($conn, $query);

        if(!$result){
            echo "<script> alert(\"Delete Failure\"); </script>";
            echo "<script> history.back(); </script>";
        }

        echo "<script> alert(\"The menu is deleted successful\"); </script>";
        echo "<script> location.replace(\"../\"); </script>";
    }
?>
