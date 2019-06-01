<html>
    <head> <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
        <style>
        video{
        position: fixed;
	top: 50%;
	left: 50%;
	min-width: 100%;
	min-height: 100%;
	width: auto;
	height: auto;
	z-index: -100;
	transform: translateX(-50%) translateY(-50%);
        }
       body{
          overflow-y: hidden;
        }
    
        </style>
    </head>
    <body>
        <video autoplay onended="window.location.href = '<?php echo site_url($controller.'/go') ?>';">
             <source src="<?php echo base_url(); ?>media/videos/countdown.mp4" type="video/mp4" >
             <source src="<?php echo base_url(); ?>media/videos/countdown.ogg" type="video/ogg">
        </video>
        
    </body>
</html>