<?php
include("include/config.php");
include("include/functions.php");



if (isset($_GET['id'])) {
$id = $_GET['id'];
if (isset($_SESSION['username']) and check_havescript($id,$_SESSION['username'])) { 
$username = $_SESSION['username'];


$query = mysqli_query(connDB(),"SELECT * FROM license WHERE id = '$id'");
$result = mysqli_fetch_array($query);

if($result['download'] > 0){

$download = "1";

mysqli_query(connDB(),"UPDATE license SET download= download - '$download' WHERE id='$id'");


ignore_user_abort(true);
set_time_limit(0); // disable the time limit for this script
 
$path = "script_files/"; // change the path to fit your websites document structure
 
$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', get_filebyfolder($result['script'])); // simple file name validation
$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$fullPath = $path.$dl_file;
 
if (@$fd = fopen (@$fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        // add more headers for other content types here
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        break;
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
if(@$fd){
    fclose (@$fd);
    logs('User ['.$username.'] Download Script ['.$result['script'].'] Success With IP: ['.get_client_ip().']', 1);
}else{
    logs('User ['.$username.'] Download Script ['.$result['script'].'] Error With IP: ['.get_client_ip().'] Because File Not Found', 5);
}


exit;

}else{
    logs('User ['.$username.'] Download Script ['.$result['script'].'] Error With IP: ['.get_client_ip().'] Because already downloaded', 5);
    echo "ไม่สามารถดาวน์โหลดไฟล์ได้เนื่องจากท่านได้โหลดไปแล้ว";

}

}else{
    header("location: $domain");
}

}else{
    header("location: $domain");
}
?>