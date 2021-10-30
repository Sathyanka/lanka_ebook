<?php
	session_start();
	require_once "./functions/database_functions.php";
	// get pubid
	if(isset($_GET['catid'])){
		$catid = $_GET['catid'];
	} else {
		echo "Wrong query! Check again!";
		exit;
	}

	// connect database
	$conn = db_connect();
	$catName = getCatName($conn, $catid);

	$query = "SELECT book_isbn, book_title, book_image,book_price  FROM books WHERE categeryid = '$catid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty books ! Please wait until new books coming!";
		exit;
	}

	
?>
	<?php
	//require_once "./functions/database_functions.php";

	$query = "SELECT * FROM catogeries ORDER BY categeryid";
	$result3 = mysqli_query($conn, $query);
	if(!$result3){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result3) == 0){
		echo "Empty catogeries ! Something wrong! check again";
		exit;
	}
	
?>
	
	
<html>

	<head>
		<link rel="stylesheet" href="styles.css">
		<title>Product</title>
		
	</head>
	
	<body>
	 <!--********************* Start of the top nevigation bar******************-->
		 <div class="topnav" >
			<h2>ProFlowers</h2>
			<ul>			
				<li>
					<a  href="home_page.php">Home</a>
				</li>
			
				<li>
					<a href="contact_us.html">Contact us</a>
				</li>
				<li>
					<a href="about_us.php">About Us</a>
				</li>
				<li>
					<a href="my_account.php">My account</a>
				</li>
			</ul>
		</div>
		<!-- ****************************End of the top nevigation bar ************************************-->
		
		<!--****************************Start of the headr bar ****************************-->
		<div class="header" style="background-image:url(Images/header02.jpg); ">
			  <h3 style="color:white; font-size:45px;">Make their day special with a gorgeous bouquet.</h3>		
		
		</div>
		
		<!--**************************** End of the headr bar****************************-->
	
		<!--**************************** Start of the second nevigation bar ****************************-->
	
	
		<div class="topnav"  style=" float:right;  margin-top:10px; width:100%;">
			<ul style="background-color:white;">
			
				<?php 
		while($row1 = mysqli_fetch_assoc($result3)){
			 $count = 0; 
			$query = "SELECT categeryid FROM books";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($catInBook = mysqli_fetch_assoc($result2)){
				if($catInBook['categeryid'] == $row1['categeryid']){
					$count++;
			}
			}
	?>
				<li>
				<a href="product.php?catid=<?php echo $row1 ['categeryid'];?>">
				<?php echo $row1 ['categery_name']; ?></a></li>
				<?php } ?>
 
			</ul>
		</div>
		<!-- ****************************End of the second nevigation bar ****************************-->
		<?php while($row = mysqli_fetch_assoc($result)){
?>
				<div class="row">
        	
				
			<div class="gallery">
			
				<a href="description.php?bookisbn=<?php echo $row['book_isbn']; ?>">
					<img src="./bootstrap/img/<?php echo $row['book_image']; ?>" alt="book image" style="width:100%; height:75%; " >
				</a>
				<div class="desc">
					<a href="description.html#description"><?php echo $row['book_title']; ?></a>
				</div>
				<div class="desc"> </div>
				<div class="cartbutton">
					<a href="cart.html#mycart"><?php echo $row['book_price']; ?></a>
				</div>			
			</div>
			<?php } ?>
				</div>
			
			
			
			
	

		
		<div class="row">  
			<div class="card" style="background-color:transparent;">
				<div class="row">
					<div class="column">
						<div class="fakeimg" style="height:200px;">
							<a target="" href="about_us.html">
								<img src="Images/gallery01.jpg" alt="Cinque Terre" style="width:100%; height:100%; " >
							</a>
						</div>
					</div>
					
					<div class="column">
						<div class="fakeimg" style="height:200px;">
							<a target="" href="about_us.html">
								<img src="Images/gallery02.jpg" alt="Cinque Terre" style="width:100%; height:100%; " >
							</a>
						</div>
					</div>
					
					<div class="column">
						<div class="fakeimg" style="height:200px;">
							<a target="" href="about_us.html">
								<img src="Images/gallery03.jpg" alt="Cinque Terre" style="width:100%; height:100%; " >
							</a>
						</div>
					</div>
					
					<div class="column">
						<div class="fakeimg" style="height:200px;">
							<a target="" href="about_us.html">
								<img src="Images/gallery04.jpg" alt="Cinque Terre" style="width:100%; height:100%; " >
							</a>
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
						<h3><a href="about_us.html">follow Us</a></h3>
						<li> <a href="#news">Twiter</a> </li>
						<li> <a href="#news">FaceBook</a></li>
						<li><a href="#news">Instragram </a></li>
							
					</ul>
				</div>
				<div class="column" style="width:30%;margin-left:20px;">		
					<ul>
						<h3><a href="">Fllowers</a></h3>
						
						<li><a href="product2.html">Love </a></li>
						<li><a href="product2.html"> Baby born</a></li>
						<li><a href="product2.html">Valentine's Day</a></li>
						<li><a href="product2.html">Thank you</a></li>			
						<li><a href="product2.html">Getwel</a></li>
						<li><a href="product2.html">Congratulations</a></li>
						<li><a href="product2.html">Aniversary</a></li>
					</ul>
				</div>
			
			</div>
		</div>				
			</div>

		</div>
		<div class="footer">
			<p>ProFlowers</p>
		</div>
	</body>
</html>	