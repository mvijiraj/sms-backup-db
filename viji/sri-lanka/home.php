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
                
                <a href="list-notifications.php">

                <button type="button" class="btn btn-primary">
                    Notifications <span class="badge text-bg-secondary">

                <?php   //get notification count
                $cnt = getnotificationCount();
                echo $cnt; ?>
                </span>
                </button>
                </a>
                </div>
                 
                </div>
            </div>
        </div>
    </body>
</html>