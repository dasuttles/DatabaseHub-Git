<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Video Search Results</title>
</head>

<body>
<h1>Video Collection Search Results</h1>
<p>
<h3><a href="VideoCollectionIndexSearchPage.shtml">Return to the search page.</a></h3>
<?php
	$dbhost = 'codex.valdosta.edu';
	$dbuser = 'archives';
	$dbpassword = 'arch1';
	$dbname = 'extra_credit';

	mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
	

$searchterm=$_GET['searchterm'];


$query = "SELECT orginization, event_date, event, time, original_format, copy_format, edited, number_of_tapes, tape_number, box_number, digitized, copies_made, location, summary, people, subjects, reformatting_date, collection_name, collection_number, indexed, MATCH (orginization, event, summary, people, subjects) AGAINST ('$searchterm') AS score FROM video_collection WHERE MATCH (orginization, event, summary, people, subjects) AGAINST ('$searchterm')";

$result = mysql_query($query) or die ("A mySQL error has occured");
$numresults = mysql_num_rows($result); 

echo '<p> You searched for:<strong>'.$searchterm.'</strong></p>';
echo '<p> Number of Results:<strong>'.$numresults.'</strong></p>';

$counter =1;

echo "<table border='1' cellspacing = '0'>";
echo "<tr><td bgcolor='#c0c0c0' align='center'><strong>Result Number</strong></td></td><td bgcolor='#c0c0c0' align='center'><strong>Organization</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Date</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Event/Title</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Time</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Original Format</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Copy Format</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Edited?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Number of Tapes</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Tape Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Box Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Digitized?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Copies Made</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Summary</strong></td><td bgcolor='#c0c0c0' align='center'><strong>People</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Subjects</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Reformatting Date</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Collection Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Collection Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Indexed?</strong></td></tr>";
while ($row = mysql_fetch_array($result)){

	echo "<tr>";
	echo "<td>".$counter."</td>";
	echo "<td>$row[orginization]</td>";
	echo "<td>$row[event_date]</td>";
	echo "<td>$row[event]</td>";
	echo "<td>$row[time]</td>";		
	echo "<td>$row[original_format]</td>";
	echo "<td>$row[copy_format]</td>";
	if ($row['edited'] = 1){
		echo "<td>Yes</td>";
		}
		else{
			echo "<td>No</td>";
			}			
	echo "<td>$row[number_of_tapes]</td>";
	echo "<td>$row[tape_number]</td>";
	echo "<td>$row[box_number]</td>";
	echo "<td>$row[digitized]</td>";
	if ($row['copies_made'] = 1){
			echo "<td>Yes</td>";
			}
			else{
				echo "<td>No</td>";	
				}
	echo "<td>$row[summary]</td>";
	echo "<td>$row[people]</td>";
	echo "<td>$row[subjects]</td>";
	echo "<td>$row[reformatting_date]</td>";
	echo "<td>$row[collection_name]</td>";
	echo "<td>$row[collection_number]</td>";
	if ($row['indexed'] = 1){
			echo "<td>Yes</td>";
			}
			else{
				echo "<td>No</td>";
				}				
	echo "</tr>";

$counter++;
}
?>

<script>
  (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

  ga("create", "UA-42527340-1", "valdosta.edu");
  ga("send", "pageview");
</script></body>
</html>
