<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript">
var i=8; 
	function closewin()
	{ 
		self.opener=null; 
		self.close();
	}
	
	function clock()
	{
		i=i-1; 
		document.title="This page will close in "+i+" seconds"; 
		if(i>0)	setTimeout("clock();",1000); 
		else closewin();
	} 
	
	clock(); 
</script>
<title>Mail</title>
</head>

<body>
<?php
include("conn.php");
if ($_SERVER['REQUEST_METHOD'] == "POST")
	{ 	
		date_default_timezone_set('America/Los_Angeles');
		$today= date("Y-m-d");
		$userIP = $_SERVER["REMOTE_ADDR"];
		$sql_write="insert into `yanslab` (ID, userIP,sentTime) " ." values ('','$userIP','$today')";
		$sql_read="select * from `yanslab` where `userIP` = '$userIP' && `sentTime` = '$today'";
		
		mysql_query($sql_read);
		$result = mysql_query($sql_read);
		$amount = 0;
		$amount = mysql_num_rows($result);
		
		
		if ( $amount > 2)
		{
			echo "Oops, you have just reached todays maxium use";
		}	
		else 
		{		
			$admin = "yli34@depaul.edu";
			$admin = "bach.genius@gmail.com";	
			$content = "Name: ".$_POST['name']."\n"."Email: ".$_POST['email']."\n"."Qestion: ".$_POST['question_details'];
			//mail($admin,"Lab website message",$content,"From: ".$_POST['email']);
			mysql_query($sql_write);
			$amount++;
			$name = $_Post['name'];
			echo "Dear $name , Your message has been sent successfully! We will get back as soon as possible. <br />";
			echo "You can send at most 3 messages for one day, you have sent $amount so far.<br />";
		}
	}
	else
	{ echo "No you can't do this....";}
?>

</body>
</html>