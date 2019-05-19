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
 <div class='container'>
     <div class='row'>
      <div class='col'>   
<div align="right">
<button  class='signout' onclick="window.location.href = '<?php echo site_url('Guest/loginPage') ?>';" ><i class="fas fa-arrow-left"></i></button>
</div>
 </div> 
    </div>    
   <div class='row'>
         <div class='col'><?php echo form_error("username","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
     </div>
    <div class='row'>
         <div class='col'><?php echo form_error("Password","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
     </div>   
     <div class='row'>
         <div class='col'><?php echo form_error("ConfirmPassword","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
     </div> 
    <div class='row'>
         <div class='col'><?php echo form_error("Email","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
     </div> 
     <div class='row'>
         <div class='col'><font color='red' style='font-size:20px;'><?php  if(isset($poruka)) echo $poruka; ?></font></div>
     </div>  
 <div class='row'>    
  <div class='col'>   
<div class="centerReg">
<table>
    <form action="<?php echo site_url('Guest/register') ?>" method="post" name='registerForm'>
	<tr><td>
	<label for="username">Username</label>
	 </tr></td>
	<tr><td>
    <input type="text" id="username" name="username" placeholder="Enter your username..">
	</tr></td>
	<tr><td>
    <label for="Password">Password</label>
     </tr></td>
	<tr><td>
	<input  type="password" id="Password" name="Password" placeholder="Enter your password..">
	 </tr></td>
	<tr><td>
	<label for="ConfirmPassword">Confirm Password</label>
     </tr></td>
	<tr><td>
	<input  type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Enter your password..">
	 </tr></td>
	<tr><td>
	<label for="Email">Email</label>
	 </tr></td>
	<tr><td>
    <input  type="text" id="Email" name="Email" placeholder="Enter your Email..">
	</tr></td>
	<tr><td>
          <button class=" fill"  type='submit'>Submit</button>        
          </tr></td>
  </form>

    
</table>	
</div>
  </div>    
 </div>
     
</div> 
</body>
</html>