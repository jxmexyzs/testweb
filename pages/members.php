<?php 
include("../include/config.php");
include("../include/functions.php");

if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $page = "members";
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title><?php echo $web_titles; ?> > Members</title>
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

                <!-- Reset Password -->
          <div class="hyper-bg-white shadow-dark radius-border p-4 h-100">
          <div class="">

            <h3 class="text-center mt-4 mb-4">--- สมาชิกทั้งหมด ---</h3>
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
            <th scope="col" style="width:120px;">Username</th>
            <th scope="col" style="width:120px;">Email</th>
            <th scope="col" style="width:120px;">Phone</th>
            <th scope="col" style="width:120px;">Point</th>
            <th scope="col" style="width:120px;">Action</th>
            </tr>
        </thead>
        <tbody>
         <?php 
         $query = mysqli_query(connDB(),"SELECT * FROM members");
         while($row = mysqli_fetch_array($query)){
             ?>
             <tr>
                 <td><?php echo $row['id']; ?></td>
                 <td><?php echo $row['username']; ?></td>
                 <td><?php echo $row['email']; ?></td>
                 <td><?php echo $row['phone']; ?></td>
                 <td><?php echo number_format($row['point']); ?></td>
                 <td><button class="btn btn-primary btn-sm btn-updateip" id="<?php echo $row['id']; ?>"> Add / Remove Point</button></td>
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

        
                <br><br>
               <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <?php echo $web_titles; ?> 2022</p></div>
        </footer>
            </div>

        </div>

        <div class="modal fade" id="pointmodal">
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
                var action = "updatemember";
                $.ajax({
                    url:"<?php echo $domain; ?>/pages/datamembers.php",
                    method:"POST",
                    data:{id:id,action:action},
                    success:function(data)
                    {
                        $("#pointmodal").modal("show");
                        $('#modal_data').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>
 

<?php }else{ header("location: $domain"); }?>


