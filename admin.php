<?php include_once "api/db.php";?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>

<style>
	#mm
{
	min-height:525px;
}

#lef
{
	width:18.2%;
	padding:2px;
	background:url(../icon/02B04.png) repeat-y;
	/*background-size:100% auto;*/
	min-height:525px;
	display:inline-block;
	vertical-align:top;
	position:relative;
	top:-3px;
}
#main
{
	display:inline-block;
	width:78%;
	height:515px;
	padding:4px;
	border:solid 1px #000000;
	overflow:auto;
	position:relative;
	left:1%;
}

</style>
</head>

<body>
<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<iframe name="back" style="display:none;"></iframe>
	<div id="all">
    	<div id="title">                   
        <?=date ("m 月 d 號 l")?> | 今日瀏覽: <?=$Total->find(['date'=>date("Y-m-d")])['total'];?>
		                          | 累積瀏覽: <?=$Total->sum('total')?>
		<a href="index.php" style="float:right">回首頁</a>
        </div>
        <div id="title2">
			<a href="index.php" title="健康促進網-回首頁">
        	<img src="./icon/02B01-1.jpg" alt="健康促進網-回首頁">
			</a>
        </div>
        <div id="mm">
        	<div class="hal" id="lef">
            	                	    <a class="blo" href="?do=acc">帳號管理</a>
               	                     	<a class="blo" href="?do=news">最新文章管理</a>
               	                     	<a class="blo" href="?do=know">問卷管理</a>
               	                     	    
            </div>

            <div class="hal" id="main">
				<div style="width:75%; display:inline-block;">
					<marquee behavior="" direction="">民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地詳見最新文章</marquee>
				</div>          		 
				<div style="width:23%; display:inline-block;">
                	<span >
					<?php if(!isset($_SESSION['user'])):?>
                            <a href="index.php?do=login">會員登入</a>
					<?php else:?>
						歡迎，<?=$_SESSION['user'];?>
						<?php if($_SESSION['user']=='admin'):?>
							 <br><button onclick="location.href='admin.php'">管理</button>
							<?php endif;?>
							<button onclick="logout()">登出</button>
							

					<?php endif;?>
                    </span>

                </div>

			<?php
            $do=$_GET['do']??'main';
            $file="back/".$do.".php";
			if(file_exists($file)){
				include $file;
			}else{
				include "back/main.php";
			}

            ?>


            </div>
        </div>
        <div id="bottom">
    	    本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2025健康促進網社群平台 All Right Reserved 
    		 <br>
    		 服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
        </div>
    </div>


<script>
	function logout(){
		$.get("api/logout.php",function(){
          location.reload();
	})
}
</script>


</body></html>