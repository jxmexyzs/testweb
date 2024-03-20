<?php 
include("../include/config.php");
include("../include/functions.php");

if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $page = "logs";
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title><?php echo $web_titles; ?> > Logs</title>
        <?php include("../include/head.php"); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <style>
            table.dataTable tbody tr {
                background-color: rgba(0,0,0,0.5);
            }
        </style>
    </head>
    <body>

        <div class="wrapper">

            <?php include("../include/sidebar.php"); ?>


            <div id="content">

                <?php include("../include/nav.php"); ?>

 <!-- Reset Password -->
          <div class="hyper-bg-white shadow-dark radius-border p-4 h-100">
          <div class="">

            <h3 class="text-center mt-4 mb-4">--- LOG ---</h3>
            <br>
       <div class="btn-group">
  <a href="Log" class="btn btn-success">Log</a>
  <a href="Code" class="btn btn-warning">สร้าง Code</a>
  <a href="Code-Script" class="btn btn-dark">สร้าง Code สคริป</a>
</div>
      <div class="table-responsive mt-3">
        <table id="w1ms_logs" class="table table-hover text-center w-100">

        <thead class="hyper-bg-dark">
            <tr>
            <th scope="col" style="width:120px;">#</th>
            <th scope="col" style="width:120px;">Description</th>
            <th scope="col" style="width:120px;">Date</th>
            <th scope="col" style="width:120px;">Status</th>
            </tr>
        </thead>
        <tbody>
                                <?php 
                                $n=0;
                                $sql="SELECT * FROM logs ORDER BY id DESC";
                                $query=mysqli_query(connDB(),$sql);
                                while($row=mysqli_fetch_array($query)){ 
                                    $n++;
                                    ?>
                                    <tr <?php if ($row['status'] != 1) {echo 'class="danger"';} ?>>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo $row['descript']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo status_color($row['status']); ?></td>
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


            <script>
              $(document).ready(function() {
                $('#w1ms_logs').DataTable();
            } );
        </script>

        <br><br>
        <?php include("../include/footer.php"); ?>
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