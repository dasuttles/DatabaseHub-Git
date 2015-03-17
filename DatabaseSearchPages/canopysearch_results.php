<?php require_once('includes/ec_connect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_DatabaseServer, $DatabaseServer);
$query_canopyresultsquery = "SELECT * FROM campus_canopy_project ORDER BY canopy_id DESC LIMIT 20";
$canopyresultsquery = mysql_query($query_canopyresultsquery, $DatabaseServer) or die(mysql_error());
$row_canopyresultsquery = mysql_fetch_array($canopyresultsquery);
$totalRows_canopyresultsquery = mysql_num_rows($canopyresultsquery);

mysql_free_result($canopyresultsquery);
?>
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
        <link rel="stylesheet" href="https://raw.githubusercontent.com/dasuttles/GithubBak/master/DatabaseSearchPages/style.css" type="text/css" />
<meta charset="utf-8">
<title>Campus Canopy Data Entry Form</title>
</head>

<body class="container-fluid">
<h1>Entry Submitted.</h1>
<table class="table table-bordered">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Year</th>
    <th scope="col">Volume</th>
    <th scope="col">Title</th>
    <th scope="col">Author</th>
    <th scope="col">Date</th>
    <th scope="col">Page Number</th>
    <th scope="col">People</th>
    <th scope="col">Subjects</th>
    <th scope="col">Summary</th>
    <th scope="col">Initials</th>
    <th scope="col">Edit</th>
  </tr>
  <tr>
    <td>&nbsp;<?php echo $row_canopyresultsquery['canopy_id']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['year']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['volume']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['title']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['author']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['date']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['page_number']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['people_in_article']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['subjects_in_article']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['brief_summary']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['initials']; ?></td>
    <td>&nbsp;<a href="canopyupdate.php">Edit this Record</a></td>
  </tr>
 </table>
 
 <a href="http://archives.valdosta.edu/volunteers/canopyform.php">Return to Form</a>
 <a href="http://archives.valdosta.edu/volunteers/main.php">Ruturn to volunteer page</a>
 </body>
 </html>
