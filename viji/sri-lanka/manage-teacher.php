<html>

        <?php
        session_start();
        ?>


    <head>
        
        <title>sms2 application</title>
        <link href='css/bootstrap.css' rel = "stylesheet"/>
        <link href='css/sms-style.css' rel = "stylesheet"/>


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
            //echo 'menu item'.$_SESSION['currentuser']['user_role'];
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
                                
                <h3>Manage Teacher</h3>
                <span class="req-msg">*fields are required</span>
                <hr>

                <div style ='width: 50%'>

                <?php 
                
                include("function.php");

                $conn = getdbconnection();


                if(isset($_POST["btnsubmit"])){
                    $Fname=$_POST["Fname"];
                    $Lname=$_POST["Lname"];
                    $Tp=$_POST["Tp"];
                    $NIC=$_POST["NIC"];
                    $subjectids=$_POST["subjectids"];

                    $Created_by = $_SESSION['currentuser']['id'];

                    //get connection
                    
                    //isset query

                    $sql= "INSERT INTO tbl_teacher (Fname,
                    Lname,
                    Tp,
                    NIC,
                    Created_by,
                    subject_id) VALUES ('$Fname','$Lname','$Tp','$NIC','$Created_by','$subjectids')";
                   
                
                    if(mysqli_query($conn,$sql)){
                        //success
                        //insert user into user table
                        $usrsql =" INSERT INTO tbl_user
                        (nic,
                         pword,
                         user_role,
                         created_user,
                         status_code)
            VALUES ('$NIC',
                    '$NIC',
                    'TEACHER',
                    '$Created_by',           
                    'ACTIVE')";

                     mysqli_query($conn,$sql);
                     ?>
                    
                    <div class="alert alert-success" role="alert">
                        New record added successfully
                    </div>

                                     

                    <?php


                   }else{
                         //error
                         
                    ?>

                        <div class="alert alert-danger" role="alert">
                        Invalid input found
                        </div>

                    <?php

                   }
                       
                }
                ?>


                <form action="manage-teacher.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First Name <span class="req-msg">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Fname" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Lname">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Tp">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIC <span class="req-msg">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="NIC" placeholder="Enter valid NIC" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Subject <span class=".req-msg">*</span></label>
                                    
                                       
                    <select class="form-control" name= "subjectids" required>
                    <option value="">---Select Subject---</option>

                     <?php

                    
                        $subsql = "SELECT * FROM tbl_subject";
                        $result= mysqli_query($conn,$subsql);
                        if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_assoc($result)){
                     ?>
                <option value<?php echo $row['id'];?>><?php echo $row['subject_name']; ?></option>

                <?php
                             }
                     }

                    ?>

                       


                    </select>
                       
                </div>

                <div class="mb-3">
                   
                    <button type="submit" name ="btnsubmit"class="btn btn-primary">Add Teachers</button>
                </div>
            
            
                </form>

                
                </div>

                <hr>
                <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fname</th>
      <th scope="col">Lname</th>
      <th scope="col">Tp</th>
      <th scope="col">NIC</th>

    </tr>
  </thead>
  <tbody>
    <?php
                $conn = getdbconnection();
                $sql ="SELECT * FROM tbl_teacher";
                     
                $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_assoc($result)){

                            ?>
                                 <tr>
                                <th scope="row"><?php echo $row ['id'] ?>1</th>
                                <td><?php echo $row ['fname'] ?></td>
                                <td><?php  echo $row ['lname'] ?></td>
                                <td><?php echo $row ['tp'] ?></td>
                                <td><?php echo $row ['nic'] ?></td>
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