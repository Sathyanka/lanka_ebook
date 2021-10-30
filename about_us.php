<?php
  session_start();
  $count = 0;
  // connec to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();  
  


	

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
		<title>About Us</title>
		
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
					<a href="about_us.php">About Us</a>
				</li>
				<li>
					<a href="my_account.php">My account</a>
				</li>	
			
				
			</ul>
		</div>
		<!-- ****************************End of the top nevigation bar ************************************-->
		
		<!--****************************Start of the headr bar ****************************-->
		<div class="header">
			  <h3 > Where flowers<br> are our inspiration</h3>
			
			
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
		<div class="row" style="background-color:; margin:20px">
			<div class="card" style="background-color:transparent; width:100%; height:450px;">
				<div class="leftcolumn" style="width:590px;" >						
					<div class="fakeimg" style="height:400px; width:100%; margin:5px;">
						<img src="Images/gallery01.jpg" alt="Cinque Terre" >					
					</div>

				</div>
			
				<div class="rightcolumn" style="width:400px; background-color:transparent; height:200px; margin:20px; 	margin-left:50px; text-align:center; ">				
					
					<p style="font-size:25px; text-align:justify;">Trust Flowers to help you deliver some birthday love to that special someone. We've even got birthday flower cards with living flowers inside. Sending happy birthday flower bouquets lets your favorite birthday guys and gals know how much they mean to you. Whether you’re shopping for Mother’s Day flowers delivered on Sunday or holiday gifts — order flowers online with us, and you’re sure to make their day!</p>					  
				</div>
			</div>
		</div>
		<div class="row" style="background-color:; margin:20px">
			<div class="card" style="background-color:transparent; width:100%; height:450px;">
				<div class="leftcolumn" style="width:400px; background-color:transparent; height:200px; margin:20px; 	margin-left:50px;text-align:center; ">				
					</h2><h1><span style="color:#ff0066; font-size:60px;">ProFlowers</span>	</h1>
					<h2 style="color:white; font-size:50px; text-align:center; text-top:250px;">Hope in Bloom Bouquet.		  
				</div>
				<div class="rightcolumn" style="width:590px; background-color:transparent;" >						
					<div class="fakeimg" style="height:400px; width:100%; margin:15px;">
						<img src="Images/gallery05.jpg" alt="Cinque Terre" style="width:590" >					
					</div>

				</div>
			
				
			</div>
		</div>
		<div class="row">
			<div class="card" style="background-color:white;">
			<h1>Best Selling Flowers</h1>
			<h2>Great Customer Service and Quick Flower Delivery</h2>
				<p style="text-align:justify;">Here at ProFlowers, we want every customer to have a great experience. We go out of our way to provide excellent customer service and ensure that you’re happy with your order. In addition to offering beautiful flower arrangements online and a wide selection of gifts for all occasions, we also make sure that your flowers are delivered as quickly as possible.   That’s because customer satisfaction is our top priority. In fact, we offer a satisfaction guarantee, so if for some reason you’re not satisfied with the freshness or condition of your gift, we’ll either replace it or refund your money!   If you have any questions for us, we’re available to talk 24 hours a day, seven days a week. Feel free to call us, email us, or use our handy live support chat to get the help you need with your order.</p><br><br>
				
			
				<h2>Flower Delivery From Local and Trusted Florists</h2>
				<p style="text-align:justify;">When you order flowers online from ProFlowers, you’re helping to support locally owned florists in your own community. We’re proud to partner with local florists and provide them with technology and other digital tools that allow their businesses to flourish.   We make sure to only partner with local florists who we trust, and who have the same high standards as us. Through these partnerships, we’re able to offer you fresh arrangements and same-day flower delivery. Support your neighborhood florist and get the freshest flower arrangements at low prices.</p>	<br><br>
				
				
				<h2>Fresh Flowers for Delivery</h2>
				<p style="text-align:justify;">Get fresh and beautiful floral arrangements delivered right to your door when you shop with ProFlowers. Treat yourself to a stunning bouquet or send flowers to someone close to you. If you’re purchasing flowers for a particular event, we have you covered. Whether you’re ordering birthday flowers or sympathy flowers, we have a fresh bouquet that’s perfect for the occasion.   Shopping on a budget? Then you’re in the right place — we can deliver flower bouquets and other gifts at an affordable price. Just shop our discount flowers to check out some of the best deals we have to offer.</p>	<br><br>
				
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
		<div class="footer">
			<p>ProFlowers</p>
		</div>
		
	</body>
</html>