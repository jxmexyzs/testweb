<?php 
include("../include/config.php");
include("../include/functions.php");

if(isset($_POST['id'])){
$id = $_POST['id'];
if (isset($_SESSION['username'])) { 

if (check_havescript($id,$_SESSION['username'])) {
	$query = mysqli_query(connDB(),"SELECT * FROM license WHERE id = '$id'");
	$result = mysqli_fetch_array($query);
	?>
	<div class="modal-header" style="background-color: rgba(33,33,33,1.0);border: solid #fff 0px; border-radius: 23px 23px 0px 0px;">
		<h4 class="modal-title"><b>แก้ไข IP (เสีย <?php echo number_format($price_changeip); ?> พ้อย)</b></h4>
		<button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
	</div>
	<div class="modal-body text-white" style="background-color: rgba(33,33,33,1.0);border: solid #fff 0px; border-radius: 0px 0px 23px 23px;">
		<form action="<?php echo $domain; ?>/actions.php" method="post" id="updateip">
			<input type="hidden" name="action" id="action" value="updateip">
			<input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>">
			<div class="form-group">
				<input type="text" name="ip" id="ip" placeholder="ใส่ IP ที่ต้องการใช้งาน" class="form-control" value="<?php echo $result['ip']; ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-block"> บันทึก </button>
		</form>
	</div>
	<br>

<?php }else{ ?>

	<div class="modal-header" style="background-color: rgba(60, 66, 66,0.5);border: solid #fff 1px;">
		<h4 class="modal-title"><b>เกิดข้อผิดพลาด</b></h4>
		<button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
	</div>
	<div class="modal-body text-white" align="center" style="background-color: rgba(0,0,0,0.5);border: solid #fff 1px;">
		<h3><b>นี่ไม่ใช่ สคริป ของคุณ กรุณาอย่าแก้ไข ID</b></h3>
	</div>

<?php } ?>

<script>
	$(document).ready(function () {
		$("#updateip").submit(function(){ 
			$.post("<?php echo $domain; ?>/actions.php",$("#updateip").serialize(),function(data){
				if(data == 1){
					swal("Success", "อัพเดท IP Success", "success");
					$('#ipmodal').modal('hide');
					setTimeout("location.href = '<?php echo $domain; ?>/MyScripts';", 2000);
				}else if(data == 3){
					swal("Failed Save", "ข้อมูลไม่ครบ", "error");
				}else{
					swal("Failed Save", "เกิดข้อผิดพลาดบางอย่าง", "error");
				}
			});
			return false;
		});

	});
</script>

<?php }else{ header("location: $domain"); } } ?>



