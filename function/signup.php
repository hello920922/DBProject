<?php
    $id = $_POST['id'];
    $passwd = $_POST['passwd'];
    $name = $_POST['name'];
    $birth = $_POST['person_h'];
    $personno = $_POST['person_t'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone_h'].$_POST['phone_m'].$_POST['phone_t'];
    $mail = $_POST['mail_h']."@".$_POST['mail_t'];

    include('dbconnect.php');

    $query = "insert into OWNER values(";
    $query .= "'".$id."', ";
    $query .= "password('".$passwd."'), ";
    $query .= "'".$name."', ";
    $query .= "'".$birth."', ";
    $query .= "password('".$personno."'), ";
    $query .= "'".$gender."', ";
    $query .= "'".$phone."', ";
    $query .= "'".$mail."')";

    $success = executeQuery($conn, $query);
    if(!$success){
        echo "<script> alert(\"The id already exist!\"); </script>";
        echo "<script> location.back(); </script>";
    }
    else{
        echo "<script> location.replace('../'); </script>";

        session_start();

        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
    }
?>
