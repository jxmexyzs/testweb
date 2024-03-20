
<script>
  $(document).ready(function(){
    <?php if (!isset($_SESSION['username'])) { ?>
      $("#form-login").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#form-login").serialize(),function(data){
          if(data == 1){
            swal("success", "Login Success", "success");
            $('#login').modal('hide');
            setTimeout("location.href = '<?php echo $domain; ?>';", 2000);
          }else if(data == 2){
            swal("Failed", "Cannot Find User", "error");
            $("#form-login")[0].reset();
          }else if(data == 3){
            swal("Failed", "Wrong Password", "error");
            $("#form-login")[0].reset();
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
            $("#form-login")[0].reset();
          }
        });
        return false;
      });

      $("#form-register").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#form-register").serialize(),function(data){
          if(data == 1){
            swal("success", "สมัครสมาชิกsuccess", "success");
            $('#register').modal('hide');
            setTimeout("location.href = '<?php echo $domain; ?>';", 2000);
          }else if(data == 2){
            swal("Failed", "Cannot Find User", "error");
            $("#form-register")[0].reset();
          }else if(data == 5){
            swal("Failed", "Already have user", "error");
            $("#form-register")[0].reset();
          }else if(data == 10){
            swal("Failed", "Please fill in every box", "error");
            $("#form-register")[0].reset();
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
            $("#form-register")[0].reset();
          }
        });
        return false;
      });
    <?php }else{ ?>

      $("#usecode").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#usecode").serialize(),function(data){
          if(data == 1){
            swal("success", "Add code Success", "success");
            $('#usecodemodal').modal('hide');
            setTimeout("location.href = '<?php echo $actual_link; ?>';", 2000);
          }else if(data == 2){
            swal("Failed", "Code ถูกใช้งานแล้ว", "error");
            $("#usecode")[0].reset();
          }else if(data == 3){
            swal("Failed", "Don't have code in system", "error");
            $("#usecode")[0].reset();
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
          }
        });
        return false;
      });
      $("#usecodescript").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#usecodescript").serialize(),function(data){
          if(data == 1){
            swal("success", "Add code Success", "success");
            $('#usecodemodal').modal('hide');
            setTimeout("location.href = '<?php echo $domain; ?>/MyScripts';", 2000);
          }else if(data == 2){
            swal("Failed", "Code ถูกใช้งานแล้ว", "error");
            $("#usecodescript")[0].reset();
          }else if(data == 3){
            swal("Failed", "Don't have code in system", "error");
            $("#usecodescript")[0].reset();
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
          }
        });
        return false;
      });


    <?php } ?>



    <?php 
    if (isset($_SESSION['username']) and $page == "script") {
      ?>
      $("#form-buy").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#form-buy").serialize(),function(data){
          if(data == 1){
            swal("success", "Buy Script Success", "success");
            $('#buy').modal('hide');
            setTimeout("location.href = '<?php echo $domain; ?>/MyScripts';", 2000);
          }else if(data == 3){
            swal("Failed", "Missing Information", "error");
            $("#form-buy")[0].reset();
          }else if(data == 6){
            swal("Failed", "You don't have enough point", "error");
            $("#form-buy")[0].reset();
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
          }
        });
        return false;
      });

    <?php } ?>

    <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username']) and $page == "script") { ?>

      $("#form-edit").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#form-edit").serialize(),function(data){
          if(data == 1){
            swal("success", "Update success", "success");
            $('#editscript').modal('hide');
            setTimeout("location.href = '<?php echo $domain; ?>/Script/<?php echo $id; ?>';", 2000);
          }else if(data == 3){
            swal("Failed", "You don't have enough point", "error");
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
          }
        });
        return false;
      });

    <?php } ?>

    <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username']) and $page == "code") { ?>

      $("#addcode").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#addcode").serialize(),function(data){
          if(data == 1){
            swal("success", "Add code Success", "success");
            $('#addcodemodal').modal('hide');
            setTimeout("location.href = '<?php echo $domain; ?>/Code';", 2000);
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
          }
        });
        return false;
      });

    <?php } ?>

    <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username']) and $page == "code-script") { ?>

      $("#addcodescript").submit(function(){ 
        $.post("<?php echo $domain; ?>/actions.php",$("#addcodescript").serialize(),function(data){
          if(data == 1){
            swal("success", "Add code Success", "success");
            $('#addcodescriptmodal').modal('hide');
            setTimeout("location.href = '<?php echo $domain; ?>/Code-Script';", 2000);
          }else{
            swal("Failed", "เกิดข้อผิดพลาด", "error");
          }
        });
        return false;
      });

    <?php } ?>


  });
</script>