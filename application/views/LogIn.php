<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>centarReg.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>myStyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div align="right">
<button  onclick="window.location.href = '<?php echo site_url('Guest/index') ?>';" ><i class="fas fa-arrow-left"></i></button>
</div>
<div class="centerReg">
  <form action="/action_page.php">
    
	<label for="username">Username</label><br>
    <input type="text" id="username" name="username" placeholder="Enter your username.." maxlength="8"><br>

    <label for="Password">Password</label><br>
    <input  type="password" id="Password" name="Password" placeholder="Enter your password.." maxlength="8"><br>
    <button class=" fill"  onclick="window.location.href = '<?php echo site_url('Guest/checkLogin') ?>';">Login</button>
  </form>
	<button class=" fill" onclick="window.location.href = '<?php echo site_url('Guest/registerPage') ?>';">Create account</button>
</div>
</body>
</html>