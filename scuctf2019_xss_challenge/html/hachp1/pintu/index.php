<?php
function random_str($len){
    $str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
    str_shuffle($str);
    $rs=substr(str_shuffle($str),26,10);
    return $rs;
}
$rand_s=random_str(20);
$headerCSP = "Content-Security-Policy:".
    "default-src 'self';".
    " style-src 'nonce-".$rand_s."' ;".
    "script-src 'nonce-".$rand_s."' 'strict-dynamic' ;";
header($headerCSP);
header('X-Frame-Options: SAMEORIGIN'); //防CSRF

function is_black($mm){
    $black_list=array('iframe','applet','embed','object','img');
    $flag=false;
    foreach ($black_list as  $black){
        if(stristr($mm,$black)){
            $flag=true;
            break;
        }
    }
    return $flag;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css" nonce="<?php echo $rand_s ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css" nonce="<?php echo $rand_s ?>">
    <script src="script/bootstrap.min.js" nonce="<?php echo $rand_s ?>"></script>
	<script src="script/jquery.min.js" nonce="<?php echo $rand_s ?>"></script>
    <script src="xss_filter/js-xss.js" nonce="<?php echo $rand_s ?>"></script>
    <script src="xss_filter/option.js" nonce="<?php echo $rand_s ?>"></script>
    <title>来和阿狸玩耍鸭</title>
</head>
<body>
<input type="hidden" id="signed_name" value="<?php echo $_GET['name']; ?>">
<script nonce="<?php echo $rand_s ?>">
    name_links={'0': '<div class="footer-copyright text-center py-3">© 2019 SCU CTF:\n' +
        '      <a href="https://hachp1.github.io"> Hachp1 </a>\n' +
        '    </div> ',
        '1': '<div class="footer-copyright text-center py-3">© 2019 SCU CTF:\n' +
        '      <a href="https://redogwu.github.io"> ReDog Wu </a>\n' +
        '    </div> ',
        '2': '<div class="footer-copyright text-center py-3">2019  SCU CTF:\n' +
        '      <a href="https://user.qzone.qq.com/1317242721"> 沙拉大法 </a>\n' +
        '    </div> '
    }
</script>
<div class="wrap">

        <div class="btnBbox">

            <button class="btn" type="button">开始</button>

            <div class="selectbox">

                <button class="text">简单</button>

                <ul class="box">

                    <li>简单</li>

                    <li>入门</li>

                    <li>中等难度</li>

                    <li>高难</li>

                    <li>外星人</li>

                </ul>

            </div>

        </div>

        <div class="picBox">

            <ul class="list"></ul>

        </div>

    </div>

<form>
    <input type="hidden" id="ft_id" value="<?php
    if(!is_black($_GET['ft_id'])){
    echo $_GET['ft_id'] ;
    }
    ?>
">
</form>
</body>
<script nonce="<?php echo $rand_s ?>">
    $(document).ready(function(){
        $("body").append(name_links[preventXSS($("#ft_id").val())]);
    });
</script>
<script type="text/javascript" src="script/index.js" nonce="<?php echo $rand_s ?>"></script>
</html>
