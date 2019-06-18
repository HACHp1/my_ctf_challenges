<?php
$url = $_GET['payload'];
if(isset($_GET['payload'])){
    $cmd='python3 ../../xss_bot.py -url '.$url.'';
//    echo $cmd;
    $temp=shell_exec($cmd);
//    echo $temp;
}
?>
<html>
<head>
    <title>好东西要分享</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="text-center text-info">
        <h2>
            有没有有趣的连接鸭，给我看看呢
        </h2>
        <P class="text-danger">由于服务器配置原因，请不要用脚本恶意刷请求，否则后果自负</P>
    </div>
<form>
    <div class="form-group">
        <label>URL:</label>
        <textarea type="text" id="payload" class="form-control"></textarea>
    </div>
    <div class="form-group  text-center">
        <input type="button" value="提交" onclick="sub()" class="btn btn-primary">
    </div>
</form>
</div>
<script>
    function sub() {
        pay=document.getElementById('payload').value;
        pay_en=btoa(pay);

        var xmlhttp;
        if (window.XMLHttpRequest)
        {
            //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            // IE6, IE5 浏览器执行代码
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState===4 && xmlhttp.status===200)
            {
                alert('看完了，关吧:)');
            }
        }
   //     document.write("index.php?payload="+pay_en);
        xmlhttp.open("GET","index.php?payload="+encodeURIComponent(pay_en),true);
        xmlhttp.send();
        alert('我看看这是啥网站，等我一会再关这个页面嗷。');
    }

</script>
</body>
</html>
