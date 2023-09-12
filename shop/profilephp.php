<?php
    session_start();
    $username =$_SESSION['username'] ;
    $userid = $_SESSION['userid'];
    include("conect.php");

    
    // Form submission handling
  //   if (isset($_POST['changeinfos'])) {
  //     // Retrieve the updated information from the form fields
  //     $newUsername = $_POST['username'];
  //     $newEmail = $_POST['email'];
  //     $newPhoneNumber = $_POST['phone'];

  //     // Re-establish the database connection if needed
  //     $conn = mysqli_connect('localhost', 'root', '', 'shop');

  //     // Execute an UPDATE SQL query to update the information in the user table
  //     $updateSql = "UPDATE user SET Username = ?, Email = ?, PhoneNumber = ? WHERE Username = ?";
  //     $updateStmt = $conn->prepare($updateSql);
  //     $updateStmt->bind_param("ssss", $newUsername, $newEmail, $newPhoneNumber, $username);
  //     if ($updateStmt->execute()) {
  //       $_SESSION['username']=$newUsername;
  //       header("Location: profile.php");

  //     } else {
  //         echo "Error updating information: " . $conn->error;
  //     }
  // }




//   if (isset($_POST['changepassword'])) {  
//     $oldPassword = $_POST['oldpassword'];
//     $newPassword = $_POST['newpassword'];
//     $confirmPassword = $_POST['confirmpassword'];

//     // Check if the old password matches the stored password in the database
//     if ($oldPassword === $password) {
//         // Check if the new password and confirm password match
//         if ($newPassword === $confirmPassword) {
//             // Hash the new password before storing it in the database
            

//             // Execute an UPDATE SQL query to update the password in the user table
//             $updatePasswordSql = "UPDATE user SET Password = ? WHERE Username = ?";
//             $updatePasswordStmt = $conn->prepare($updatePasswordSql);
//             $updatePasswordStmt->bind_param("ss", $newPassword, $username);
//             if ($updatePasswordStmt->execute()) {
//               echo '<script>alert("Password updated successfully!");</script>';
            
//             } else {
//                 echo "Error updating password: " . $conn->error;
//             }
//         } else {
//           echo '<script>alert("New password and confirm password do not match.");</script>';
        
//         }
//     } else {
//       echo '<script>alert("Old password is incorrect.");</script>';
//     }
// }





// if (isset($_POST['changepassword'])) {
//   $oldPassword = $_POST['oldpassword'];
//   $newPassword = $_POST['newpassword'];
//   $confirmPassword = $_POST['confirmpassword'];

//   // Verify the old password against the hashed password in the database
//   $verifyPasswordSql = "SELECT Password FROM user WHERE Username = ?";
//   $verifyPasswordStmt = $conn->prepare($verifyPasswordSql);
//   $verifyPasswordStmt->bind_param("s", $username);
//   $verifyPasswordStmt->execute();
//   $verifyPasswordStmt->bind_result($hashedPassword);

//   if ($verifyPasswordStmt->fetch() && password_verify($oldPassword, $hashedPassword)) {
//       $verifyPasswordStmt->close(); // Close the old statement

//       // Check if the new password and confirm password match
//       if ($newPassword === $confirmPassword) {
//           // Hash the new password before storing it in the database
//           $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

//           // Execute an UPDATE SQL query to update the password in the user table
//           $updatePasswordSql = "UPDATE user SET Password = ? WHERE Username = ?";
//           $updatePasswordStmt = $conn->prepare($updatePasswordSql);
//           $updatePasswordStmt->bind_param("ss", $hashedNewPassword, $username);

//           if ($updatePasswordStmt->execute()) {
//               echo '<script>alert("Password updated successfully!");</script>';
//               header("location: profile.php");
//           } else {
//               echo "Error updating password: " . $conn->error;
//           }
          
//           $updatePasswordStmt->close(); // Close the update statement
//       } else {
//         header("location: profile.php");
//           echo '<script>alert("New password and confirm password do not match.");</script>';
//       }
//   } else {
//     header("location: profile.php");
//       echo '<script>alert("Old password is incorrect.");</script>';
//   }
// }



  if (isset($_POST['add_button'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    $productTitle = $_POST['product-title'];
    $productDescription = $_POST['product-description'];
    $productPrice = $_POST['product-price'];
    $productquantity = $_POST['product-quantity'];  
    $mainCategory = $_POST['main-category'];
    $subCategory = $_POST['sub-category'];
  
    // The three image variables from JavaScript hidden inputs
    $img1 = $_POST['img1'];
    $img2 = $_POST['img2'];
    $img3 = $_POST['img3'];
    

    

    $sql = "INSERT INTO product (UserID,Title, Description,Price,Quantity,MainCategory,SubCategory, img1, img2, img3) VALUES (?,?, ?, ?, ?,?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $userid,$productTitle, $productDescription, $productPrice,  $productquantity, $mainCategory, $subCategory, $img1, $img2, $img3);

    if ($stmt->execute()) {
        header("Location: profile.php");
    } else {
        echo "Error adding product: " . $conn->error;
    }


  }


  // if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //     // Database connection
  //     $conn = mysqli_connect('localhost', 'root', '', 'shop');
      
  //     // Product information
  //     $productTitle = $_POST['product-title'];
  //     $productDescription = $_POST['product-description'];
  //     $productPrice = $_POST['product-price'];
  //     $productquantity = $_POST['product-quantity'];
  //     $mainCategory = $_POST['main-category'];
  //     $subCategory = $_POST['sub-category'];
      
  //     // Prepare the SQL statement to insert product information
  //     $sql = "INSERT INTO product (UserID, Title, Description, Price, Quantity, MainCategory, SubCategory, img1, img2, img3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  //     $stmt = $conn->prepare($sql);
  //     $stmt->bind_param("ssssssssss", $userid, $productTitle, $productDescription, $productPrice, $productquantity, $mainCategory, $subCategory, $img1, $img2, $img3);
      
  //     // Image upload
  //     $uploadDir = "images/"; // Folder to store images
  //     $img1 = $img2 = $img3 = ""; // Initialize image variables
      
  //     // Loop through uploaded files
  //     for ($i = 1; $i <= 3; $i++) {
  //         $fileName = $_FILES["img{$i}"]["name"];
  //         $tmpFilePath = $_FILES["img{$i}"]["tmp_name"];
          
  //         if (!empty($fileName)) {
  //             // Generate a unique name for each image
  //             $uniqueName = uniqid() . '_' . $fileName;
  //             $uploadFilePath = $uploadDir . $uniqueName;
              
  //             if (move_uploaded_file($tmpFilePath, $uploadFilePath)) {
  //                 // Store the image file name in the corresponding variable
  //                 ${"img{$i}"} = $uniqueName;
  //             }
  //         }
  //     }
      
  //     // Execute the SQL statement to insert product information
  //     if ($stmt->execute()) {
  //         header("Location: profile.php");
  //     } else {
  //         echo "Error adding product: " . $conn->error;
  //     }
  // }
  ?>

  
    ?>