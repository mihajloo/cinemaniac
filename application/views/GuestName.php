<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>centarReg.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div align="right"><button   onclick="window.location.href = '<?php echo site_url('Guest/index') ?>';" ><i class="fas fa-arrow-left"></i></button></div>



<div class="centerReg" height="50%">

	<form action="/action_page.php" height="50%">
		<label for="username">Ingame name:</label>
		<input type="text" id="username" name="username" placeholder="Enter your name.." maxlength="8">

	</form>
	<button onclick="window.location.href = '<?php echo site_url('Guest/play') ?>';" class="fill" >PLAY</button>
	
</div>
</body>
</html>