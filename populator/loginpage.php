<html lang = "en">
<head>
<title>SIGN IN </title>
<meta charset="utf-8">
<!-- add css -->
<link rel="stylesheet" href="./style.css">
</head>
<div class="menu">
<body>
<h1>SIGN IN</h1>
<form action="authenticate_login.php" method="post">
<p><br><input type="text" name="username" id="username" placeholder = "email" required/><br></p>
<p><br><input type="password" name="password" id="password" placeholder = "password" required /><br></p>
 <p><br> <button class="fpass" type="button">Forgot Password?</button><br></p>
 <p><br><input type="checkbox" name="remember" checked>
   <label for="remember">Remember me</label><br></p>
   <p><br><button type="submit" name="Login_btn" value="Login">LOGIN</button></p>
   <p>Don't have an Account?<a href="">Sign Up</a></p>
</body>