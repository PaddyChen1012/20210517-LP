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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
<body>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner vw-100 vh-100">
            <div id='first-pic' class="carousel-item w-100 h-100 active">
                <img src="images/pic20211119.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="images/pic20211201132050.jpg" class="d-block w-100 " alt="...">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="images/pic20211201132112.jpg" class="d-block w-100 " alt="...">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="images/pic20211201132119.jpg" class="d-block w-100 " alt="...">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="images/btnpic.jpg" class="d-block w-100 " alt="...">
                <a href="https://play.google.com/store/apps/details?id=hello.tr.slot" class="position-absolute d-flex align-items-center justify-content-center font-weight-bold try-btn"><span class="h1 m-0">PLAY NOW</span></a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="display: none;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <script>
        var country ='<?=  $country  ?>';
        console.log(country);

        let firstPic = document.querySelector('.carousel-item:first-child');
        let prevBtn = document.querySelector('.carousel-control-prev');
        var callback = function (records) {
            if (firstPic.classList.contains('active')){
                prevBtn.style = 'display:none;'
            }else {
                prevBtn.style = 'display:flex;'
            }
        };
        var mo = new MutationObserver(callback);
        var options = {
            'attributeFilter': ['class']
        }
        mo.observe(firstPic, options);
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/myJS.js"></script>
</body>
</html>