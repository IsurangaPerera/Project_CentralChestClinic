<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<title>CentralChest Clinic | Log in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta http-equiv="cache-control" content="private, max-age=0, no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
	
	<link href="css/common.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/spec-font.css" rel="stylesheet">
	<link href="css/login/signin.css" rel="stylesheet" type="text/css">
	<link href="css/login/login.css" rel="stylesheet" type="text/css">

	<script src="jquery/jquery.min.js"></script>
	<script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/login/signin.js"></script>

	<script type = "text/javascript" >
		function preventBack(){
			window.history.forward();
		} 
		setTimeout("preventBack()", 0); 
		window.onunload=function(){null}; 
	</script>

	<script type="text/javascript">
		$.ajax({
			type: "GET",
			async: false,
     		url: "login/",
			success: function( data, textStatus, jQxhr ){
				if(data !== "not_logged"){
					window.location.href = data;
					exit;
				}		
			},
			error: function( jqXhr, textStatus, errorThrown ){
			}
		});
	</script>

</head>
<body bgcolor="#FFFFFF">	
	<div style="background: #FFFFFF url('images/login/background.png'); 
	background-position: center; background-size:cover; ">
	<div style="background: transparent url('images/logo.png') no-repeat center; height:111px; margin-bottom:-50px; padding-top:120px;"></div>
	<div class="account-container">
		<div class="content clearfix" >
				<h1>Login</h1>		
				<div class="login-fields">
					<p>Please provide your details</p>
					<br>
					<div class="field">
						<label for="username">Username</label>

						<input type="text" id="username" value="" class='login username-field' placeholder='Username' required autofocus />                </div> <!-- /field -->
						<div class="field">
							<label for="password">Password:</label>
							<input type="password" id="password" class="login password-field" placeholder="Password" required value="" />
						</div> <!-- /password -->
						<div class="field">
							<button class="button btn btn-primary btn-large" onclick="doLogin();" name="submit">Log In</button>
						</div>
					</div>
					<!-- /login-fields -->
					<div class="login-actions">
						<span class="login-checkbox">
							<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" checked/>
							<label class="choice" for="Field">Keep me signed in</label>
						</span>
					</div>  
			</div> <!-- /content -->
		</div> <!-- /account-container -->
	</div>

	<script type="text/javascript">
		function doLogin(){
			username = $("#username").val().trim();
			pass = $("#password").val().trim();
			obj = {"user_name" : username, "password" : pass}
			
			$.ajax({
				type: "POST",
     			url: "user/login/init",
     			data : JSON.stringify(obj),
				success: function( data, textStatus, jQxhr ){
					if(data == 'denied'){
						alert("Invalid user name or password");
					}
					else if(data == 'inactive'){
						alert("Account is temporary blocked");
					}
					else
						window.location.href = data;
				},
				error: function( jqXhr, textStatus, errorThrown ){
				}
			});
		}
	</script>

</body>
</html>
