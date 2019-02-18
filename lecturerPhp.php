<?php
session_start();
if(isset($_POST["login"])){
    $user = $_POST["user"];
    $password = $_POST["password"];
    if($user == "" || $password == ""){
       echo '<script type="text/javascript"> alert("Please fill all the spaces")</script>'; 
    }
    else{
       $con = mysqli_connect("localhost:3306", "root", "", "higgins");
       if(!$con){
           die("couldnt connect");
       }
       $query = mysqli_query($con,"SELECT `Username`, `Password` FROM `lecturer`");
       if(!$query){
           die("couldnt query");
       }
       while($row = mysqli_fetch_array($query)){
         if($user == $row["Username"] && $password ==$row["Password"]){
            $_SESSION['lusername']= $user;
            $_SESSION['lpassword']=$password;
            header("Location: lecturerpage.php");
        }  
       }
        echo '<script type="text/javascript"> alert("Wrong Username or Password")</script>'; 
    }
}
function savequestion(){
    if(isset($_GET["save"])){
        $code = $_GET["code"];
        $question = $_GET["question"];
        $a = $_GET["optiona"];
        $b = $_GET["optionb"];
        $c = $_GET["optionc"];
        $d = $_GET["optiond"];
        $e = $_GET["optione"];
        $answer = $_GET["answer"];
        if(($question == "" || $a == "" || $b == "" || $c == "")||($d == "" || $e == "" || $answer == "" || $code == "")){
           echo '<script type="text/javascript"> alert("Please fill all spaces")</script>';  
        }
        else{
           $con = mysqli_connect("localhost:3306", "root", "", "higgins");
           if(!$con){
             die("couldnt connect");
           }
           $codequery = mysqli_query($con, "SELECT `status` FROM `testtable` WHERE `SN`='$code'");
           if(!$codequery){ die("couldnt codequerry");}
           $coderow = mysqli_fetch_array($codequery);
           if($coderow["status"] =="yes"){
              echo '<script type="text/javascript"> alert("Your question cant be saved because you have saved all question for this test")</script>'; 
           }
           else{
           $questiontable = $code."question";
           $query = mysqli_query($con,"INSERT INTO `$questiontable`(`Question`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `OptionE`, `Answer`) VALUES ('$question','$a','$b','$c','$d','$e','$answer')");
           if(!$query){
               die("couldnt query");
           }
           $query1 = mysqli_query($con,"SELECT `SN` FROM `$questiontable` WHERE `Question` = '$question'");
           if(!$query1){
               die("couldnt query1");
           }
           $row = mysqli_fetch_array($query1);
           $n = $row["SN"];
           $quest = $code."answer";
           $query2 = mysqli_query($con,"ALTER TABLE `$quest` ADD `$n`  VARCHAR(3) NOT NULL;");
           if(!$query2){
               die("couldnt query2");
           }
           echo '<script type="text/javascript"> alert("You have saved the question")</script>';  
        }
      }
    }
    if(isset($_GET["done"])){
        $codei = $_GET["code"];
        $con = mysqli_connect("localhost:3306", "root", "", "higgins");
        if(!$con){
          die("couldnt connect");
        }
        $query = mysqli_query($con,"UPDATE `testtable` SET `status`='yes' WHERE `SN` = '$codei'");
        if(!$query){
            die("couldnt query");
        }
         echo '<script type="text/javascript"> alert("You have saved all question for the assesment")</script>';  
    }
}
function dat(){
  if(isset($_GET["timesave"])){
    
    $name = $_GET["testname"];
    $des = $_GET["testdes"];
    $dat = $_GET["dat"];
    $tim = $_GET["tim"];
    $duration = $_GET["duration"];
    if($dat == "" || $tim == "" || $duration == "" || $name == "" ){
        echo '<script type="text/javascript"> alert("Please fill all spaces")</script>';
    }
    else{
       $con = mysqli_connect("localhost:3306", "root", "", "higgins");
       if(!$con){
         die("couldnt connect");
       }
       $queryt = mysqli_query($con,"SELECT `TestName` FROM `testtable` WHERE `TestName` = '$name'");
       if(!$queryt){
           die("couldnt query");
       }
       $rowt = mysqli_fetch_array($queryt);
       if($rowt["TestName"] != ""){
           echo '<script type="text/javascript"> alert("The name have been saved for another assessment use another name")</script>';
       }
       else{
       $query = mysqli_query($con,"INSERT INTO `testtable`(`TestName`, `TestDes`, `Date`, `Time`, `Duration`) VALUES ('$name','$des','$dat','$tim','$duration')");
       if(!$query){
           die("couldnt query");
       }
       $query1 = mysqli_query($con,"SELECT `SN` FROM `TestTable` WHERE `TestName` = '$name'");
       if(!$query1){
           die("couldnt query1");
       }
       $row = mysqli_fetch_array($query1);
       $questiontable = $row["SN"]."Question";
       $sql = "CREATE TABLE `higgins`.`$questiontable` ( `SN` INT NOT NULL AUTO_INCREMENT, "
               . "`Question` VARCHAR(500) NOT NULL , `OptionA` VARCHAR(100) "
               . "NOT NULL , `OptionB` VARCHAR(100) NOT NULL , `OptionC` "
               . "VARCHAR(100) NOT NULL , `OptionD` VARCHAR(100) NOT NULL , "
               . "`OptionE` VARCHAR(100) NOT NULL , `Answer` VARCHAR(2) NOT NULL ,"
               . " PRIMARY KEY (`SN`)) ENGINE = InnoDB;";
       $query2 = mysqli_query($con, $sql);
       if(!$query2){
           die("couldnt query2");
       }
       $answertable = $row["SN"]."Answer";
       $sql1 = "CREATE TABLE `higgins`.`$answertable` ( `RegNo` VARCHAR(10) NOT NULL , "
               . "`Dept` VARCHAR(200) NOT NULL , `Score` INT NOT NULL ) ENGINE = InnoDB;";
       $query3 = mysqli_query($con, $sql1);
       if(!$query3){
           die("couldnt query3");
       }
       $query4 = mysqli_query($con,"SELECT * FROM student");
       if(!$query4){
           die("couldnt query4");
       }
       while($row1 = mysqli_fetch_array($query4)){
           $reg = $row1["regno"];
           $dept = $row1["dept"];
           $query5 = mysqli_query($con,"INSERT INTO `$answertable`(`RegNo`,`Dept`) VALUES('$reg','$dept')");
           if(!$query5){
               die("couldnt query5");
           }
       }
       echo '<script type="text/javascript"> alert("Please take down the code of this Assessment code: '.$row["SN"].'")</script>'; 
       }
    }
  }
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
function result(){
    if(isset($_GET["checkresult"])){
        if($_GET["code"]==""){
            echo '<script type="text/javascript"> alert("please enter the code you want to check it result")</script>';  
        }
        else{
           $con = mysqli_connect("localhost:3306", "root", "", "higgins");
           if(!$con){
             die("couldnt connect");
           }
           $code = $_GET["code"];
           $query = mysqli_query($con, "SELECT * FROM `testtable` WHERE `SN`='$code'");
           if(!$query){ die("couldnt query");}
           $row = mysqli_fetch_array($query);
           echo 'Test name: '.$row["TestName"]."<br />";
           echo 'Test Description: '.$row["TestDes"]."<br />";
           echo 'Test code: '.$row["SN"]."<br />";
           echo 'Date for the Test: '.$row["Date"]."<br />";
           echo 'Time for the test: '.$row["Time"]."<br />";
           echo 'Duration: '.$row["Duration"]."<br />";
           $Q = $code."question";
           $query1 = mysqli_query($con,"SELECT MAX(SN) FROM `$Q`");
           if(!$query1){ die("couldnt query1");}
           $row1 = mysqli_fetch_array($query1);
           echo 'Total Question and Score: '.$row1["MAX(SN)"]."<br />"."<br />";
           $A = $code."answer";
           $query2 = mysqli_query($con,"SELECT * FROM `$A`");
           if(!$query2){ die("couldnt query2");}
           $s=1;
           echo '<div class="row" style="width:inherit; margin: 10px;padding: 10px">'
                           .'<table class="table table-bordered table-striped table-hover " style="margin: 10px;">'
                           .'<thead><tr><td>SN</td><td>RegNo</td><td>Department</td><td>Score</td></tr></thead>';
           while($row2 = mysqli_fetch_array($query2)){
              
                echo '<tr><td>'.$s.'</td><td>'.$row2["RegNo"].'</td><td>'.$row2["Dept"].'</td><td>'.$row2["Score"].'</td></tr>';
                           
              $s+=1;
           }
           echo '</table></div>'; 
        }
    }
}

