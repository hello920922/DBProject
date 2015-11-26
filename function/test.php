<?php 
    $img_url = 'http://chart.apis.google.com/chart?cht=qr&chs=300x300&choe=UTF-8&chld=H|0&chl=B1840221173078964qrcode';
    $img_name = basename($img_url); 
    $content = file_get_contents($img_url); 
    $fh = fopen("./uploads/1234546", 'w'); 
    fwrite($fh, $content); 
    fclose($fh); 
?> 
