<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="wrapper">
	<div class="container">
<h2> Search for Winner</h2>
<form  method="post">
<label>Section:</label><input type="number" name="sec" required><br/>

<input type="submit" value="search" name="submit"><br/>

</form>

<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['sec']) ){
 $sec = $_POST['sec'];
 //DB Connection
 $conn = new mysqli('localhost', 'root', 'tiger') or die(mysqli_error());
 //Select DB From database
 $db = mysqli_select_db($conn, 'vote') or die("databse error");
  
$query = mysqli_query($conn, "SELECT MAX(vote) FROM cr WHERE sec ='".$sec."'");

 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
{
while($row = mysqli_fetch_assoc($query))
 {
 $win=$row ['MAX(vote)'];


 }}
$que = mysqli_query($conn, "SELECT name FROM cr WHERE vote ='".$win."'AND sec='".$sec."'");

$numrows = mysqli_num_rows($que);
 if($numrows !=0)
{
while($row = mysqli_fetch_assoc($que))
 {
 $name=$row ['name'];
echo "winner is $name";
echo " with $win votes";
 }}

 }
}
?>
</body>
</html>
