<html>
    <?php 
        session_start();
        include 'function.php';
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
                <div class="col-sm-4">
                    1
                </div>
                 <div class="col-sm-4">
                    <img src="image/web.png" style="width:150px; margin-top:50px"/>
                    <h3>Login</h3>


                    <form action="index2.php" method ="post">
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">nic</label>
                    <input type="text" name ="nic" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="Password" name ="pword" class="form-control">
                </div>
                <button type="submit" name ="btnsubmit"class="btn btn-primary">Login</button>

                    </form> 
                <?php
                if(isset($_POST["btnsubmit"])){

                    $nic =$_POST["nic"];
                    $pword =$_POST["pword"];
                    //connect to the database

                    

                    $conn = getdbconnection();
                    
                    $sql ="SELECT * FROM tbl_user WHERE nic ='$nic' AND pword = '$pword' AND status_code='active';";

                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_assoc($result)){
                           // echo $row['user_role']; //valid user found
                           $_SESSION['currentuser'] = $row;

                        }

                        header('location:home.php');

                    }else{
                        ?>
                        <div class="alert alert-success" role="alert">
                            Invalid User name or Password
                        </div>
                        <?php
                    }

                }

                
                ?>                   
                </div>
                <div class="col-sm-4">
                    3
                </div>
            </div>
            
        </div>
    </body>
</html>