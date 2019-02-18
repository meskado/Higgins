<?php
  $con = mysqli_connect("localhost:3306", "root", "", "higgins");
  if(!$con){
    die("couldnt connect");
  } 
  $query = mysqli_query($con,"SELECT `Question` FROM `1009question` WHERE `SN` = '1'");
  if(!$query){
      die("coudnt query");
  }
  $row = mysqli_fetch_array($query);
  
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="l"><?php echo $row["Question"]?></div>
        <form action="<?php $_PHP_SELF?>" method="GET">
         <input type="submit" name="sub" />
        </form>
        <?php
           if(isset($_GET["sub"])){
               $query = mysqli_query($con,"SELECT `Question` FROM `1009question` WHERE `SN` = '2'");
              if(!$query){
                 die("coudnt query");
              }
              $row = mysqli_fetch_array($query);
              echo '<script type="text/javascript"> document.getElementById("l").innerHTML = "'.$row["Question"].'"</script>'; 
           }
        ?>
    </body>
</html>
