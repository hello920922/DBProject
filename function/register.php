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
            $sname = str_replace("'", "\\'", $_POST['name']);
            $category = str_replace("'", "\\'", $_POST['category']);
            $license = $_POST['license'];
            $tel = $_POST['phone_h'].$_POST['phone_m'].$_POST['phone_t'];
            $buid = $_POST['buid'];
            $addr = str_replace("'", "\\'", $_POST['addr']);
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];

            $img = $license."store";

            $uploadfile = "uploads/".$img; 

            $query  = "select * from BEACON ";
            $query .= "where BUID='".$buid."' or ";
            $query .= "LICENSE='".$license."'";

            $result = selectQuery($conn, $query);
            if($result != null){
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
                $qrcode = $license."qrcode";

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
                    $img_url = 'http://chart.apis.google.com/chart?cht=qr&chs=300x300&choe=UTF-8&chld=H|0&chl='.$license;
                    $img_name = basename($img_url); 
                    $content = file_get_contents($img_url); 
                    $fh = fopen("./uploads/".$qrcode, 'w'); 
                    fwrite($fh, $content); 
                    fclose($fh); 
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
