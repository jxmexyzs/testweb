<?php 
include("../include/config.php");
include("../include/functions.php");

$page = "customscript";

?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo $web_titles; ?> > Custom Script</title>
  <?php include("../include/head.php"); ?>
  <style>
    img:hover{
      transform: scale(1.03);
    }
	.grid-body {
			margin: auto;
            width: 100%;
			border-radius: 50px;
        }
	P.blocktext {
	padding-top: 0.5px;
	padding-bottom: 0.5px;
	margin: 2%;
	
 
}

a.pagelink:hover { 
color: #03ff07; /* โค้ดสีที่ต้องการให้เปลี่ยน */
background-color: rgba(3, 255, 221,0.0);
text-decoration: none; 
}
.btn{
      background: none; 
	  border-radius: 23px;
    }
	.kn-btn{	
	background-color: rgba(32,32,32, 1.0);
    border: none;
	padding: 5px 30px;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    margin: 0px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	border-radius: 23px;
}
.kn-btns{	
	background-color: rgba(32,32,32, 1.0);
    border: none;
	padding: 5px 30px;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 0px 20px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	border-radius: 23px;
}
.neonTexts {
  color: #fff;
  text-shadow:
      0 0 7px #fff,
      0 0 10px #fff,
      0 0 21px #fff,
      0 0 42px #0fa,
      0 0 82px #0fa,
      0 0 92px #0fa,
      0 0 102px #0fa,
      0 0 151px #0fa;
}

.neonText {
  animation: flicker 0.5s infinite alternate;
  color: #fff;
}


/* Flickering animation */
@keyframes flicker {
    
  0%, 18%, 22%, 25%, 53%, 57%, 100% {

      text-shadow:
      0 0 4px #fff,
      0 0 11px #fff,
      0 0 19px #fff,
      0 0 40px #0fa,
      0 0 80px #0fa,
      0 0 90px #0fa,
      0 0 100px #0fa,
      0 0 150px #0fa;
  
  }
  
  20%, 24%, 55% {        
      text-shadow: none;
  }    
}
.grid-bodys {
			margin: auto;
			padding: 10px;
            width: 97%;
			border-radius: 50px;
			
        }
a.pagelink:hover { 
color: #03ff07; /* โค้ดสีที่ต้องการให้เปลี่ยน */
background-color: rgba(3, 255, 221,0.0);
text-decoration: none; 
}

  </style>
</head>
<body>
	
  <div class="wrapper" style="background: none;">

    <?php include("../include/sidebar.php"); ?>


    <div id="content">

      <div class="container" style="margin-top: 20px;">
			  	<div class="grid-bodys" style="background-color: rgba(32,32,32, 1.0);">
				<a button style="cursor: paddin pointer background-color: rgba(42, 128, 218, 1.5);"type="button" class="pagelink kn-btn button-kns nav-link"href="<?php echo $domain; ?>/shop" ><i class="fas fa-shopping-cart"></i> ร้านค้า</button></a>
		<?php if (isset($_SESSION['username'])) {  ?>
	<a button style="cursor: paddin pointer background-color: rgba(42, 128, 218, 1.5);"type="button" class="pagelink kn-btn button-kns nav-link"href="<?php echo $domain; ?>/MyScripts" ><i class="fas fa-suitcase"></i> สคริปของฉัน</button></a>
	<a button style="color: #fff;"type="button" class="kn-btn button-kns nav-link" data-toggle="modal" data-target="#usecodemodal" href="<?php echo $domain; ?>" ><i class="fas fa-book"></i>  เติมพ้อย</button></a>
	<a button style="color: #fff;"type="button" class="kn-btn button-kns nav-link" data-toggle="modal" data-target="#usecodescriptmodal" href="<?php echo $domain; ?>" ><i class="far fa-credit-card"></i> เติมcodสคริป</button></a>
	 <?php } ?> 
	 <?php if (isset($_SESSION['username']) and is_admin($_SESSION['username'])) { ?>
	<a button style="cursor: paddin pointer background-color: rgba(42, 128, 218, 1.5);"type="button" class="pagelink kn-btn button-kns nav-link"href="<?php echo $domain; ?>/Members" ><i class="fas fa-user-lock"></i> แอดมินเมนู</button></a>
	<?php } ?> 
	</div>
        </div>

		 <div class="container" style="margin-top: 20px;">
      <div class="container-fluid">
	  <div class="grid-body" style="background-color: rgba(32,32,32, 1.0);">
        <div class="row">

          <div class="col-lg-12" style=" border-radius: 5px;">
           
		   <?php

			#บอเด้อ

			# ระบบเติมเงิน

			?>
		   
          </div>


        </div>
      </div>


      <br><br>
      <?php include("../include/footer.php"); ?>
    </div>
	</div>
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

</html><!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <?php echo $web_titles; ?> 2022</p></div>
        </footer>
 
</html>