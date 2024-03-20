<?php 

session_start();
date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d H:i:s");

//////////////////////////////////////////////////// ส่วนที่แก้ไขได้คือส่วนที่มีการ คอมเม้นไว้ด้านหลัง //////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// conbatabass //////////////////////////////////////////////////////////////////////////////////////////////
$domain = "https://dev.hnawstudio.com";            		// Server Domain Name     
$web_titles = "HNAWS SHOP DEV";     
$online = "เปิดแล้วจ้าา";        
$money = "19000";                                                         ////
$price_changeip = 80;									// Change IP Price                                                                    ////
$fanpage = "https://discord.gg/enBHNPZ8";	// Facebook Fanpage Contact                                                                       ////
                                                                                                                                              ////
function connDB(){                                                                                                                            ////
                                                                                                                                              ////
    $host	  = "localhost:3306";                            // Mysql Host                                                                         ////
    $port     = "";                                 // Mysql Port                                                                         ////
    $username = "root";                                 // Mysql Username                                                                     ////
    $password = "";                                     // Mysql Password                                                                     ////
    $database = "pi9zi2sa9_dev";                       	    // Mysql Database Name                                                                ////
                                                                                                                                              ////
    $db_host  = $host.":".$port;                                                                                                              ////
    @$conn= mysqli_connect($host,$username,$password,$database)or die("Cannont connect to mysql | ".mysqli_connect_error($conn));          ////
    mysqli_set_charset($conn,"utf8");                                                                                                         ////
    return $conn;                                                                                                                             ////
}                                                                                                                                             ////
                                                                                                                                              ////
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";   ////
                                                                                                                                              ////
                                                                                                                                              ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$api_url="http://tmwallet.thaighost.net/api_verify_slip.php";
$tmweasy_user="";
$tmweasy_password="";

$account_name="นาย xxxxxx";//ชื่อบัญชีธนาคาร
$account_no="1234567890";//เลขบัญชีธนาคา  ใส่เฉพาะตัวเลข
$bank_code_set="004"; //โค้ดธนาคาร เลข 3 หลัก ดูความหมายโค้ดด้านล่าง
$device_id="";// ปล่อยว่าง ยังไม่ต้องกำหนดค่านี้
//---------------------------------------------------

$mul_credit=1;//ตัวคูณเครดิตร กับยอดเงินที่โอนมา

//--------------- การเชื่อม ฐานข้อมูล เพื่ออัพเดทเครดิตรให้ลูกค้า----------------
$database_host="localhost:3306";
$database_user="root";
$database_password="";
$database_db_name="pi9zi2sa9_dev";
$database_type="2";//1 = mysql , 2 = mysqli ,3 = mssql (microsoft sql server) , 4 = Odbc for microsoft sql server

$database_table="members";//ตารางที่เต็มข้อมูลลูกค้า หรือ เก็บข้อมูลเครดิตร
$database_user_field="username";//ฟิวที่ใช้ในการอ้างอิง user เช่น username userid
$database_point_field="point";//ฟิวที่ใช้ในการเก็บค่า พ้อย เครดิตร ที่ต้องการให้อัพเดทหลังเต็มเสร็จ

//bank code ห้ามแก้
$bank_code['002']="ธ.กรุงเทพ";
$bank_code['004']="ธ.กสิกรไทย";
$bank_code['006']="ธ.กรุงไทย";
$bank_code['011']="ธ.ทหารไทยธนชาต";
$bank_code['014']="ธ.ไทยพาณิชย์";
$bank_code['025']="ธ.กรุงศรีอยุธยา";
$bank_code['069']="ธ.เกียรตินาคินภัทร";
$bank_code['022']="ธ.ซีไอเอ็มบีไทย";
$bank_code['067']="ธ.ทิสโก้";
$bank_code['024']="ธ.ยูโอบี";
$bank_code['071']="ธ.ไทยเครดิตเพื่อรายย่อย";
$bank_code['073']="ธ.แลนด์ แอนด์ เฮ้าส์ ";
$bank_code['070']="ธ.ไอซีบีซี (ไทย)";
$bank_code['034']="ธ.เพื่อการเกษตรและสหกรณ์การเกษตร";
$bank_code['030']="ธ.ออมสิน";
$bank_code['033']="ธ.อาคารสงเคราะห์ ";
$bank_code['066']="ธ.อิสลามแห่งประเทศไทย";

?>
