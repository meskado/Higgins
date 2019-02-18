<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action<?php $_PHP_SELF?> method="GET">
            <textarea name="di" value="1"></textarea>
           <input type="radio" name="k" value="woman" />
            <input type="radio" name="k" value="man" />
            <input type="submit" name="click" />
        </form>
        <?php
         if(isset($_GET["click"])){
             if($_GET["k"] == ""){
                 echo 'notin come road';
             }
             else{
             echo $_GET["k"];
             }
             echo (11%2);
             echo fmod(5,2);
             echo floor(99/10);
         }
         $con = mysqli_connect("localhost:3306", "root", "", "higgins");
         if(!$con){
           die("couldnt connect");
         }
         $query1 = mysqli_query($con,"SELECT `SN` FROM `1010question` ORDER BY `SN`  DESC LIMIT 1");
         $rowl = mysqli_fetch_array($query);
         echo $row["SN"];
        ?>
    </body>
</html>
