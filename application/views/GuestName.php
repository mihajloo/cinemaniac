<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>centarReg.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
 <div class="container">   
<div class="row"><div class="col">    
<div align="right"><button class='signout'  onclick="window.location.href = '<?php echo site_url('Guest/index') ?>';" ><i class="fas fa-arrow-left"></i></button></div>
</div></div>
  <div class='row'>
 <div class='col'><font color='red' style='font-size:20px;'><?php  if(isset($poruka)) echo $poruka; ?></font></div>
  </div>    
 <div class='row'>
 <div class='col'><font color='red' style='font-size:20px;'><?php  if(isset($poruka)) echo $poruka; ?></font></div>
  </div>  
 <div class='row'><div class='col'>
<div class="centerReg">
	<form action="<?php echo site_url('Guest/play') ?>" method='post' name='formGuest' >
		<label for="username">Ingame name:</label>
		<input type="text" id="username" name="username" placeholder="Enter your name.." maxlength="8">
                <button type="submit" class="fill" >PLAY</button>       
	</form>
</div></div></div>
 </div>    
</body>
</html>