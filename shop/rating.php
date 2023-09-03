<?php
session_start();
include("conect.php");
$userid = $_SESSION['userid'];
    
// Check if the form is submitted and the userRating data is sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userRating'])) {
    // Get the userRating value from the form submission
    $userRating = $_POST['userRating'];

    // Now you can use $userRating in your PHP code as needed
    // For example, you could store it in a database or use it for some calculations, etc.

    // For this example, let's just display the value received from JavaScript
   
    

    if (isset($_POST["submitcomment"])) {
        $comment = $_POST["comment"];
        $username =$_SESSION['username'] ;
        $productid = $_GET['id'];

        $sql = "INSERT INTO CommentRating (username,Rating, Comment,ProductID,Date) 
        VALUES ('$username','$userRating', '$comment','$productid',now())";
        // mysqli_query($conn,$sql);
        if (mysqli_query($conn, $sql)) {
            header("Location: product.php?id=$productid");
            
        } else {
            echo "Error: " . $sqli . "<br>" . mysqli_error($conn);
        }
    }
}

if(isset($_POST["buynow"])){
    
    $productnumber = $_POST["quantity"];
    $productid = $_GET['id'];
    

    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $address = $_POST["address"];
    $quantity = $_POST["quantity"];
    $postal = $_POST["postal"];
    
    $sqli = "INSERT INTO orders (userid ,productid,quantity,firstname,lastname,email,phonenumber,address,codepostal)
            values('$userid','$productid','$quantity','$first ','$last','$email','$phone','$address','$postal')";

    
    if ($conn->query($sqli) === TRUE) {
        header("Location: product.php?id=$productid");

    } else {
        echo "Error: " . $sqli . "<br>" . $conn->error;
    }

}
?>