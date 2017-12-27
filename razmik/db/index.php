<!DOCTYPE html>
<html>
<head>
	<title>DB</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="login">
<a href="logout.php">Log In</a>
</div>
	<div id="php">
		<h3>REGISTRATION FORM</h3>
<form method="post" action="index.php">
	<label>Name:</label><input type="text"  name="Name" required><br><br>
	<label>LastName:</label><input type="text" name="LastName" required><br><br>
	<label>@Email:</label><input type="Email" name="Email" required><br><br>
	<label>pass:</label><input type="password" name="password" required><br><br>
	<label>Retry pass:</label><input type="password" name="password1" required><br><br>
	<input type="submit">
</form>
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>
<div>
<?php
	require('connection.php');
    if (isset($_POST['Name']) && isset($_POST['password'])){
        $username = $_POST['Name'];
        $Lname=$_POST['LastName'];
		$email = $_POST['Email'];
        $password = $_POST['password'];
        $password1=$_POST['password1'];
        if(strlen($password)<6){
        	die("pleaz input more then 6 symbols");
        }
        if($password !=$password1){
        	die("Passwords do not match");
        }
        $querycheck = "SELECT * FROM `anun1` WHERE email='$email'";
        $result = mysqli_query($connection, $querycheck) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);
		 $query1 = "SELECT * FROM `anun1` WHERE  anun='$username'";
        $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
		$count1 = mysqli_num_rows($result1);
		if($count1>0){
		die("User With this username  was exist");
		}
		if($count>0){
			die("User With this name already  exist");
		}else {
		
 
        $query = "INSERT INTO `anun1` (Anun,Azganun,Email,Password) VALUES ('$username','$Lname', '$email','$password' )";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "User Created Successfully.";
            header('location:enter.php');
        }else{
            $fmsg ="User Registration Failed";
        }
    }
}
    ?>

</div>
</body>
</html>