<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    else{
        if(!(strpos($_FILES['upitem']['type'], "image")!==false)){
            echo "<script> alert(\"Please upload Image file\"); </script>";
            echo "<script> history.back(); </script>";
        }

        else{
            include("dbconnect.php");

            $item = $_POST['item'];
            $price = $_POST['price'];
            $buid = $_POST['buid'];
            $license = $_POST['license'];

            $img = $buid.$license.$item;

            $uploadfile = "uploads/".$img; 

            $query  = "insert into MENU values(";
            $query .= "'".$license."', ";
            $query .= "'".$item."', ";
            $query .= $price.", ";
            $query .= "'".$img."')";

            $success = executeQuery($conn, $query);

            if(!$success){
                echo "<script> alert(\"The Item is already exists!\"); </script>";
                echo "<script> history.back(); </script>";
            }
            else{
                if(is_uploaded_file($_FILES['upitem']['tmp_name'])){
                }
                if(!move_uploaded_file($_FILES['upitem']['tmp_name'], $uploadfile)){
                    echo "<script> alert(\"Upload fail....\"); </script>";
                    echo "<script> history.back(); </script>";
                }

                echo "<script> location.replace(\"../detail.php?license=".$license."\"); </script>";
            }
        }
    }
?>
