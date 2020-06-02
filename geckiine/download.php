<?php
	require_once("Zip.php");
	
	# Grab the _POST parameters (temporarily from _GET)
	$ipOne = $_POST["ip1"];
	$ipTwo = $_POST["ip2"];
	$ipThree = $_POST["ip3"];
	$ipFour = $_POST["ip4"];
	
	# Open the file and read the data
	$elfFile = fopen("geckiine_unpatched.elf", "rb");
	$elfData = fread($elfFile, filesize("geckiine_unpatched.elf"));
	$unpacked = unpack("C*", $elfData);
	fclose($elfFile);
	
	# Patch the file
	$unpacked[24143] = (int) $ipOne;
	$unpacked[24144] = (int) $ipTwo;
	$unpacked[24147] = (int) $ipThree;
	$unpacked[24148] = (int) $ipFour;
	
	# Declare a variable to hold the patched file contents
	$patchedFile = "";
	
	# Write the temporary file to the variable
	foreach ($unpacked as $value) {
		$patchedFile .= pack("C", $value);
	}
	
	# Create a ZIP file in memory
	$zipFile = new Zip();
	$zipFile->addDirectory("geckiine");
	$zipFile->addFile($patchedFile, "geckiine/geckiine.elf");
	$zipFile->addFile(file_get_contents("https://raw.githubusercontent.com/OatmealDome/Geckiine/master/meta/icon.png"), "geckiine/icon.png");
	$zipFile->addFile(file_get_contents("https://raw.githubusercontent.com/OatmealDome/Geckiine/master/meta/meta.xml"), "geckiine/meta.xml");
	
	# Send the ZIP file to the user
	$zipFile->sendZip("geckiine.zip");
?>