<?php 
include("include/config.php");
include("include/functions.php");
if (isset($_GET['script']) AND isset($_GET['license'])) {
	
	$script = $_GET['script'];
	$license = $_GET['license'];

	if (!empty($script) AND !empty($license)) {

		if (checkLicense($license,$script)) {

			if(checkIP($license,get_client_ip())){

				echo 1;
				logs('Key : ['.$license.'] Script : ['.$script.'] Run Script Success With IP: ['.get_client_ip().']', 1);
			}else{

				echo 3;
				logs('Key : ['.$license.'] Script : ['.$script.'] IP Error With IP: '.get_client_ip().']', 3);
			}

		}else{

			echo 2;
			logs('Key : ['.$license.'] Script : ['.$script.'] License Error With IP: '.get_client_ip().']', 2);

		}

	}else{

		echo 4;
		logs('IP: ['.get_client_ip().'] Do not put License Key Or Script Name', 4);

	}

}

?>
