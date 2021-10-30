
	<?php
	session_start();	
	require "./functions/database_functions.php";
	
	$conn = db_connect();

	if(isset($_POST['add'])){
		
		
		$name = trim($_POST['name']);
		
		
		$address = trim($_POST['address']);
		//$address = mysqli_real_escape_string($conn, $address);		
		
		$city = trim($_POST['city']);
	//	$city = mysqli_real_escape_string($conn, $city);
		
		$zip_code = trim(trim($_POST['zip_code']));
		//$zip_code = mysqli_real_escape_string($conn, $zip_code);
		
		$country = trim($_POST['country']);
		//$country = mysqli_real_escape_string($conn, $country);	
		
		
		if($name == "" || $address == "" || $city=="" || $zip_code == "" || $country == ""){
		echo "Name or Pass is empty!";
		exit;
	}
		$name = mysqli_real_escape_string($conn, $name);
		$city = mysqli_real_escape_string($conn, $city);
		$zip_code = mysqli_real_escape_string($conn, $zip_code);
		$country = mysqli_real_escape_string($conn, $country);	
		
		$query = "INSERT INTO customers VALUES 
			('', '" . $name . "', '" . $address . "', '" . $city . "', '" . $zip_code . "', '" . $country . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			echo "sucsessful";
		}
	}
?>


<?php
  //session_start();
  $book_isbn = $_GET['bookisbn'];
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['book_title'];
  
?>	

<html>
	
	<head>
	
		<link rel="stylesheet" href="styles.css">
		<title>Chechout</title>
		
	</head>

	<body>
	 <!--********************* Start of the top nevigation bar******************-->
		 <div class="topnav" >
			<h2 >ProFlowers</h2>
			<ul >			
				<li>
					<a  href="home_page.html">Home</a>
				</li>
				<li>
					<a  href="product.html">Products</a>
				</li>
				<li>
					<a href="contact_us.html">Contact us</a>
				</li>
				<li>
					<a href="about_us.html">About Us</a>
				</li>
				<li>
					<a href="my_account.html">My account</a>
				</li>
				<li style="float:right;">
					<a href="cart.html">Cart</a>
				</li>
				
			</ul>
		</div>
		<!-- ****************************End of the top nevigation bar ************************************-->
		
		<!--****************************Start of the headr bar ****************************-->
		<div class="header">
			  <h3 >Send flowers<br> Like you mean it.</h3>
			
			
		</div>
		<!--**************************** End of the headr bar****************************-->

				<!--**************************** Start of the second nevigation bar ****************************-->
	

		<!-- ****************************End of the second nevigation bar ****************************-->
		
		
		<div class="row" id="checkout">				
			<div class="card">
					
				<form method="post"  action="pdf.php?bookisbn=<?php echo $row['book_isbn'];?>"
				style="margin:15px;padding:20px; width:100%">
				
			
					<div class="column" style="width:45%; margin:15px;">
					
			
						
						<label for="name">Name</label>						
						<input type="text" id="name" name="name" placeholder="Your name.." required> 
						
						<label for="address">Address</label>							
						<input type="text" id="address" name="address" placeholder="Your adrdess" required> 
						
						<label for="country">Country</label>						
						<select id="country" name="country" required>
							<option value="sri lanka">Sri Lanka</option>
							<option value="australia">Australia</option>
							<option value="canada">Canada</option>
							<option value="usa">USA</option>
						</select>
								<label for="city">Town/city</label>
						<input type="text" id="city" name="city" required> 
								
						<label for="zip_code">Postcode/ZIP</label>
						<input type="text" id="zip_code" name="zip_code" required> 
								
						
								
					
					</div>
					<div class="column" style="width:45%; margin:15px;">
				
				
						<label for="card_type" class="col-lg-2 control-label">Type</label>
            <div class="col-lg-10">
              	<select class="form-control" name="card_type">
                  	<option value="VISA">VISA</option>
                  	<option value="MasterCard">MasterCard</option>
                  	<option value="American Express">American Express</option>
              	</select>
            </div>
			<label for="card_number">Number</label>
						<input type="text" id="card_number" name="card_number">
			<label for="card_PID">PID</label>
						<input type="text" id="card_PID" name="card_PID">
			
			<label for="card_expire">Expiry Date</label>
						<input type="date" id="card_expire" name="card_expire">
					</div>
					
			
					<div class="form-group">
					
			<input type="submit" name="add" value="add" style="width:150px;" >
		</div>
				</form>
				

				
				
				
			</div>
		</div>		 
		<div class="footer">
			<p>ProFlowers</p>
		</div>
		
	</body>
</html>