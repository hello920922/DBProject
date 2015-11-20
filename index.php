<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beacon Store</title>
<link rel="shortcut icon" href="images/title.ico"/>
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
</head>

<?php
    session_start();

    $index="manage.php";
    if(!isset($_SESSION['id']) || !isset($_SESSION['name']))
        $index="signin.php";
?>

<frameset rows="*" cols="*" frameborder="no" border="0"> 
    <frame src="<?php echo $index; ?>" />
</frameset>
</html>
