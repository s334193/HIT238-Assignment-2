<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body style="background-image:url(5.JPG);background-size:cover; background-repeat:no-repeat;background-position: center center;">
<?php
//Usernamess,Passwordss
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['Usernames'])){
        // removes backslashes
	//$FirstName = stripslashes($_REQUEST['FirstName']);
        //escapes special characters in a string
	//$FirstName = mysqli_real_escape_string($con,$FirstName);
	$Usernames = stripslashes($_REQUEST['Usernames']);
        //escapes special characters in a string
	$Usernames = mysqli_real_escape_string($con,$Usernames);
	
	$Passwords = stripslashes($_REQUEST['Passwords']);
	$Passwords = mysqli_real_escape_string($con,$Passwords);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `USERS` WHERE Username='$Usernames'
and Passwords='$Passwords'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	$res = mysqli_fetch_array($result);
	$User_Type = $res['Usertype'];
	//$Status = $res['Status'];
	$FullName = $res['FullName'];
	$UserID = $res['UserID'];
        if($rows==1){
	if($User_Type=="staff"){	
	    $_SESSION['Usernames'] = $Usernames;
		$_SESSION['UserID'] = $UserID;
		$_SESSION['FullName']=$FullName;
            // Redirect user to index.php
	    //header("Location: index.php");
		header("Location: Homestaffs.php");
         }
		 else if($User_Type=="customer")
		 {
		 $_SESSION['Usernames'] = $Usernames;
		$_SESSION['UserID'] = $UserID;
		$_SESSION['FullName']=$FullName;
		 //$_SESSION['LeaveBalance']=$LeaveBalance;
            // Redirect user to index.php
	    //header("Location: index.php");
		header("Location: Homecustomers.php");
		 }
		 /*else if($User_Type=="manager"&&$Status=="active")
		 {
		 $_SESSION['Usernames'] = $Usernames;
		 $_SESSION['UserID'] = $UserID;
            // Redirect user to index.php
	    //header("Location: index.php");
		header("Location: managers.php");
		 }*/
		 }
		 else{
	echo "<div class='form'>
<h3>Usernames/Passwords is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<ul>
</ul>
<h1 align="center">EMPLOYEES LEAVE  MANAGEMENT SYSTEM</h1>
<div class="form">
<div id="form" style="padding-left:600px">
<h2 align="">LOG IN</h2>

<form action="" method="post" name="login">
<table>
<tr>
<td width="208">
<input type="text" name="Usernames" placeholder="Usernames" required />
</td>
<td></td>
</tr>
<tr>
<td>
<input type="Password" name="Passwords" placeholder="Passwords"  required />
</td>
<td></td>
</tr>
<tr>
<td>
<input name="submit" type="submit" value="Login" />
</td>
<td>If not registered register <a href="Register.php">here</a></td>
</tr>
<tr>
<td>

</td>
<td>

</td>
</tr>
</table>
</form>

</div>
</div>
<?php } ?>
</body>
</html>