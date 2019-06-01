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
       .draw{
        background-color: #FFDF00;
        }
        </style>
    </head>


    <body>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <p class="quote" ><i>Because they're exclusive. And fun, and they lead to a better life.</i></p>
                </div>
                <div class="col-4">
                    <button class="signout" class="col-4" onclick="window.location.href = '<?php echo site_url('VipC/signout') ?>';" style="width:250px;">Sign Out</button>
                </div>
            </div>
            <div class="row" style="margin-top:75px;">
                <div  class="col-4 ">

                    <button class=" fill" onclick="window.location.href = '<?php echo site_url('VipC/play') ?>';">Play</button>


                    <button class=" fill"onclick="window.location.href = '<?php echo site_url('VipC/statistics') ?>';">Statistics</button>


                    <button class=" fill" onclick="window.location.href = '<?php echo site_url('VipC/matchHistory') ?>';">Match History</button>


                    <button class=" fill"onclick="window.location.href = '<?php echo site_url('VipC/leaderboard') ?>';">Leaderboard</button>


                    <button class=" fill" onclick ="window.location.href = '<?php echo site_url('VipC/showInserts') ?>';">Submit Question</button>
                </div>


                <div  class="col-8" >
                    <div id="demo0"  <?php if ($str == 1) echo "style='display:block'";
                        else echo "style='display:none'"; ?>>
                        <img src="<?php echo base_url(); ?>media/images/logo2.png" style="max-width:100%;">
                    </div>
                    <div id="demo1" class="centar"  valign="top" <?php if ($str == 2) echo "style='display:block'";
else echo "style='display:none'"; ?>>
                        <p><font color=#FFDF00 size=20px>Wins: <?php echo $brPobeda ?> <br> <br> Losses: <?php echo $brPoraza ?> <br><br>  Win Ratio: <?php echo number_format((float)$procenat, 2, '.', ''); ?>% <br><br> Average: <?php echo number_format((float)$avg, 2, '.', ''); ?>p per Game</font></p>
                    </div>
                    <div id="demo2" class="centar" <?php if ($str == 3) echo "style='display:block'";
else echo "style='display:none'"; ?>>
                        <div  class="vertical-menu">
                            <?php
                            foreach ($partije as $partija) {
                                $str = "";
                                $str .= "<div class='row'>";
                                $str .= "<div class='col-4'>";

                                $str .= "<p class=" . $partija->Ishod . ">";
                                $str.= strtoupper($partija->Ishod);
                                $str .= "</p></div>";
                                $str .= "<div class= 'col-4'>";
                                $str .= "<p class=" . $partija->Ishod . ">";
                                $str .= "Points: " . $partija->BrojPoena . "p</p></div>";
                                $str .= "<div class= 'col-4'>";
                                $str .= "<p class=" . $partija->Ishod . ">";
                                $str .= "Date: " . $partija->Datum . "</p></div></div>";
                                echo $str;
                            }
                            ?>
                        </div>

                    </div>

                    <div id="demo3" class="centar" <?php if ($str == 4) echo "style='display:block'";
                            else echo "style='display:none'"; ?>>
                        <div class="leader">
                            <?php
                            $i = 1;
                            foreach ($igraci as $igrac) {
                                $str = "";
                                $str .= "<div class='red'><div class='spot'>";
                                $str .= $i . "</div><div class='name'>";
                                $str .= $igrac->Username . "</div><div class='score'>" . $igrac->Poeni . "</div></div>";
                                echo $str;
                                $i++;
                            }
                            ?>

                        </div>	
                    </div>


                    <div id="demo4" class="centar"  <?php if ($str == 6) echo "style='display:block'";
                            else echo "style='display:none'"; ?>  style="display:none" >
                        <div class="row">
                            <div class="col">   
                                <input type="text" id="srchFilm" onkeyup="search()" onkeydown="search()" placeholder="Enter movie for search.." style="float: left;width:85%;">
                            </div> 

                        </div>  

                        <div class="row">
                            <div class="col-12">
                                <div  class="vertical-menu"  >
                                    <table id="myTable" align="center" width=100% cellspacing="10" cellpadding="10">
                                        <tr style="background-color:#f2f2f2;" >
                                            <th style="color:#000" >Movie Name</th>
                                            <th style="color:#000" >Insert Name</th>


                                        </tr>
                                        <?php
                                        foreach ($dohvatiScene as $ins) {

                                            $str = "";

                                            $onClickDeo = "window.location.href ='" . site_url('VipC/showQuestion/' . $ins->IdScena) . "'";
                                            $str .= "<tr onclick =\"" . $onClickDeo . ";\" style='cursor: pointer;'>";



                                            $str .= "<td>";
                                            $str .= $ins->Film;
                                            $str .= "</td>";

                                            $str .= "<td>";
                                            $str .= $ins->Naziv;
                                            $str .= "</td>";
                                            $str .= "</tr>";

                                            echo $str;
                                        }
                                        ?>

                                    </table>
                                </div>
                            </div></div>
                    </div>  

                    <div id="demo5" class="centar" <?php if ($str == 5) echo "style='display:block'";
                                        else echo "style='display:none'"; ?>  >
                        <div align="right"><button class="signout" onclick="window.location.href = '<?php
                            echo site_url('VipC/back');
                         ?>';"><i class="fas fa-arrow-left" ></i></button></div>
                        <?php
                        if ($str == 5)
                            $videoStr = "<video autoplay controls >";
                        $videoStr .= "<source src='" . base_url() . "media/videos/" . $scena->Naziv . ".mp4' type='video/mp4'>";
                        $videoStr .= "<source src='" . base_url() . "media/videos/" . $scena->Naziv . ".ogg' type='video/ogg'>";
                        $videoStr .= "</video><br>";
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
                                    <input type="text" name="Question" placeholder="Enter your question"  ><br>

                                </div>	
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <font  color=#FFDF00 >C.A:</font> 
                                </div>	
                                <div class="col-11">	
                                    <input type="text" id='CA' name="CA" placeholder="Enter your correct answer"  ><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <font  color=#FFDF00 >W.A:</font> 
                                </div>	
                                <div class="col-11">	
                                    <input type="text" name="WA1" placeholder="Enter your wrong answer"><br>

                                </div>

                            </div>
                            <div class="row">	
                                <div class="col-1">
                                    <font  color=#FFDF00 >W.A:</font> 
                                </div>	
                                <div class="col-11">	
                                    <input type="text" name="WA2" placeholder="Enter your wrong answer"  ><br>

                                </div>
                            </div>
                            <div class="row">	
                                <div class="col-1">
                                    <font  color=#FFDF00 >W.A:</font> 
                                </div>	
                                <div class="col-11">	
                                    <input type="text" name="WA3" placeholder="Enter your wrong answer" ><br>
                                    <input type="hidden" name="idScena" maxlength="45" value="<?php echo $scena->IdScena ?>">
                                </div>
                            </div>

                        </form>
                        <button class="fill" data-toggle="modal"<?php if ($str != 5) echo "style='display:none'"?> data-target="#acceptModal" >Submit Question</button>

                    </div>	


                    
                </div>
            </div>



            <!-- Modal Accept-->
            <div class="modal fade" id="acceptModal" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-body" style="color:black" >
                            <p style="font-size:30px;">Are you sure?</p>
                        </div>
                        <div  style="align:center" >
                            <form action="<?php echo site_url('VipC/insertQuestion') ?>" method="post" name='formInsertQuestion'>
                                <input type="hidden" name="q" value="">
                                <input type="hidden" name="cor" value="">
                                <input type="hidden" name="wra1" value="">
                                <input type="hidden" name="wra2" value="">
                                <input type="hidden" name="wra3" value="">
                                <input type="hidden" name="idS" value="">
                                <button type="submit" class="fill " style="font-size:16px;">Yes</button>
                            </form>  
                            <button type="button" class="losefill" style="font-size:16px;" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#acceptModal').on('show.bs.modal', function (e) {
                var question = document.submitQuestion.Question.value;
                var ca = document.submitQuestion.CA.value;
                var wa1 = document.submitQuestion.WA1.value;
                var wa2 = document.submitQuestion.WA2.value;
                var wa3 = document.submitQuestion.WA3.value;
                var idS = document.submitQuestion.idScena.value;
                $(e.currentTarget).find('input[name="q"]').val(question);
                $(e.currentTarget).find('input[name="cor"]').val(ca);
                $(e.currentTarget).find('input[name="wra1"]').val(wa1);
                $(e.currentTarget).find('input[name="wra2"]').val(wa2);
                $(e.currentTarget).find('input[name="wra3"]').val(wa3);
                $(e.currentTarget).find('input[name="idS"]').val(idS);
            });

            function search() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("srchFilm");
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

