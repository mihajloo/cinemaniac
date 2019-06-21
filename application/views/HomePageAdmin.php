<!DOCTYPE html>
<html >
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="noindex, noarchive">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>mystyle.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user.css">

</head>


<body>
<div class="container">

<div class="row">
<div class="col-8">
<p class="quote" >One ring to rule them all.</p>

</div>
<div class="col-4">
<button class="signout" class="col-4" onclick="window.location.href = '<?php echo site_url('AdminC/signout') ?>';" style="width:250px;">Sign Out</button>
</div>
</div>
<div class="row">
<div class="col-12">
<div id="demo1" class="centar" >
<div class="row">
				<div class="col" >   
				<form action="<?php echo site_url('AdminC/searchUser') ?>">
                                    <input type="text" id="srchUser" name="srchUser" onkeyup="search()" onkeydown="search()" placeholder="Enter username for search.."  style="float: left;width:88%;">
				
				<!--<button type="submit " style="float: left;width:10%;font-size: 15px;" ><i class="fa fa-search"></i></button>-->
				</form>
			</div>
			
		</div> 
<div class="row">
<div class="col">
<div  class="vertical-menu" >
  <table align="center" width="98%" id="myTable">
  <tr style="background-color:#f2f2f2;" >
    <th align="center" style="color:black">Username</th>
    <th align="center" style="color:black">Password</th>
	<th align="center" style="color:black">Email</th>
	<th align="center" style="color:black">Moderator</th>
        <th align="center" style="color:black">VIP</th>
 
  </tr>
  
  <?php
    
        foreach($users as $kor){
	$flagm="#modalPromote";
        $flagv="#modalUpgrade";
        $classMod = "fill";
        $classVip = "fill";
        $buttonMod = "Promote";
        $buttonVip = "Upgrade";
        $str="";
        $str.= "<tr>";
        $str.= "<td>";
        $str.= $kor->Username;  
        $str.= "</td>";
        
        $str.= "<td>";
        $str.= $kor->Password;  
        $str.= "</td>";
        
        $str.= "<td>";
        $str.= $kor->Email;  
        $str.= "</td>";
            
        if($kor->isModerator == true){
        $str.= "<td>true</td>";
		$flagm="#modalDemote";
                $buttonMod = "Demote";
                $classMod ="losefill";        
        }
        else    { $str.= "<td>false</td>"; }
        if($kor->isVip == true){
        $str.= "<td>true</td>";
		$flagv="#modalDowngrade";
                $buttonVip = "Downgrade";
                $classVip="losefill";
        }
        else    { $str.= "<td>false</td>";}

        
         $str.= '<td><button class="'.$classMod.'"  data-toggle="modal" data-target="'.$flagm.'" data-userid="'.$kor->Username.'"enabled>'.$buttonMod.'</button> </td>'; /*poziv funkcije adminc->insertModerator*/
      
       
         $str.= '<td><button class="'.$classVip.'"  data-toggle="modal" data-target="'.$flagv.'" data-userid="'.$kor->Username.'"enabled>'.$buttonVip.'</button> </td>'; /*poziv funkcije adminc->insertVip*/
         $str.= '<td><button class="fill" data-toggle="modal" data-target="#modalDelete" data-userid="'.$kor->Username.'"enabled>Delete</button> </td></tr>'; /*poziv funkcije adminc->deleteKorisnik*, $kor->username*/
		 echo $str;
       }
       
?>
  
  </table>
</div>
 </div> 
</div>
</div>
</div>
 </div> 
  <!-- Modal Delete -->
  <div class="modal fade" id="modalDelete" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
            <form action="<?php echo site_url('AdminC/deleteUser') ?>" method="post" name='formDelete'>
            <input type="hidden" name="user_id" value="">
            <button type="submit" class="fill" style="font-size:16px;">Yes</button>
            </form>  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div>
  
    <!-- Modal Promote -->
  <div class="modal fade" id="modalPromote" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
            <form action="<?php echo site_url('AdminC/insertModerator') ?>" method="post" name='formModeratorInsert'>
            <input type="hidden" name="user_id" value="">
            <button type="submit" class="fill " style="font-size:16px;">Yes</button>
            </form>  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div>
    
  <!-- Modal Demote -->
    <div class="modal fade" id="modalDemote" role="dialog">
    <div class="modal-dialog">
    
 
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
            <form action="<?php echo site_url('AdminC/deleteModerator') ?>" method="post" name='formModeratorDelete'>
            <input type="hidden" name="user_id" value="">
            <button type="submit" class="fill " style="font-size:16px;">Yes</button>
            </form>  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div>
  
      <!-- Modal Demote -->
    <div class="modal fade" id="modalUpgrade" role="dialog">
    <div class="modal-dialog">
    
 
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
            <form action="<?php echo site_url('AdminC/insertVIP') ?>" method="post" name='formVIPInsert'>
            <input type="hidden" name="user_id" value="">
            <button type="submit" class="fill " style="font-size:16px;">Yes</button>
            </form>  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div>
      
      <!-- Modal Demote -->
    <div class="modal fade" id="modalDowngrade" role="dialog">
    <div class="modal-dialog">
    
 
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
            <form action="<?php echo site_url('AdminC/deleteVIP') ?>" method="post" name='formVIPDelete'>
            <input type="hidden" name="user_id" value="">
            <button type="submit" class="fill " style="font-size:16px;">Yes</button>
            </form>  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div>  
  </div>
  


<script>
$('#modalDelete').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('userid');
    $(e.currentTarget).find('input[name="user_id"]').val(userid);
});  

$('#modalPromote').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('userid');
    $(e.currentTarget).find('input[name="user_id"]').val(userid);
}); 

$('#modalDemote').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('userid');
    $(e.currentTarget).find('input[name="user_id"]').val(userid);
}); 

$('#modalUpgrade').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('userid');
    $(e.currentTarget).find('input[name="user_id"]').val(userid);
}); 

$('#modalDowngrade').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('userid');
    $(e.currentTarget).find('input[name="user_id"]').val(userid);
}); 

function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("srchUser");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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

</body>
</html>

