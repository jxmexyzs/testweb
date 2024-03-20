<?php
function connect_api($url){
	
	return file_get_contents($url);
}

function alert_content($content,$type){
	switch($type){
		case "alert-danger":
			$type_alert="error";
		 break;
		case "alert-warning":
			$type_alert="warning";
		 break;
		case "alert-success":
			$type_alert="success";
			
		 break;
	}
	$content_box=preg_replace('/"/','\"',$content);
	$script_alert='
	<script type="text/javascript">
            swal({
                    title: "System Message!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                    text: "'.$content_box.'", //ข้อความเปลี่ยนได้ตามการใช้งาน
                    type: "'.$type_alert.'", //success, warning, danger
                    timer: 3000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                    showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                }, function(){
                    window.location.href = "deposit"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                    });
        </script>
JSalert();
</script>';
	echo $script_alert;
	$_SESSION[alert_content]="";
}
function my_ip(){
 if ($_SERVER['HTTP_CLIENT_IP']) { 
$IP = $_SERVER['HTTP_CLIENT_IP'];
} elseif (preg_match("[0-9]",$_SERVER["HTTP_X_FORWARDED_FOR"] )) { 
$IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else { 
$IP = $_SERVER["REMOTE_ADDR"];
}
return $IP;
}
?>