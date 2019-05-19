<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>centarReg.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col">
<div align="center">
	<img src='<?php echo base_url(); ?>media/images/logo2.png'  style="max-width: 75%;"><!--PATH-->
</div>
</div>
</div>
<div class="row" >	
<div class="col">
<div class="centerReg">
	<button class="fill" onclick="window.location.href = '<?php echo site_url('Guest/loginPage') ?>';">PLAY</button>
	<button class="fill" onclick="window.location.href = '<?php echo site_url('Guest/guestNamePage') ?>';">PLAY AS GUEST</button>
	
</div>
</div>
</div>
</div>


</body>

</html>
