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
<p class="quote" ><i>"One ring to rule them all."</i></p>
<p class="quote"><font size:20px color:>Author</font></p>
</div>
<div class="col-4">
<button class="signout" class="col-4" onclick="window.location.href = '<?php echo site_url('Admin/logout') ?>';" style="width:250px;">Sign Out</button>
</div>
</div>
<div class="row">
<div class="col-12">
<div id="demo1" class="centar" >
<div class="row">
				<div class="col" >   
				<form action="/action_page.php">
				<input type="text" id="movie" name="movie" placeholder="Enter username for search.."  style="float: left;width:88%;">
				</form>
				<button type="submit " style="float: left;width:10%;font-size: 15px;"><i class="fa fa-search"></i></button>
				
			</div>
			
		</div> 
<div class="row">
<div class="col">
<div  class="vertical-menu" >
  <table align="center" width="98%">
  <tr style="background-color:#f2f2f2;" >
    <th align="center" style="color:black">Username</th>
    <th align="center" style="color:black">Password</th>
	<th align="center" style="color:black">Name</th>
	<th align="center" style="color:black">Lastname</th>
	<th align="center" style="color:black">Email</th>
	<th align="center" style="color:black">IsModerator</th>
  </tr>
  <tr>
  <td>
  1Dr
  </td>
  <td>
  Sif123
  </td>
  <td>
  Aleksandar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca@gmail.com
  </td>
   <td>
  true
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" disabled>Promote</button>
  </td>
  <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal">Delete</button>
  </td>
  </tr>
    <tr>
  <td>
  2DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal">Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal">Delete</button>
  </td>
  </tr>
   <tr>
  <td>
  3DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
   <td>
  <button class="fill" data-toggle="modal" data-target="#myModal">Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
    <tr>
  <td>
  4DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
      <tr>
  <td>
  5DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
      <tr>
  <td>
  6DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
      <tr>
  <td>
 7DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
      <tr>
  <td>
  8DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill"  data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
      <tr>
  <td>
  9DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>

   <tr>
  <td>
  10DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
      <tr>
  <td>
  11DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill" data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
      <tr>
  <td>
  12DrKingSchultz
  </td>
  <td>
  Sifra123
  </td>
  <td>
  Petar
  </td>
  <td>
  Petrovic
  </td>
  <td>
  peca.petrovic@gmail.com
  </td>
   <td>
  false
  </td>
  <td>
  <button class="fill" data-toggle="modal" data-target="#myModal" >Promote</button>
  </td>
   <td>
  <button class="losefill"  data-toggle="modal" data-target="#myModal" >Delete</button>
  </td>
  </tr>
  </table>
</div>
 </div> 
</div>
</div>
</div>
 </div> 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body" style="color:black" >
          <p style="font-size:30px;">Are you sure?</p>
        </div>
        <div  style="align:center" >
          <button type="button" class="fill " style="font-size:16px;"data-dismiss="modal">Yes</button>
		  
          <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>



</body>
</html>

