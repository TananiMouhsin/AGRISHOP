 <?php
    include("conect.php");

    if(isset($_POST["singbtn"])){
    
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        
        $sqli = "INSERT INTO user (Username,Email,PhoneNumber,Password)
                values('$username','$email','$phone','$password')";
        
        
        
        if ($conn->query($sqli) === TRUE) {
            header("Location: login.html");

        } else {
            echo "Error: " . $sqli . "<br>" . $conn->error;
        }

    }
   
  
 

?>
    

 














