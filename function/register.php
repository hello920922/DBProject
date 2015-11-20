<?php
    session_start();

    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        echo "<script> location.replace(\"./\"); </script>";

    else{
        if(!(strpos($_FILES['upfile']['type'], "image")!==false)){
            echo "<script> alert(\"Please upload Image file\"); </script>";
            echo "<script> history.back(); </script>";
        }

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

            $img = $buid.$license."store";

            $uploadfile = "uploads/".$img; 

            $query  = "select * form BEACON ";
            $query .= "where BUID='".$buid."' and ";
            $query .= "LICENSE='".$license."'";

            $result = selectQuery($conn, $query);
            if(!$result == null){
                echo "<script> alert(\"License or Beacon Number already exists!\"); </script>";
                echo "<script> history.back(); </script>";
            }

            $query  = "insert into STORE values(";
            $query .= "'".$license."', ";
            $query .= "'".$id."', ";
            $query .= "'".$sname."', ";
            $query .= "'".$category."', ";
            $query .= "'".$tel."', ";
            $query .= "'".$addr."', ";
            $query .= $lat.", ";
            $query .= $lng.", ";
            $query .= "'".$img."')";

            $success = executeQuery($conn, $query);

            if(!$success){
                echo "<script> alert(\"License Number already exists!\"); </script>";
                echo "<script> history.back(); </script>";
            }
            else{
                $qrcode = $buid.$license."qrcode";

                $query  = "insert into BEACON values(";
                $query .= "'".$buid."', ";
                $query .= "'".$license."', ";
                $query .= "'".$qrcode."')";
                $success = executeQuery($conn, $query);

                if(!$success){
                    echo "<script> alert(\"Beacon Number already exists!\"); </script>";
                    echo "<script> history.back(); </script>";
                }
                else{
                    if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
                    }
                    if(!move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile)){
                        echo "<script> alert(\"Upload fail....\"); </script>";
                        echo "<script> history.back(); </script>";
                    }

                    echo "<script> location.replace(\"../\"); </script>";
                }
            }
        }
    }
?>
