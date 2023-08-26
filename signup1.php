<?php 

$exists=false; 
	
if($_SERVER["REQUEST_METHOD"] == "POST") { 
	
	// Include file which makes the 
	// Database conection. 
	$con= new mysqli("sql301.epizy.com","epiz_27395376","BuKWZptjIqrGOi","epiz_27395376_loginPage");
	if($con->connect_error){
		die("Failed to conect: ".$con->connect_error);
	} 
	
	$Username2=$_POST['username1'];
	$Phone2=$_POST['phone1']; 
	$Email2=$_POST['email1']; 
	$Password2=$_POST['password1']; 
			
	
	$sql = "Select * from login where Username='$Username2'"; 
	
	$result = mysqli_query($con, $sql); 
	
	$num = mysqli_num_rows($result); 
	
	// This sql query is use to check if 
	// the username is already present 
	// or not in our Database 
	if($num == 0) { 
			
			$sql = "INSERT INTO `login` (Username,PhoneNo,Email,Password) VALUES ('$Username2','$Phone2','$Email2','$Password2')";
	
			$result = mysqli_query($con, $sql); 
	
			if ($result) { 
				$showAlert = true; 
			} 
	}
	
	if($num>0) 
	{ 
		echo "Username already exists available"; 
	} 
}//end if 
header("Location: login.html");

?> 
