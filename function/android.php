<?php
    $func = $_POST['func'];
    if(!strcmp($func,"signin")){
        include("dbconnect.php");
        $cid = $_POST['cid'];
        $passwd = $_POST['passwd'];

        $query  = "select * from CUSTOMER where ";
        $query .= "CID='".$cid."' and ";
        $query .= "PASSWORD='".$passwd."'";

        $result = selectQuery($conn,$query);
        if($result != null){
            echo $result[0]['NAME'];
            exit;
        }
    }  
    else if(!strcmp($func,"history")){
        include("dbconnect.php");

        $cid = $_POST['cid'];

        $query  = "select SNAME, GRADE, NOTE, DATE, STORE.LICENSE from REVIEW, STORE where ";
        $query .= "CID='".$cid."' and ";
        $query .= "REVIEW.LICENSE=STORE.LICENSE";

        $result = selectQuery($conn,$query);
        if($result != null){
            $length = count($result);

            for($i=0; $i<$length; $i++){
                echo $result[$i]['SNAME'].",";
                echo $result[$i]['GRADE'].",";
                echo $result[$i]['NOTE'].",";
                echo $result[$i]['DATE'].",";
                echo $result[$i]['LICENSE']."/";
            }

            exit;
        }
    }
    else if(!strcmp($func,"signup")){
        include("dbconnect.php");

        $cid = $_POST['id'];
        $passwd = $_POST['passwd'];
        $name = $_POST['name'];
        $birth = $_POST['birth'];
        $personno = $_POST['personNo'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query  = "insert into CUSTOMER values(";
        $query .= "'".$cid."', ";
        $query .= "'".$passwd."', ";
        $query .= "'".$name."', ";
        $query .= "'".$birth."', ";
        $query .= "'".$personno."', ";
        $query .= "'".$gender."', ";
        $query .= "'".$phone."', ";
        $query .= "'".$email."')";

        $result = executeQuery($conn, $query);

        if($result){
            echo "SUCCESS";
            exit;
        }
    }
    else if(!strcmp($func,"storereview")){
        include("dbconnect.php");

        $license = $_POST['license'];

        $query .= "select SNAME, ADDR, IMG, LAT, LNG from STORE where ";
        $query .= "LICENSE='".$license."'";

        $store = selectQuery($conn, $query);

        if($store==null){
            echo "ERROR";
            exit;
        }
        echo $store[0]['SNAME'].",";
        echo $store[0]['ADDR'].",";
        echo $store[0]['IMG'].",";
        echo $store[0]['LAT'].",";
        echo $store[0]['LNG']."/nextResult/";

        $query  = "select IMG, ITEM, PRICE from MENU where ";
        $query .= "LICENSE='".$license."'";

        $menu = selectQuery($conn, $query);
        if($menu!=null){
            $length = count($menu);
            for($i=0; $i<$length; $i++){
                echo $menu[$i]['IMG'].",";
                echo $menu[$i]['ITEM'].",";
                echo $menu[$i]['PRICE']."/";
            }
        }
        echo "/nextResult/";

        $query  = "select GRADE, NOTE, CID, DATE from REVIEW where ";
        $query .= "LICENSE='".$license."'";

        $review = selectQuery($conn, $query);
        if($review!=null){
            $length = count($review);
            for($i=0; $i<$length; $i++){
                echo $review[$i]['GRADE'].",";
                echo $review[$i]['NOTE'].",";
                echo $review[$i]['CID'].",";
                echo $review[$i]['DATE']."/";
            }
        }
        exit;
    }
    else if(!strcmp($func,"menudetail")){
        include("dbconnect.php");
        $item = $_POST['item'];
        $license = $_POST['license'];

        $query  = "select SNAME, PRICE, MENU.IMG from MENU, STORE where ";
        $query .= "MENU.LICENSE='".$license."' and ";
        $query .= "ITEM='".$item."' and ";
        $query .= "MENU.LICENSE=STORE.LICENSE";


        $result = selectQuery($conn, $query);
        if($result!=null){
            echo $result[0]['SNAME'].",";
            echo $result[0]['PRICE'].",";
            echo $result[0]['IMG'];
            exit;
        }
    }
    else if(!strcmp($func,"reviewdetail")){
        include("dbconnect.php");

        $cid = $_POST['cid'];
        $license = $_POST['license'];

        $query  = "select SNAME, ADDR, GRADE, NOTE, DATE ";
        $query .= "from REVIEW, STORE where ";
        $query .= "CID='".$cid."' and ";
        $query .= "REVIEW.LICENSE='".$license."' and ";
        $query .= "REVIEW.LICENSE=STORE.LICENSE";

        $result = selectQuery($conn, $query);
        if($result!=null){
            echo $result[0]['SNAME'].",";
            echo $result[0]['ADDR'].",";
            echo $result[0]['GRADE'].",";
            echo $result[0]['NOTE'].",";
            echo $result[0]['DATE'];
            exit;
        }
    }
    else if(!strcmp($func,"morereview")){
        include("dbconnect.php");
        $license = $_POST['license'];

        $query  = "select SNAME from STORE where ";
        $query .= "LICENSE='".$license."'";

        $store = selectQuery($conn, $query);
        if($store!=null){
            $query  = "select GRADE, NOTE, CID, DATE from REVIEW where ";
            $query .= "LICENSE='".$license."'";

            $review = selectQuery($conn, $query);
            if($review!=null){
                echo $store[0]['SNAME']."/nextResult/";
                $length = count($review);
                for($i=0; $i<$length; $i++){
                    echo $review[$i]['GRADE'].",";
                    echo $review[$i]['NOTE'].",";
                    echo $review[$i]['CID'].",";
                    echo $review[$i]['DATE']."/";
                }
                exit;
            }
        }
    }
    else if(!strcmp($func,"account")){
        include("dbconnect.php");
        $cid = $_POST['cid'];

        $query  = "select NAME, BIRTH, GENDER, PHONE, EMAIL from ";
        $query .= "CUSTOMER where ";
        $query .= "CID='".$cid."'";

        $result = selectQuery($conn, $query);
        if($result!=null){
            echo $result[0]['NAME'].",";
            echo $result[0]['BIRTH'].",";
            echo $result[0]['GENDER'].",";
            echo $result[0]['PHONE'].",";
            echo $result[0]['EMAIL'];
        }
        exit;
    }
    else if(!strcmp($func,"changeacc")){
        include("dbconnect.php");

        $cid = $_POST['cid'];
        $passwd = $_POST['passwd'];
        $name = $_POST['name'];
        $birth = $_POST['birth'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $newpasswd = $_POST['newpasswd'];

        $query  = "select * from CUSTOMER where ";
        $query .= "CID='".$cid."' and PASSWORD='".$passwd."'";

        $result = selectQuery($conn, $query);
        if($result==null){
            echo "WRONG";
            exit;
        }

        $query  = "update CUSTOMER set ";
        $query .= "NAME='".$name."', ";
        $query .= "BIRTH='".$birth."', ";
        $query .= "PHONE='".$phone."', ";

        if($newpasswd!=null){
            $query .= "PASSWORD='".$newpasswd."', ";
        }

        $query .= "EMAIL='".$email."' where ";
        $query .= "CID='".$cid."'";

        $result = executeQuery($conn, $query);

        if($result){
            echo "SUCCESS";
            exit;
        }
    }
    else if(!strcmp($func,"deleteacc")){
        include("dbconnect.php");

        $cid = $_POST['cid'];
        $passwd = $_POST['passwd'];

        $query  = "select * from CUSTOMER where ";
        $query .= "CID='".$cid."' and PASSWORD='".$passwd."'";

        $result = selectQuery($conn, $query);
        if($result==null){
            echo "WRONG";
            exit;
        }

        $query  = "delete from CUSTOMER where ";
        $query .= "CID='".$cid."'";

        $result = executeQuery($conn, $query);

        if($result){
            echo "SUCCESS";
            exit;
        }
    }
    echo "ERROR";
?>
