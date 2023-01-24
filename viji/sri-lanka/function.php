<?php 
function getdbConnection(){
        //echo 'This line is from function.php <br>';

    $server ="localhost";//192.168.15.22
                    $username ="root";
                    $Password ="";
                    $dbname ="smsvijedb";
                    $conn = mysqli_connect($server, $username, $Password, $dbname);

                    return $conn;
}

function getnotificationCount(){
       //getnotificationCount
    $conn = getDBConnection();
    $sql ="SELECT * FROM tbl_notification";

    $result = mysqli_query($conn,$sql);


        $numberfnoty= mysqli_num_rows($result);

        return $numberfnoty;
              
            }



