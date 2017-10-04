<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:dashboard.php");
}
require '../vendor/autoload.php';
use App\classes\Login;
if(isset($_REQUEST['login'])){
    $loginchk = Login::adminLogin($_POST);
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    <style>
		span.error{font-weight: bold;color: red;font-size: 18px;}
		span.success{font-weight: bold;color: green;font-size: 18px;}
    </style>
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>Admin Login</h1>
			<?php if (isset($loginchk)) { echo $loginchk; }  ?>			
			<div>
				<input type="text" placeholder="Email" required="" name="email"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->

	</section><!-- content -->
</div><!-- container -->
</body>
</html>