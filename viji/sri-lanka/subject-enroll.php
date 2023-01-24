<html>

        <?php
        session_start();
         include ('function.php');
        ?>


    <head>
        
        <title>sms2 application</title>
        <link href='css/bootstrap.css' rel = "stylesheet"/>

        <style>
#topdiv{    
    background-color:EA047E;
    padding-top:25px;
    color:white;
}

        </style>
    </head>
    <body>
       
        <div class="container">
            <div class="row" id="topdiv">
                <div class="col-sm-12">
                    <h2>Student Management System</h2>
                    <p>Your Digital School</p>

                </div>

            </div>
            <div class="row">
            <div class="col-sm-2">

            
            <?php   
           
             ?>
            
            
            <?php

            if($_SESSION['currentuser']['user_role'] == 'ADMIN'){

                include('_menu-admin.php');
            }

            if($_SESSION['currentuser']['user_role'] == 'teacher'){

                include('_menu-teacher.php');
            }
            if($_SESSION['currentuser']['user_role'] == 'student'){

               
                include('_menu-student.php');
            }

            ?>
                
            </div>
            <div class="col-sm-10">
                   
                <p style = 'text-align:right'>Welcome <?php echo $_SESSION['currentuser']['nic']?> [<?php echo $_SESSION['currentuser']['user_role']?>]<a href='logout.php'>logout </a></p>
               
                    <h2> Subject Enrolment</h2>
                    <hr>

                    <?php
                        if(isset($_POST['btnsubmit'])){

                            $subjectids = $_POST['subjectids'];
                                //get the studentid from the session
                                $studentid =$_SESSION['currentuser']['id'];
                                //tbl_student_subject

                                //get connection
                    $conn = getDBConnection();
                    //isset query
                    $sql= "INSERT INTO tbl_student_subject (student_id,subject_id) VALUES ('$studentid','$subjectids')";
                   echo $sql;
                    if(mysqli_query($conn,$sql)){
                        //success
                        
                        ?>
                    
                    <div class="alert alert-success" role="alert">
                        New subject enrolment is successfull
                    </div>
                                  

                    <?php


                   }else{
                         //error
                         
                    ?>

                        <div class="alert alert-danger" role="alert">
                        Invalid input found or already enrolled
                        </div>

                    <?php

                   }
                       
                }

                        


                    ?>
                    
                    <form action = "subject-enroll.php" method ="post">
                     <div class="mb-3">
                         <label for="exampleFormControlInput1" class="form-label">Subjects</label>
                        <select class="form-control" name= "subjectids" required>
                    <option value="">---Select Subject---</option>

                     <?php
                        $conn = getDBConnection();

                        

                        $subsql = "SELECT * FROM tbl_subject";
                        $result= mysqli_query($conn,$subsql);
                        if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_assoc($result)){
                     ?>
                <option    value="<?php echo $row['id'];?>"><?php echo $row['subject_name']; ?></option>

                <?php
                             }
                     }

                    ?>
                     
                    </select>
                </div>
                     
                <div class="mb-3">
                   
                   <button type="submit" name ="btnsubmit"class="btn btn-primary">Enroll Subject</button>
               </div>
           

                    </form>
                    <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Subject Name</th>
      <th scope="col">Enroll Date</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
                $conn = getdbconnection();

                $studentid =$_SESSION['currentuser']['id'];

                $sql ="SELECT tbl_subject.subject_name 
                , tbl_student_subject.enroll_datetime
                , tbl_student_subject.student_id 
                FROM tbl_subject
                INNER JOIN tbl_student_subject
                ON tbl_subject.id = tbl_student_subject.subject_id
                WHERE tbl_student_subject.student_id = $studentid";

                $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_assoc($result)){

                            ?>
                                 <tr>
                               
                                <td><?php echo $row ["subject_name"] ?></td>
                                <td><?php  echo $row ["enroll_datetime"] ?></td>
                                <td>
                                    <a href ="">
                                    <img src ="image/delete button.jfif" width = "20px"/>
                                    </a>
                                </td>
                                   
                                   
                                </tr>
    

                            <?php

                        }      
                        }
    ?>

                        
    
  
 
   
  </tbody>
</table>

                </div>
                 
                </div>
            </div>
            
        </div>
    </body>
</html>