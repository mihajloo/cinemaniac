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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>


<body>
<div class="container">
<div class="row">
<div class="col-8">
<p class="quote" ><i>"Because they're exlusive. And fun, and they lead to a better life."</i></p>
<p class="quote"><font size:20px>Author</font></p>
</div>
<div class="col-4">
<button class="signout" class="col-4" onclick="window.location.href = 'MainPage.html';" style="width:250px;">Sign Out</button>
</div>
</div>
<div class="row" style="margin-top:75px;">
<div  class="col-4 ">

<button class=" fill" onclick="window.location.href = 'game.html';">Play</button>


<button class=" fill"onclick="myFunction1()">Statistics</button>


<button class=" fill" onclick="myFunction2()">Match History</button>


<button class=" fill" onclick ="myFunction3()">Leaderboard</button>

<button class=" fill" onclick ="myFunction4()">Submit Question</button>
</div>


<div  class="col-8" >
<div id="demo1" class="centar"  valign="top" style="display:none" >
<p><font color=#FFDF00 size=20px>Wins: 10 <br> <br> Losses: 0 <br><br>  Win Ratio: 100% <br><br> Average: 10p per Game</font></p>
</div>
<div id="demo2" class="centar" style="display:none">
<div  class="vertical-menu">
  <div class="row">
  <div class= "col-4"><p class="lose">LOSS</p> </div>  
  <div class= "col-8"><p class="lose">Points: 10p</p>
  </div>
  </div>
  
  <div class="row">
  <div class= "col-4"><p class="lose">LOSS</p> </div>  
  <div class= "col-8"><p class="lose">Points: 10p</p>
  </div>
  </div>
  <div class="row">
  <div class= "col-4"><p class="win">WIN</p> </div>  
  <div class= "col-8"><p class="win">Points: 10p</p>
  </div>
  </div>
  <div class="row">
  <div class= "col-4"><p class="win">WIN</p> </div>  
  <div class= "col-8"><p class="win">Points: 44p</p>
  </div>
  </div>
  <div class="row">
  <div class= "col-4"><p class="lose">LOSS</p> </div>  
  <div class= "col-8"><p class="lose">Points: 10p</p>
  </div>
  </div>
  
</div>

</div>

<div id="demo3" class="centar" style="display:none" >
<div class="leader">
    <div class="red">
        <div class="spot">1.</div><div class="name">DrKingSchultz</div><div class="score">999</div>
    </div>
   
    <div class="red">
        <div class="spot">2.</div><div class="name">Anton Chigurh</div><div class="score">900</div>
    </div>
    
    <div class="red">
        <div class="spot">3.</div><div class="name">Daniel Plainview</div><div class="score">840</div>
    </div>
    
	<div class="red">
        <div class="spot">4.</div><div class="name">Hannibal Lecter</div><div class="score">790</div>
    </div>
	
	<div class="red">
        <div class="spot">5.</div><div class="name">Col. Hans Landa</div><div class="score">720</div>
    </div>
    
    <div class="red">
        <div class="spot">6.</div><div class="name">Derek Vinyard</div><div class="score">715</div>
    </div>
	
	<div class="red">
        <div class="spot">7.</div><div class="name">Big Lebowski</div><div class="score">680</div>
    </div>
	
	<div class="red">
        <div class="spot">8.</div><div class="name">Leon</div><div class="score">650</div>
    </div>
	<div class="red">
        <div class="spot">9.</div><div class="name">M. Jones</div><div class="score">620</div>
    </div>
</div>	

</div>


<div id="demo4" class="centar"   style="display:none" >
<div class="row">
<div class="col">   
	<form action="/action_page.php">
    <input type="text" id="movie" name="movie" placeholder="Enter movie for search.." style="float: left;width:85%;">
	</form>

  <button type="submit" style="float: left;font-size: 15px;height:55px;"  ><i class="fa fa-search"></i></button>

	
 </div> 

</div>  

<div class="row">
<div class="col-12">
	<div  class="vertical-menu"  >
					<table align="center" width=100% cellspacing="10" cellpadding="10">
						<tr style="background-color:#f2f2f2;" >
							<th style="color:#000" >Movie Name</th>
							<th style="color:#000" >Insert Name</th>
				
							
						</tr>
						<tr onclick ="myFunction5()" style="cursor: pointer;">
						
						<td>Avengers Infinity War</td><td>Thor kills Thanos</td>
						
						</tr>
						<tr onclick ="myFunction5()" style="cursor: pointer;">
						<td>Thor the Dark World</td><td>Insert1</td>
						
						</tr>
						<tr onclick ="myFunction5()" style="cursor: pointer;">
						<td>Avengers</td><td>Insert1</td>
					
						</tr>
						<tr onclick ="myFunction5()" style="cursor: pointer;">
						<td>Harry Potter</td><td>Insert1</td>
						
						</tr>
						<tr onclick ="myFunction5()" style="cursor: pointer;">
						<td>Avengers</td><td>Fight scene</td>
					
						</tr>
					</table>
	</div>
	</div></div>
</div>  


<div id="demo5"  style="display:none" class="centar" >
<div align="right"><button onclick="myFunction4()"><i class="fas fa-arrow-left" ></i></button></div>
	<video autoplay controls >
	<source src="media/videos/Head.mp4" type="video/mp4">
	<source src="media/videos/Head.ogg" type="video/ogg"> 
	</video><br>
	<div >
	<form action="/action_page.php" >
	
	<div class="row">
	<div class="col-1">
		<font  color=#A2F6A7 >Q:</font> 
	</div>	
	<div class="col-11">
		<input type="text" name="Question" placeholder="Enter your question" maxlength="45"><br>
	</div>	
	</div>
	<div class="row">
	<div class="col-1">
		<font  color=#A2F6A7 >C.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="CA" placeholder="Enter your correct answer" maxlength="45"><br>
	</div>
	</div>
	<div class="row">
		<div class="col-1">
		<font  color=#A2F6A7 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA1" placeholder="Enter your wrong answer"maxlength="45"><br>
	</div>

	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#A2F6A7 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA2" placeholder="Enter your wrong answer"maxlength="45"><br>
	</div>
	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#A2F6A7 >W.A:</font> 
		</div>	
	<div class="col-11">	
		<input type="text" name="WA3" placeholder="Enter your wrong answer"maxlength="45"><br>
	</div>
	</div>
	
	</form>
		<button class="submit"  data-toggle="modal" data-target="#myModal" >Submit</button>
	</div>
</div>
<div id="demo0"  style="display:block">
		<img src="<?php echo base_url(); ?>media/images/logo2.png" style="max-width:100%;">
		</div
</div>
</div>


  
  <!-- Modal -->
 <div class="modal fade" id="myModal">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
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
	document.getElementById('demo5').style.display = "none";
	document.getElementById('demo0').style.display = "none";
	  
}

function myFunction2() {
  document.getElementById('demo2').style.display = "block";	
  document.getElementById('demo1').style.display = "none";
  document.getElementById('demo3').style.display = "none";
  document.getElementById('demo4').style.display = "none";
  document.getElementById('demo5').style.display = "none";
  document.getElementById('demo0').style.display = "none";
 
}
function myFunction3() {
  document.getElementById('demo3').style.display = "block";
  document.getElementById('demo1').style.display = "none";
  document.getElementById('demo2').style.display = "none";
  document.getElementById('demo4').style.display = "none";
  document.getElementById('demo5').style.display = "none";
  document.getElementById('demo0').style.display = "none";

 
}
function myFunction4() {
  document.getElementById('demo4').style.display = "block";
  document.getElementById('demo1').style.display = "none";
  document.getElementById('demo2').style.display = "none";
  document.getElementById('demo3').style.display = "none";
  document.getElementById('demo5').style.display = "none";
  document.getElementById('demo0').style.display = "none";

}
function myFunction5() {
  document.getElementById('demo5').style.display = "block";
  document.getElementById('demo1').style.display = "none";
  document.getElementById('demo2').style.display = "none";
  document.getElementById('demo3').style.display = "none";
  document.getElementById('demo4').style.display = "none";
  document.getElementById('demo0').style.display = "none";
}

</script>

</body>
</html>

