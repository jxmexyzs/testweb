<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
<?php 
include("../include/config.php");
include("../include/functions.php");

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $page = "myscript";
    ?>
    <!DOCTYPE html>
    <html>
     


        <head>
        <title><?php echo $web_titles; ?> > My Script</title>
        <?php include("../include/head.php"); ?>
    </head>

    <body>

        <div class="wrapper">

           <?php if (isset($_SESSION['username'])) {  ?>

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
			
			
                         <div class="container" style="margin-top: 1px;">

					<br>
						</div>	

					<div class="container" style="margin-top: 30px;">
          <div class=" hyper-bg-white shadow-dark radius-border p-4 h-100">
          <div class="">

            <h3 class="text-center mt-4 mb-4">--- ดาวน์โหลดสินค้าที่สั่งซื้อ ---</h3>

            <div class="alert alert-warning">
  <strong>Warning!</strong> หากโหลดแล้วมีการขึ้นว่า ตรวจพมไวรัสไม่ต้องตกใจนะครับเพราะ เรากำลังทำระบบป้องการการเข้ารหัสไฟล์อยู่ ขออภัยในความผิดพลาดด้วยคับ
</div>

      <div class="table-responsive mt-3">
        <table id="datatable" class="table table-hover text-center w-100">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:120px;">ลำดับ</th>
                                        <th scope="col" style="width:120px;">ชื่อสินค้า</th>
                                        <th scope="col" style="width:120px;">คีย์</th>
                                        <th scope="col" style="width:120px;">IP</th>
                                        <th scope="col" style="width:120px;">วันเวลาที่ซื้อ</th>
                                        <th scope="col" style="width:120px;">ดาวโหลดไฟล์</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php 
                                    $i = 0;
                                    $query = mysqli_query(connDB(),"SELECT * FROM license WHERE name='$username'");
                                    while($row = mysqli_fetch_array($query)){
                                        $i++;
                                        ?>
                                        
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo get_scriptnamebyfolder($row['script']); ?></td>
                                            <td><?php echo $row['license']; ?></td>
                                            <td><?php echo $row['ip']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><!-- <button class="btn btn-primary btn-sm btn-updateip" id="<?php echo $row['id']; ?>"> เปลี่ยน IP</button> -->
                                                <?php if($row['download'] > 0){ ?>
                                                <a target="_<?php echo $row['id']; ?>" href="<?php echo $domain; ?>/download.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"> Download </a><br>
                                                <small style="color: red;">*** ดาวโหลดได้แค่ 4 ครั้งเท่านั้น ***</small>
                                            <?php }else{ ?>
                                                <button type="button" class="btn btn-secondary btn-sm" disabled> ดาวโหลด </button>
                                            <?php } ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br><br>
            </div>

        </div>

        <div class="modal fade" id="ipmodal">
            <div class="modal-dialog">
                <div class="modal-content text-white" id="modal_data" style="background: none;"></div>
            </div>
        </div>

        <?php include("../include/modals.php"); ?>
        <?php include("../include/scripts.php"); ?>



        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
                $(document).on('click', '.btn-updateip', function(){
                    var id = $(this).attr("id");
                    var action = "updateip";
                    $.ajax({
                        url:"<?php echo $domain; ?>/pages/dataip.php",
                        method:"POST",
                        data:{id:id,action:action},
                        success:function(data)
                        {
                            $("#ipmodal").modal("show");
                            $('#modal_data').html(data);
                        }
                    });
                });
            });
        </script>
    </body>

    </html>
<!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <?php echo $web_titles; ?> 2022</p></div>
        </footer>
 
</html>
    <?php }else{ header("location: $domain"); }?>

