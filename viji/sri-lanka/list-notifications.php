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
                <a href="manage-notification.php" class="text-white" style="text-decoration: none;">

                <button type="button" class="btn btn-primary">
                    Notifications <span class="badge text-bg-secondary">

                </a>
                <?php   //get notification count
                $cnt = getnotificationCount();
                echo $cnt; ?>
                </span>
                </button>

                <hr>
                <h3>List Notifications</h3>
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