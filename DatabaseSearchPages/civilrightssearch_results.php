<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Southern Patriot Newspaper Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The index of the Southern Patriot, a progressive Civil Rights Newspaper.">
        <meta name="author" content="Valdosta State University Archives, Dallas Suttles">
        <meta name="keywords" content="Valdosta State University, Southern Patriot, Newspaper, Civil Rights, History, Georgia, Database, Index,Archives, United States History, African American History, SNCC,">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
         <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
        <!--Database-->
	<?php include('includes/ec_connect.php'); ?>
</head>
<body id="bg">
<?php include_once("includes/analyticstracking.php") ?>
<div class="container-fluid">
		<div class="row-fluid">
			<h1 class="martel">Civil Rights Newspapers Results</h1>
<h3><a href="civilrightssearch.shtml">Return to the search page.</a></h3>
<?php
	$dbhost = 'codex.valdosta.edu';
	$dbuser = 'archives';
	$dbpassword = 'arch1';
	$dbname = 'extra_credit';

	mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
	

$searchterm=$_GET['searchterm'];

$query = "SELECT newspaper_title, article_title, article_date, page_number, people_in_article, subjects_in_article, brief_summary, MATCH (article_title,  people_in_article, subjects_in_article, brief_summary) AGAINST ('$searchterm') AS score FROM civil_rights_newspapers WHERE MATCH (article_title, people_in_article, subjects_in_article, brief_summary) AGAINST ('$searchterm')";

$result = mysql_query($query);
$numresults = mysql_num_rows($result); 
//echo "$query";
echo '<p> You searched for:<strong>'.$searchterm.'</strong></p>';
echo '<p> Number of Results:<strong>'.$numresults.'</strong></p>';

$counter =1;

echo "<div class=\"row-fluid\">";
				echo "<div class=\"table-responsive\">";
						echo "<table class=\"table table-bordered table-striped\">";
									echo "<tr> 
									<th>Result Number</th>
									<th>Newspaper Title</th>
									<th>Article Title</th>
									<th>Date</th>
									<th>Page Number</th>
									<th>People In Article</th>
									<th>Subjects In Article</th><th>Brief Summary</th>
									</tr>";
while ($row = mysql_fetch_array($result)){

	echo "<tr>";
	echo "<td>".$counter."</td>";
	echo "<td>$row[newspaper_title]</td>";
	echo "<td>$row[article_title]</td>";
	echo "<td>$row[article_date]</td>";		
	echo "<td>$row[page_number]</td>";
	echo "<td>$row[people_in_article]</td>";
	echo "<td>$row[subjects_in_article]</td>";
	echo "<td>$row[brief_summary]</td>";
	echo "</tr>";

$counter++;
}
?>
</div>
				</div>
			</div>
			<!-- //Container-Responsive -->
		</div>
		
	</body>
</html>