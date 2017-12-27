<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
session_destroy();
header('Location: enter.php');
?>
</body>
</html>
