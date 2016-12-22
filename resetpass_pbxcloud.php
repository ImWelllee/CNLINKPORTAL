<?php
//require_once 'class.user.php';
//$user = new USER();

//if(empty($_GET['id']) && empty($_GET['code']))
//{
//	$user->redirect('index.php');
//}

//if(isset($_GET['id']) && isset($_GET['code']))
//{
//	$id = base64_decode($_GET['id']);
//	$code = $_GET['code'];
	
//	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
//	$stmt->execute(array(":uid"=>$id,":token"=>$code));
//	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
//	if($stmt->rowCount() == 1)
//	{
		if(isset($_POST['btn-reset-pass']))
		{
			$pass = $_POST['pass'];
			$cpass = $_POST['confirm-pass'];
			
			if($cpass!==$pass)
			{
				$msg = "<div class='alert alert-block'>
						<button class='close' data-dismiss='alert'>&times;</button>	
						<strong>Sorry!</strong>  Password Doesn't match. 
						</div>";

//https://www.phpini.com/php/php-get-real-ip
if (!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip = $_SERVER["HTTP_CLIENT_IP"];
}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
    $ip = $_SERVER["REMOTE_ADDR"];
}

echo $ip; 

 

//https://www.phpini.com/php/php-check-ip-country-org
//$ip = "8.8.8.8";
$ip_info = file_get_contents("http://ipinfo.io/$ip/json");
echo $ip_info;

$ip_info = file_get_contents("http://ipinfo.io/$ip/city");
echo $ip_info;

			}
			else
			{
//				$password = md5($cpass);
//				$stmt = $user->runQuery("UPDATE tbl_users SET userPass=:upass WHERE userID=:uid");
//				$stmt->execute(array(":upass"=>$password,":uid"=>$rows['userID']));
				
				$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Changed.
						</div>";
				header("refresh:5;home.php");


			}
		}	
//	}
//	else
//	{
//		$msg = "<div class='alert alert-success'>
//				<button class='close' data-dismiss='alert'>&times;</button>
//				No Account Found, Try again
//				</div>";
				
//	}
	
	
//}

?>
<!DOCTYPE html>
<html>
  <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>TOOLS | Change Password</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login">
    <div class="container">
    	
        <form class="form-signin" method="post">
				<div class='alert alert-information'>
			<strong>Hello !</strong>  <?php echo $row['userEmail'] ?> you are here to change your softphone password.
		</div>
        <h3 class="form-signin-heading">APP Password Reset-[VOIP-SIP]</h3><hr />
        <?php
        if(isset($msg))
		{
			echo $msg;
		}
		?>
        <input type="password" class="input-block-level" placeholder="New Password" name="pass" required />
        <input type="password" class="input-block-level" placeholder="Confirm New Password" name="confirm-pass" required />
     	<hr />
        <button class="btn btn-primary" type="submit" name="btn-reset-pass">Reset Your Password</button>
			<a href="index.php" style="float:right;" class="btn">取消</a>
        
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>