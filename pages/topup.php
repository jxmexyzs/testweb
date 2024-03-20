<?php 
include("../include/config.php");
include("../include/functions.php");

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $page = "Deposit";
    ?>
    <?php include("../include/head.php"); ?>

 <?php if (isset($_SESSION['username'])) {  ?>
<title><?php echo $web_titles; ?> > Deposit</title>
                            <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><?php echo $web_titles; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link "  href="../Home"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link "  href="../shop"><i class="fas fa-shopping-bag"></i> Shop</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../MyScripts"><i class="fas fa-download"></i> ดาวน์โหลด</a></li>
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
                                <li><a class="dropdown-item" href="deposit"><i class="fas fa-university"></i> ฝากเงิน</a></li>
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

<iframe src="/Deposit1/?ref1=<?php echo $_SESSION['username']; ?>" onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+"px";}(this));' style="height:200px;width:100%;border:none;overflow:hidden;"></iframe>
<?php }else{ header("location: $domain"); }?>