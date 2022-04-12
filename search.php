<!--
	this file should be saved to the websites root directory
	(the same directory as the websites homepage)
	try to create the database in mysql phpadmin

-->

<!DOCTYPE html>
<html lang="en-GB">
<head>
	<title>search results</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0">
	<link rel="stylesheeet" type="text/css" href="main.css">
	</head>
	<body>
	<?php
	
	#replace variables with details of the database
	$server_name = "LOCALHOST";
	$user_name = "USERNAME";
	$password = "PASSWORD";
	$database = "DATABASE";

	#connect to dql database. if failed then exit
	$con = mysqli_connect($server_name, $user_name, $password, $database);
	if (mysqli_connect_errorno()) {
		echo "failed to connect to mySQL: ". mysqli_connect_error();
		exit();
	}

	#retrieve the search query using the GET command
	#if no search query is provided, then the web page will ask the user to try again
	if (isset($_GET['search'])) {
		$param = "%{$_GET['search']}%";
		$query = mysqli_prepare($con, "SELECT * FROM Results WHERE Description LIKE ?");
		mysqli_stmt_bind_param($query, "s", $param);
		mysqli_stmt_execute($query);
		$results = mysqli_stmt_get_result($query);
		$rows = mysqli_num_rows($results);
		mysqli_stmt_close($query);

		if ($rows > 0) {
			echo "<h2>Search results for: {$_GET['search']}</h1>";

			while ($result = mysqli_fetch_array($results)) {
				$result_title = $result['Title'];
				$result_url = $result['URL'];
				$result_preview = $result['Preview'];

				echo "<div class='search_result'>
					<h3><a href='$result_link'>$result_title</a></h3>
					<article><a href='$result_url'>$result_preview</a></article>
					</div>";
			}
		}
		else { echo "<h2>No results found for {$_GET['search']}</h2>"; }
	}
	else { echo "<h2>No search query provided. Please try searching again..</h2>"; }
	mysqli_close();

	?>

	</body>
	</html>

