<?php
 require "connect.php";
 session_start();
 //$conn=mysqli_connect("localhost","root","","diet");

$Name = mysqli_real_escape_string($con, $_POST['name']);
$userName = mysqli_real_escape_string($con, $_POST['username']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$pass = $_POST['password'];
$password = md5($pass);
$mobile = $_POST['mobile'];
$select_query="select email from users where email='".$_POST['email']."'";
$select_query_result= mysqli_query($con,$select_query) or die(mysqli_error($con));
$check_email= mysqli_fetch_array($select_query_result);
 if($check_email>0)
 {
	header('location: index.php?email_error=Enter Email is Already register');
 }
 else
 {
$user_registration_query = "insert into users(name,username,email,pass,mobile_no) values ('$Name', '$email','$userName', '$password', '$mobile')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
 $_SESSION['email']=$email;
 $_SESSION['id']= mysqli_insert_id($con);
 header('location:login.html');
 }
?>