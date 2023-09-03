<?php
    session_start();    
    include("conect.php");
    

    if(isset($_POST["logbtn"])){


        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="select * from user where Email='".$email."' AND Password='".$password."' ";

        $result= mysqli_query($conn,$sql);
        $row= mysqli_fetch_array($result);

        if (mysqli_num_rows($result) >= 1) {
            $query = "SELECT Username, UserID FROM User WHERE Email = '$email'";
            $result = $conn->query($query);
            if ($result === FALSE) {
                echo "Query execution error: " . $conn->error;
            } elseif ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['Username'];
                if (isset($row['UserID'])) {
                    $userid = $row['UserID'];
        

                    $_SESSION['username'] = $username;
                    $_SESSION['userid'] = $userid;

                    header("location: home.php");
                } else {
                    echo "UserID not found in the database for the given email.";
                }
            } else {
                echo "No records found for the given email.";
            }
        }
        
        

        // if(mysqli_num_rows($result) >= 1) {
        //     $query = "SELECT Username FROM user WHERE Email = '$email'";
        //     $result = $conn->query($query);
        //     if ($result->num_rows > 0) {
        //         $row = $result->fetch_assoc();
        //         $username = $row['Username'];
        //         $userid =  $row['UserID'];
                
                
        //         echo "Username: " . $username;
        //         echo $userid;
        //         $_SESSION['username'] = $username; 
        //         $_SESSION['userid'] = $userid; 

        //     } 

            
                


        //         // header("location: home.html");
              

        // } else {
        //     echo "<span class=' error-message '>Invalid email or password. </span>";
        // }
    }
  


    ?>
    
 


