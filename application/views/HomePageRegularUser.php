<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">

</head>


<body>

<div class="container">
<div class="row">
<div class="col-8">
<p class="quote" ><i>Welcome!</i></p>
</div>
<div class="col-4">
<button class="signout" class="col-4" onclick="window.location.href = '<?php echo site_url('RegularUser/signout') ?>';" style="width:250px;">Sign Out</button>
</div>
</div>
<div class="row" style="margin-top:75px;">
<div  class="col-4 ">

<button class=" fill" onclick="window.location.href = 'game.html';">Play</button>


<button class=" fill"onclick="window.location.href = '<?php echo site_url('RegularUser/statistics') ?>';">Statistics</button>


<button class=" fill" onclick="window.location.href = '<?php echo site_url('RegularUser/matchHistory') ?>';">Match History</button>


<button class=" fill"onclick="window.location.href = '<?php echo site_url('RegularUser/leaderboard') ?>';">Leaderboard</button>

</div>


<div  class="col-8" >
    <div id="demo1" class="centar"  valign="top" <?php if($str == 2) echo "style='display:block'"; else echo "style='display:none'";?>>
<p><font color=#FFDF00 size=20px>Wins: <?php echo $brPobeda ?> <br> <br> Losses: <?php echo $brPoraza ?> <br><br>  Win Ratio: <?php echo $procenat ?>% <br><br> Average: <?php echo $avg ?>p per Game</font></p>
</div>
<div id="demo2" class="centar"  <?php if($str == 3) echo "style='display:block'"; else echo "style='display:none'";?>>
<div  class="vertical-menu">
    <?php 
    foreach($partije as $partija){
        $str="";
        $str.= "<div class='row'>";
        $str.= "<div class='col-4'>";
      
        $str.= "<p class=".$partija->pobedio.">";
        if($partija->pobedio =="win"){
             $str.= "WIN";
        }
        else  $str.= "LOSS";
        $str.= "</p></div>";
        $str.=  "<div class= 'col-8'>";
        $str.= "<p class=".$partija->pobedio.">";
        $str.="Points: ".$partija->partija->BrojPoena."p</p></div></div>";
        echo $str;
    }
    ?>
</div>
</div>

<div id="demo3" class="centar" <?php if($str == 4) echo "style='display:block'"; else echo "style='display:none'";?>>
<div class="leader">
    <?php 
      $i =1;
     foreach ($igraci as $igrac){
         $str="";
         $str.="<div class='red'><div class='spot'>";
         $str.=$i."</div><div class='name'>";
         $str.=$igrac->Username."</div><div class='score'>".$igrac->Poeni."</div></div></div>";
         echo $str;
     }
    ?>
   
</div>	
</div>
<div id="demo0"  <?php if($str == 1) echo "style='display:block'"; else echo "style='display:none'";?>>
		<img src="<?php echo base_url(); ?>media/images/logo2.png" style="max-width:100%;">
</div>
</div>


</div>
</div>

  
<script>
function myFunction1() {
  document.getElementById('demo1').style.display = "block";	
  document.getElementById('demo2').style.display = "none";
  document.getElementById('demo3').style.display = "none";
  document.getElementById('demo0').style.display = "none";
	  
}

function myFunction2() {
  document.getElementById('demo2').style.display = "block";	
  document.getElementById('demo1').style.display = "none";
  document.getElementById('demo3').style.display = "none";
  document.getElementById('demo0').style.display = "none";
 
}
function myFunction3() {
  document.getElementById('demo3').style.display = "block";
  document.getElementById('demo1').style.display = "none";
  document.getElementById('demo2').style.display = "none";
  document.getElementById('demo0').style.display = "none";

 
}


</script>

</body>
</html>

