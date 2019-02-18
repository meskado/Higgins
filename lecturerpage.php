<?php include 'lecturerPhp.php';?>
<?php
  
  if (!(isset($_SESSION['lusername']) && isset($_SESSION['lpassword']))) {
    header("location:lecturer.php");
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
        <script type="text/javascript" src="LecturerScript.js"></script>
        <title>Home page</title>
    </head>
    <body style="background-image: url('pictures/background.png')">
        <div class="container">
            <div class="row" style="background-color: #004085">
                <div class="col-12" style="font-family: fantasy; color: whitesmoke">
                    <div style="font-size: 30px"><center>Online Course Assessment System</center></div>
                    <div style="font-size: 20px"><center>Introduction To Computer Science (GSS1103)</center></div>
                </div>
            </div>
            <div class="row"  style="background-color: #004085;">
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px"id="homeb">HOME</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px" id="setb">SET ASSESSMENT</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px" id="viewassb">VIEW ASSESSMENTS</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px">CONTACT</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px" id="viewb">VIEW RESULT</button>
            </div>
            <div class="row" style="background-color: whitesmoke; width: 100%; height: auto;padding: 15px; margin: 10px; display: none" id="view">
                <div style="width: 100%">
                <form role="form" actio="<?php $_PHP_SELF ?>" method="GET">
                    <div class="form-group"> Select the Assessment code you want to check its result</div>
                    <div class="form-group">
                       <select class="form-control" name="code">
                            <option value="">Select Assessment Code</option>
                                <?php listcode()?>
                       </select>  
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-sm active" name="checkresult" value="OK" id="view2b"/>
                    </div>
                </form>
                <div id="view2"><?php result()?></div>
                </div>
            </div>
            <div  class="row" style="background-color: whitesmoke; width: 100%; height: auto;padding: 15px; margin: 10px" id="home">
                <p>
                            Assessment as we know is one of the best methods of evaluating knowledge and grade student’s ability
                            understanding of what he/she was taught in the classroom. There have been various methods used for
                            assessing students such as projects, pencil-written examination, presentations, assignments and oral examinations.
                        </p>
                        <p>
                            The paper and pen (manual) method of writing assessment, which has been in existence for decades, 
                            may not be appealing for use because of the problems usually experienced including venue capacity 
                            constraints, lack of comfort for students, delay in the release of results, examination malpractices, 
                            cost implication of printing test materials and human error. This brings about the need for automation 
                            of the examination system.
                        </p>
                        <p>
                            Now, with computer-based assessment, comes the possibility of radically improving both how assessments 
                            are implemented and the quality of the information they can deliver. But as many states consider whether 
                            to embrace the new technologies — and as some already have — serious concerns remain about the fairness 
                            of the new systems and the readiness of states (and their districts and schools) to support them. Technology 
                            is no stranger to assessment. In the middle of the last century, the rise of multiple choice methodology for 
                            large-scale assessment was fueled heavily by the development of high-speed scanners. More recently, 
                            computer-adaptive models, where students are presented with questions tailored to
                            their ability levels, have promised to make assessment more efficient and able to target the needs of individual
                            students. On the hardware side, advances in the speed, capacity, and availability of computers allow applications 
                            that could only be imagined less than a generation ago. On the software side, developments in database structures,
                            simulation technologies, and artificial intelligence models promise to dramatically improve the efficiency and 
                            capabilities of assessment administration, scoring, and reporting. College admissions and certification programs 
                            have led the way in using the new computer-based technology. Aptitude test is an area of the higher education admission 
                            screening system that computerized assessment can be implemented.
                        </p>
            </div>
            <div class="row" style="width:100%; margin-top:10px; font-size: 20px; font-family: Times New Roman;  background-color: whitesmoke; display: none" id="viewass">
              
               <?php
                   $con = mysqli_connect("localhost:3306", "root", "", "higgins");
                   if(!$con){
                     die("couldnt connect");
                   }
                  
                  $query = mysqli_query($con,"SELECT * FROM `testtable`");
                  $s = 1;
                  if(!$query){ die("couldnt query");}
                  echo '<div class="row" style="width:100%; margin: 10px">'
                           .'<table class="table table-bordered table-striped table-hover " style="margin: 10px;">'
                           .'<thead><tr><td>SN</td><td>Test Name</td><td>Test Code</td><td>Test Descripton</td><td>Date</td><td>Time</td><td>Duration</td></tr></thead>';
                  while($row = mysqli_fetch_array($query)){
                      
                           echo '<tr><td>'.$s.'</td><td>'.$row["TestName"].'</td><td>'.$row["SN"].'</td><td>'.$row["TestDes"].'</td><td>'.$row["Date"].'</td><td>'.$row["Time"].'</td><td>'.$row["Duration"].'</td></tr>';
                          
                            
                         $s+=1;  
                  }
                 echo '</table></div>'; 
               ?>
           </div>
            <div class="row" id="set" style="margin-top: 5px; display: none; color: #0c5460;width: 100%; background-image: url('pictures/4k-wallpaper-architecture-background-1308624.jpg'); display: none">
                
                <div class='col-6'>
                    <div style="width:100%;  margin:10px;color: #e9ecef; font-size: 20px; font-family: Times New Roman">
                        <div>SET ASSESSMENT</div>
                        <div>SET QUESTION</div>
                        <form role="form" action="<?php $_PHP_SELF?>" method="GET">
                            <div class="form-group">
                                <select class="form-control" name="code">
                                    <option value="">Select Assessment Code</option>
                                    <?php listcode()?>
                                </select>
                            </div>
                            <div class="form-group">
                                Question
                                <textarea placeholder="Write your question here" class="form-control" name="question" style="height:250px"></textarea>
                            </div>
                            <div class="form-group">
                                Option A
                                <input type="text" placeholder="Option A" class="form-control" name="optiona"/>
                            </div>
                            <div class="form-group">
                                Option B
                                <input type="text" placeholder="Option B" class="form-control" name="optionb"/>
                            </div>
                            <div class="form-group">
                                Option C
                                <input type="text" placeholder="Option C" class="form-control" name="optionc" />
                            </div>
                            <div class="form-group">
                                Option D
                                <input type="text"  placeholder="Option D" class="form-control" name="optiond"/>
                            </div>
                            <div class="form-group">
                                Option E
                                <input type="text"  placeholder="Option E" class="form-control" name="optione"/>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="answer">
                                    <option value="" selected>choose your answer</option>
                                    <option value="A">Option A</option>
                                    <option value="B">Option B</option>
                                    <option value="C">Option C</option>
                                    <option value="D">Option D</option>
                                    <option value="E">Option E</option>
                                </select>
                            </div>
                            <div><i>click on save to save each question input until all the questions are recorded</i></div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm active" name="save" value="save question"/>
                            </div>
                            <div><i>click on done when you have saved all questions</i></div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm active" name="done" value="Done"/>
                            </div>
                        </form>
                        <?php savequestion()?>
                    </div>
                </div>
                <div class="col-6">
                    <div style="width:100%; margin:10px;color: #e9ecef; font-size: 20px; font-family: Times New Roman">
                        <div>SET TEST</div>
                        <form role="form" action='<?php $_PHP_SELF?>' method='GET'>
                            <div class="form-group">
                                Enter Test name
                                <input type="text" class="form-control" name="testname" placeholder="Enter test name"/>
                            </div>
                            <div class="form-group">
                                Enter Test description
                                <input type="text" class="form-control" name="testdes" placeholder="Enter test description"/>
                            </div>
                            <div class="form-group">
                                Enter date for the Test
                                <input type="date" class="form-control" name="dat"/>
                            </div>
                            <div class="form-group">
                                Enter Time for the Test (Hour/Minutes/(AM OR PM))
                                <input type="time" class="form-control" name="tim" />
                            </div>
                            <div class="form-group">
                                Enter duration for the Test (In minutes)
                                <input type="number" class="form-control" name="duration" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm active" name="timesave" value="save time"/>
                            </div>
                            
                        </form>
                        <?php
                        dat();
                        ?>
                    </div>
                    <hr style="background-color: #e9ecef"/>
                    <button class="btn btn-primary btn-sm active">Delete Assessment</button>
                </div>
                
            </div>
           
        </div>
    </body>
</html>
