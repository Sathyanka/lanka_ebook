	<?php
	session_start();	
	require "./functions/database_functions.php";
	
	$conn = db_connect();

	if(isset($_POST['add'])){
		$first_name = trim($_POST['first_name']);
		$first_name = mysqli_real_escape_string($conn, $first_name);
		
		$last_name = trim($_POST['last_name']);
		$last_name = mysqli_real_escape_string($conn, $last_name);		
		
		$email = trim($_POST['email']);
		$email = mysqli_real_escape_string($conn, $email);
		
		$message = floatval(trim($_POST['message']));
		$message = mysqli_real_escape_string($conn, $message);
			
		
		
		
		
		$query = "INSERT INTO contact_us VALUES 
			('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $message . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} 
	}
?>


<html>

	<head>
		<link rel="stylesheet" href="styles.css">
		<title>Contact Us</title>
	</head>
	
	<body>
	 <!--********************* Start of the top nevigation bar******************-->
		 <div class="topnav" >
			<h2 >ProFlowers</h2>
			<ul >			
				<li>
					<a  href="home_page.php">Home</a>
				</li>
			
				<li>
					<a href="contact_us.html">Contact us</a>
				</li>
				<li>
					<a href="about_us.html">About Us</a>
				</li>
				<li>
					<a href="my_account.php">My account</a>
				</li>	
			
				
			</ul>
		</div>
		<!-- ****************************End of the top nevigation bar ************************************-->
		
		
		
		<!--****************************Start of the headr bar ******************************************-->
		<div class="header">
		
			<h3 >Send flowers<br> Like you mean it.</h3>			
			
		</div>
		
		<!--**************************** End of the headr bar****************************-->


		
		
		<div class="row">
			<div class="leftcolumn" style="width:40%; margin:20px;" >						
				<div class="fakeimg" style="height:400px; width:100%; background-image:url(Images/gallery6.jpg)">
							
				
				</div>

			</div>
			
			<div class="rightcolumn" style="width:50%; margin-top:20px;">
				<div class="card">
					<form  method="post" action="contact_us.php" style="border-style: ridge; margin:15px;padding:20px;">
						<label for="first_name">First Name</label>
						<input type="text" id="first_name" name="first_name" placeholder="Your name..">

						<label for="last_name">Last Name</label>
						<input type="text" id="last_name" name="last_name" placeholder="Your last name.."> 						
							
						<label for="email">Email</label>
						<input type="text" id="email" name="email" placeholder="Your email address.."> 						
							
						<textarea name="message" placeholder="Some text..."></textarea>
							
						<input type="submit" value="Submit" name="add">
					</form>
				</div>   
			</div>
		</div>
		<div class="row">  
			<div class="card" style="background-color:white; height:50%">									
				<div class="column" style="width:30%; margin-left:20px; text-align:justify; padding:15px;">
					<h3><a href="about_us.html">About us</a></h3>
					<p>Started in 1988 as a small business entity has grown in strength to strength over the years. It has carried on the legacy of integrity, honesty and quality of its products and services up to date.Flowers has shown steady growth and is identified as a Organization keeping to the highest quality standards and customer service at their peak, whether it is a wedding, corporate function or a highest level VIP visit.</p>
				</div>					
				<div class="column" style="width:30%; margin-left:20px;">				
					<ul >
						<h3>Follow Us</h3>
						<li> <a href="#news">Twiter</a> </li>
						<li> <a href="#news">FaceBook</a></li>
						<li><a href="#news">Instragram </a></li>
							
					</ul>
				</div>
				<div class="column" style="width:30%;margin-left:20px;">		
					<ul>
						<h3>Flowers</h3>
						
						<li><a href="product.html">Love </a></li>
						<li><a href="product.html"> Baby born</a></li>
						<li><a href="product.html">Valentine's Day</a></li>
						<li><a href="product.html">Thank you</a></li>			
						<li><a href="product.html">Getwel</a></li>
						<li><a href="product.html">Congratulations</a></li>
						<li><a href="product.html">Aniversary</a></li>
					</ul>
				</div>
			</div>
		<div class="footer">
			<p>ProFlowers</p>
		</div>
	</body>
</html>