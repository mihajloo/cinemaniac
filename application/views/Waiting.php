<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <style>
              .play{
            font-size: 30px;
            margin-top: 25%;
            transform: translateY(-50%);
            } 
    </style>

    </head>
    
    <body>
<div class = "container" >
<div class = "row" >
<div class = "col">
    <div class="play">
      <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
     <div id='txtHint'>Finding players ...</div>   
</div></div></div> </div>       
     <script>  
setInterval(function f() {
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
 var rez=xmlhttp.responseText;
 document.getElementById("txtHint").innerHTML="Players found: "+rez+"/4";
 if(rez == 4){
     window.location.href="<?php $stranica = site_url($controller.'/chooseQuestions');  echo $stranica;?>";
 }
 }
}
xmlhttp.open("GET","<?php $stranica = site_url($controller.'/dohvatiPartiju');  echo $stranica;?>",true);
xmlhttp.send();
},200);
    </script>
    </body>
</html>    