<?php 
include("../include/config.php");
include("../include/functions.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$edit = 0;
if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
}
$page = "script";
$query = mysqli_query(connDB(),"SELECT * FROM script WHERE id = '$id'");
$result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $web_titles; ?> > Script</title>
    <?php include("../include/heads.php"); ?>
    <?php include("../include/head.php"); ?>

</head>
<body>

        <div id="content">
			
			<?php if (isset($_SESSION['username'])) {  ?>

                            <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><?php echo $web_titles; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link "  href="../Home"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../shop"><i class="fas fa-shopping-bag"></i> Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="../MyScripts"><i class="fas fa-download"></i> ดาวน์โหลด</a></li>
                        <li class="nav-item"><a class="nav-link" href="../deposit"><i class="fas fa-university"></i> ฝากเงิน</a></li>
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
                                <li><a class="dropdown-item" href="../deposit"><i class="fas fa-university"></i> ฝากเงิน</a></li>
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodemodal"><i class="fas fa-book"></i> โค้ดพร้อย</a></li>
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodescriptmodal"><i class="far fa-credit-card"></i> โค้ดสคริป</a></li>
                                <li><a class="dropdown-item" href="../MyScripts"><i class="fas fa-download"></i> ดาวน์โหลด</a></li>
                                <li><a class="dropdown-item" href="#!"><i class="fas fa-user-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                               <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) { ?>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="../Members"><i class="fas fa-user-lock"></i> แอดมินเมนู</a></li>
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
                        <li class="nav-item"><a class="nav-link " href="Home"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"  href="shop"><i class="fas fa-shopping-bag"></i> Shop</a></li>
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
		</div>
		<br>
            <div class="container-fluid">
                <div class="card" >
					<div class="row">

                    <div >
                        <div class="row">
                            <div class="col-lg-5" style="padding: 10px;background: none;" align="center">
                                <img src="<?php echo $domain; ?>/images/scripts/<?php echo $result['image']; ?>" alt="" style="width: 95%;border-radius: 10px;">
                            </div>
                            <div class="col-lg-7 text-dark" style="padding: 10px;">
                                <h3><b><?php echo $result['name']; ?></b></h3>
                                <?php if ($result['discount'] > 0) { ?>
                                    <p class="text-dark" style="color: #222;"><b>Price: <span style="font-size: 22px;"><s style="color: #666;"><?php echo number_format($result['price']); ?></s></span> <span style="font-size: 22px;color: red;font-size: 35px;font-weight: bolder;"><?php echo number_format($result['price'] - ($result['price'] * $result['discount'] / 100)); ?></span> บาท </b><br>
                                    <span class="badge badge-danger" style="font-size: 15px;">ส่วนลด <?php echo $result['discount']; ?> %</span></p>
                                <?php }else{ ?>
                                    <p class="text-dark" style="color: #222;"><b>Price: <span style="font-size: 22px;color: green;font-size: 35px;font-weight: bolder;"><?php echo number_format($result['price']); ?></span> บาท</b></p>

                                <?php } ?>
                                <?php if (isset($_SESSION['username'])) { ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buy" style="width: 20%;"> ซื้อ </button>
                                                             <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) { ?>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editscript">
                    แก้ไขข้อมูล
                </button><br><br>

            <?php } ?>
                                <?php }else{ ?>
                                <button type="button" class="btn btn-warning" style="color: #fff;"> เข้าสู่ระบบก่อนเพื่อทำการซื้อ </button>
                                <?php } ?>

                                <br>
                                <br>
                                <?php if ($result['video_youtube'] or $result['description']){ ?>
                                <div class="col-lg-12 text-dark" align="left">
                                    <h3><b>รายละเอียดสคริป</b></h3><br>
                                </div>
                            <?php } ?>
                       

                                                        <?php if ($result['video_youtube']){ ?>
                                <div class="col-lg-5 text-white">

                                  <div style="width: 100%; height: 0px; position: relative; padding-bottom: 56.250%;"><iframe src="https://www.youtube.com/embed<?php echo $result['video_youtube']; ?>/dwpuca" frameborder="0" width="100%" height="100%" allowfullscreen style="width: 100%; height: 100%; position: absolute;border-radius: 10px;"></iframe></div>


                                </div>
                                <div class="col-lg-7 text-white">
                                   <?php echo nl2br($result['description']); ?>
                               </div>
                           <?php }else{ ?>

                            <div class="col-lg-12 text-white">
                               <?php echo nl2br($result['description']); ?>
                           </div>

                       <?php } ?>
                            </div>
                            
                   </div>
       			</div>

			</div>
						<br>
           </div>
       </div>


       <br><br>
      
   </div>

</div>
<!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <?php echo $web_titles; ?> 2022</p></div>
        </footer>

<?php include("../include/modals.php"); ?>
<?php include("../include/scripts.php"); ?>
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

