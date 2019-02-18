<?php include 'Homephp.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="HigginsScript.js"></script>
        <title>Home page</title>
    </head>
    <body style="background-image: url('pictures/background.png')">
        <div class="container" >
            
            <div class="row" style="background-color: #004085">
                <div class="col-12" style="font-family: fantasy; color: whitesmoke">
                    <div style="font-size: 30px"><center>Online Course Assessment System</center></div>
                    <div style="font-size: 20px"><center>Introduction To Computer Science (GSS1103)</center></div>
                </div>
            </div>
            <div class="row"  style="background-color: #004085; font-family: monospace; padding-top: 20px">
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px" id="homeb">HOME</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px" id="loginb">LOGIN</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px">ABOUT</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px">CONTACT</button>
                <button type="button" class='btn btn-primary btn-sm active' style=" margin: 10px" id="regb">REGISTER</button>
            </div>
            <div class="row" style="margin-top: 5px; color: #0c5460;width: 100%; background-image: url('pictures/4k-wallpaper-architecture-background-1308624.jpg')">
                <div class='col-12'>
                    <div style="width:100%; margin:10px;color: #e9ecef; font-size: 20px; font-family: Times New Roman" id="home">
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
                    <div style='width: 100%; margin-top: 200px; display:none' id="login">
                        <center>
                            <div style="background-color: #e9ecef; width: 200px">
                                Student Log in
                                <form role="form" action='<?php $_PHP_SELF?>' method='POST'>
                                    <div class="form-group">
                                       Username:
                                       <input type="text" placeholder="Enter Reg no" class="form-control" name="regno" style="width:150px"/>
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
                    <div style='width: 100%; margin-top: 200px; display: none' id="reg">
                        <center>
                            <div style="background-color: #e9ecef; width: 300px">
                                 
                                Student Registration
                                <form  role="form" action='<?php $_PHP_SELF?>' method='POST'>
                                    <div class="form-group">
                                       Name:
                                       <input type="text" placeholder="Enter Reg no" class="form-control"  name="name" style="width:250px" />
                                    </div>
                                    <div class="form-group">
                                       RegNo:
                                       <input type="text" Placeholder="Enter Reg No" class="form-control" style="width:250px" name="regno"/>
                                    </div>
                                    <div class="form-group">
                                       Department:
                                       <select class="form-control" style="width: 250px " name="dept">
                                       <option value="" selected="">Select department/Unit</option>
                                       <option value="Mass Communication">Mass Communication</option>
                                       <option value="Language and Linguistic Science">Language and linguistic Sciences</option>
                                       <option value="Education Administration and Planning (EFA)">Education Administration and Planning (Education Foundation and Administration)</option>
                                       <option value="Elementary Education (EFA)">Elementary Education (Education Foundation and Administration)</option>
                                       <option value="Guidance and Counselling (EFA)">Guidance and Counselling (Education Foundation and Administration)</option>
                                       <option value="Business Education (CIT)">Business Education (Curriculum and Instructional Technology)</option>
                                       <option value="Biology Education (CIT)">Biology Education (Curriculum and Instructional Technology)</option>
                                       <option value="Chemistry Education (CIT)">Chemistry Education (Curriculum and Instructional Technology)</option>
                                       <option value="Mathematics Education (CIT)">Mathematics Education (Curriculum and Instructional Technology)</option>
                                       <option value="Physics Education (CIT)">Physics Education (Curriculum and Instructional Technology)</option>
                                       <option value="Technical Education (CIT)">Technical Education (Curriculum and Instructional Technology)</option>
                                       <option value="Electrical/Electronics Engineering">Electrical/Electronics Engineering</option>
                                       <option value="Civil Engineering">Civil Engineering</option>
                                       <option value="Mechanical Engineering">Mechanical Engineering</option>
                                       <option value="Wood Technology Engineering">Wood Technology Engineering</option>
                                       <option value="Computer Science">Computer Sciences</option>
                                       <option value="Biology (Biolgical Science)">Biology (Biological Sciences) </option>
                                       <option value="Microbiology (Biolgical Science)">Microbiology (Biological Sciences) </option>
                                       <option value="Physics">Physics</option>
                                       <option value="Chemistry (Chemical Science)">Chemistry (Chemical Sciences)</option>
                                       <option value="Biochemistry (Chemical Science)">Biochemistry(Chemical Sciences)</option>
                                       <option value="Mathematics/Statistics">Mathematics/Statistics</option> 
                                       <option value="Estate Management">Estate Management</option>
                                       <option value="Architecture">Architecture</option>
                                       <option value="Urban and Regional Planning">Urban and Regional Planning</option>
                                       <option value="Visual Art and Technology">Visual Art and Technology</option>
                                    </select> 
                                    </div>
                                    <div class="form-group">
                                       Phone Number:
                                       <input type="text" Placeholder="Enter Phone Number" class="form-control" style="width:250px" name="phone"/>
                                    </div>
                                    <div class="form-group">
                                       E-mail:
                                       <input type="mail" Placeholder="Enter E-mail" class="form-control" style="width:250px" name="mail"/>
                                    </div>
                                    <div class="form-group">
                                       Password:
                                       <input type="password" Placeholder="Enter Password" class="form-control" style="width:250px" name="password"/>
                                    </div>
                                    <div class="form-group">
                                       Re-enter Password:
                                       <input type="password" Placeholder="Enter Password" class="form-control" style="width:250px" name="repass"/>
                                    </div>
                                    <div class="form-group" >
                                        <input type="submit" class="btn btn-primary btn-sm active" value="Register" style="margin-bottom: 250px" name="reg"/>
                                    </div>
                                </form>
                            </div>
                           
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
        ?>
    </body>
</html>
