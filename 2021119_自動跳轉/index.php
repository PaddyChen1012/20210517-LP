<?php
$country =  $_SERVER['HTTP_CF_IPCOUNTRY'];

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FREE GAME</title>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <a href="img1.html"><div class="img"></div></a>
    <script src="js/myJs.js"></script>
    <script>
        var country ='<?=  $country  ?>';
        console.log(country);
    </script>
</body>
</html>