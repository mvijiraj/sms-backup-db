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
                                
                <h3>Manage Notifications</h3>
                <span class='req-msg'>*fields are required </span>
                <hr>

                <div style ='width: 50%'>

                <?php 
                
                include("function.php");

                if(isset($_POST["btnsubmit"])){
                    $title=$_POST["title"];
                    $msg=$_POST["msg"];
                
                    $created_by = $_SESSION['currentuser']['id'];

                    //get connection
                    $conn = getDBConnection();
                    //isset query
                    $sql= "INSERT INTO tbl_notification (title,msg,created_user) VALUES ('$title', '$msg','$created_by')";
                    if(mysqli_query($conn,$sql)){
                        //success
                        
                        ?>
                    
                    <div class="alert alert-success" role="alert">
                        New Notification record inserted successfully
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




                <form action="manage-notification.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Message</label>
                        
                        <textarea name="msg" class="form-control"></textarea>
                </div>
                    
                <div class="mb-3">
                   
                    <button type="submit" name ="btnsubmit"class="btn btn-primary">Add Subject</button>
                </div>
            
            
                </form>

                
                </div>

                <hr>
                <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Message</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
                $conn = getdbconnection();
                $sql ="SELECT * FROM tbl_notification";

                $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_assoc($result)){

                            ?>
                                 <tr>
                                <th scope="row"><?php echo $row ['id'] ?>1</th>
                                <td><?php echo $row ["title"] ?></td>
                                <td><?php  echo $row ["msg"] ?></td>
                                <td><?php echo $row ["created_datetime"] ?></td>
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