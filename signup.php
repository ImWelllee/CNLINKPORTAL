
<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
	// clean user inputs to prevent sql injections
	$uname = trim($_POST['txtuname']);
    	$uname = strip_tags($uname);
		$uname = htmlspecialchars($uname);
	
	$email = trim($_POST['txtemail']);
    	$email = strip_tags($email);
		$email = htmlspecialchars($email);	

	$upass = trim($_POST['txtpass']);
		$upass = strip_tags($upass);
		$upass = htmlspecialchars($upass);

	$code = md5(uniqid(rand()));
	
	$captcha = trim($_POST['CaptchaInput']);
   		$captcha = strip_tags($captcha);
		$captcha = htmlspecialchars($captcha);

	$captchacode = trim($_POST['txtCaptcha']);
 		$captchacode = strip_tags($captchacode);
		$captchacode = htmlspecialchars($captchacode);

	if($captcha != $captchacode)
	{
	$error = true;
	$msg = "
	 	 <div class='alert alert-error'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!!</strong> $uname. </br>
                    Please double click the Captcha Code then input again. 
			  		</div>
					";
	}
		// basic name validation
	if (empty($uname)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} 
	if (strlen($uname) < 3) {
			$error = true;
			$nameError = "User Name must have atleat 3 characters.";
		} 
	if (!preg_match("/^[a-zA-Z ]+$/",$uname)) {
			$error = true;
			$nameError = "User Name must contain alphabets and space.";
		}
			//basic email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
	if ( !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email) ) {
			$error = true;
	        $emailError = "The Email Format is incorrect "; 
		}

			//basic password validation
	if(strlen($upass) < 8) {
			$error = true;
			$passError = "Password must have atleast 8 characters.";
			}
		

if( !$error )
{
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
		$emailError = "Provided Email is already in use.";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to CNLink Serivce Platform!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://10.192.1.89/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";

			$subject = "CNLink Service Platform Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
			header("refresh:5;index.php");
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup | Welcome to CNLink Service Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
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
	 	 <?php if(isset($msg)) echo $msg;  ?>
        <h2 class="form-signin-heading">使用者註冊</h2><hr />
		<span style="color:red"><?php echo $nameError; ?></span>
		<input type="text" class="input-block-level" placeholder="Username" name="txtuname" required />
		
		<span style="color:red"><?php echo $emailError; ?></span>
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
		
		<span style="color:red"><?php echo $passError; ?></span>
        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" autocomplete="off" required />
					
			<!-- CaptchaDiv -->
				<span id="txtCaptchaDiv" style="background-color:#A51D22;color:#FFF;padding:8px"></span>
				<input type="hidden" id="txtCaptcha" name="txtCaptcha"/>
				<input type="text" placeholder="Captcha" name="CaptchaInput" id="txtCaptchaInput" autocomplete="off" required />

     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-signup">註冊</button>
        <a href="index.php" style="float:right;" class="btn btn-large">取消</a>
      </form>

    </div> <!-- /container -->


    <script src="vendors/jquery-1.9.1.min.js"></script>
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