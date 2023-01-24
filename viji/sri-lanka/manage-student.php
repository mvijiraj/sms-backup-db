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
                                
                <h3>Manage Students</h3>
                <span class="req-msg">*fields are required</span>
                <hr>

                <div style ='width: 50%'>

                <?php 
                
                include("function.php");

                 //get connection
                 $conn = getdbconnection();

                if(isset($_POST['btnsubmit'])){
                    $fname=$_POST['fname'];
                    $lname=$_POST['lname'];
                    $dob=$_POST['dob'];
                    $nic=$_POST['nic'];

                    $created_by = $_SESSION['currentuser']['id'];
                    

                   
                    //insert query
                    $sql= "INSERT INTO tbl_student (fname,lname, dob,nic,created_user) VALUES ('$fname', '$lname','$dob','$nic','$created_by')";
                    
                    //echo $sql;

                    //echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

                    if(mysqli_query($conn,$sql)){
                        //success
                        //insert user into tbl_user table
                     $usrsql="INSERT INTO tbl_user
                    (nic,
                     pword,
                     user_role,
                     created_user,
                     status_code) 

                     VALUES('$nic',
                            '$nic',
                            'STUDENT',
                            '$created_by',
                            'ACTIVE')";

                            mysqli_query($conn,$usrsql);
                        
                        ?>
                    
                    <div class="alert alert-success" role="alert">
                        New student recordS added successfully
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


  
  
                <form action="manage-student.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First name <span class="req-msg">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="fname" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="lname">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">nic <span class="req-msg">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nic" placeholder="Enter valid NIC" required>
                       <option value=""></option>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                        
                                                                     
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="dob">
                </div>
                <div class="mb-3">
                   
                    <button type="submit" name ="btnsubmit"class="btn btn-primary">Add Students</button>
                </div>
            
            
                </form>

                
                </div>

                <hr>
                <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">dob</th>
      <th scope="col">nic</th>
      <th scope="col">Created Date</th>

    </tr>
  </thead>
  <tbody>
    <?php
                $conn = getDBconnection();
                $sql ="SELECT * FROM tbl_student";

                $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_assoc($result)){

                            ?>
                                 <tr>
                                <th scope="row"><?php echo $row ['id'] ?></th>
                                <td><?php echo $row ['fname'] ?></td>
                                <td><?php  echo $row ['lname'] ?></td>
                                <td><?php echo $row ['dob'] ?></td>
                                <td><?php echo $row ['nic'] ?></td>
                                <td><?php echo $row ['created_datetime'] ?></td>
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