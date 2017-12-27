<?php  //Start the Session
session_start();
 require('connection.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['email'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `anun1` WHERE email='$email' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['email'] = $email;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "<a style='color:#f91e29'>Invalid Login Credentials.</a>";
echo($fmsg);
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['email'])){
$email = $_SESSION['email'];
echo "Hai " . $email . "
";
echo "This is the Members Area
";
echo "<a href='logout.php'>Logout</a>";
header('Location: site.PHP');
 
}else{

//3.2 When the user visits the page first time, simple login form will be displayed.
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vxod</title>
	<link rel="stylesheet" type="text/css" href="log.css">
	<link rel="stylesheet" href="font-awesome.css" type="text/css">
</head>
<body>

	<div id=main>
	<div id="log">
		<img src="../image/men.png" class="scaled">
		<form method="post" action="enter.php">
		<label>Email:</label><input type="email" name="email" placeholder="Mymail.@mail.ru" required><br><br>
		<label>Password:</label><input type="password" name="password" placeholder="Input Password" required><br><br>
		<button >Log In</button>

		<a href="index.php">Register</a><br>
		<a href="forgotpass.php">Forgot Password?</a>
</form>
<div class="dws-social">
		<i class="fa fa-vk" aria-hidden="true"></i>
		<i class="fa fa-twitter" aria-hidden="true"></i>
		<i class="fa fa-facebook" aria-hidden="true"></i>
		<i class="fa fa-google-plus-official" aria-hidden="true"></i>
		<i class="fa fa-odnoklassniki" aria-hidden="true"></i>
	</div>
</div>
</div>
</body>
</html>