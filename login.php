<?php session_start();
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		$logins = array('user1' => 'pass1','user2' => 'pass2','user3' => 'pass3');
		
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details!</span>";
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width"/>
	<title>MAILER LOGIN!</title>
</head>
<body bgcolor="black">
    <center>
    <tt><font color="lime">
        <h1>MAILER LOGIN!</h1>
<form action="" method="post" name="Login_Form">
<?php if(isset($msg)){echo $msg;} ?>
<p>Username</p>
<p><input name="Username" type="text" placeholder="Username" style="text-align: center;"></p>
<p>Password</p>
<p><input name="Password" type="password" placeholder="Password" style="text-align: center;"></p>
<p><input name="Submit" type="submit" value="Login"></p>
</form>
</font></tt>
</center>
</body>
</html>