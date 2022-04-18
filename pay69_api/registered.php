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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chonburi&family=Kanit:ital,wght@0,900;1,900&family=Maitree:wght@500&display=swap" rel="stylesheet">
    <title>Registration page</title>
    <!-- START ExoClick Goal Tag | 2021BC_Register -->
    <script type="application/javascript" src="https://a.exoclick.com/tag_gen.js" data-goal="77c7abe99494401c6747160510290996"></script>
    <!-- END ExoClick Goal Tag | 2021BC_Register -->
</head>
<body>
    <div class="service position-fixed">
        <a href="https://lin.ee/vxVaeCF"><img class="service-img" src="images/service-btn.png" alt=""></a>
    </div>
    <div class="title position-fixed d-flex justify-content-center w-100 bg-black-50 p-2 z-1">
        <div class="h-100">
            <img src="images/pay69.png" class="h-100" alt="">
        </div>
    </div>
    <div class="container-fluid main-place p-0">
        <!-- First Page -->
        <div class="row w-100 mx-auto align-items-end justify-content-center align-items-md-center">
            <img src="images/Web_1920x500.jpg" class="w-100 ph-none">
            <img src="images/AD0324-2_720x480.jpg" class="w-100 pc-none">
        </div>
        <div class="row position-relative w-100 mx-auto align-items-end justify-content-center align-items-md-center py-5 mb-0">
            <div class="bg-box position-absolute w-100 h-100"></div>
            <div class="col-11 col-md-5 row justify-content-center position-relative mx-3 py-3 bg-transparent ph-none">
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.1.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.103.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.27.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.30.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.35.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.37.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.39.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.49.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.51.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.54.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.55.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.57.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.61.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.62.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.63.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.66.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.68.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.70.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.71.png"></a>
                <a href="https://www.pay69slot.com?pid=EricFB01" class="text-center logo-box"><img class="game-logo" src="images/logo/Platform.95.png"></a>
            </div>
            <form  class="col-11 col-md-3 row position-relative w-100 mx-3 data-box py-4 px-0 bg-white-50" method="post">
                <div class="col-12 h1 text-center p-3 m-0 main-word font-weight-bold">สมัคร</div>
                <div class="col-12 p-4">
                    <div name="input-box" class="position-relative d-flex align-items-center w-100">
                        <label for="username" class="form-label m-0 px-2">ยูสเซอร์</label>
                        <input type="text" id="username" name="username" maxlength="16" autocomplete="off" class="form-input w-100">
                    </div>
                    <!-- 帳號格式錯誤或沒輸入 -->
                    <div class="waring mt-1"><?php echo @$name_Vf; echo @$erro_name; ?></div>
                </div>
                <div class="col-12 p-4">
                    <div name="input-box" class="position-relative d-flex align-items-center w-100">
                        <label for="pws" class="form-label m-0 px-2">รหัสผ่าน</label>
                        <input id="pws" type="password" name="pwd" maxlength="16" autocomplete="off" class="form-input w-100">
                    </div>
                        
                    <!-- 密碼格式錯誤或沒輸入 -->
                    <div class="waring mt-1"><?php echo @$pwd_Vf; echo @$erro_pwd; ?></div>
                </div>
                <div class="col-12 p-4">
                    <div name="input-box" class="position-relative d-flex align-items-center w-100">
                        <label for="tel" class="form-label m-0 px-2">เบอร์โทรศัพท์มือถือ</label>
                        <input id="tel" type="text" name="phoneNumber" maxlength="16" autocomplete="off" class="form-input w-100">
                    </div>
                        
                    <!-- 手機格式錯誤或沒輸入 -->
                    <div class="waring mt-1"><?php echo @$phone_Vf; echo @$erro_phone; ?></div>
                </div>
                <div class="col-12 p-4">
                    <div name="input-box" class="position-relative d-flex align-items-center w-100">
                        <label for="num" class="form-label m-0 px-2">รหัสยืนยัน</label>
                        <input id="num" type="text" name="captcha" maxlength="16" autocomplete="off" class="form-input w-100">
                        <div class="input-addon checknum_img"><img src="" id="numImg" class="Captcha" alt="Captcha"/></div>
                    </div>
                    <!-- 驗證碼錯誤或者沒輸入 -->
                    <div class="waring mt-1"><?php echo @$erro_Vf; ?></div>
                </div>
                <input type="hidden" name="captchaUid" value="<?= $captcha ?>">
                <input type="hidden" name="agentShortName" value="<?= $agentShortName ?>">
                <div class="col-12 text-center mt-2">
                    <input type="submit"  name="send" class="sumbit-btn py-3 px-5 flashing" value="ลงทะเบียน">
                </div>
            </form>
        </div>
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
<script>
    let input = document.querySelectorAll('[name=input-box] input')
    for(let i=0; i<input.length; i++){
        input[i].addEventListener('blur',function(){
            if(input[i].value == ""){
                input[i].previousElementSibling.classList.remove('active')
            }
        })
        input[i].addEventListener('focus',function(){
            input[i].previousElementSibling.classList.add('active')
        })
    }
</script>

<!-- START ExoClick Goal Tag | 2021BC_Register -->
<script type="application/javascript" src="https://a.exoclick.com/tag_gen.js" data-goal="77c7abe99494401c6747160510290996"></script>
<!-- END ExoClick Goal Tag | 2021BC_Register -->