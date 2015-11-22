<?
    //Connect to the database
    $host = "127.0.0.1";
    $user = "dbteam";                     //Your Cloud 9 username
    $pass = "102938";                     //Remember, there is NO password by default!
    $db = "BEST";                           //Your database name you want to connect to
    $port = 3306;                         //The port #. It is always 3306

    $conn = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());

    function selectQuery($conn, $query){
        //echo "<script> alert(\"".$query."\"); </script>";
        $result = mysqli_query($conn, $query);

        $i = 0;
        $returnarr=null;

        while($row = mysqli_fetch_assoc($result)){
             $returnarr[$i++] = $row;
        } 
        return $returnarr;
    }

    function executeQuery($conn, $query){
        //echo "<script> alert(\"".$query."\"); </script>";
        $success = mysqli_query($conn, $query);

        return $success;
    }
?>
