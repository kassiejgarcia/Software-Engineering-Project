<html>
<head>
<style>
form {
width: 400px;
margin: auto;
margin-top: -142px;
}
input {
padding: 2px;
border: 0px;
font-size: 15px;
}
.search {
width: 50%;
}
.submit {
width: 70px;
background-color: #1c87c9;
color: #ffffff;
}
</style>

</head>
<body>
<form action="" method="get" name="form">
<input type="text" name="search" class="search" placeholder="Search" autocomplete="off">
<input type="submit" name="submit" class="submit" value="Search">
</form>

<?php
include("includes/db.php");
#check if keywords were provided
if (isset($_GET['search']) && $_GET['search'] != '') {

	#save the keywords from the url
	$k = trim($_GET['search']);

	#create a base query and words string
	$query_string = "SELECT * FROM search_results WHERE ";
	$display_words = "";

	#seperate keywords
	$keywords = explode(' ', $k);
	foreach($keywords as $word) {
		$query_string .= " keywords LIKE '%".$word."%' OR ";
		$display_words .= $word." ";
	}
	$query_string = substr($query_string, 0, strlen($query_string) - 3);

	$query = mysqli_query($con, $query_string);
	$result_count = mysqli_num_rows($query);

	#check if any results were returned
	if ($result_count > 0) {

		#redirect user to shop.php if a search was made
		#$shop_page = "shop.php";
		#header("Location: $shop_page");
		
		
		
		#display search count for user
		echo '<br /><div class="right"><b><u>'.$result_count.'</u></b> results found</div>';
		echo 'Your search results for <i>'.$display_words.'</i>';
		
		echo '<table class="search">';
		#display search results to user
		while($row = mysqli_fetch_assoc($query)) {
			echo '<h1 class="sh1"><u><a href="'.$row['url'].'">'.$row['title'].'</h1></u></a>';
		}
		echo '</table>';
	}
	else {
		echo "No results found. Please search for something else.";
	}
}
		

?>
</body>
</html>
