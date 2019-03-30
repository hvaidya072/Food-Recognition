<?php
 require "connect.php";
 session_start();
 //$conn=mysqli_connect("localhost","root","","e-commerce");

$email = mysqli_real_escape_string($con, $_POST['email']);
$pass= $_POST['password'];
$password =md5($pass);
$select_email= "select email from users where email='".$_POST['email']."' ";
$select_pass= "select password from users where email='".$_POST['email']."'";
$select_email_result= mysqli_query($con,$select_email);
$select_pass_result= mysqli_query($con,$select_pass);
$check_email=mysqli_fetch_array($select_email_result);
$check_pass=mysqli_fetch_array($select_pass_result);
echo $check_email['email'];
if($check_email['email'] == $email && $check_pass['password'] == $password)
{
	$_SESSION['email']= $email;
	$_SESSION['id']= mysqli_insert_id($con);
	header('location: product.php');
}
else
{?>
	<script>alert('Entered Email or Password is Incorrect');</script>

	<?php	
		//header('location: login.php?email_error=enter correct email');
		include('login.php');
}
?>