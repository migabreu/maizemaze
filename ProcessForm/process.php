<?php
    $filename = "SignUps2013.csv";
    $new = (file_exists($filename));

 	$handle = fopen($filename, 'a');
	$msg = "";
	$stringToAdd="";

	if (!$new){
		foreach($_POST as $name => $value) {
			$stringToAdd.="$name,";
		}
		$stringToAdd.="\n";
		$new=False;
		fwrite($handle, $stringToAdd);
	}
	$stringToAdd="";
	foreach($_POST as $name => $value) {
		print "$name : $value<br>";
		$msg .="$name : $value\n";
		$stringToAdd.="$value,";
	}
	$stringToAdd.="\n";

	fwrite($handle, $stringToAdd);
	//now close the file
	fclose($handle); 

	$headers = "From: ". $_POST["parent_name"] ."<".$_POST["usremail"]. ">\r\n";
	
	mail('migabreu@umich.edu', 'Registration', $msg,$headers);



	echo "Email sent";
?>