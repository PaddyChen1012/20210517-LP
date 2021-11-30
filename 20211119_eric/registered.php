<script src="https://bundle.run/buffer"></script>
<script src="https://cdn.jsdelivr.net/npm/@oslab/btoa@0.1.0/browser-btoa.min.js"></script>

<?php
function send_data($url, $data )
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return json_decode($output, true);
}
	
$data_captcha = send_data(
	$url = 'https://www.pay69slot.com/service/auth/captcha?t=' . time(),
    $data = [
    ]
);
$captcha_data = $data_captcha['data']['captcha']['data'];
$captcha_json = json_encode($captcha_data);
$captcha = $data_captcha['data']['captchaUid'];

$agentId = @$_GET['pid'];

if ($agentId== '') {
    $agentShortName = '';
}else{
    $agentShortName = $agentId;
}
// echo $agentId;

$dataCheck = true;
if (isset($_POST['username']) && strlen($_POST['username']) > 0){
    $plen=strlen($_POST['username']);
    if(!preg_match("/^[0-9a-zA-Z]+$/",$_POST['username'])||$plen<3||$plen>15){
        $name_Vf = 'ดำเนินการไม่สำเร็จ – ชื่อบัญชีควรประกอบด้วยตัวอักษรภาษาอังกฤษและตัวเลขที่มีความยาว 3-15 ตัวอักษร';
    }    
	$data['username'] = $_POST['username'];
}
else{
	$dataCheck = false;
	$erro_name = 'กรุณาพิมพ์ตัวอักษรภาษาอังกฤษและตัวเลขที่มีความยาว 3-15 ตัว';
}

if (isset($_POST['pwd']) && strlen($_POST['pwd']) > 0){
	$data['pwd'] = $_POST['pwd'];
    $data['pwdConfirm'] = $_POST['pwd'];
    $plen=strlen($_POST['pwd']);
    if (!preg_match("/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i", $_POST['pwd'])||$plen<6||$plen>15) {
        $pwd_Vf = 'ดำเนินการไม่สำเร็จ – รหัสผ่านควรประกอบด้วยอักษรภาษาอังกฤษและตัวเลขที่มีความยาว 6-15 ตัวอักษร';
    }

}
else{
	$dataCheck = false;
	$erro_pwd = 'ต้องมีความยาว 6-15 ตัวอักษร ควรเป็นอักษรภาษาอังกฤษและตัวเลข ';
}

if (isset($_POST['phoneNumber']) && strlen($_POST['phoneNumber']) > 0){
	$data['phoneNumber'] = $_POST['phoneNumber'];
    $plen=strlen($_POST['phoneNumber']);
    if (!preg_match("/^()[0-9]*$/i", $_POST['phoneNumber'])||$plen<10||$plen>10) {
        $phone_Vf = 'ดำเนินการไม่สำเร็จ – เบอร์โทรศัพท์ควรเป็นตัวเลข 10 หลัก';
    }

}
else{
	$dataCheck = false;
	$erro_phone = 'เบอร์โทรศัพท์ควรต้องมี 10 ตัวเลข';
}

if (isset($_POST['captcha']) && strlen($_POST['captcha']) > 0){
	$data['captcha'] = $_POST['captcha'];
}
else{
	$dataCheck = false;
	$erro_Vf = 'กรุณาใส่ [รหัสยืนยัน]';
}

if (isset($_POST['captchaUid']) && strlen($_POST['captchaUid']) > 0){
	$data['captchaUid'] = $_POST['captchaUid'];
    $data['agentShortName'] = $_POST['agentShortName'];
}
else{
	$dataCheck = false;
	// echo "請輸入 captchaUid <br />";
}



#確認所有欄位都經過驗證，再送資料給ocms-api
if ($dataCheck) {
    $data_list = send_data($url = 'https://www.pay69slot.com/service/member', $data);
}
// echo '<pre>';
// print_r($data);
// echo '</pre>';

// echo '<pre>';
// print_r($data_list);
// echo '</pre>';
?>

<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="icon" href="images/pay69_circle.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/pay69_circle.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/Custom.css">
    <title>Registration page</title>
    <!-- START ExoClick Goal Tag | 2021BC_Register -->
    <script type="application/javascript" src="https://a.exoclick.com/tag_gen.js" data-goal="77c7abe99494401c6747160510290996"></script>
    <!-- END ExoClick Goal Tag | 2021BC_Register -->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){
            if(f.fbq)return;
            n=f.fbq=function(){
                n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)
            };
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)
        }
        (window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '579279866679710');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=579279866679710&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body>
    <div class="title position-fixed d-flex justify-content-between w-100 bg-black-50 p-2 z-1">
        <div class="h-100">
            <a href="https://www.pay69slot.com/?pid=LPpage2&utm_source=BCLP&utm_medium=Ad&utm_campaign=Logo" target="_blank"><img src="images/pay69.png" class="h-100" alt=""></a>
            <span class="d-inline-flex align-items-center h5 text-light title-word m-0 ml-2">Pay69Slotเว็บคาสิโนออนไลน์ที่รู้ใจผู้เล่นมากที่สุด</span>
        </div>
        <div class="h-100 d-flex align-items-center ">
            <a class="btn-c d-flex align-items-center justify-content-center px-3 py-2 h-100 mr-2" href="https://www.pay69slot.com/?pid=LPpage2&utm_source=BCLP&utm_medium=Ad&utm_campaign=login">เข้าสู่ระบบ</a>
            <a class="btn-c d-flex align-items-center justify-content-center px-3 py-2 h-100" href="index.html"><img src="images/home-b.png" class="h-100" alt=""><t class="pc-only ml-2">หน้าหลัก</t></a>
        </div>
    </div>
    <div class="container-fluid main-place p-0">
        <!-- First Page -->
        <div class="row w-100 mx-auto align-items-end justify-content-center align-items-md-center" style="background:url(images/1200x500-BG.jpg)no-repeat center/cover;">
            <div class="col-12 col-md-5 position-relative p-0 mx-auto">
                <div class="title"></div>
                <div class="position-relative">
                    <img src="images/text.png" class="w-100" alt="">
                </div>
            </div>
        </div>
        <div class="row position-relative w-100 mx-auto align-items-end justify-content-center align-items-md-center py-5 mb-0">
            <div class="bg-box position-absolute w-100 h-100"></div>
            <form  class="col-11 col-md-10 row position-relative w-100 mx-auto data-box py-4 px-0 bg-white-50" method="post">
                <div class="col-12 h1 text-center main-word">สมัคร</div>
                <div class="col-12 col-md-6">
                    <span class="d-block w-100 my-2 h3">ยูสเซอร์：</span>
                    <input type="text" name="username" placeholder="กรุณาใส่ชื่อผู้ใช้" maxlength="16" autocomplete="off" class="form-input w-100">
                    <!-- 帳號格式錯誤或沒輸入 -->
                    <div class="waring"><?php echo @$name_Vf; echo @$erro_name; ?></div>
                </div>
                <div class="col-12 col-md-6">
                    <span class="d-block w-100 my-2 h3">รหัสผ่าน：</span>
                    <input type="password" name="pwd" placeholder="กรุณาใส่รหัสผ่าน" maxlength="16" autocomplete="off" class="form-input w-100">
                    <!-- 密碼格式錯誤或沒輸入 -->
                    <div class="waring"><?php echo @$pwd_Vf; echo @$erro_pwd; ?></div>
                </div>
                <div class="col-12 col-md-6">
                    <span class="d-block w-100 my-2 h3">เบอร์โทรศัพท์มือถือ：</span>
                    <input type="text" name="phoneNumber" placeholder="กรุณาใส่เบอร์โทรศัพท์มือถือ" maxlength="16" autocomplete="off" class="form-input w-100">
                    <!-- 手機格式錯誤或沒輸入 -->
                    <div class="waring"><?php echo @$phone_Vf; echo @$erro_phone; ?></div>
                </div>
                <div class="col-12 col-md-6">
                    <span class="d-block w-100 my-2 h3">รหัสยืนยัน：</span>
                    <input type="text" name="captcha" placeholder="รหัสยืนยัน" maxlength="16" autocomplete="off" class="form-input w-100">
                    <div class="input-addon checknum_img"><img src="" id="numImg" class="Captcha" alt="Captcha"/></div>
                    <!-- 驗證碼錯誤或者沒輸入 -->
                    <div class="waring"><?php echo @$erro_Vf; ?></div>
                </div>
                <input type="hidden" name="captchaUid" value="<?= $captcha ?>">
                <input type="hidden" name="agentShortName" value="<?= $agentShortName ?>">
                <div class="col-12 text-center mt-5"><input type="submit"  name="send" class="sumbit-btn py-3 px-5 flashing" value="ลงทะเบียน"></div>
                
            </form>
        </div>
        <div class="row position-relative w-100 mx-auto">
            <div class="col-12 col-md-4 text-center py-4 step">
                <span class="d-block my-2 font-weight-bolder">ขั้นตอนที่ 1 แอดไลน์</span>
                <span class="d-block my-2">Line ID : @818emawb</span>
                <a href="https://m99.69slot.com/?utm_source=BCLP&utm_medium=Ad&utm_campaign=Rigister ">แอดไลน์ทันที</a>
            </div>
            <div class="col-12 col-md-4 text-center py-4 step step-arrow">
                <span class="d-block my-2 font-weight-bolder">ขั้นตอนที่2 ทำความรู้จักกับเกม</span>
                <span class="d-block my-2">เกมไหนแตกง่ายที่สุด?</span>
                <a href="https://www.69slot.com/trick-for-grand-jackpot/?utm_source=LP&utm_medium=Register&utm_campaign=JackPot_Rec ">รู้จักตอนนี้</a>
            </div>
            <div class="col-12 col-md-4 text-center py-4 step step-arrow">
                <span class="d-block my-2 font-weight-bolder">ขั้นตอนที่3 เล่นเกมสะดวกยิ่งขึ้น</span>
                <span class="d-block my-2">ติดตั้ง APK บนมือถือ</span>
                <a href="https://download.69slot.com/?utm_source=axecasino&utm_medium=Register&utm_campaign=download_link">ติดตั้งทันที</a>
            </div>
        </div>
        <div class="footer text-center w-100 p-3 bg-dark text-light">Copyright © Pay69 . All rights reserved</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

<!-- 傳送後代碼 -->
<?php
@$data_info = $data_list['code'];
switch ($data_info) {
    case 'common.parameter.duplicated':
        switch ($data_list['data']['field']) {
            case 'username':
                echo '<script>alert("ชื่อบัญชีนี้มีคนใช้แล้ว")</script>';
                $duplicated ='ชื่อบัญชีนี้มีคนใช้แล้ว';
                break;
            case 'phoneNumber':
                 echo '<script>alert("เบอร์โทรศัพท์นี้มีคนใช้แล้ว")</script>';
                $duplicated = 'เบอร์โทรศัพท์นี้มีคนใช้แล้ว';
                break;
            default:
                # code...
                break;
        }
        break;
    case 'common.parameter.illegal':
        switch ($data_list['data']['field']) {
            case 'phoneNumber':
                 echo '<script>alert("เบอร์โทรศัพท์นี้มีคนใช้แล้ว")</script>';
                $duplicated = 'เบอร์โทรศัพท์นี้มีคนใช้แล้ว';
                break;
            default:
                # code...
                break;
        }
        break;
    case 'common.success':
            echo '<script>location.href="/suceful.html?user='. $data['username'].'";</script>';
            $duplicated = 'สมัครสำเร็จ';
        break;
    case 'common.captcha.wrong':
        echo '<script>alert("กรุณากรอกข้อมูลที่ถูกต้อง")</script>';
        $duplicated = 'กรุณากรอกข้อมูลที่ถูกต้อง';
        break;
    default:
        # code...
        break;
}
?>
<!-- 送出資料後 回傳錯誤-->

<script>

    const data = toBase64(getCaptchaData())
    document.getElementById("numImg").src = `data:image/jpeg;base64,${data}`;

    function toBase64(arr) {
    //arr = new Uint8Array(arr) if it's an ArrayBuffer
    return btoa(
        arr.reduce((data, byte) => data + String.fromCharCode(byte), '')
    );
    }

    function getCaptchaData() {
        return <?php echo $captcha_json ?>;
    }
    // console.log(data);
</script>

<!-- START ExoClick Goal Tag | 2021BC_Register -->
<script type="application/javascript" src="https://a.exoclick.com/tag_gen.js" data-goal="77c7abe99494401c6747160510290996"></script>
<!-- END ExoClick Goal Tag | 2021BC_Register -->