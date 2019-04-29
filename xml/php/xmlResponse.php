<?php	

	$recievedXML = file_get_contents("php://input");		

	header("Content-type: text/xml");

	echo $recievedXML;

	/*
	header("Content-type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8'?>";
	echo "<note>";
		echo "<from>Jani</from>";
		echo "<to>Tove</to>";
		echo "<message>Remember me this weekend</message>";
	echo "</note>";
	*/

?> 
