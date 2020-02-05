<?php session_start();

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<html>
	<head>
	    <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width"/>
		<title>PHPMailer</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			  $("button").click(function(){
				var fName   = document.getElementById("fromname").value;
				var fMail   = document.getElementById("frommail").value;
				var to      = document.getElementById("to").value;
				var html    = document.getElementById("isHTML").value;
				var subject = document.getElementById("subject").value;
				var pesan   = document.getElementById("pesan").value;
				
				if(fMail.includes("@") && to.includes("@")){
					// debug
					//document.getElementById("debug").value = "send.php?fromname=" + fName + "&frommail=" + fMail + "&to=" + to + "&isHTML=" + html + "&subject=" + subject + "&pesan=" + pesan;
					
					$.get("send.php?fromname=" + fName + "&frommail=" + fMail + "&to=" + to + "&isHTML=" + html + "&subject=" + subject + "&pesan=" + pesan, function(data){
						if(data.includes("Message has been sent")) {
							alert("Message Has Been Sent!");
							document.getElementById("fromname").value = "";
							document.getElementById("frommail").value = "";
							document.getElementById("to").value = "";
							document.getElementById("isHTML").value = "";
							document.getElementById("subject").value = "";
							document.getElementById("pesan").value = "";
						} else {
							alert("Unexpected Error, Try Again!");
						}
					});
				} else {
					alert("Please Enter Sender and Receiver Email Correctly!");
				}
			  });
			});
		</script>
	</head>
	<body bgcolor="black">
	    <tt><font color="lime">
    		<center>
    		    <h1>PHPMailer</h1>
    			<p><input id="fromname" name="fromname" type="text" style="text-align: center;" placeholder="Sender Name"/></p>
    			<p><input id="frommail" name="frommail" type="email" style="text-align: center;" placeholder="Sender Email"/></p>
    			<p><input id="to" name="to" type="email" style="text-align: center;" placeholder="Receiver Email"/></p>
    			<p><input id="subject" name="subject" type="text" style="text-align: center;" placeholder="Subject"/></p>
    			<p><select id="isHTML" name="isHTML">
    				<option value="true">HTML</option>
    				<option value="false">Plain Text</option>
    			</select></p>
    			<p><textarea id="pesan" name="pesan" placeholder="Messages" rows="9" cols="40"></textarea></p>
    			<p><button>Send Now!</button></p><br>
    			<a href="logout.php">Logout</a>
    			<!--<input id="debug" type="text"/>-->
    		</center>
		</font></tt>
	</body>
</html>