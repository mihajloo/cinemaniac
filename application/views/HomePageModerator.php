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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">
  
</head>


<body>

<div class="container">
     <!-- Modal Accept -->
   <div class="modal fade" id="acceptModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
            <form action="<?php echo site_url('ModeratorC/editQuestion/'.$accept) ?>" method="post" name='formEditQuestion'>
            <input type="hidden" name="q" value="">
            <input type="hidden" name="cor" value="">
            <input type="hidden" name="wra1" value="">
            <input type="hidden" name="wra2" value="">
            <input type="hidden" name="wra3" value="">
            <input type="hidden" name="wra1id" value="">
            <input type="hidden" name="wra2id" value="">
            <input type="hidden" name="wra3id" value="">
            <input type="hidden" name="idQ" value="">
            <button type="submit" class="fill " style="font-size:16px;">Yes</button>
            </form>  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div>
         <!-- Modal Delete -->
   <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
            <form action="<?php echo site_url('ModeratorC/deleteQuestion') ?>" method="post" name='formDeleteQuestion'>
 
            <input type="hidden" name="idQ" value="">
            <button type="submit" class="fill " style="font-size:16px;">Yes</button>
            </form>  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div> 
 <script>
$('#acceptModal').on('show.bs.modal', function(e) {
    var question = document.submitQuestion.Question.value;
    var ca =  document.submitQuestion.CA.value;
    var wa1 = document.submitQuestion.WA1.value;
    var wa2 = document.submitQuestion.WA2.value;
    var wa3 = document.submitQuestion.WA3.value;
    var wa1id = document.submitQuestion.WA1id.value;
    var wa2id = document.submitQuestion.WA2id.value;
    var wa3id = document.submitQuestion.WA3id.value;
    var idQ = document.submitQuestion.idq.value;
    $(e.currentTarget).find('input[name="q"]').val(question);
    $(e.currentTarget).find('input[name="cor"]').val(ca);
    $(e.currentTarget).find('input[name="wra1"]').val(wa1);
    $(e.currentTarget).find('input[name="wra2"]').val(wa2);
    $(e.currentTarget).find('input[name="wra3"]').val(wa3);
    $(e.currentTarget).find('input[name="wra1id"]').val(wa1id);
    $(e.currentTarget).find('input[name="wra2id"]').val(wa2id);
    $(e.currentTarget).find('input[name="wra3id"]').val(wa3id);
    $(e.currentTarget).find('input[name="idQ"]').val(idQ);
});

$('#deleteModal').on('show.bs.modal', function(e) {

    var idQ = document.submitQuestion.idq.value;
    $(e.currentTarget).find('input[name="idQ"]').val(idQ);
});
</script>      
<div class="row">
<div class="col-8">
<p class="quote" ><i>"Reality can be whatever I want."</i></p>
<p class="quote"><font size:20px color:>Author</font></p>

</div>
<div class="col-4">
<button class="signout" class="col-4" onclick="window.location.href = '<?php echo site_url('ModeratorC/signout') ?>';" style="width:250px;">Sign Out</button>
</div>
</div>
<div class="row"  style="margin-top:75px;" style="height:80%">
	<div  class="col-4 " >
	<button class=" fill"onclick="window.location.href = '<?php echo site_url('ModeratorC/questionRequests') ?>';">Question Requests</button>
	<button class=" fill" onclick="window.location.href = '<?php echo site_url('ModeratorC/questionBase') ?>';">Question Base</button>
	</div>
<div  class="col-8 ">	
   <div id="demo0"  <?php if($str == 1) echo "style='display:block'"; else echo "style='display:none'";?>>
		<img src="<?php echo base_url(); ?>media/images/logo2.png" style="max-width:100%;">
</div>
<div id="demo1" class="centar"  align="top" <?php if($str == 2) echo "style='display:block'"; else echo "style='display:none'";?> >
				<div  class="vertical-menu" >
					<table align="center" width=100% cellspacing="10" cellpadding="10">
						<tr style="background-color:#f2f2f2;" >
							<th style="color:#000" >Question</th>
							<th style="color:#000" >Insert Name</th>
							<th style="color:#000" >Movie Name</th>
							
						</tr>   
                                                <?php
                                                //$korisnik = $this->session->userdata('pitanje');
                                               // $dohvatiNeodobrena = $this->Pitanje->dohvatiNeodobrena();
                                                foreach ($dohvatiNeodobrena as $pitanje){
                                                    
                                                $str = "";
                                               
                                                $onClickDeo = "window.location.href ='".site_url('ModeratorC/showQuestion/1/'.$pitanje->IdPitanje)."'";
                                                $str .= "<tr onclick =\"".$onClickDeo.";\" style='cursor: pointer;'>";

                                              

                                                $str .= "<td>";
                                                $str .= $pitanje->Tekst;
                                                $str .= "</td>";

                                                $str .= "<td>";
                                                $str .= $pitanje->NazivScena;
                                                $str .= "</td>";


                                                $str .= "<td>";
                                                $str .= $pitanje->NazivFilm;
                                                $str .= "</td>";

                                              

                                                $str .= "</tr>";

                                                echo $str;
                                                }
                                                ?>
					</table>	
				</div>
</div>
<div id="demo3" class="centar" <?php if($str == 3) echo "style='display:block'"; else echo "style='display:none'";?>  >
                                <div align="right"><button class="signout" onclick="window.location.href = '<?php if(isset($accept)) {echo site_url('ModeratorC/back/'.$accept);} ?>';"><i class="fas fa-arrow-left" ></i></button></div>
<?php if($str == 3)						
	$videoStr="<video autoplay controls >";
        $videoStr.="<source src='". base_url()."media/videos/".$scena.".mp4' type='video/mp4'>";
	$videoStr.="<source src='".base_url()."media/videos/".$scena.".ogg' type='video/ogg'>"; 
	$videoStr.="</video><br>";
        echo $videoStr;
?>	
	
	<div class='row'>
         <div class='col'><?php echo form_error("q","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
         </div>
         <div class='row'>
         <div class='col'><?php echo form_error("cor","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
         </div>
        <div class='row'>
         <div class='col'><?php echo form_error("wra1","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
         </div>
         <div class='row'>
         <div class='col'><?php echo form_error("wra2","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
         </div>
         <div class='row'>
         <div class='col'><?php echo form_error("wra3","<font color='red' style='font-size:20px;'>","</font>"); ?></div>
         </div>                       
	<form name='submitQuestion'>
	
	<div class="row">
	<div class="col-1">
		
                <font  color=#FFDF00 >Q:</font> 
	</div>	
	<div class="col-11">
            <input type="text" name="Question" placeholder="Enter your question" maxlength="45" value="<?php if(isset($question)) echo $question ?>"><br>
            
        </div>	
	</div>
	<div class="row">
	<div class="col-1">
		<font  color=#FFDF00 >C.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" id='CA' name="CA" placeholder="Enter your correct answer" maxlength="45" value="<?php if(isset($corAns)) echo $corAns ?>"><br>
	</div>
	</div>
	<div class="row">
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA1" placeholder="Enter your wrong answer" maxlength="45" value="<?php  if(isset($wrAns[0])) echo $wrAns[0]->Tekst ?>"><br>
                <input type="hidden" name="WA1id" placeholder="Enter your wrong answer" maxlength="45" value="<?php  if(isset($wrAns[0])) echo $wrAns[0]->IdOdgovor ?>">
        </div>

	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
	</div>	
	<div class="col-11">	
		<input type="text" name="WA2" placeholder="Enter your wrong answer" maxlength="45" value="<?php if(isset($wrAns[1])) echo $wrAns[1]->Tekst ?>"><br>
                <input type="hidden" name="WA2id" placeholder="Enter your wrong answer" maxlength="45" value="<?php  if(isset($wrAns[1])) echo $wrAns[1]->IdOdgovor ?>">
        </div>
	</div>
	<div class="row">	
		<div class="col-1">
		<font  color=#FFDF00 >W.A:</font> 
		</div>	
	<div class="col-11">	
		<input type="text" name="WA3" placeholder="Enter your wrong answer" maxlength="45" value="<?php if(isset($wrAns[2])) echo $wrAns[2]->Tekst ?>"><br>
                <input type="hidden" name="WA3id" placeholder="Enter your wrong answer" maxlength="45" value="<?php  if(isset($wrAns[2])) echo $wrAns[2]->IdOdgovor ?>">
        </div>
	</div>
            <input type="hidden" name="idq" placeholder="Enter your wrong answer" maxlength="45" value="<?php if(isset($idQ)) echo $idQ; ?>">
	</form>
                <button <?php if(isset($accept)){if($accept==1) echo "class='fill'"; else echo "class='submit'";}?> data-toggle="modal" data-target="#acceptModal" ><?php if(isset($accept)){if($accept==1) echo 'Accept'; else echo 'Edit';}?></button>
                <button <?php if(isset($accept)){if($accept==1) echo "class='losefill'"; else echo "class='submit'";}?>  data-toggle="modal" data-target="#deleteModal" ><?php if(isset($accept)){if($accept==1) echo 'Reject'; else echo 'Delete';}?></button>
	</div>	
			
		
			
<div id="demo2" class="centar"  <?php if($str == 4) echo "style='display:block'"; else echo "style='display:none'";?>>
<div class="row">
<div class="col">   
	
    <input type="text" id="srchFilm" onkeyup="search()" onkeydown="search()" placeholder="Enter movie for search.." style="float: left;width:87%;">
	

  <!--<button type="submit" style="float: left;font-size: 15px;" ><i class="fa fa-search"></i></button>-->
 <script>
function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("srchFilm");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
 </div> 

</div>  

				<div  class="vertical-menu" >
					<table align="center" width=96% cellspacing="10" cellpadding="10" id='myTable'>
						<tr style="background-color:#f2f2f2;" >
							<th align="center" style="color:#000">Question</th>
							<th align="center" style="color:#000">Insert Name</th>
							<th align="center" style="color:#000">Movie Name</th>
							<th align="center" style="color:#000">Like/Dislike</th>
						</tr>
						<?php
                                                //$korisnik = $this->session->userdata('pitanje');
                                               // $dohvatiNeodobrena = $this->Pitanje->dohvatiNeodobrena();
                                                foreach ($dohvatiOdobrena as $pitanje){
                                                    
                                                $str = "";
                                               
                                                $onClickDeo = "window.location.href ='".site_url('ModeratorC/showQuestion/2/'.$pitanje->IdPitanje)."'";
                                                $str .= "<tr onclick =\"".$onClickDeo.";\" style='cursor: pointer;'>";

                                              

                                                $str .= "<td>";
                                                $str .= $pitanje->Tekst;
                                                $str .= "</td>";

                                                $str .= "<td>";
                                                $str .= $pitanje->NazivScena;
                                                $str .= "</td>";


                                                $str .= "<td>";
                                                $str .= $pitanje->NazivFilm;
                                                $str .= "</td>";
                                                
                                                $str .= "<td>";
                                                $str .= $pitanje->Likes.'/'.$pitanje->Dislikes;
                                                $str .= "</td>";
                                              

                                                $str .= "</tr>";

                                                echo $str;
                                                }
                                                ?>
					</table>
				</div>	
</div>	


</div>
</div>

</div>


</body>
</html>

