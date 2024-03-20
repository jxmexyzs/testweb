<?php
error_reporting(0);
include("include/config.php");
include("config_bank/function.php"); 


$connect_db=array(
'1'=>'$conn=mysql_connect($database_host,$database_user,$database_password) or die("connect Mysql database error!");
    mysql_select_db($database_db_name) or die("Select database error!");',
    
'2'=>'$conn=mysqli_connect($database_host,$database_user,$database_password,$database_db_name) or die("Error Mysqli Database is not connect!");',

'3'=>'mssql_connect($database_host,$database_user,$database_password) or die("Mssql Database not Connect.. Please Check config");
    mssql_select_db ($database_db_name) or die("Mssql Select database error!");',

'4'=>'$conn=odbc_connect(\'Driver={SQL Server};Server=\' .$database_host. \';Database=\' . $database_db_name. \';\' ,$database_user, $database_password) or die(\'Error Odbc Mssql Database is not connect!\');',
);


eval($connect_db[$database_type]);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(isset($_POST[ref1])){
    if($_POST[ref1]==""){
        $_SESSION[alert_content]="กรุณาระบุ Username";
        $_SESSION[alert_type]="alert-danger";
        header( "location: deposit" );
        die();
    }else{
        $_SESSION[ref1]=$_POST[ref1];
        if($_POST[qrcode]){
            header( "location:?qrcode=".$_POST[qrcode]);
            
        }else{
            
            header( "location:https://iotsoft.online/vslip/scan.php?return=".urlencode($actual_link) );
        }
    }
}

if($_GET[qrcode]&&$_SESSION[ref1]){
    $connect_api=connect_api($api_url."?username=$tmweasy_user&password=$tmweasy_password&device_id=$device_id&qrcode=$_GET[qrcode]&focus_no=$account_no&focus_bankcode=$bank_code_set&ref1=$_SESSION[ref1]&ip=".my_ip());
    $connect_api=json_decode($connect_api,true);
    if($connect_api[status]!="1"){
        
        $_SESSION[alert_content]="Error : ".$connect_api[msg];
        $_SESSION[alert_type]="alert-danger";
        header( "location: deposit" );
        die();
    }else{//เมื่อโอนสำเร็จ----------------------------------
    //-----------------------------------------------------------------------------------------------------------------
// status = 1 คือรายการสำเร็จ
//   msg = ข้อความสถานะ
//   ref_txid = เลขอ้างอิง
//   slip_time = วันที่ทำรายการ
//   slip_time_stamp = วันที่ทำรายการ รูปแบบ timestamp
//   amount = ยอดเงิน
//   request_one = 1 คือเป็นการ request ครั้งแรก


                  



        $slip_time_stamp=$connect_api[slip_time];
        $ref_txid=$connect_api[ref_txid];
        $status=$connect_api[status];
        $point=$connect_api[amount]*$mul_credit;
        $ref1=$_SESSION[ref1];
        $point1 = "point";



        $database_update=array(
            '1'=>'mysql_query("update $database_table set $database_point_field = $database_point_field + $point where $database_user_field = \'$ref1\' ");',
            '2'=>'mysqli_query($conn,"update $database_table set $database_point_field = $database_point_field + $point where $database_user_field = \'$ref1\' ");',
            '3'=>'mssql_query("update $database_table set $database_point_field = $database_point_field + $point where $database_user_field = \'$ref1\' ");',
            '4'=>'odbc_exec($conn,"update $database_table set $database_point_field = $database_point_field + $point where $database_user_field = \'$ref1\' ");',
        );
        

        if($connect_api[request_one]==1){
            $sql = "INSERT INTO history_topup(slip_time_stamp, ref_txid, status, amount, username) VALUES('$slip_time_stamp', '$ref_txid', '$status', '$point', '$ref1')";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

            eval($database_update[$database_type]);
            $_SESSION[alert_content]="การโอนเงิน สำเร็จแล้ว   คุณได้รับ ".$point."  เครดิตร ขอบคุณครับ";
            $_SESSION[alert_type]="alert-success";
            header( "location:deposit?action=success" );
            //header( "location: ../topup" );
            die();
        }else{
             $_SESSION[alert_content]="สลิปเคยใช้งานไปแล้ว";
             $_SESSION[alert_type]="alert-danger";
            // header( "location: deposit" );
        }
        
        
        
    //-----------------------------------------------------------------------------------------------------------------
    }
    
}


?>

<?php 
include("include/heads.php");
include("include/head.php");
 ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
<?php if (isset($_SESSION['username'])) {  ?>

                            <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><?php echo $web_titles; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link "  href="home"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop"><i class="fas fa-shopping-bag"></i> Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="MyScripts"><i class="fas fa-download"></i> ดาวน์โหลด</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="deposit"><i class="fas fa-university"></i> ฝากเงิน</a></li>
                        <li class="nav-item"><a class="nav-link" href="topup"><i class="fab fa-line"></i> ติดต่อเรา</a></li>
                    </ul> 
                    <form class="d-flex">
                        <div class="nav-item dropdown">
                            <button class="btn btn-outline-dark nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fas fa-user"></i>
                            <?php echo $_SESSION['username']; ?>
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php //echo number_format(get_memberpoint($_SESSION['username'])); ?> THB</span>
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!"><i class="fas fa-user"></i> สถานะผู้ใช้ : <?php //echo (get_memberstatus($_SESSION['username'])); ?></a></li>
                                <li><hr class="dropdown-divider" /></li>
                               <!--  <li><a class="dropdown-item" href="#!"></a></li> -->
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodemodal"><i class="fas fa-book"></i> เติมโค้ดพร้อย</a></li>
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodescriptmodal"><i class="far fa-credit-card"></i> เติมโค้ดสคริป</a></li>
                                <li><a class="dropdown-item" href="#!"><i class="fas fa-user-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                               <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="../Logout"><i class="fas fa-sign-out-alt" style="color: red;"></i> ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <?php }else{ ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><?php echo $web_titles; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop"><i class="fas fa-shopping-bag"></i> Shop</a></li>
                    </ul> 
                    <form class="d-flex">
                        <div class="nav-item dropdown">
                            <button class="btn btn-outline-dark nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fas fa-user"></i>
                         สวัสดี ผู้เยี่ยมชม
                            <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" data-toggle="modal" data-target="#login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a></li>
                                <li><a class="dropdown-item" data-toggle="modal" data-target="#register"><i class="fas fa-user"></i> สมัครสามชิก</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navigation-->
    <?php } ?>
    
    <div class="card text-center">
        <div class="card-body">
            <div class=" text-center">
                <div class=""><!-- <img src="https://iotsoft.online/vslip/b1.jpg" width="20%"><img src="scan.png" width="20%">   -->
                    
                    
                        <?php
                    if($_GET[action]=="success"){
                        ?>
                        <div align="center"><img src="check_green.png" width="20%"></div>
                        <h2 class="title" align="center">ทำรายการสำเร็จแล้ว</h2>
                        <p class="label" align="center">ตรวจสอบเครดิตรของคุณ หากพบปัญหากรุณาติดต่อ Admin ขอบคุณครับ</p>
                        <p class="label" align="center"><a href="../home">[ ! ปิด ]</a></p>
                     <?php
                    }else{
                        $api_url."?username=$tmweasy_user&password=$tmweasy_password";
                        $connect_api=connect_api($api_url."?username=$tmweasy_user&password=$tmweasy_password");
                        $connect_api=json_decode($connect_api,true);
                        if($connect_api[status]!="1"){
                            
                            $_SESSION[alert_content]="Error : ".$connect_api[msg];
                            $_SESSION[alert_type]="alert-danger";
                        }
            
                    ?>
                    <script>
                    function input_qrcode(){
                        let person = prompt("Please enter Qrcode");

                        if (person != null&&person !="") {
                        
                          document.getElementById("qrcode").value=person;
                           var btn = $( document.getElementById("scan_bin"));
                            $(btn).buttonLoader('start');
                          document.getElementById("userform").submit(); 
                        }
                        
                    }
                    </script>
                
                    <form method="POST" id="userform" >

                       
                        <div class="mb-3 text-center">
                        <div class="container mt-3 text-center">
    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="">
                    <h2 class="title text-center">ชำระด้วย โอนเงินธนาคาร สแกนสลิป อัตโนมัติ</h2>
                    <img src="config_bank/bank/<?=$bank_code_set?>.png" width="50">
                    <br>
                    <div class="label"><b>โอนเงินมายังบัญชี</b></div>
                    <div class="label"><b>ชื่อบัญชี : </b><?=$account_name?></div>
                    <div class="label"><b>เลขบัญชี : </b><?=$account_no?></div>
                    <div class="label"><b>ธนาคาร : </b><?=$bank_code[$bank_code_set]?></div>
                    <h6 class="label" style="color:red">**โปรดอ่าน ทำการโอนเงินผ่านแอปธนาคาร ที่มี Qr code บนสลิป เท่านั้น <br>โอนแล้วให้เก็บสลิปไว้เพื่อใช้ยืนยันกับระบบ หากโอนผ่านช่องทางอื่นที่ไม่มี Qr code หรือไม่ได้เก็บสลิป ระบบจะตรวจสอบไม่ได้ให้ติดต่อแอดมินเท่านั้น</h6>
                    <input type="hidden" name="qrcode" id="qrcode">
                    <div class="mt-2">
                         <p class="label">* Ref1 ID / Username</p>
                        <input class="form-control" value="<?php echo $_SESSION['username']; ?>" type="text" name="ref1" readonly>
                    </div>
                    <br>
                    <div class="mt-2">
                        <p><button id="scan_bin" class="btn btn-success btn-default has-spinner" onclick="this.form.submit();" >ชำระแล้ว กดเพื่อ Scan สลิป</button></p>
                        <br>
                        <p><button class="btn btn-dark has-spinner" onclick="input_qrcode()"  >กรอก QR Code เอง</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                       
                       </div>
                       
                    </form>
                    <?php
                    }
                    ?>
                </div>
<!-- Reset Password -->
          <div class="hyper-bg-white shadow-dark radius-border p-4 h-100">
          <div class="">

            <h3 class="text-center mt-4 mb-4">--- ประวัติการเติมเงิน ---</h3>

      <div class="table-responsive mt-3">
        <table id="datatable" class="table table-hover text-center w-100">
 <?php
$user = $_SESSION['username'];
   
    
   $sql = "SELECT * FROM history_topup WHERE username='$user'";

   $query = mysqli_query($conn,$sql);

?>
        <thead class="hyper-bg-dark">
            <tr>
            <th scope="col" style="width:120px;">เลขอ้างอิง</th>
            <th scope="col" style="width: 150px;">วันเวลา</th>
            <th scope="col" style="width: 100px;">สถานะ</th>
            <th scope="col" style="width: 100px;">จำนวนเงิน</th>
            </tr>
        </thead>
        <tbody>

       
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
            <td><?php echo $result['ref_txid']; ?></th>
            <td><?php echo $result['slip_time_stamp']; ?></th>
              <td><?php
       if($result['status'] == '0'){
          echo('<span class="badge bg-danger fw-normal">ไม่สำเร็จ</span>');
        }elseif($result['status'] == '1'){
         echo("<span class='badge bg-success fw-normal'>สำเร็จ</span>");
        }elseif($result['status'] == '2'){
          echo('<span class="badge bg-danger fw-normal">ไม่สำเร็จ</span>'); 
        }
    ?></th>
            <td><?php echo $result['amount']; ?>.00฿</th>
         </tr>
<?php } ?> 


        </tbody>
        </table>
      </div>
      <!-- End Pay  -->

          </div>
          </div>
        </div>

        <!-- End User Profile -->
            </div>
        </div>
    </div>
   <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <?php echo $web_titles; ?> 2022</p></div>
        </footer>
 
</html>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    
    <?php
    if($_SESSION[alert_content]){
        alert_content($_SESSION[alert_content],$_SESSION[alert_type]);
    }
    ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Built-In-Loading-Indicator-In-Buttons-Button-Loader/jquery.buttonLoader.js"></script>
<script>
$(document).ready(function () {
    
    $('.has-spinner').click(function () {
        var btn = $(this);
        $(btn).buttonLoader('start');
        
    });
});
</script>
<?php include("include/modals.php"); ?>
<?php 
?>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
