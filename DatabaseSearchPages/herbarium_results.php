<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Civil Rights Newspapers Results</title>
</head>

<body>
<h1>Valdosta State College: Herbarium Slide Index</h1>
<p>Info about slides here</p>
<h3><a href="herbarium.shtml">Return to the search page.</a></h3>
<?php
	$dbhost = 'codex.valdosta.edu';
	$dbuser = 'archives';
	$dbpassword = 'arch1';
	$dbname = 'extra_credit';

	mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
	

$searchterm=$_GET['searchterm'];

$query = "SELECT filename, keywords, description, headline, title, country, MATCH (keywords, description, headline, country, description_writer) AGAINST ('$searchterm') AS score FROM herbarium WHERE MATCH (keywords, description, headline, country, description_writer) AGAINST ('$searchterm')";

$result = mysql_query($query);
$numresults = mysql_num_rows($result); 
//echo "$query";
echo '<p> You searched for:<strong>'.$searchterm.'</strong></p>';
echo '<p> Number of Results:<strong>'.$numresults.'</strong></p>';

$counter =1;

echo "<table border='1' cellspacing = '0'>";
echo "<tr><td bgcolor='#c0c0c0' align='center'><strong>Result Number</strong></td></td><td bgcolor='#c0c0c0' align='center'><strong>Filename</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Keywords</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Description</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Headline</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Title</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Location</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Identifier</strong></td><td bgcolor='#c0c0c0' align='center'><strong>description_writer</strong></td></tr>";
while ($row = mysql_fetch_array($result)){

	echo "<tr>";
	echo "<td>".$counter."</td>";
	echo "<td>$row[filename]</td>";
	echo "<td>$row[keywords]</td>";
	echo "<td>$row[description]</td>";		
	echo "<td>$row[headline]</td>";
	echo "<td>$row[title]</td>";
	echo "<td>$row[country]</td>";
	echo "<td>$row[description_writer]</td>";
	echo "</tr>";

$counter++;
}



?>
</body>
</html>
