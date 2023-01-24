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

            if($_SESSION['currentuser']['user_role'] == 'TEACHER'){

                include('_menu-teacher.php');
            }
            if($_SESSION['currentuser']['user_role'] == 'STUDENT'){

               
                include('_menu-student.php');
            }

            ?>
                
            </div>
            <div class="col-sm-10">
                   
                <p style = 'text-align:right'>Welcome <?php echo $_SESSION['currentuser']['nic']?> [<?php echo $_SESSION['currentuser']['user_role']?>]<a href='logout.php'>logout </a></p>
                <h2>list subject students<h2>
                <hr>

                <table class="table table-dark table-striped">
         <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                 <th scope="col">Last Name</th>
                <th scope="col">Enroll Date</th>
             </tr>
        </thead>
        <tbody>

                <?php

             $conn = getdbconnection();
                    $nic = $_SESSION['currentuser']['nic'];
                    $sql ="SELECT tbl_student. *,tbl_student_subject.enroll_datetime FROM tbl_student
                    INNER JOIN tbl_student_subject
                    ON tbl_student.id = tbl_student_subject.student_id
                    INNER JOIN tbl_teacher
                    ON tbl_student_subject.subject_id = tbl_teacher.subject_id
                    WHERE tbl_teacher.nic ='$nic'";

        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
         while($row = mysqli_fetch_assoc($result)){

     ?>
         <tr>
        <th scope="row"><?php echo $row ['id'] ?>1</th>
        <td><?php echo $row ["fname"] ?></td>
        <td><?php  echo $row ["lname"] ?></td>
        <td><?php echo $row ["enroll_datetime"] ?></td>
        </tr>


        <?php

}      
    }

                ?>

</tbody></table>





               
                </div>
                 
                </div>
            </div>
        </div>
    </body>
</html>