<?php
  session_start();
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

<?php
	

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
		<title>Description</title>
		
	</head>
	
	<body>
	
	 <!--********************* Start of the top nevigation bar******************-->
		 <div class="topnav" style="">
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
	
		
		
		
			
		<div class="row" style="background-color:; margin:20px" id="description">			
			<div class="leftcolumn" style="width:40%;  " >						
				<div class="fakeimg" style="height:400px; width:100%; background-repeat: no-repeat; background-color:white;">
					
					<img src="./bootstrap/img/<?php echo $row['book_image']; ?>" alt="Cinque Terre" style="width:75%;height:100%;" >
										
				</div>
			</div>
			
			<div class="rightcolumn" style="width:60%; background-color:white; height:400;">
				
					<h2>Details</h2>
					
					<p><?php echo $row['book_descr']; ?></p><br>
					
					
					          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "book_descr" || $key == "book_image" || $key == "publisherid" || $key == "book_title" || $key == "categeryid" || $key == "pdf"){
                continue;
              }
              switch($key){
				
                case "book_isbn":
                  $key = "ISBN";
                  break;
                case "book_title":
                  $key = "Title";
                  break;
                case "book_author":
                  $key = "Author";
                  break;
				  
                case "book_price":
                  $key = "Price";
                  break;
				 
				
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
               if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>	
					<div class="cartbutton" style="float:right; height:50px; margin: 15px 10px; font-size:15px;">
						<a href="check_out.php?bookisbn=<?php echo $row['book_isbn']; ?>">Add to cart</a>
					 </div> 
				</div>
			
		</div>

		<div class="footer">
			<p>ProFlowers</p>
		</div>

	</body>
</html>