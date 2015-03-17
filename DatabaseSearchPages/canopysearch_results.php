<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Campus Canopy and Spectator Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A database and digitized collection of the Georgia State Womens College Campus Canopy and the Valdosta State College Spectator at Valdosta State University, from 1934-1970.">
        <meta name="author" content="Valdosta State University Archives, Dallas Suttles, The Spectator,">
        <meta name="keywords" content="Valdosta State University, Archives and Special Collections, Campus Canopy Index, Valdosta State History, Georgia, Database, Georgia State Womens College, Womens History, Spectator, Newspaper Archive, College Newspapers, Student Newspapers, Digitized Newspapers, Valdosta,">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://raw.githubusercontent.com/dasuttles/GithubBak/master/DatabaseSearchPages/style.css" type="text/css" />
</head>
<body id="bg">
<div class="container-fluid">
<div class="row-fluid">
<h1 class="martel">Campus Canopy Search Results</h1>
<p>
<h3><a href="canopysearch.shtml">Return to the search page.</a></h3>
<?php
  $dbhost = 'codex.valdosta.edu';
  $dbuser = 'archives';
  $dbpassword = 'arch1';
  $dbname = 'extra_credit';

  mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to mysql');
  mysql_select_db($dbname);
  

$searchterm=$_GET['searchterm']; 

$query = "SELECT year, volume, title, author, date, page_number, people_in_article, subjects_in_article, brief_summary, MATCH (title, author, people_in_article, subjects_in_article, brief_summary) AGAINST ('$searchterm') AS score FROM campus_canopy_project WHERE MATCH (title, author, people_in_article, subjects_in_article, brief_summary) AGAINST ('$searchterm')";

$result = mysql_query($query);
$numresults = mysql_num_rows($result); 
//echo "$query";
echo '<p> You searched for:<strong>'.$searchterm.'</strong></p>';
echo '<p> Number of Results:<strong>'.$numresults.'</strong></p>';

$counter =1;
echo "<div class=\"table-responsive\">";
echo "<table class=\"table table-bordered\">";
echo "<tr>
<td><strong>Result Number</strong></td>
<td><strong>Year</strong></td>
<td><strong>Volume</strong></td>
<td><strong>Article Title</strong></td>
<td><strong>Author</strong></td>
<td><strong>Date</strong></td>
<td><strong>Page Number</strong></td>
<td><strong>People In Article</strong></td>
<td><strong>Subjects In Article</strong></td>
<td><strong>Brief Summary</strong></td>
</tr>";
while ($row = mysql_fetch_array($result)){

  echo "<tr>";
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

$counter++;
}



?>
</div>
</div>
<!-- //Container-Responsive -->
</div>
</body>
</html>
