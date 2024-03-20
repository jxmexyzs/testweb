<?php

function is_admin($username){
	$query = mysqli_query(connDB(),"SELECT status FROM members WHERE username='$username'");
	$result = mysqli_fetch_array($query);
	if ($result['status'] == "admin") {
		return true;
	}else{
		return false;
	}
}

function check_useralready($username){
	$query = mysqli_query(connDB(),"SELECT * FROM members WHERE username='$username'");
	$rows = mysqli_num_rows($query);
	if ($rows > 0) {
		return true;
	}else{
		return false;
	}
}

function check_havescript($id,$username){
    $query = mysqli_query(connDB(),"SELECT * FROM license WHERE id = '$id' AND name='$username'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        return true;
    }else{
        return false;
    }
}

function check_havescript2($foldername,$username){
    $query = mysqli_query(connDB(),"SELECT * FROM license WHERE script = '$foldername' AND name='$username'");
    $rows = mysqli_num_rows($query);
    return $rows;
}

function get_filebyfolder($name){
    $query = mysqli_query(connDB(),"SELECT file FROM script WHERE foldername='$name'");
    $result = mysqli_fetch_array($query);
    return $result['file'];
}

function add_memberpoint($username,$point){
	mysqli_query(connDB(),"UPDATE members SET point=point+'$point' WHERE username='$username'");
}



function remove_memberpoint($username,$point){
	mysqli_query(connDB(),"UPDATE members SET point = point - '$point' WHERE username='$username'");
}

function get_scriptnamebyfolder($name){
    $query = mysqli_query(connDB(),"SELECT name FROM script WHERE foldername='$name'");
    $result = mysqli_fetch_array($query);
    return $result['name'];
}

function get_scriptname($id){
    $query = mysqli_query(connDB(),"SELECT name FROM script WHERE id='$id'");
    $result = mysqli_fetch_array($query);
    return $result['name'];
}

function get_memberstatus($username){
	$query = mysqli_query(connDB(),"SELECT status FROM members WHERE username='$username'");
	$result = mysqli_fetch_array($query);
	return $result['status'];
}

function get_memberpoint($username){
	$query = mysqli_query(connDB(),"SELECT point FROM members WHERE username='$username'");
	$result = mysqli_fetch_array($query);
	return $result['point'];
}


function get_memberphone($username){
	$query = mysqli_query(connDB(),"SELECT phone FROM members WHERE username='$username'");
	$result = mysqli_fetch_array($query);
	return $result['phone'];
}

function get_memberusername($id){
    $query = mysqli_query(connDB(),"SELECT username FROM members WHERE id='$id'");
    $result = mysqli_fetch_array($query);
    return $result['username'];
}

function check_code($code){
    $query = mysqli_query(connDB(),"SELECT * FROM code WHERE code = '$code'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        return true;
    }else{
        return false;
    }
}

function check_code2($code){
    $query = mysqli_query(connDB(),"SELECT * FROM code_script WHERE code = '$code'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        return true;
    }else{
        return false;
    }
}

function check_code_used($code){
    $query = mysqli_query(connDB(),"SELECT * FROM code WHERE code = '$code' AND status=1");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        return true;
    }else{
        return false;
    }
}

function check_code2_used($code){
    $query = mysqli_query(connDB(),"SELECT * FROM code_script WHERE code = '$code' AND status=1");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        return true;
    }else{
        return false;
    }
}

function get_code_point($code){
    $query = mysqli_query(connDB(),"SELECT point FROM code WHERE code='$code'");
    $result = mysqli_fetch_array($query);
    return $result['point'];
}

function get_code_script($code){
    $query = mysqli_query(connDB(),"SELECT script FROM code_script WHERE code='$code'");
    $result = mysqli_fetch_array($query);
    return $result['script'];
}

function update_codestatus($code){
    mysqli_query(connDB(),"UPDATE code SET status=0 WHERE code='$code'");
}

function update_codestatus2($code){
    mysqli_query(connDB(),"UPDATE code_script SET status=0 WHERE code='$code'");
}

function get_scriptprice($id){
	$query = mysqli_query(connDB(),"SELECT price,discount FROM script WHERE id='$id'");
	$result = mysqli_fetch_array($query);

    if ($result['discount'] > 0) {
        $newprice = $result['price'] - ($result['price'] * $result['discount'] / 100);
        return $newprice;
    }else{
        return $result['price'];
    }
}

function get_scriptfoldername($id){
	$query = mysqli_query(connDB(),"SELECT foldername FROM script WHERE id='$id'");
	$result = mysqli_fetch_array($query);
	return $result['foldername'];
}

function checkLicense($license,$script){
	$sql = "SELECT * FROM license WHERE license = '$license' AND script='$script'";
	$query = mysqli_query(connDB(),$sql);
	$row = mysqli_num_rows($query);

	if ($row == 1) {
		return true;
	}else{
		return false;
	}
}

function checkLicense2($license){
    $sql = "SELECT * FROM license WHERE license = '$license'";
    $query = mysqli_query(connDB(),$sql);
    $row = mysqli_num_rows($query);

    if ($row == 1) {
        return true;
    }else{
        return false;
    }
}

function checkIP($license,$ip){
	$sql = "SELECT * FROM license WHERE license = '$license' AND ip = '$ip'";
	$query = mysqli_query(connDB(),$sql);
	$row = mysqli_num_rows($query);

	if ($row == 1) {
		return true;
	}else{
		return false;
	}
}

function generateKey($length = 13) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $keys = '';
    for ($i = 0; $i < $length; $i++) {
        $keys .= $characters[rand(0, $charactersLength - 1)];
    }
    return "HNAWKEY_".$keys;
}

function generateCode($length = 24) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $keys = '';
    for ($i = 0; $i < $length; $i++) {
        $keys .= $characters[rand(0, $charactersLength - 1)];
    }
    return "000".$keys;
}

function generateCodeScript($length = 15) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $keys = '';
    for ($i = 0; $i < $length; $i++) {
        $keys .= $characters[rand(0, $charactersLength - 1)];
    }
    return "000".$keys;
}

function gen_key_check(){
    $key = generateKey();
    $old_key = checkLicense2($key);
    if($old_key == false){
        return $key;
    }else{
        return "Press Refresh";
    }
}


function logs($txt,$status) {
    mysqli_query(connDB(),"INSERT INTO logs (descript,status) VALUES ('$txt','$status')");
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function status_color($status){
    if($status == 1){
        return '<span class="badge badge-success"> Success </span>';
    }elseif($status == 2){
        return '<span class="badge badge-danger"> IP Error </span>';
    }elseif($status == 3){
        return '<span class="badge badge-danger"> License Error </span>';
    }elseif($status == 4){
        return '<span class="badge badge-danger"> License AND IP Error </span>';
    }elseif($status == 5){
        return '<span class="badge badge-danger"> Error </span>';
    }else{
        return '<span class="badge badge-danger"> UnKnow </span>';
    }
}

function connect_api($url){
    
    return file_get_contents($url);
}

function alert_content($content,$type){
    switch($type){
        case "alert-danger":
            $type_alert="error";
         break;
        case "alert-warning":
            $type_alert="warning";
         break;
        case "alert-success":
            $type_alert="success";
            
         break;
    }
    $content_box=preg_replace('/"/','\"',$content);
    $script_alert='<script type="text/javascript">
    function JSalert(){
    swal({   title: "System Message",   
    text: "'.$content_box.'",   
    type: "'.$type_alert.'",//error success warning   
    showCancelButton: 0,   
    confirmButtonText: "",   
    cancelButtonText: "ปิด",   
    closeOnConfirm: true,   
    closeOnCancel: true }, 
    function(isConfirm){   
        if (isConfirm) 
        {   
            false  
        } 
         });
}
JSalert();
</script>';
    echo $script_alert;
    $_SESSION[alert_content]="";
}
function my_ip(){
 if ($_SERVER['HTTP_CLIENT_IP']) { 
$IP = $_SERVER['HTTP_CLIENT_IP'];
} elseif (preg_match("[0-9]",$_SERVER["HTTP_X_FORWARDED_FOR"] )) { 
$IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else { 
$IP = $_SERVER["REMOTE_ADDR"];
}
return $IP;
}