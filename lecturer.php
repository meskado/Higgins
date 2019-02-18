<?php include 'lecturerPhp.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="HigginsScript.js"></script>
        <title>Lecturer Page</title>
    </head>
    <body  style="background-image: url('pictures/background.png')">
         <div class="container" >
            <div class="row" style="background-color: #004085">
                <div class="col-12" style="font-family: fantasy; color: whitesmoke">
                    <div style="font-size: 30px"><center>Online Course Assessment System</center></div>
                    <div style="font-size: 20px"><center>Introduction To Computer Science (GSS1103)</center></div>
                </div>
            </div>
             <div class="row" style="margin-top: 5px; color: #0c5460;width: 100%; background-image: url('pictures/4k-wallpaper-architecture-background-1308624.jpg')">
                 <div class="col-12">
                     <center>
                        <div style="background-color: #e9ecef; width: 200px; margin-top: 200px; margin-bottom: 200px;">
                                Lecturer Log in
                                <form role="form" action='<?php $_PHP_SELF?>' method='POST'>
                                    <div class="form-group">
                                       Username:
                                       <input type="text" placeholder="Enter Username" class="form-control" name="user" style="width:150px"/>
                                    </div>
                                    <div class="form-group">
                                       Password:
                                       <input type="password" Placeholder="Enter Password" class="form-control" name="password" style="width:150px" />
                                    </div>
                                    <div class="form-group" >
                                        <input type="submit" class="btn btn-primary btn-sm active" value="Login" name="login" id="loginbu" style="margin-bottom: 10px"/>
                                    </div>
                                </form>
                        </div>
                     </center>
                 </div>
             </div>
         </div>
         
    </body>
</html>
