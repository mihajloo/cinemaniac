<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
<style>

.user{
    color:#FFDF00; 
}
.lose1{
  text-align: center;
  color:#FF0000;
  font-size:70px;
}
.win1{
  text-align: center;
  color:#00FF00; 
  font-size:70px;  
}
.draw1{
  text-align: center;  
  color:#FFDF00;
  font-size:70px;
}
.col-4,.col-2{
    margin-top: 25px;
    font-size: 30px;
    text-align: center;
    border-top:3px solid white;
    border-bottom:3px solid white;
}
.submit{
   font-size: 30px;  
}
</style>
</head>
<body>
<div class = "container" >
<div class = "row" >
<div class = "col">
    <?php 
    $str = "<div class='row'><div class='col'><div class='".$outcome."'>";
    switch ($outcome){
    case "win1":$str.="YOU WON!";break;
    case "lose1":$str.="YOU LOST!";break;
    case "draw1":$str.="IT'S A DRAW!";break;    
    }    
    $str.="</div></div></div>";
    $bool = true;
    echo $str;
    $i = 1;
    foreach($results as $result){
       $str="";
       $str.="<div class = 'row'";
       if($bool){
           $bool=false;
          // $str.="style='margin-top:150px'";
       }        
       $str.=">";
       $pom="";
       if($controller == 'Guest'){
           $name = $_SESSION['gost'];
       }
       else{
           $name = $_SESSION['korisnik']->regUser->Username;
       }
       if($result->Username == $name){
           $pom="class='user'";
       }
       $str.="<div class='col-2 offset-1'><div ".$pom.">".$i.".</div></div>";
       $i++;
       $str.="<div class='col-4'><div ".$pom.">".$result->Username."</div></div>";
       $str.="<div class='col-4'><div ".$pom.">".$result->BrojPoena." points</div></div></div>";
       echo $str;
    }
    ?>

    <div class="row mt-5">
        <div class="col">
            <button class="submit" onclick="window.location.href = '<?php echo site_url($controller.'/playAgain') ?>';">
               Play Again
            </button>
        </div>
         <div class="col">
             <button class="submit" onclick="window.location.href = '<?php echo site_url($controller.'/goToMenu') ?>';">
               Go to menu
            </button>
        </div>
    </div> 

</div>	
</div>	
</div>	
      
</body>
</html>