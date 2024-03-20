<?php 
include("../include/config.php");
include("../include/functions.php");

if(isset($_POST['id'])){
	$id = $_POST['id'];
	if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) {


		$query = mysqli_query(connDB(),"SELECT * FROM members WHERE id = '$id'");
		$result = mysqli_fetch_array($query);
		$username = $result['username'];
		?>

          <div class="modal-header" >
            <h4 class="modal-title">แอด / ลบ พ้อย <?php echo $result['username']; ?></h4>
            <a type="button" class="close" data-dismiss="modal" >&times;</a>
          </div>
          		<div class="modal-body text-white">
			<form action="<?php echo $domain; ?>/actions.php" method="post" id="updatemember">
				<input type="hidden" name="action" id="action" value="updatemember">
				<input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>">
				<div class="form-group">
					<label><input type="radio" name="type" id="type" value="plus" checked=""> แอด </label> 
					<label><input type="radio" name="type" id="type" value="min"> ลบ </label>
				</div>
				<div class="form-group">
					<input type="number" name="amount" id="amount" placeholder="Price" class="form-control" required="">
				</div>
				<br>
				<button type="submit" class="btn btn-primary btn-block"> บันทึก </button>
			</form>
		</div>



		<script>
			$(document).ready(function () {
				$("#updatemember").submit(function(){ 
					$.post("<?php echo $domain; ?>/actions.php",$("#updatemember").serialize(),function(data){
						if(data == 1){
							swal("Success", "Add Point For <?php echo $username; ?> ", "success");
							$('#pointmodal').modal('hide');
							setTimeout("location.href = '<?php echo $domain; ?>/Members';", 2000);
						}else if(data == 2){
							swal("Success", "Remove Point จากผู้ใช้งาน <?php echo $username; ?> ", "success");
							$('#pointmodal').modal('hide');
							setTimeout("location.href = '<?php echo $domain; ?>/Members';", 2000);
						}else{
							swal("Failed Save", "เกิดข้อผิดพลาดบางอย่าง", "error");
						}
					});
					return false;
				});
			});
		</script>
 
</html>
	<?php }else{ header("location: $domain"); } } ?>




