<?php 
include("include/config.php");
include("include/functions.php");

if (isset($_POST['action'])) {
	
	$action = $_POST['action'];
	if($action == "login"){
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		if (!empty($username) || !empty($password)) {

			$sql = "SELECT * FROM members WHERE username='$username'";
			$query = mysqli_query(connDB(),$sql);
			$row = mysqli_num_rows($query);
			$result = mysqli_fetch_assoc($query);
			$username_c = $result['username'];
			$password_c = $result['password'];
			
			if($row == 1){

				if (password_verify($password, $password_c)) {

					$_SESSION['username'] = $username_c;
					logs('User ['.$username_c.'] Login Success With IP: ['.get_client_ip().']', 1);
					echo 1;

				}else{
					logs('User ['.$username_c.'] Login Error Wrong Password With IP: ['.get_client_ip().']', 5);
					echo 3;
				}

			}else{
				logs('IP: ['.get_client_ip().'] Try to log in using username. ['.$username.']', 5);
				echo 2;
			}

			
		}else{
			logs('IP: ['.get_client_ip().'] Try logging in without filling out username and password. ', 5);
			echo 10;

		}

	}

	if($action == "register"){
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		$email    = htmlspecialchars($_POST['email']);
		$phone    = htmlspecialchars($_POST['phone']);

		if (!empty($username) || !empty($password) || !empty($email) || !empty($phone)) {

			if(!check_useralready($username)){

				$password_hash = password_hash($password, PASSWORD_DEFAULT);

				$result = mysqli_query(connDB(),"INSERT INTO members (username,password,email,phone) VALUES ('$username','$password_hash','$email','$phone')");
				if ($result) {
					$_SESSION['username'] = $username;
					logs('User ['.$username.'] Register Success With IP: ['.get_client_ip().']', 1);
					echo 1;

				}else{
					logs('User ['.$username.'] Register Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
					echo 20;
				}

			}else{
				logs('IP: ['.get_client_ip().'] Register With Username ['.$username.'] Because Username already', 5);
				echo 5;

			}

			
		}else{
			logs('IP: ['.get_client_ip().'] Try register in without filling out information.. ', 5);
			echo 10;

		}

	}

	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];

		if ($action == "buy") {

			$ip = $_POST['ip'];
			$id = $_POST['id'];
			$key = generateKey();
			$folder = get_scriptfoldername($id);

			if (!empty($ip) or empty(!$id)) {
				if (get_memberpoint($username) >= get_scriptprice($id)) {
					


					$result1 = mysqli_query(connDB(),"INSERT INTO license (license, script, ip, name) VALUES ('$key','$folder','$ip','$username')");

					if ($result1) {

						remove_memberpoint($username,get_scriptprice($id));
						logs('User ['.$username.'] Buy Script ['.$folder.'] Success With IP: ['.get_client_ip().']', 1);
						echo 1;
					}else{
						logs('User ['.$username.'] Buy Script ['.$folder.'] With IP: ['.get_client_ip().'] Because MySQL Error', 5);
						echo 20;
					}

				}else{
					logs('User ['.$username.'] Buy Script ['.$folder.'] Error With IP: ['.get_client_ip().'] Because the points are not enough', 5);
					echo 6;

				}

			}else{
				logs('User ['.$username.'] Buy Script Error With IP: ['.get_client_ip().'] Because wrong script id', 5);
				echo 3;

			}

			

		}

		if ($action == "updateip") {

			$id = $_POST['id'];
			$ip = $_POST['ip'];
			
			if (!empty($id) or !empty($ip)) {

				if(check_havescript($id,$username)){
					$result = mysqli_query(connDB(),"UPDATE license SET ip='$ip' WHERE id='$id'");
					if ($result) {
						remove_memberpoint($username,$price_changeip);
						logs('User ['.$username.'] UPDATE script IP to ['.$ip.'] Success With IP: ['.get_client_ip().'] ', 1);
						echo 1;
					}else{
						logs('User ['.$username.'] UPDATE script IP to ['.$ip.'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
						echo 20;
					}

				}else{
					logs('User ['.$username.'] UPDATE script IP to ['.$ip.'] Error With IP: ['.get_client_ip().'] Because Not Have Script', 5);
					echo 7;
				}
			}

		}

		if ($action == "usecode") {

			$code = $_POST['code'];
			if (!empty($code)) {
				if(check_code($code)){
					if(check_code_used($code)){

						add_memberpoint($username, get_code_point($code));
						update_codestatus($code);
						logs('User ['.$username.'] Use Code ['.$code.'] System Add Point ['.get_code_point($code).'] Point Success With IP: ['.get_client_ip().'] ', 1);
						echo 1;
							
					}else{
						logs('User ['.$username.'] Use Code ['.$code.'] With IP: ['.get_client_ip().'] But Code has been used', 5);
						echo 2;
					}
				}else{
					logs('User ['.$username.'] Use Code ['.$code.'] With IP: ['.get_client_ip().'] But Wrong Code', 5);
					echo 3;
				}
			}else{
				logs('User ['.$username.'] Not input Code With IP: ['.get_client_ip().']', 5);
				echo 20;
			}
		}

		if ($action == "usecodescript") {

			$code = $_POST['code'];
			$ip = $_POST['ip'];
			if (!empty($code)) {
				if(check_code2($code)){
					if(check_code2_used($code)){
						$key = generateKey();
						$script = get_scriptfoldername(get_code_script($code));
						$result = mysqli_query(connDB(),"INSERT INTO license (license,script,ip,name) VALUES ('$key','$script','$ip','$username')");
						update_codestatus2($code);
						logs('User ['.$username.'] Use Code ['.$code.'] System Add Script ['.$script.'] Success With IP: ['.get_client_ip().'] ', 1);
						echo 1;
							
					}else{
						logs('User ['.$username.'] Use Code ['.$code.'] With IP: ['.get_client_ip().'] But Code has been used', 5);
						echo 2;
					}
				}else{
					logs('User ['.$username.'] Use Code ['.$code.'] With IP: ['.get_client_ip().'] But Wrong Code', 5);
					echo 3;
				}
			}else{
				logs('User ['.$username.'] Not input Code With IP: ['.get_client_ip().']', 5);
				echo 20;
			}
		}

		if (is_admin($_SESSION['username'])) {

			if ($action == "addcode") {

				$point = $_POST['point'];
				$code = generateCode();
				if (!empty($point) || !empty($code)) {
					$result = mysqli_query(connDB(),"INSERT INTO code (code,point) VALUES ('$code','$point')");
					if ($result) {
						logs('User ['.$username.'] Generate Code ['.$code.'] For ['.$point.'] Success With IP: ['.get_client_ip().']', 1);
						echo 1;
					}else{
						logs('User ['.$username.'] Generate Code ['.$code.'] For ['.$point.'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
						echo 20;
					}
				}
			}

			if ($action == "addcodescript") {

				$script = $_POST['script'];
				$code = generateCodeScript();
				if (!empty($script) || !empty($code)) {
					$result = mysqli_query(connDB(),"INSERT INTO code_script (code,script) VALUES ('$code','$script')");
					if ($result) {
						logs('User ['.$username.'] Generate Code ['.$code.'] For ['.get_scriptfoldername($script).'] Success With IP: ['.get_client_ip().']', 1);
						echo 1;
					}else{
						logs('User ['.$username.'] Generate Code ['.$code.'] For ['.get_scriptfoldername($script).'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
						echo 20;
					}
				}
			}

			if ($action == "updatemember") {

				$id = $_POST['id'];
				$amount = $_POST['amount'];
				$type = $_POST['type'];

				if (!empty($id) or !empty($amount) or !empty($type)) {

					if($type == "plus"){
						$result = mysqli_query(connDB(),"UPDATE members SET point=point+'$amount' WHERE id='$id'");
						if ($result) {
							logs('User ['.$username.'] Add ['.$amount.'] Point to User ['.get_memberusername($id).'] Success With IP: ['.get_client_ip().'] ', 1);
							echo 1;
						}else{
							logs('User ['.$username.'] Add ['.$amount.'] Point to User ['.get_memberusername($id).'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
							echo 20;
						}
					}else{
						$result = mysqli_query(connDB(),"UPDATE members SET point=point-'$amount' WHERE id='$id'");
						if ($result) {
							logs('User ['.$username.'] Remove ['.$amount.'] Point From User ['.get_memberusername($id).'] Success With IP: ['.get_client_ip().'] ', 1);
							echo 2;
						}else{
							logs('User ['.$username.'] Remove ['.$amount.'] Point From User ['.get_memberusername($id).'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
							echo 20;
						}
					}

					
				}

			}
			
			if ($action == "addscript") {

				$name = $_POST['name'];
				$foldername = $_POST['foldername'];
				$price = $_POST['price'];
				$file = $_POST['filename'];

				if (!empty($name) || !empty($foldername) || !empty($price) || !empty($file)) {


					$countfiles = count($_FILES['file']['name']);

					@$width = 746;
					@$height = 682;

					$dd = date("YmdHis");
					for($i=0;$i<$countfiles;$i++){
						$filename = "script_".$dd."".$_FILES['file']['name'][$i];
						$images = $_FILES['file']['tmp_name'][$i];
						$type= strrchr($filename,".");

						if ($type==".png" || $type==".jpeg" || $type==".PNG" || $type==".JPEG") {

							$filenn = $dd.$type;

							$new_images = "images/scripts/$filename";
							$size=GetimageSize($images);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_orig);
							ImageDestroy($images_fin);

							rename ("images/scripts/$filename", "images/scripts/$filenn");

						}

					}

					$result = mysqli_query(connDB(),"INSERT INTO script (name, price, foldername, file, image) VALUES 
						('$name', '$price', '$foldername', '$file', '$filenn')");

					if ($result) {
						logs('User ['.$username.'] Add Script ['.$name.'] Success With IP: ['.get_client_ip().'] ', 1);
						header("location: $domain");

					}else{
						logs('User ['.$username.'] Add Script ['.$name.'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
						echo "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่";

					}


				}else{
					logs('User ['.$username.'] Add Script Error With IP: ['.get_client_ip().'] Because Not Input information', 5);
					echo "กรุณากรอกข้อมูลให้ครบ";

				}

			}

			if ($action == "editimage") {

				$id = $_POST['id'];

				if (!empty($id)) {


					$countfiles = count($_FILES['file']['name']);

					@$width = 746;
					@$height = 682;

					$dd = date("YmdHis");
					for($i=0;$i<$countfiles;$i++){
						$filename = "script_".$dd."".$_FILES['file']['name'][$i];
						$images = $_FILES['file']['tmp_name'][$i];
						$type= strrchr($filename,".");

						if ($type==".png" || $type==".jpeg" || $type==".PNG" || $type==".JPEG") {

							$filenn = $dd.$type;

							$new_images = "images/scripts/$filename";
							$size=GetimageSize($images);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_orig);
							ImageDestroy($images_fin);

							rename ("images/scripts/$filename", "images/scripts/$filenn");

						}

					}

					$result = mysqli_query(connDB(),"UPDATE scripts SET image='$filenn' WHERE id='$id'");

					if ($result) {
						logs('User ['.$username.'] Edit Image Script ID ['.$id.'] Success With IP: ['.get_client_ip().'] ', 1);
						header("location: $domain/Script/$id");

					}else{
						logs('User ['.$username.'] Edit Image Script ID ['.$id.'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
						echo "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่";

					}


				}else{
					logs('User ['.$username.'] Add Script Error With IP: ['.get_client_ip().'] Because Not Input information', 5);
					echo "ข้อมูลไม่ครบ";

				}

			}

			if ($action == "editscript") {

				$id = $_POST['id'];
				$name = $_POST['name'];
				$price = $_POST['price'];
				$discount = $_POST['discount'];
				$foldername = $_POST['foldername'];
				$file = $_POST['file'];
				$version = $_POST['version'];
				$description = $_POST['description'];
				$video_youtube = $_POST['video_youtube'];


				if (!empty($name) || !empty($price) || !empty($foldername) || !empty($file) || !empty($version) || !empty($discount)) {


					$result = mysqli_query(connDB(),"UPDATE script SET name='$name', price='$price', foldername='$foldername', file='$file', version='$version', description='$description', video_youtube='$video_youtube', discount='$discount' WHERE id='$id'");

					if ($result) {
						logs('User ['.$username.'] Edit Script ID ['.$id.'] Success With IP: ['.get_client_ip().'] ', 1);
						echo 1;

					}else{
						logs('User ['.$username.'] Edit Script ID ['.$id.'] Error With IP: ['.get_client_ip().'] Because MySQL Error', 5);
						echo 20;

					}


				}else{
					logs('User ['.$username.'] Edit Script Error With IP: ['.get_client_ip().'] Because Not Input information', 5);
					echo 3;

				}

			}

		}
	}

	
}



?>