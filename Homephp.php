<?php
session_start();
if(isset($_POST["reg"])){
    $name = $_POST["name"];
    $regno = $_POST["regno"];
    $dept = $_POST["dept"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $repass = $_POST["repass"];
    if(($name == "" || $regno == "" || $dept == "")||($phone == ""|| $mail == "" || $password == "")|| $repass == ""){
        echo '<script type="text/javascript"> alert("Please fill all the spaces")</script>';
    }
    else if($password != $repass){
        echo '<script type="text/javascript"> alert("Your passwords are not matching")</script>';
    }
    else{
        $con = mysqli_connect("localhost:3306", "root", "", "higgins");
        if(!$con){
            die("couldnt connect");
        }
        $query = mysqli_query($con,"INSERT INTO `student`(`name`, `regno`, `dept`, `phone`, `email`, `password`) "
                . "VALUES ('$name','$regno','$dept','$phone','$mail','$password')");
        if(!$query){
            die("couldnt query");
        }
       echo '<script type="text/javascript"> alert("You have successfully registered for the course")</script>'; 
    }
}
if(isset($_POST["login"])){
    $regno = $_POST["regno"];
    $password = $_POST["password"];
    if($regno == "" || $password == ""){
       echo '<script type="text/javascript"> alert("Please fill all the spaces")</script>'; 
    }
    else{
       $con = mysqli_connect("localhost:3306", "root", "", "higgins");
       if(!$con){
           die("couldnt connect");
       }
       $query = mysqli_query($con,"SELECT `regno`, `password` FROM `student`");
       if(!$query){
           die("couldnt query");
       }
       while($row = mysqli_fetch_array($query)){
         if($regno == $row["regno"] && $password ==$row["password"]){
            $_SESSION['susername']= $regno;
            $_SESSION['spassword']=$password;
            header("Location: StudentPage.php");
        }  
       }
        echo '<script type="text/javascript"> alert("Wrong Username or Password")</script>'; 
    }
}

