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
    <style>
        *{margin: 0;padding: 0;box-sizing: border-box;}
        .img{
            width: 100vw;
            height: 100vh;
            background: url(images/pic20211119.jpg) no-repeat center/cover;
        }
    </style>
</head>
<body>
    <div class="img"></div>
    <script src="myJs.js"></script>
    <script>
        var country ='<?=  $country  ?>';
            console.log(country);
    </script>
</body>
</html>