<?php
  session_start();
  if (!(isset($_SESSION['susername']) && isset($_SESSION['spassword']))) {
    header("location:index.php");
  }
  $con = mysqli_connect("localhost:3306", "root", "", "higgins");
  if(!$con){
    die("couldnt connect");
  }
  $query = mysqli_query($con,"SELECT * FROM `testtable`");
  if(!$query){
      die("couldnt query");
  }
  function listcode(){
     $con = mysqli_connect("localhost:3306", "root", "", "higgins");
     if(!$con){
        die("couldnt connect");
     }  
     $query = mysqli_query($con,"SELECT * FROM `testtable`");
     if(!$query){
         die("couldnt query");
     }
     while($row = mysqli_fetch_array($query)){
         echo '<option value="'.$row['SN'].'">'.$row['SN'].'</option>'; 
     }
  }
  if(isset($_GET["write"])){
      $code = $_GET["code"]; 
      if($code==""){
          echo '<script type="text/javascript"> alert("Please enter code")</script>';
      }
      else{
           $_SESSION["code"] = $code;
           $query1 = mysqli_query($con, "SELECT * FROM `testtable` WHERE `SN` = '$code'");
           $row1 = mysqli_fetch_array($query1);
           $date = $row1["Date"];
           $time = $row1["Time"];
           $dur = $row1["Duration"];
           $_SESSION["duration"] = $dur;
           $query2 = mysqli_query($con,"SELECT date(now()),time(now()),time('$time') + interval 10 minute");
           $row2 = mysqli_fetch_array($query2);
           $datet = $row2["date(now())"];
           $timet = $row2["time(now())"];
           $dif = $row2["time('$time') + interval 10 minute"];
           if($date==$datet && ($timet >=$time && $timet <= $dif)){
              header("location: TestPage.php");  
           }
           else{
              echo '<script type="text/javascript"> alert("Is not yet time for the test or the time for the test has elapsed")</script>'; 
           }
      }
     
  }
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
    </head>
    <body style="background-image: url('pictures/background.png')">
       <div class="container" >
            
            <div class="row" style="background-color: #004085; padding: 10px">
                <div class="col-12" style="font-family: fantasy; color: whitesmoke">
                    <div style="font-size: 30px"><center>Online Course Assessment System</center></div>
                    <div style="font-size: 20px"><center>Introduction To Computer Science (GSS1103)</center></div>
                </div>
            </div>
           <div class="row" style="background-color: #004085;color: #e9ecef; font-size: 20px; font-family: Times New Roman; padding: 10px; margin-top: 20px">
               
               <form role="form" action="<?php $_PHP_SELF?>" method="GET">
                   <div class="form-group">Enter Assessment code and click on write test to start your test</div>
                   <div class="form-group">
                       <select class="form-control" name="code">
                           <option value="">Select Assessment Code</option>
                           <?php listcode()?>
                       </select>
                   </div>
                   <div class="form-group">
                       <input type="submit" class="btn btn-primary btn-sm active" value="Write Test" name="write" />
                   </div>
               </form>
           </div>
           <div class="row" style="width:100%; margin-top:10px;color: #e9ecef; font-size: 20px; font-family: Times New Roman;  background-image: url('pictures/4k-wallpaper-architecture-background-1308624.jpg')" id="home">
               <div><center>List of Assessments to take</center></div>
               <?php
                  while($row = mysqli_fetch_array($query)){
                      echo '<div class="row" style="width:100%; margin: 10px">'
                           .'<table class="table table-bordered table-striped table-hover " style="margin: 10px;color: #e9ecef;">'
                           .'<tr><td> Code: </td><td>'.$row["SN"].'</td></tr>'
                           .'<tr><td>Name: </td><td>'.$row["TestName"].'</td></tr>'
                           .'<tr><td>Description: </td><td>'.$row["TestDes"].'</td></tr>'
                           .'<tr><td>Date for the test: </td><td>'.$row["Date"].'</td></tr>'
                           .'<tr><td>Time: </td><td>'.$row["Time"].'</td></tr>'
                           .'<tr><td>Duration: </td><td>'.$row["Duration"].' minutes</td></tr>'
                           . '</table></div>';
                           
                  }
               ?>
           </div>
       </div>
    </body>
</html>
