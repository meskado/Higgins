<?php
session_start();
   if (!(isset($_SESSION['susername']) && isset($_SESSION['spassword']))) {
     header("location:index.php");
   }
   elseif(!(isset ($_SESSION["code"])&& isset ($_SESSION["duration"]))){
     header("location: StudentPage.php");
   }
   else{
     $reg = $_SESSION['susername'];
     $duration = $_SESSION["duration"];
     $code = $_SESSION["code"];
     $hour = floor($duration/60);
     $minutes = $duration%60;
     $seconds = 59;
     $con = mysqli_connect("localhost:3306", "root", "", "higgins");
     if(!$con){
        die("couldnt connect");
     } 
     $n = 1;
     $quest = $code."question";
     $query = mysqli_query($con,"SELECT * FROM `$quest` WHERE `SN` = '$n'");
     if(!$query){
         die("couldnt query");
     }
     $row = mysqli_fetch_array($query);
     $question = $row["Question"];
     $A = $row["OptionA"];
     $B = $row["OptionB"];
     $C = $row["OptionC"];
     $D = $row["OptionD"];
     $E = $row["OptionE"];
   }
   if(isset($_GET["next"])){
     $quest = $code."question";
     $n = $_GET["holder"]+1;
     $hour = $_GET["h"];
     $minutes = $_GET["m"];
     $seconds = $_GET["se"];
     $queryl = mysqli_query($con,"SELECT `SN` FROM `$quest` ORDER BY `SN`  DESC LIMIT 1");
     $rowl = mysqli_fetch_array($queryl);
     if($n>$rowl["SN"]){
        echo '<script type="text/javascript"> alert("No more questions")</script>';
        echo '<script type="text/javascript"> document.getElementById("num").innerHTML = "'.$rowl["SN"].'"</script>';
        $n = 1;
        echo '<script type="text/javascript"> document.getElementById("num").innerHTML = "'.$n.'"</script>'; 
     }
     else{
     $query = mysqli_query($con,"SELECT * FROM `$quest` WHERE `SN` = '$n'");
     if(!$query){
         die("couldnt query");
     }
     $row = mysqli_fetch_array($query);
     $question = $row["Question"];
     $A = $row["OptionA"];
     $B = $row["OptionB"];
     $C = $row["OptionC"];
     $D = $row["OptionD"];
     $E = $row["OptionE"];
     echo '<script type="text/javascript"> document.getElementById("num").innerHTML = "'.$n.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("question").innerHTML = "'.$question.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("a").innerHTML = "'.$A.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("b").innerHTML = "'.$B.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("c").innerHTML = "'.$C.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("d").innerHTML = "'.$D.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("e").innerHTML = "'.$E.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("hr").innerHTML = "'.$hour.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("min").innerHTML = "'.$minutes.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("sec").innerHTML = "'.$seconds.'"</script>';
     }
   }
    if(isset($_GET["previous"])){
     $quest = $code."question";
     $hour = $_GET["h"];
     $minutes = $_GET["m"];
     $seconds = $_GET["se"];
     $n = $_GET["holder"]-1;
     if($n<1 ){  
         echo '<script type="text/javascript"> alert("No previous question")</script>';
         echo '<script type="text/javascript"> document.getElementById("num").innerHTML = "1"</script>';
         $n += 1;
         echo '<script type="text/javascript"> document.getElementById("num").innerHTML = "'.$n.'"</script>';
         echo '<script type="text/javascript"> document.getElementById("hr").innerHTML = "'.$hour.'"</script>';
         echo '<script type="text/javascript"> document.getElementById("min").innerHTML = "'.$minutes.'"</script>';
         echo '<script type="text/javascript"> document.getElementById("sec").innerHTML = "'.$seconds.'"</script>';
         
     }
     else{
     $query = mysqli_query($con,"SELECT * FROM `$quest` WHERE `SN` = '$n'");
     if(!$query){
         die("couldnt query");
     }
     $row = mysqli_fetch_array($query);
     $question = $row["Question"];
     $A = $row["OptionA"];
     $B = $row["OptionB"];
     $C = $row["OptionC"];
     $D = $row["OptionD"];
     $E = $row["OptionE"];
     echo '<script type="text/javascript"> document.getElementById("num").innerHTML = "'.$n.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("question").innerHTML = "'.$question.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("a").innerHTML = "'.$A.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("b").innerHTML = "'.$B.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("c").innerHTML = "'.$C.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("d").innerHTML = "'.$D.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("e").innerHTML = "'.$E.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("hr").innerHTML = "'.$hour.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("min").innerHTML = "'.$minutes.'"</script>';
     echo '<script type="text/javascript"> document.getElementById("sec").innerHTML = "'.$seconds.'"</script>';
    
     }
   }
   if(isset($_GET["ok"])){
       $hour = $_GET["h"];
       $minutes = $_GET["m"];
       $seconds = $_GET["se"];
       
       if(!(isset($_GET["answer"]))){
          echo '<script type="text/javascript"> alert("Please select an answer")</script>';
          echo '<script type="text/javascript"> document.getElementById("hr").innerHTML = "'.$hour.'"</script>';
          echo '<script type="text/javascript"> document.getElementById("min").innerHTML = "'.$minutes.'"</script>';
          echo '<script type="text/javascript"> document.getElementById("sec").innerHTML = "'.$seconds.'"</script>';
       }
       else{
         $ans = $code."answer";
         $n = $_GET["holder"]; 
         $query1 = mysqli_query($con,"SELECT `$n` FROM `$ans` WHERE `RegNo` = '$reg'");
         if(!$query1){
             die("couldnt query1");
         }
         $row1 = mysqli_fetch_array($query1);
         if($row1["$n"]!=""){
           echo '<script type="text/javascript"> alert("You have already answered the answer")</script>'; 
           echo '<script type="text/javascript"> document.getElementById("hr").innerHTML = "'.$hour.'"</script>';
           echo '<script type="text/javascript"> document.getElementById("min").innerHTML = "'.$minutes.'"</script>';
           echo '<script type="text/javascript"> document.getElementById("sec").innerHTML = "'.$seconds.'"</script>';
         }
         else{
           $query2 = mysqli_query($con,"UPDATE `$ans` SET `$n` = '".$_GET["answer"]."' WHERE `RegNo` = '$reg'");
           if(!$query2){
               die("couldnt query2");
           }
           $query3 = mysqli_query($con,"SELECT `Answer` FROM `$quest` WHERE `SN` = '$n'");
           if(!$query3){
               die("couldnt query3");
           }
           $row2 = mysqli_fetch_array($query3);
           if($row2["Answer"]==$_GET["answer"]){
               $query4 = mysqli_query($con,"SELECT `Score` FROM `$ans` WHERE `RegNo` = '$reg'");
               if(!$query4){
                   die("couldnt query4");
               }
               $row3 = mysqli_fetch_array($query4);
               $score = $row3["Score"]+1;
               $query5 = mysqli_query($con,"UPDATE `$ans` SET `Score` = '$score' WHERE `RegNo` = '$reg'");
               if(!$query5){
                   die("couldnt query5");
               }
           }
           echo '<script type="text/javascript"> alert("Answer saved")</script>'; 
           echo '<script type="text/javascript"> document.getElementById("hr").innerHTML = "'.$hour.'"</script>';
           echo '<script type="text/javascript"> document.getElementById("min").innerHTML = "'.$minutes.'"</script>';
           echo '<script type="text/javascript"> document.getElementById("sec").innerHTML = "'.$seconds.'"</script>';
         }
       }
   }
  

