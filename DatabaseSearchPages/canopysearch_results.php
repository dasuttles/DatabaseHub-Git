<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
        <title>Campus Canopy and Spectator Index Results</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A database and digitized collection of the Georgia State Womens College Campus Canopy and the Valdosta State College Spectator at Valdosta State University, from 1934-1970.">
        <meta name="author" content="Valdosta State University Archives, Dallas Suttles, The Spectator,">
        <meta name="keywords" content="Valdosta State University, Archives and Special Collections, Campus Canopy Index, Valdosta State History, Georgia, Database, Georgia State Womens College, Womens History, Spectator, Newspaper Archive, College Newspapers, Student Newspapers, Digitized Newspapers, Valdosta,">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
<body>
<h1>Campus Canopy Search Results</h1>
<p>
<h3><a href="http://archives.valdosta.edu/research/canopysearch.shtml">Return to the search page.</a></h3>
<?php
	include('ec_connect.php');

$searchterm=$_GET['searchterm']; 

$query = "SELECT year, volume, title, author, date, page_number, people_in_article, subjects_in_article, brief_summary, MATCH (title, author, people_in_article, subjects_in_article, brief_summary) AGAINST ('$searchterm') AS score FROM campus_canopy_project WHERE MATCH (title, author, people_in_article, subjects_in_article, brief_summary) AGAINST ('$searchterm')";

$result = mysql_query($query);
$numresults = mysql_num_rows($result); 
//echo "$query";
echo '<p class="lead martel"> You searched for:'.$searchterm.'</p>';
echo '<p class="lead martel"> Number of Results:'.$numresults.'</p>';

$counter =1;

echo "<table class="table table-striped table-bordered">";
echo "<tr class="table-header">
<td>Result Number</td>
<td>Year</td>
<td>Volume</td>
<td>Article Title</td>
<td>Author</td>
<td>Date</td>
<td>Page Number</td>
<td>People In Article</td><td>Subjects In Article</td>
<td>Brief Summary</td>
</tr>";
while ($row = mysql_fetch_array($result)){
 	echo "<tr class="table-body">";
	echo "<td>".$counter."</td>";
	echo "<td>$row[year]</td>";
	echo "<td>$row[volume]</td>";
	echo "<td>$row[title]</td>";
	echo "<td>$row[author]</td>";		
	echo "<td>$row[date]</td>";
	echo "<td>$row[page_number]</td>";
	echo "<td>$row[people_in_article]</td>";
	echo "<td>$row[subjects_in_article]</td>";
	echo "<td>$row[brief_summary]</td>";
	echo "</tr>";
    echo "</table>";
$counter++;
}
?>
</body>
</html>
