<?php 
include("../include/config.php");
include("../include/functions.php");

if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $page = "code-script";
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title><?php echo $web_titles; ?> > Code Script</title>
        <?php include("../include/head.php"); ?>
    </head>
		<style>
	.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid rgba(33,33,33,0.0);
}

.col-lg-12 {
	background-color: rgba(0,0,0,0.0)
}

.container-fluid {
	background-color: rgba(33,33,33,0.0);
	border-radius: 50px;
}

.col-lg-12 {
	border-radius: 50px;
}
h5{
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
    <body>

        <div class="wrapper">

            <?php include("../include/sidebar.php"); ?>


            <div id="content">

                <?php include("../include/nav.php"); ?>

                <button class="btn btn-primary" data-toggle="modal" data-target="#addcodescriptmodal">Addโค้ด</button><br><br>

<!-- Reset Password -->
          <div class="hyper-bg-white shadow-dark radius-border p-4 h-100">
          <div class="">

            <h3 class="text-center mt-4 mb-4">--- โค้ดสคริป ---</h3>
            <br>
             <div class="btn-group">
  <a href="Log" class="btn btn-success">Log</a>
  <a href="Code" class="btn btn-warning">สร้าง Code</a>
  <a href="Code-Script" class="btn btn-dark">สร้าง Code สคริป</a>
</div>
      <div class="table-responsive mt-3">
        <table id="datatable" class="table table-hover text-center w-100">

        <thead class="hyper-bg-dark">
            <tr>
            <th scope="col" style="width:120px;">#</th>
            <th scope="col" style="width:120px;">Code</th>
            <th scope="col" style="width:120px;">Script</th>
            <th scope="col" style="width:120px;">Status</th>
            <th scope="col" style="width:120px;">Point</th>
            <th scope="col" style="width:120px;">Use Date</th>
            </tr>
        </thead>
         <tbody>
                                    <?php 
                                    $query = mysqli_query(connDB(),"SELECT * FROM code_script");
                                    while($row = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['code']; ?></td>
                                            <td><?php echo get_scriptname($row['script']); ?></td>
                                            <td>
                                                <?php if($row['status'] == 1){echo '<span class="badge badge-success">ยังไม่ถูกใช้งาน</span>';}else{echo '<span class="badge badge-danger">ใช้งานแล้ว</span>';} ?>
                                            </td>
                                            <td><?php echo $row['create_date']; ?></td>
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


    <?php include("../include/modals.php"); ?>
    <?php include("../include/scripts.php"); ?>

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
<!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <?php echo $web_titles; ?> 2022</p></div>
        </footer>
 
</html>
<?php }else{ header("location: $domain"); }?>


