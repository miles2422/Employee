<?php


//include 'class/function.class.php';
include 'class/query.class.php';
session_start();
$_SESSION['username']=$_POST['login'];
$obj = new Queryclass();
if($_POST['loginbut']){
	$username1 = $_POST['login']; 
	$password1 = $_POST['password']; 
	$login = $obj->login($username1, $username1);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.scss">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">        	
<title>test</title>

</head>
	
<body>


	<div class="content" id="body">
					<div class="w3-card-2 w3-container">
						<form method="post" action="" class=" w3-centered" style="height:30%; padding-top: 10%;">
							<div class="w3-cell-col w3-margin w3-center">
								<input id="login" name="login" placeholder="Username" class="w3-input w3-border"><br>
								<input id="password" name="password" placeholder="Password" class="w3-input w3-border">
							</div>
							
							<button class="w3-button w3-blue-gray w3-margin" id="loginbut" name="loginbut" value="Login" type="submit">Login</button>
						</form>
						
					</div>
					
	</div>
	
</body>
</html>
