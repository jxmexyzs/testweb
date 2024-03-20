    <?php 
            $query = mysqli_query(connDB(),"SELECT * FROM kn_config");
            while($row = mysqli_fetch_array($query)){
            ?>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo $domain; ?>/images/icon/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="<?php echo $domain; ?>/sweetalert/sweetalert.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit|Merriweather" rel="stylesheet">
   <link href="css/styles.css" rel="stylesheet">
    <script src="<?php echo $domain; ?>/sweetalert/sweetalert.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
      *{
        font-family: 'Kanit', sans-serif;
      }

      body
    {
     /* background: url('<?php echo $domain; ?>/images/bg.gif') center center fixed;*/
	  <?php } ?>
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      overflow-x: hidden;
    }
    shadowbox {
		background: none!important;
		border: 2px inset rgba(0,0,0,0.2)!important;
		border-radius: none;
		-webkit-box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.75);
	}
   /* Scrollbar */
body::-webkit-scrollbar { width:5px; height:2px; background-color:#000;}
body::-webkit-scrollbar-track {background-color:#000;}
body::-webkit-scrollbar-thumb {background: #00ff23;}

.plus-alert {
    padding: 15px;
    margin-bottom: 5px;
    border: 1px solid transparent;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 300;
    letter-spacing: 0.5px;
}
    </style>