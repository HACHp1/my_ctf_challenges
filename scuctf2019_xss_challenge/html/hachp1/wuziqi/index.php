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
    "script-src *.sinaapp.com 'unsafe-eval'  'nonce-".$rand_s."' ;";
header($headerCSP);
header('X-Frame-Options: SAMEORIGIN');
?>

<!DOCTYPE html>

<html>

	<head>

		<meta charset="UTF-8">

		<title>五子棋可还行</title>
		<style nonce="<?php echo $rand_s ?>" type="text/css">

            canvas {

                display: block;

                margin: 50px auto;

                box-shadow: -2px -2px 2px #efefef, 5px 5px 5px #b9b9b9;

                cursor: pointer;

            }

            .btn-wrap { 

                display: flex; 

                flex-direction: row; 

                justify-content:center;

            }

            .btn-wrap div { 

                margin: 0 10px;

            }

            div>span {

                display: inline-block;

                padding: 10px 20px;

                color: #fff;

                background-color: #EE82EE;

                border-radius: 5px;

                cursor: pointer;

            }

            div.unable span { 

                background: #D6D6D4; 

                color: #adacaa;

            }

            #result-wrap {text-align: center;}

		</style>

		<style nonce="<?php echo $rand_s ?>" id="tsbrowser_video_independent_player_style" type="text/css">  

		    [tsbrowser_force_max_size] {

		    	width: 100% !important;                                                      

		    	height: 100% !important;                                                     

		    	left: 0px !important;                                                        

		    	top: 0px !important;                                                         

		    	margin: 0px !important;                                                      

		    	padding: 0px !important;}                                                   

		    [tsbrowser_force_fixed] {                                                      

		    	position: fixed !important;                                                  

		    	z-index: 9999 !important;                                                    

		    	background: black !important;}                                                                            

		    [tsbrowser_force_hidden] {                                                     

		    	opacity: 0 !important;                                                       

		    	z-index: 0 !important; }                                                                            

		    [tsbrowser_hide_scrollbar] {                                                   

		    	overflow: hidden !important;}

		</style>

	</head>

	<body>

        <h3 id="result-wrap">--HI <?php echo $_GET['guest_name'];?>，来局五子棋吧--</h3>

        <canvas id="chess" width="450px" height="450px"></canvas>

        <div class="btn-wrap">

            <div id="restart" class="restart">

                <span>重新开始</span>

            </div>

            <div id="goback" class="goback unable">

                <span>悔棋</span>

            </div>

            <div id="return" class="return unable">

                <span>撤销悔棋</span>

            </div>

        </div>

        <script type="text/javascript" nonce="<?php echo $rand_s ?>" charset="utf-8" src="script/test.js"></script>
</body>

</html>
