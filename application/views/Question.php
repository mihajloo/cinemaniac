<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
<style>


.fa {
  font-size: 50px;
  cursor: pointer;
  user-select: none;
}

.fa-thumbs-up:hover {
  color: green;
}
.fa-thumbs-down:hover {
  color: red;
}

.ffont{
font-size:30px;
text-align:center;
}
.butt {
	background:none;
	border: 2px solid;
	text-align: center;
	text-decoration: none;  
	margin: 4px 2px;
	cursor: pointer;
	width:450px;
	height:150px;
	font-size:20px;
 color: #FFDF00;
 hover: #FFDF00;
	color:#FFDF00;
 
}

.butt:hover, .butt:focus {
  color: #FFDF00;
  border-width:5px;
}


</style>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<body>
<div class="container">
<div class="row" style="margin-top:50px;">
<div class="col">
<div class="ffont" style="text-align:center"><h1><font color=#FFDF00>What did Thanos say to Thor?</font><h1></div>
</div></div>
<div class="row" style="margin-top:50px;">
<div class="col-6">
<button id="a0" class="butt" style="float:right" onclick="f('a0')"><font size="8px" style="font-family:'Leftovers'">Subscribe to Pewdiepie!</font></button>
</div>
<div class="col-6">
<button id="a1" class="butt" style="float:left" onclick="f('a1')"><font size="8px" style="font-family:'Leftovers'">Aaaaah that's hot, that's hot!</font></button>
</div>
</div>

<div class="row" style="margin-top:50px;">

<div class="col-6">
<button id="a2" class="butt" style="float:right" onclick="f('a2')"><font size="8px" style="font-family:'Leftovers'">I did not hit her, I did naaaawt!</font></button>
</div>
<div class="col-6">
<button id="a3" class="butt" style="float:left" onclick="f('a3')"><font size="8px" style="font-family:'Leftovers'">You should have gone for the head.</font></button>
</div>
</div>


<div class="row" style="margin-top:50px;">
<div class="col">
<i onclick="myFunction(this)" class="fa fa-thumbs-up" style="font-size:30px" style="float:right"><div style="font-family:'Galindo'">Like Question</div></i>
</div>
<div class="col">
<i onclick="myFunction(this)" class="fa fa-thumbs-down" style="font-size:30px" style="float:left" color=#FFDF00><div style="font-family:'Galindo'">Dislike Question</div></i>
</div>
</div>
    <div id="txtHint"></div>
<div id="countdown"></div>
<script>
var x=1;
function f(str) {
if(x==1){
	document.getElementById(str).style.backgroundColor = "#FFDF00";
   document.getElementById(str).style.color="#000";
   	x=2;
        if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
 xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {
 document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
 }
}
xmlhttp.open("GET","<?php $stranica = site_url('RegularUser/klik');  echo $stranica;?>",true);
xmlhttp.send();

  }
}
var timeleft = 15;
document.getElementById("countdown").style.fontSize = "50px";
var downloadTimer = setInterval(function(){
  if(timeleft<=10)
  document.getElementById("countdown").innerHTML = timeleft;
  timeleft -= 1;
  if(timeleft==4) {document.getElementById("countdown").style.color="red";
  document.getElementById("countdown").style.fontSize = "60px";
  }
  if(timeleft <= 0){
    window.location.href = 'Points.html';
  }
}, 1000);
</script>
</body>
</html>