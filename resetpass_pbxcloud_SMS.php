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
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.plivo.com/v1/Account/MANWVIMMRHYJFLNWRMOW/Message/");
curl_setopt($ch, CURLOPT_POST, true); // 啟用POST
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array( "src"=>"886926811898", "dst"=>"886926811898", "text"=>"test") )); 
curl_exec($ch); 
curl_close($ch);

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
    <title>Change Password</title>
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
        <h3 class="form-signin-heading">Password Reset.</h3><hr />
        <?php
        if(isset($msg))
		{
			echo $msg;
		}
		?>
        <input type="password" class="input-block-level" placeholder="New Password" name="pass" required />
        <input type="password" class="input-block-level" placeholder="Confirm New Password" name="confirm-pass" required />

     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Reset Your Password</button>
        
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>