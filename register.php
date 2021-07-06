<html>
<head>
<title>Register an Account</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form class="box" action="register.php" method="POST">
<img src="logo.jpg" style="width:160px;height:54px;">
<h1>Register</h1>

<input type="text" name="username" placeholder="Register username" id="username">
<input type="password" name="password" placeholder="Register a password" id="password">
<input type="password" name="repassword" placeholder="Confirm password" id="repassword">
<input type="text" name="email" placeholder="Register an email" id="email">
<input type="submit" value="Register" name="submit"> or <a href="login.php">Login</a>
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
require('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$repass = $_POST['repassword'];
$email = $_POST['email'];
$date = date("Y-m-d");
$sql_insert = "INSERT INTO `users` (username, password, email, date) VALUES (`$username`, `$password`, `$email`, $date)";

if(isset($_POST['submit'])){
if($username && $password && $repass && $email){
if(strlen($username) >= 5 && strlen($username) < 25 && strlen($password) > 6){
if($repass == $password){
if($query = mysqli_query($connect, $sql_insert)){
echo "You have been registered as $username. Click <a href='login.php'>here</a> to login";
}else{
echo mysqli_error($connect);
}
}else{
echo "Password not match";
}
}else{
if(strlen($username) < 5 || strlen($username) > 25){
echo "Username must be between 5 and 25 characters";
}
if(strlen($password) < 6){
echo "Password must be longer than 6 characters";
}
}
}else{
echo "Please fill in all the fields.";
}
}
}
?>
