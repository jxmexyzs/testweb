<?php 
include("include/config.php");
include("include/functions.php");
$page = "home";
?>
	<?php 
    $query = mysqli_query(connDB(),"SELECT * FROM kn_config");
    while($row = mysqli_fetch_array($query)){
    ?>
<!DOCTYPE html>
<html>

<head>
	<?php } ?>
    <?php include("include/heads.php"); ?>
	<?php include("include/head.php"); ?>
</head>

<body>
<?php if (isset($_SESSION['username'])) {  ?>

					        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><?php echo $web_titles; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop"><i class="fas fa-shopping-bag"></i> Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="MyScripts"><i class="fas fa-download"></i> ดาวน์โหลด</a></li>
                        <li class="nav-item"><a class="nav-link" href="deposit"><i class="fas fa-university"></i> ฝากเงิน</a></li>
                        <li class="nav-item"><a class="nav-link" href="topup"><i class="fab fa-line"></i> ติดต่อเรา</a></li>
                    </ul> 
                    <form class="d-flex">
                        <div class="nav-item dropdown">
                        	<button class="btn btn-outline-dark nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fas fa-user"></i>
                            <?php echo $_SESSION['username']; ?>
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo number_format(get_memberpoint($_SESSION['username'])); ?> THB</span>
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!"><i class="fas fa-user"></i> สถานะผู้ใช้ : <?php echo (get_memberstatus($_SESSION['username'])); ?></a></li>
                                <li><hr class="dropdown-divider" /></li>
                               <!--  <li><a class="dropdown-item" href="#!"></a></li> -->
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodemodal"><i class="fas fa-book"></i> เติมโค้ดพร้อย</a></li>
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodescriptmodal"><i class="far fa-credit-card"></i> เติมโค้ดสคริป</a></li>
                                <li><a class="dropdown-item" href="#!"><i class="fas fa-user-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                               <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) { ?>
                               	<li><hr class="dropdown-divider" /></li>
                               	<li><a class="dropdown-item" href="Members"><i class="fas fa-user-lock"></i> แอดมินเมนู</a></li>
                               	<?php } ?> 
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
    <div class="wrapper">
        <div id="content">
<div class="container">
	

        <div class="row" style="margin-top:20px;">
            <div class="col-md-4">
                <div class="card text-light aqua-gradient2 bg-dark " style="border-radius: 15px; background-color:rgb(0,0,0,.3);padding: 18px; box-shadow: 0px 0px 20px -2px #000; margin:20px; border:2px solid #FFF;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-signal fa-3x fa-lg text-light"></i>&nbsp; &nbsp;
                            <div class="m-l-15 m-t-10">
                                <h4>ยอดเข้าชมเว็บ</h4>
                                <h5><?php include("include/counter.php"); ?>&nbsp; ครั้ง</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-light blue-gradient2 bg-info" style="border-radius: 15px; background-color:rgb(0,0,0,.3);padding: 18px; box-shadow: 0px 0px 20px -2px #000; margin:20px; border:2px solid #FFF;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-box-open fa-3x fa-lg text-light"></i>&nbsp; &nbsp;
                            <div class="m-l-15 m-t-10">
                                <h4 class="font-medium m-b-0">สินค้าที่ขายแล้ว</h4>
                                <h5>124&nbsp; ชิ้น</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-light peach-gradient2 bg-success " style="border-radius: 15px; background-color:rgb(0,0,0,.3);padding: 18px; box-shadow: 0px 0px 20px -2px #000; margin:20px; border:2px solid #FFF;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user fa-3x fa-lg text-light"></i>&nbsp; &nbsp;
                            <div class="m-l-15 m-t-10">
                                <h4 class="font-medium m-b-0">สมาชิกทั้งหมด</h4>
                                <h5>3,951&nbsp; คน</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>📢 ประกาศ!! :</strong> ปล่อยเช่าเกมสล็อตค่าย PG ปรับแตก ราคาถูก มีเกมให้กว่า 50+ เกม อัพเดทเกมใหม่ให้ตลอด กำลังมาแรงห้ามพลาดเด็ดขาด สนใจ @LINE : <a href="https://line.me/R/ti/p/@pgjazzz" class="badge badge-success" style="font-size:14px" target="_BLANK">@pgjazzz</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div> -->
<hr>
			<!-- Reset Password -->
          <div class="hyper-bg-white shadow-dark radius-border p-4 h-100">
          <div class="">

            <h3 class="text-center mt-4 mb-4">--- ✅ ประวัติการซื้อสินค้าล่าสุด ---</h3>

      <div class="table-responsive mt-3">
        <table id="datatable" class="table table-hover text-center w-100">
 <?php
$user = $_SESSION['username'];

    $conn = new mysqli('localhost:3306', 'pi9zi2sa9_dev', 'W0s7h@4l7', 'pi9zi2sa9_dev');
   $sql = "SELECT * FROM license";

   $query = mysqli_query($conn,$sql);

?>
        <thead class="hyper-bg-dark">
            <tr>
                <th scope="col" style="width: 100px;">ID</th>
                <th scope="col" style="width: 100px;">ชื่อสินค้า</th>
                <th scope="col" style="width: 100px;">เวลา</th>
                <th scope="col" style="width: 100px;">ผู้ซื้อ</th>
            </tr>
        </thead>
        <tbody>

       
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

        <tr>
            <td><?php echo $result['id']; ?></th>
            <td><?php echo $result['script']; ?></th>
              <td><?php echo $result['date']; ?></th>
            <td><?php echo $result['name']; ?></th>
         </tr>
<?php } ?> 


        </tbody>
        </table>
      </div>
      <!-- End Pay  -->
      <br><br>
			
			</div>
         </div>
</body>
</html>

         <br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include("include/footer.php"); ?>


    </div>

</div>
<!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <?php echo $web_titles; ?> 2022</p></div>
        </footer>
 
</html>
<?php include("include/modals.php"); ?>
<?php include("include/scripts.php"); ?>
<!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
         <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
</body>

</html>