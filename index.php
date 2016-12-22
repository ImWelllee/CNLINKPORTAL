<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{

// clean user inputs to prevent sql injections
	$email = trim($_POST['txtemail']);
    $email = strip_tags($email);
		$email = htmlspecialchars($email);

	$upass = trim($_POST['txtupass']);
  	$upass = strip_tags($upass);
		$upass = htmlspecialchars($upass);
  
  //	<!-- CaptchaDiv -->
  $captcha = trim($_POST['CaptchaInput']);
   	$captcha = strip_tags($captcha);
		$captcha = htmlspecialchars($captcha);

	$captchacode = trim($_POST['txtCaptcha']);
    $captchacode = strip_tags($captchacode);
		$captchacode = htmlspecialchars($captchacode);
	
   if($captcha != $captchacode)
	{
	$msg = "
	 	 <div class='alert alert-error'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!!</strong> $email. </br>
                    Please double click the Captcha Code then input again. 
			  		</div>
					";
	}
	else
  {	
	  if($user_login->login($email,$upass))
	  {
		  $user_login->redirect('home.php');
	  }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>CNLink | Serivce Portal</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">




     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
    
    <form class="form-signin" method="post">
    <?php 
    if(isset($msg)) echo $msg;  
    else
    {

		  if(isset($_GET['inactive']))
		  {
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
			</div>
            <?php
		  }
		  ?>
     <?php
      if(isset($_GET['error']))
		  {
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Login Email or Password is incorrect !! </BR> </strong>
        <a href="fpass.php">Do you want to reset your Password ? </a> </BR>
        [CNLINK Serivce Portal]</BR> - 7*24 Customer Seriver Center - </BR>
        02-89680009
			</div>
            <?php
		  }
    }

		?>
        <h2 class="form-signin-heading">登入-互聯通雲服務</h2><hr />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtupass" autocomplete="off" required />
        
        	<!-- CaptchaDiv -->
				<span id="txtCaptchaDiv" style="background-color:#A51D22;color:#FFF;padding:8px"></span>
				<input type="hidden" id="txtCaptcha" name="txtCaptcha"/>
				<input type="text" placeholder="Captcha" name="CaptchaInput" id="txtCaptchaInput" autocomplete="off" required />

     	<hr />
        <button class="btn btn-primary" type="submit" name="btn-login">登入</button>
        <a href="signup.php" style="float:right;" class="btn btn-">註冊</a><hr />
        <a href="fpass.php">Lost your Password ? </a>
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

<!-- captcha function -->

<script type="text/javascript">

//Generates the captcha function
var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';
var f = Math.ceil(Math.random() * 9)+ '';
var code = a + b + c + d + e + f;
document.getElementById("txtCaptcha").value = code;
document.getElementById("txtCaptchaDiv").innerHTML = code;
</script>



  </body>
</html>