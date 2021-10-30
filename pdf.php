	
	
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
		echo "fill the complete form";
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
		
		<link rel="stylesheet" href="styles.css">
			
		<div class="row" style="background-color:; margin:20px" id="description">
		
					
		<div class="cartbutton" style=" height:50px; margin: 15px 10px; font-size:15px;">
						<a href="./bootstrap/pdf/<?php echo $row['pdf'];?>">Dowload</a>
					 </div>				
													
				
			</div>
			
			
			</html>