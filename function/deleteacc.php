<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    else{
        $id = $_POST['delid'];
        $passwd = $_POST['delpasswd'];

        include("dbconnect.php");

        $query  = "select * from OWNER ";
        $query .= "where OID='".$id."' and ";
        $query .= "PASSWORD=password('".$passwd."')";

        $result = selectQuery($conn, $query);

        if($result == null){
            echo "<script> alert(\"Wrong password\"); </script>";
            echo "<script> history.back(); </script>";
        }

        else{
            $query  = "delete from OWNER where OID='".$id."'";

            $result = executeQuery($conn, $query);

            if(!$result){
                echo "<script> alert(\"Delete Failure\"); </script>";
                echo "<script> history.back(); </script>";
            }

            echo "<script> alert(\"The account is deleted successful\"); </script>";

            session_destroy();
            echo "<script> location.replace(\"../\"); </script>";
        }
    }
?>
