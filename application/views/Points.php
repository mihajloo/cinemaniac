<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
<style>
.col-4{
    margin-top: 25px;
    font-size: 30px;
    text-align: center;

    -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadeinout 10s;
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

	 <div class = "row" style="margin-top:150px">
		<div class="col-2"></div>
		<div class="col-4" >player1</div>
		<div class="col-4">13 points</div>
	 </div>
	<div class = "row">
		<div class="col-2"></div>
		<div class="col-4">player1</div>
		<div class="col-4">13 points</div>
	 </div>
	 <div class = "row">
		<div class="col-2"></div>
		<div class="col-4 ">player1</div>
		<div class="col-4">13 points</div>
	 </div>
	  <div class = "row">
		<div class="col-2"></div>
		<div class="col-4">player1</div>
		<div class="col-4">13 points</div>
	 </div>
	 

</div>	
</div>	
</div>	
<script>
var timeleft = 9;
var downloadTimer = setInterval(function(){
timeleft -= 1;
  if(timeleft <= 0){
    window.location.href = 'game.html';
  }
}, 1000);
</script>
</body>
</html>