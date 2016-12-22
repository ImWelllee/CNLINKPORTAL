<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title></title>
        <!-- Bootstrap    -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">

          <!-- IntroJs -->
    <link href="assets/intro/introjs.min.css" rel="stylesheet">
      
               <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->     
    </head>
    
    <body >
    <!-- onclick="javascript:introJs().start();" 啟用IntroJs -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>     </a>
                    <a class="brand" href="#">CNLink Portal</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
								<?php echo $row['userEmail']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">  
                                     <li >
                                        <a tabindex="1" href="resetpass_pbxcloud.php" >Change Password</a>  
                                    </li>
                                    <li>
                                        <a tabindex="2" href="logout.php">Logout</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                            <a href="">Installation 安裝說明</a>
                            </li>   
                           
                            <li>
                                <a href="resetpass_pbxcloud.php">Change Password</a>
                            </li>
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown" class="dropdown-toggle">Voice Cloud<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li><a href="">Configuration</a></li>
                                    <li><a href="">Q&A</a></li>
                                </ul>
                            </li>
                             <li class="dropdown">
                                <a href="" data-toggle="dropdown" class="dropdown-toggle">Mail Service<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li><a href="">Configuration</a></li>
                                    <li><a href="">Q&A</a></li>
                                </ul>
                            </li> 
                             <li class="dropdown">
                                <a href="" data-toggle="dropdown" class="dropdown-toggle">LBS Serivce<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li><a href="">Configuration</a></li>
                                    <li><a href="">Q&A</a></li>
                                </ul>
                            </li>

                            <li>
                                <a target="_new" href="http://reseller.cloud.pumo.com.tw">Cloud</a>
                            </li>

                            <li>
                                <a href="logout.php">登出</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        
 <?php 
$user_agent = $_SERVER['HTTP_USER_AGENT'];  
$iphone        = strstr($_SERVER['HTTP_USER_AGENT'], "iPhone");
$ipad          = strstr($_SERVER['HTTP_USER_AGENT'], "iPad");
$android       = strstr($_SERVER['HTTP_USER_AGENT'], "Android");
$windows_phone = strstr($_SERVER['HTTP_USER_AGENT'], "Windows Phone");
$black_berry   = strstr($_SERVER['HTTP_USER_AGENT'], "BlackBerry");

if ($iphone) {
    // iPhone 網頁
    ?>
    <!-- Enable IntroJs 
                               data-step="x" data-intro="xx" -->
 <span onclick="javascript:introJs().start();" class="btn btn-primary">一步一腳印</span>
</BR>
    <img src="/bootstrap/img/logos.png" alt="OS logos"/>
     <a data-step="1" data-intro="安裝APP" href="https://appsto.re/tw/7Mxw9.i" style="float:right" class="btn btn-danger btn-primary">Install iPhone APP</a>
</BR>
   <img src="/bootstrap/img/logos.png" alt="OS logos"/>
<a data-step="2" data-intro="開啓APP" href="" style="float:left" class="btn btn-danger btn-primary">設定參數</a>

     
    
    <?php
} elseif ($ipad) {
    // iPad 網頁
     ?>
    
     <a href="https://appsto.re/tw/7Mxw9.i" style="float:right" class="btn btn-danger btn-primary">Install iPad APP</a>
    
    <?php
} elseif ($android) {
        // Android 網頁
         ?>
 <span onclick="javascript:introJs().start();" class="btn btn-primary">一步一腳印</span>

 </BR>
    <img data-step="1" data-intro="Android | Google Place" src="/bootstrap/img/logos.png" alt="OS logos"/>

</BR>
     <a href="" style="float:right" class="btn btn-danger">Install Android APP</a>
    
    <?php
} elseif ($windows_phone) {
    // Windows Phone 網頁
} elseif ($black_berry) {
    // Black Berry 網頁   
} else {
    // 一般網頁
 ?>
 <span onclick="javascript:introJs().start();" class="btn btn-primary">一步一腳印</span>
 </BR>
   <img data-step="1" data-intro="Android | Google Place" src="/bootstrap/img/logos.png" alt="OS logos">
<a data-step="2" data-intro="請下載安裝APP" href="http://www.zoiper.com/en/voip-softphone/download/zoiper3/for/windows" style="float:left" class="btn btn-danger btn-primary">Install Windows Program "Zoiper"</a>
</BR>
<a data-step="4" data-intro="安裝APP" href="" style="float:left" class="btn btn-danger btn-primary">設定參數</a>

<img data-step="5" data-intro="Android | Google Place" src="/bootstrap/img/Zioper/snipaste20161221_020605.png" alt="Zioper"/>

<img data-step="6" data-intro="Android | Google Place" src="/bootstrap/img/Zioper/snipaste20161221_020636.png" alt="Zioper"/>

<img data-step="7" data-intro="Android | Google Place" src="/bootstrap/img/Zioper/snipaste20161221_020705.png" alt="Zioper"/>

<img data-step="8" data-intro="Android | Google Place" src="/bootstrap/img/Zioper/snipaste20161221_020748.png" alt="Zioper"/>

<img data-step="9" data-intro="Android | Google Place" src="/bootstrap/img/Zioper/snipaste20161221_021003.png" alt="Zioper"/>


  <?php

}



//https://www.phpini.com/php/php-get-real-ip

//if (!empty($_SERVER["HTTP_CLIENT_IP"])){
//    $ip = $_SERVER["HTTP_CLIENT_IP"];
//}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
//    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
//}else{
//    $ip = $_SERVER["REMOTE_ADDR"];
//}

//echo "Your Browser is: $user_agent </BR";
//echo "Your Browser is : $ip </BR>"; 

 

//https://www.phpini.com/php/php-check-ip-country-org
// $ip = "8.8.8.8";
//$ip_info = file_get_contents("http://ipinfo.io/$ip/json");
//echo "Your are coming from : $ip_info </BR>" ;

//$ip_info = file_get_contents("http://ipinfo.io/$ip/city");
//echo $ip_info;

//$ip = file_get_contents('https://api.ipify.org');
    //echo "Your public IP address is: . $ip </BR>";

//$ip_info = file_get_contents("http://ipinfo.io/$ip/json");
//echo "Your Internet Service Provider is : $ip_info </BR>" ;

 ?>   

        <!--/.fluid-container-->
         
        <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
            <script src="assets/intro/intro.min.js"></script> 
      

    </body>

</html>