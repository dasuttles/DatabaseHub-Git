<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Video Database Index</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="VSU Archives Video Database">
		<meta name="author" content="Valdosta State University Archives and Special Collections, Dallas Suttles,">
		<meta name="keywords" content="Valdosta State University, Archives and Special Collections, Valdosta State Video Database  Index, Valdosta State History, Georgia, Database, Georgia State Womans College, Womens History, Valdosta State College, Valdosta,">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://raw.githubusercontent.com/dasuttles/GithubBak/master/DatabaseSearchPages/style.css" type="text/css" />
		</head>
		<body id="bg">
		<?php include_once("includes/analyticstracking.php") ?>
			<div class="container-fluid">
				<div class="row-fluid">
					<h1 class="martel bevel">Video Collection Search Results</h1>
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
						echo "<div class=\"table-responsive\">";
								echo "<table class=\"table table-bordered\">";
										echo "<tr>
													<td>Result Number</strong></td></td><td>Organization</strong></td><td>Date</strong></td><td>Event/Title</strong></td><td>Time</strong></td><td>Original Format</strong></td><td>Copy Format</strong></td><td>Edited?</strong></td><td>Number of Tapes</strong></td><td>Tape Number</strong></td><td>Box Number</strong></td><td>Digitized?</strong></td><td>Copies Made</strong></td><td>Summary</strong></td><td>People</strong></td><td>Subjects</strong></td><td>Reformatting Date</strong></td><td>Collection Name</strong></td><td>Collection Number</strong></td><td>Indexed?</strong></td></tr>";
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
								</div>
							</div>
							<!-- //Container-Responsive -->
						</div>
					</body>
				</html>