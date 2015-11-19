<?php
    $id = $_POST['id'];
    $passwd = $_POST['passwd'];

    include('dbconnect.php');

    $query = "select OID, NAME from OWNER WHERE ";
    $query .= "OID='".$id."' and ";
    $query .= "PASSWORD=password('".$passwd."')";

    /*
    echo "<script> alert(\"";

    echo $query;
        
    echo "\"); </script> ";
     */

    $result = selectQuery($conn, $query);

    if($result == null){
        echo "<script> alert(\"";
        echo "Login Failure";
        echo "\"); </script> ";
    }
    else{
        $id = $result[0]['OID'];
        $name = $result[0]['NAME'];

        session_start();

        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
    }

    echo "<script> location.replace(\"../\"); </script>";
?>
