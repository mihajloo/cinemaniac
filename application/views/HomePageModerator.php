<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
</head>


<body>
<div class="container">
<div class="row">
<div class="col-8">
<p class="quote" ><i>"Reality can be whatever I want."</i></p>
<p class="quote"><font size:20px color:>Author</font></p>

</div>
<div class="col-4">
<button class="signout" class="col-4" onclick="window.location.href = '<?php echo site_url('Moderator/logout') ?>';" style="width:250px;">Sign Out</button>
</div>
</div>
<div class="row"  style="margin-top:75px;" style="height:80%">
	<div  class="col-4 " >
	<button class=" fill"onclick="myFunction1()">Question Requests</button>
	<button class=" fill" onclick="myFunction2()">Question Base</button>
	</div>
	<div  class="col-8 ">		
	<div id="demo1" class="centar"  valign="top" style="display:none" >
				<div  class="vertical-menu"  >
					<table align="center" width=100% cellspacing="10" cellpadding="10">
						<tr style="background-color:#f2f2f2;" >
							<th style="color:#000" >Movie Name</th>
							<th style="color:#000" >Insert Name</th>
							<th style="color:#000" >Question</th>
							
						</tr>
						<tr onclick ="myFunction3()" style="cursor: pointer;">
						
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td>
						
						</tr>
						<tr onclick ="myFunction3()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td>
						
						</tr>
						<tr onclick ="myFunction3()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td>
					
						</tr>
						<tr onclick ="myFunction3()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td>
						
						</tr>
						<tr onclick ="myFunction3()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td>
					
						</tr>
					</table>	
				</div>
				</div>
	<div id="demo3" class="centar" style="display:none"  >
				<div align="right"><button onclick="myFunction1()"><i class="fas fa-arrow-left" ></i></button></div>
						<video autoplay controls >
						
	<source src="media/videos/Head.mp4" type="video/mp4">
	<source src="media/videos/Head.ogg" type="video/ogg"> 
	</video><br>
	
	
	
	<form action="/action_page.php" >
	
	<div class="row">
	<div class="col-1">
		<font  color=#FFDF00 >Q:</font> 
	</div>	
	<div class="col-11">
		<input type="text" name="Question" placeholder="Enter your question" maxlength="45"><br>
	</div>	
	</div>
	<div class="row">
	<div class="col-1">
		<font  color=#FFDF00 >C.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="CA" placeholder="Enter your correct answer" maxlength="45"><br>
	</div>
	</div>
	<div class="row">
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA1" placeholder="Enter your wrong answer" maxlength="45"><br>
	</div>

	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA2" placeholder="Enter your wrong answer" maxlength="45"><br>
	</div>
	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
		</div>	
	<div class="col-11">	
		<input type="text" name="WA3" placeholder="Enter your wrong answer" maxlength="45"><br>
	</div>
	</div>
	
	</form>
		<button class="fill"  data-toggle="modal" data-target="#myModal" >Accept</button>
		<button class="losefill"  data-toggle="modal" data-target="#myModal" >Reject</button>
	</div>	
			
		
			
	<div id="demo2" class="centar"  style="display:none">
	<div class="row">
<div class="col">   
	<form action="/action_page.php">
    <input type="text" id="movie" name="movie" placeholder="Enter movie for search.." style="float: left;width:87%;">
	</form>

  <button type="submit" style="float: left;font-size: 15px;" ><i class="fa fa-search"></i></button>

	
 </div> 

</div>  

				<div  class="vertical-menu" >
					<table align="center" width=96% cellspacing="10" cellpadding="10">
						<tr style="background-color:#f2f2f2;" >
							<th align="center" style="color:#000">Movie Name</th>
							<th align="center" style="color:#000">Insert Name</th>
							<th align="center" style="color:#000">Question</th>
							<th align="center" style="color:#000">Like/Dislike</th>
						</tr>
						<tr onclick ="myFunction4()" style="cursor: pointer;">
						
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td><td>150/70</td>
						
						</tr>
						<tr onclick ="myFunction4()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td><td>150/70</td>
						
						</tr>
						<tr onclick ="myFunction4()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td><td>150/70</td>
						
						</tr>
						<tr onclick ="myFunction4()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td><td>150/70</td>
						
						</tr>
						<tr onclick ="myFunction4()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td><td>Solo Thanos</td><td>150/70</td>
						
						</tr>
					</table>
				</div>	
			</div>	
	<div id="demo4" class="centar"  style="display:none" >
<div align="right"><button onclick="myFunction2()"><i class="fas fa-arrow-left" ></i></button></div>
	<video autoplay controls >
	<source src="media/videos/Head.mp4" type="video/mp4">
	<source src="media/videos/Head.ogg" type="video/ogg"> 
	</video><br>
	
	<form action="/action_page.php" >
	
	<div class="row">
	<div class="col-1">
		<font  color=#FFDF00 >Q:</font> 
	</div>	
	<div class="col-11">
		<input type="text" name="Question" placeholder="Enter your question" maxlength="45"><br>
	</div>	
	</div>
	<div class="row">
	<div class="col-1">
		<font  color=#FFDF00 >C.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="CA" placeholder="Enter your correct answer" maxlength="45"><br>
	</div>
	</div>
	<div class="row">
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA1" placeholder="Enter your wrong answer" maxlength="45"><br>
	</div>

	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA2" placeholder="Enter your wrong answer" maxlength="45"><br>
	</div>
	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
		</div>	
	<div class="col-11">	
		<input type="text" name="WA3" placeholder="Enter your wrong answer" maxlength="45"><br>
	</div>
	</div>
	
	</form>
		<button class=" submit"  data-toggle="modal" data-target="#myModal" >Edit</button>
		<button class=" submit"  data-toggle="modal" data-target="#myModal" >Delete</button>
				
</div>
	<div id="demo0"  style="display:block" height"50%">
		<img src="<?php echo base_url(); ?>media/images/logo2.png" style="max-width:100%;">
	</div>
	</div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" style="display:inline" >
          <button type="button" class="fill " style="font-size:16px;"data-dismiss="modal" onclick ="myFunction4()">Yes</button>
		  
          <button type="button" class="losefill"  style="font-size:16px;" data-dismiss="modal" onclick ="myFunction4()">No</button>
        </div>
        </div>
      </div>
      
    </div>
</div>
<script>
function myFunction1() {
	document.getElementById('demo1').style.display = "block";	
	document.getElementById('demo2').style.display = "none";
	document.getElementById('demo3').style.display = "none";
	document.getElementById('demo4').style.display = "none";
	document.getElementById('demo0').style.display = "none";	
}

function myFunction2() {
  document.getElementById('demo2').style.display = "block";	
  document.getElementById('demo1').style.display = "none";
   document.getElementById('demo3').style.display = "none";
  document.getElementById('demo4').style.display = "none"; 
  document.getElementById('demo0').style.display = "none";
}
function myFunction3() {
  document.getElementById('demo2').style.display = "none";	
  document.getElementById('demo3').style.display = "block";
  document.getElementById('demo1').style.display = "none";
   document.getElementById('demo4').style.display = "none";
document.getElementById('demo0').style.display = "none";   
}
function myFunction4() {
  document.getElementById('demo2').style.display = "none";	
  document.getElementById('demo3').style.display = "none";
  document.getElementById('demo1').style.display = "none";
   document.getElementById('demo4').style.display = "block"; 
   document.getElementById('demo0').style.display = "none";
}
</script>

</body>
</html>

