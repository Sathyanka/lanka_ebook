<?php
  session_start();
  $count = 0;
  // connec to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();  
  $row = select4LatestBook($conn);


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
		<title>Home page</title>
		
	</head>
	
	<body>
	
	 <!--********************* Start of the top nevigation bar******************-->
		 <div class="topnav" style="">
			<h2>ProFlowers</h2>
			<ul >			
				<li>
					<a  href="home_page.php">Home</a>
				</li>
			
				<li>
					<a href="contact_us.php">Contact us</a>
				</li>
				<li>
					<a href="about_us.php">About Us</a>
				</li>
				<li>
					<a href="my_account.php">My account</a>
				</li>	
			
				
			</ul>
		</div>
		<!-- ****************************End of the top nevigation bar 
		
		***

	
		<!--****************************Start of the headr bar ****************************-->
		<div class="header">
		
			  <h3 >Send <span style="color:#ff0066">Flowers</span><br> Like you mean it.</h3>
			
			
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
	
		<!-- ****************************Start  of the top images columns ******************************-->
		
		<div class="row">
        	
			<?php foreach($row as $book) { ?>	
			<div class="gallery">
			
				<a href="description.php?bookisbn=<?php echo $book['book_isbn']; ?>">
					<img src="./bootstrap/img/<?php echo $book['book_image']; ?>" alt="book image" style="width:100%; height:75%; " >
				</a>
				<div class="desc">
					<a href="description.html#description"><?php echo $book['book_title']; ?></a>
				</div>
				<div class="desc"> </div>
				<div class="cartbutton">
					<a href="cart.html#mycart"><?php echo $book['book_price']; ?></a>
				</div>			
			</div>
			<?php } ?>
				</div>
			  
		
			
			
			
			
	
		
				
		<!--************** star vedio bar**********************-->
		
		<div class="row" style="background-color:; margin:20px">
			<div class="card" style="background-color:transparent; width:100%; height:450px;">
				<div class="leftcolumn" style="width:590px;" >						
					<div class="fakeimg" style="height:400px; width:100%; margin:5px;">
						<img src="Images/gettyimages-928992402-612x612.jpg" alt="Cinque Terre" >					
					</div>

				</div>
			
				<div class="rightcolumn" style="width:400px; background-color:transparent; height:200px; margin-top:100px; 	margin-left:50px;text-align:center; ">				
					<h2><span style="color:#660029; font-size:60px;">Suprise Your</span> <span style="color:#ff0066; font-size:60px;">Valentine!</span> <br>Let Us arrange a smile.</h2>
					<h5>Where flower are our inspiration to create lasting memories. What ever the occasion.....</h5>					  
				</div>
			</div>
		</div>
		
	
		<div class="circle">
			<img src="Images/circle_image1.jpg" alt="Cinque Terre" style="width:100%; height:100%; " >
		</div>
		<div class="circle">
			<img src="Images/circle_image2.jpeg" alt="Cinque Terre" style="width:100%; height:100%; " >
		</div>
		<div class="circle">
			<img src="Images/circle_image3.jpg" alt="Cinque Terre" style="width:100%; height:100%; " >
		</div>
		<div class="circle">
			<img src="Images/circle_image4.jpg" alt="Cinque Terre" style="width:100%; height:100%; " >
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
		</div>
		
		
		<div class="footer">
			<p>ProFlowers</p>
		</div>

	</body>
</html>