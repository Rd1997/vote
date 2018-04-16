<!doctype html>
<html>
<head>
<title>Login</title>
 <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="wrapper">
	<div class="container">
<h1>Login</h1>
<form class="form"method="post">
<label>ID:</label><input type="text" name="user" required><br/>
<label>Password:</label><input type="password" name="pass" required><br/>
<input type="submit" value="Login" name="submit" id="login-button"><br/>
<!--New user Register Link -->
</form>'
</div>
<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['user']) && !empty($_POST['pass'])){
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 //DB Connection
 $conn = new mysqli('localhost', 'root', 'tiger') or die(mysqli_error());
 //Select DB From database
 $db = mysqli_select_db($conn, 'vote') or die("databse error");
 //Selecting database
 $query = mysqli_query($conn, "SELECT * FROM info WHERE user='".$user."' AND pass='".$pass."'");


 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['user'];
 $dbpassword=$row['pass'];
 $sec=$row['sec'];
 $vote=$row['voted'];
 }
 if($user == $dbusername && $pass == $dbpassword)
 {
 session_start();
 $_SESSION['sec']="$sec";
$_SESSION['user']="$user";
$_SESSION['vote']="$vote";
 //Redirect Browser
 header("Location:vote.php");
 }
 }
 else
 {
 echo "Invalid Username or Password! or";
 }
 }
 else
 {
 echo "Required All fields!";
 }

$admin="admin";
$adpass="admin";

if($user == $admin && $pass == $adpass)
 {
 session_start();
$_SESSION['user']="$user";
 //Redirect Browser
 header("Location:admin.php");
 }
}
?>


  

    <script  src="js/index.js"></script>

</body>
</html>






