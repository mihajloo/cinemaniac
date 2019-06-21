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
.col-4,.col-2{
    margin-top: 25px;
    font-size: 30px;
    text-align: center;
    border-top:3px solid white;
    border-bottom:3px solid white;
    -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadeinout 10s;
}
.user{
    color:#FFDF00;
}
@keyframes fadeinout {
  0%,100% { opacity: 0; }
  50% { opacity: 1; }
}
</style>
</head>
<body>
<div class = "container" >
<div class = "row" >
<div class = "col">
    <?php 
    $bool = true;
    $i = 1;
    foreach($results as $result){
       $str="";
       $str.="<div class = 'row'";
       if($bool){
           $bool=false;
           $str.="style='margin-top:150px'";
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
       $str.="<div class='col-2 offset-1 '><div ".$pom.">".$i.".</div></div>";
       $i++;
       $str.="<div class='col-4 '><div ".$pom.">".$result->Username."</div></div>";
       $str.="<div class='col-4 '><div ".$pom.">".$result->BrojPoena." points</div></div></div>";
       echo $str;
    }
    ?>

	 

</div>	
</div>	
</div>	
<script>
var timeleft = 9;
var downloadTimer = setInterval(function(){
timeleft -= 1;
  if(timeleft <= 0){
    window.location.href = "<?php echo site_url($controller.'/questionScreen/'.($br+1)) ?>";
  }
}, 1000);
    if(performance.navigation.type !==0){
       window.location.href="<?php $stranica = site_url($controller.'/redirectPage');  echo $stranica;?>"; 
    } 
</script>
</body>
</html>