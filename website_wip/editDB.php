<!DOCTYPE html>

<!--


	This is where you can delete/edit questions or whatever


-->

<html>

<head>

<title> Check the questions </title>

<link type="text/css" rel="stylesheet" href="css/mainSS.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body>

  <div id="top">
    <a href="index.html"> <img src="images/maizeMazeLogoB.jpg" /> </a>
  </div>

	<h2> Questions are displayed below </h2>

<?php 


   // connects to mysql server 
   $db = mysql_connect("localhost", "root", "root");

   // variable for the db name 
   $db_name = "maizeMazeQuestions";

   // attempt to access the db 
   mysql_select_db($db_name, $db);

   // error check 
   if(!mysql_select_db($db_name, $db)){
   die('Database not found!');
   }

   // variable for the sql query 
   $query = sprintf("SELECT * FROM questions");

   // results variable for the sql query 
   $result = mysql_query($query);
   
   // error check 
   if(!$result) {
   $message = 'Invalid query: ' . mysql_error() . "\n";
   $message .= 'Whole query: ' . $query;
   die($message);
   }

   // display options
   echo "id";
   echo " : ";
   echo "Question";
   echo "<br>";
   echo "Correct Answer";
   echo " : ";
   echo "Wrong Answer 1";
   echo " : ";
   echo "Wrong Answer 2";
   echo " : ";
   echo "Wrong Answer 3";
   echo "<br>";
   echo "<br>";


   // display results 
   while ($row = mysql_fetch_assoc($result)){
   echo $row['id'];
   echo " : ";
   echo $row['question'];
   echo "?";
   echo "<br>";
   echo $row['ansCorrect'];
   echo " : ";
   echo $row['ans2'];
   echo " : ";
   echo $row['ans3'];
   echo " : ";
   echo $row['ans4'];
   echo "<br>";
   echo "<br>";

   }
 
   mysql_free_result($result);

?>

<form method="post"
      enctype="application/x-www-form-urlencode"
      action="editDBEntry.php"
      name="editEntry" novalidate>

      <fieldset>
	<label>id:</label>
	<input type="text" name="editId"
		placeholder="Type in the id" required>

	<label>column:</label>

	<select name="editColumn">
	  <option value="question">Question</option>
	  <option value="ansCorrect">Correct Answer</option>
	  <option value="ans2">Incorrect Answer 1 </option>
	  <option value="ans3">Incorrect Answer 2 </option>
	  <option value="ans4">Incorrect Answer 3 </option>
	  <option value="subject">Subject </option>
	  <option value="level">Level </option>
	  </select>

<!--
	<input type="text" name="editColumn"
		placeholder="Type in the column name" required>
-->
	<label>new text:</label>
	<input type="text" name="editChange"
		placeholder="Type in the change" required>
	</fieldset>
		<input type="submit" value="Edit the entry"/>
</form>

<form method="post"
      enctype="application/x-www-form-urlencode"
      action="deleteDBEntry.php"
      name="editEntry" novalidate>

      <fieldset>
	<label>id:</label>
	<input type="text" name="editId"
		placeholder="Type in the id" required>
	</fieldset>
		<input type="submit" value="Delete the entry"/>
</form>



	<form method="link" action="index.html">
		<input type="submit" value="Back to main menu"/>
	</form>

</body>

</html>
