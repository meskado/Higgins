<?php
   include 'TestPhp.php';
?>
<html>
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <title>Student Page</title>
       <script type="text/javascript">
          function guy(){
              var t = Number(document.getElementById("sec").innerHTML);
              var m = Number(document.getElementById("min").innerHTML);
              var h = Number(document.getElementById("hr").innerHTML);
              if(h===0&&m===1&&t===1){
                 window.location.href = "index.php";
              }
              t = t - 1;
              if(t===0){
                t=59;
                document.getElementById("sec").innerHTML = t.toString();
                document.f.se.value = t.toString();
                var m = Number(document.getElementById("min").innerHTML);
                m = m-1;
                document.getElementById("min").innerHTML = m.toString();
                document.f.m.value = m.toString();
                if(m===0){
                    m=59;
                    document.getElementById("min").innerHTML = m.toString();
                    document.f.m.value = m.toString();
                    var h = Number(document.getElementById("hr").innerHTML);
                    h = h-1;
                    document.getElementById("hr").innerHTML = h.toString();
                    document.f.h.value = h.toString();
                    
                }
              }
               b = t.toString();
               document.getElementById("sec"). innerHTML = b;
               document.f.se.value = b;
               setTimeout('guy()', 1000); 
          }
          $(document).ready(function(){
             $("#bo").click(function(){
                 var b = ("#sec").text();
                 ("#sec").text() = "klo";
             });
             
          });
       </script>
    </head>
    <body style="background-image: url('pictures/background.png')">
        <div class="container">
            <div class="row" style="background-color: #004085; padding: 10px">
                <div class="col-12" style="font-family: fantasy; color: whitesmoke">
                    <div style="font-size: 30px"><center>Online Course Assessment System</center></div>
                    <div style="font-size: 20px"><center>Introduction To Computer Science (GSS1103)</center></div>
                </div>
            </div>
            <div class="row" style="background-color: #004085;color: #e9ecef; font-size: 20px; font-family: Times New Roman; padding: 10px; margin-top: 20px">
                
                <form name="f" role="form" action="<?php $_PHP_SELF?>" method="GET">
                    <div class="form-group">
                        Question <span id="num"><?php echo $n?></span>
                        <input type="text" name="holder" value="<?php echo $n?>" style="display:none" id="hold"/>
                    </div>
                     <hr style="background-color: whitesmoke; width: 100%"/>
                    <div class="form-group">
                        <span id="question"><?php echo $question?></span>
                    </div>
                    <div class="form-group">
                       <input type="radio" name="answer" value="A"/>
                       A. <span id="a"><?php echo $A?></span>
                    </div>
                    <div class="form-group" >
                       <input type="radio" name="answer" value="B"/>
                       B. <span id="b"><?php echo $B?></span>
                    </div>
                    <div class="form-group">
                       <input type="radio" name="answer" value="C"/>
                       C. <span id="c"><?php echo $C?></span>
                    </div>
                    <div class="form-group">
                       <input type="radio" name="answer" value="D"/>
                       D. <span id="d"><?php echo $D?></span>
                    </div>
                    <div class="form-group">
                       <input type="radio" name="answer" value="E"/>
                       E. <span id="e"><?php echo $E?></span>
                    </div>
                     <div class="form-group" style="margin-top: 200px">
                         <i>Note if click on ok button it means you have saved the answer 
                     </div>
                     <div class="form-group">
                         <input type="submit" class="btn btn-primary btn-sm active" value="previous"  name="previous" id="bo"/>
                         <input type="submit" class="btn btn-primary btn-sm active" value="ok" name="ok" />
                         <input type="submit" class="btn btn-primary btn-sm active" value="Next" id="nex" name="next" />
                         <input type="text" name="h"  value="<?php echo $hour?>" style="display: none"/>
                         <input type="text" name="m"  value="<?php echo $minutes?>" style="display: none"/>
                         <input type="text" name="se" value="<?php echo $seconds?>" style="display: none"/>
                     </div>
                </form>
                <div style="float: right; font-style: normal; font-size: 40px" id="time"><span id="hr"><?php echo $hour?></span>:<span id="min"><?php echo $minutes?></span>:<span id="sec"><?php echo $seconds?></span></div>
                <script type="text/javascript"> guy();</script>
                <?php
                   
                ?>
            </div>
        </div>
        
    </body>
</html>
