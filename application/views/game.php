<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
 background-color:black;
}

.bg {
  /* The image used */
  background-image: url("<?php echo base_url(); ?>media/images/cinema.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: 100% 100%;
 
}

.video-size {
    position: absolute;
	width:75%;
	height:auto;
	margin-top:6%;
	margin-left:12%;
	
}



</style>
</head>
<body>

<div class="bg">

<video   class="video-size" onended="window.location = 'Question.html';"   autoplay  >
  <source src="<?php echo base_url(); ?>media/videos/Avengers vs Thanos.mp4" type="video/mp4">
  <source src="<?php echo base_url(); ?>media/videos/Avengers vs Thanos.ogg" type="video/ogg">
 </video>


 </div>





</body>
</html>