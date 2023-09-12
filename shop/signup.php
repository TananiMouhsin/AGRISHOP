 <?php
    // include("conect.php");

    // if(isset($_POST["singbtn"])){
    
    //     $username = $_POST["username"];
    //     $email = $_POST["email"];
    //     $phone = $_POST["phone"];
    //     $password = $_POST["password"];
        
    //     $sqli = "INSERT INTO user (Username,Email,PhoneNumber,Password)
    //             values('$username','$email','$phone','$password')";
        
        
        
    //     if ($conn->query($sqli) === TRUE) {
    //         header("Location: login.html");

    //     } else {
    //         echo "Error: " . $sqli . "<br>" . $conn->error;
    //     }

    // }
    include("conect.php");

    if (isset($_POST["singbtn"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
    
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO user (Username, Email, PhoneNumber, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $phone, $hashed_password);
    
        if ($stmt->execute()) {
            header("Location: login.html");
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    $conn->close();
    
  
 

?>
    

 














