<?php
	$Username2=$_POST['username1']; 
	$Password2=$_POST['password1']; 

	//Database Connection here
	$con= new mysqli("sql301.epizy.com","epiz_27395376","BuKWZptjIqrGOi","epiz_27395376_loginPage");
	if($con->connect_error){
		die("Failed to connect: ".$con->connect_error);
	}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="css//new.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  
  <body>
   <header>
    <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light m-auto  ">
                
        <a class="navbar-brand" href="#">
         <img src="logo.png" alt="Logo" style="height:30px;">
       </a>
       
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="page.html">Home </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="Cakes Available.html">Cakes Available</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="speciality.html">Speciality</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contactme.html">Contact Me </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="login.html">Login<span class="sr-only">(current)</span></a>
          </li>
        
        
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
      </form>
      
    </div>
  </nav>
          
    </div>
   </header> 
    <div class="ourbody">
   		<?php
   			$stmt = $con->prepare("select * from login where Username = ?");
			$stmt->bind_param("s",$Username2);
			$stmt->execute();
			$stmt_result = $stmt->get_result();
			if($stmt_result->num_rows > 0) {
				$data = $stmt_result->fetch_assoc();
				if($data['Password']===$Password2) {
					echo "Welcome ",$data['Username'];
				} else {
					echo "<h2>Invalid Username or Password</h2>";
				}
			} else{
			echo "<h2>Invalid Username or Password</h2>";
			}
   		?>
      <br><br><br><br><br>
   		<a href="index.html" class="btn">Go to Homepage</a>
    </div>
    <input class="btn" type="submit" name="" value="LOGIN">
    <script type="text/javascript">
    $('.options-02 a').click(function(){
      $('form').animate({
        height: "toggle", opacity: "toggle"
      }, "slow");
    });
    </script>

  </body>
</html>
                           
