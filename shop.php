<?php 
include("include/config.php");
include("include/functions.php");
$page = "shop";
?>
<!DOCTYPE html>
<html>

<head>
    <title>HNAWDEV > Shop</title>
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
                        <li class="nav-item"><a class="nav-link "  href="Home"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="shop"><i class="fas fa-shopping-bag"></i> Shop</a></li>
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
                                <li><a class="dropdown-item" href="deposit"><i class="fas fa-university"></i> ฝากเงิน</a></li>
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodemodal"><i class="fas fa-book"></i> โค้ดพร้อย</a></li>
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#usecodescriptmodal"><i class="far fa-credit-card"></i> โค้ดสคริป</a></li>
                                <li><a class="dropdown-item" href="MyScripts"><i class="fas fa-download"></i> ดาวน์โหลด</a></li>
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
    <div class="wrapper">
         <div class="container" style="margin-top: 5px;">
			<div class="grid-body">
			<a style="background-color: rgba(32,32,32, 0.0);">&nbsp; </a>
			
            <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) { ?>
			<br>
              <button class="btn btn-primary" data-toggle="modal" data-target="#addscript">เพิ่มสคริป</button><br><br>
			<?php } ?> 
            <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
              <?php 
              $query = mysqli_query(connDB(),"SELECT * FROM script ORDER BY id DESC");
              while($row = mysqli_fetch_array($query)){
                ?>
<div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <?php if (isset($_SESSION['username'])) { if (check_havescript2($row['foldername'],$_SESSION['username']) > 0) { ?>
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">มีแล้ว <?php echo check_havescript2($row['foldername'],$_SESSION['username']); ?> License</div>
                    <?php } }?>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo $domain; ?>/images/scripts/<?php echo $row['image']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $row['name']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <?php if ($row['discount'] > 0) { ?>
                        <p><s class="text-muted text-decoration-line-through" style="font-size: 16px;"><?php echo number_format($row['price']); ?></s> 
                            <span><?php echo number_format($row['price'] - ($row['price'] * $row['discount'] / 100)); ?></span></p>
                        <?php }else{ ?>
                        <p>ราคา : <span style="color: #0FFF00;"><?php echo number_format($row['price']); ?></span></p>
                       <?php } ?>
                        <h6 style="color: #00FFC9;"> version : <?php echo $row['version']; ?> </h6>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo $domain; ?>/Script/<?php echo $row['id']; ?>">Buy</a></div>
                            </div>
                        </div>
                    </div>

            <?php } ?>
		             </div>
        </div>
</section>

		 <br>
		 <br>
        </div>

              










        <br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include("include/footer.php"); ?>

    </div>

</div>
<!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
<?php include("include/modals.php"); ?>
<?php include("include/scripts.php"); ?>
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