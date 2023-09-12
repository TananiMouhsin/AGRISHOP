<?php
    session_start();
    $username =$_SESSION['username'] ;

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>profile</title>
    <link rel="website icon" type="png" href="images/logo1.png">
    <!-- <script src="profile.js" defer></script> -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<body>
    <nav>   
        <div class="logo">
            <img src="images/logo1.png" alt="">
            <h2>AGRISHOP</h2>
        </div>
        <div class="navlinks" id="naglinks">
            <ul>

                <li><a href="home.php">home</a></li>
                <li><a href="products.php">products</a></li>
                <li><a href="aboutus.php">about us</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </div>
        <img src="images/hb.png" alt="" class="hb">
    </nav> 

    <!-- ... previous HTML code ... -->

<div class="profile-container">
  <div class="sidebar"> <!-- Corrected class name to "sidebar" -->
    <h2>profile</h2>
    <nav>
      <ul>
        <li><a href="#" data-content="content1">account infos</a></li>
        <li><a href="#" data-content="content2">your products</a></li>
        <li><a href="#" data-content="content3">your orders</a></li>
        <li><a href="#" data-content="content4">add product</a></li>

        <li><a href="logout.php" class="logout-link">logout</a></li>

      </ul>
    </nav>
  </div>

  <div class="contents">
    <div class="content" id="content1" >
      <div class="account-infos">
      <?php


$conn = mysqli_connect('localhost', 'root', '', 'shop');
$username =$_SESSION['username'] ;

$sql = "SELECT * FROM user WHERE Username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  $password = $row['Password'];
  $userid = $row['UserID'];
    

?>
        <form action="profile.php" method="post" id="infosform">
         <div class="infoos"> 
          <div>
          <label for="username">username</label>
          <input type="text" name="username" class="userinput" value=<?php echo $row['Username']; ?>>
          </div>
          <div>
          <label for="username" class="secin1">email</label>
          <input type="text" name="email" class="userinput" value=<?php echo $row['Email']; ?> ><br>
          </div>
          <div>
          <label for="username">phone number</label>
          <input type="number" name="phone" class="userinput" value=<?php echo $row['PhoneNumber']; ?> ><br>
          </div>
          </div>

          <input type="submit" name="changeinfos" value="change infos" class="changeinfos">
          <!-- <button>change infos </button> -->
          
          <h3>change password ? </h3>
          <div class="infoos">
          <div>
          <label for="oldpassword">old password</label>
          <input type="passowrd" class="userinput" name="oldpassword"><br>
          </div>
          <div>
          <label for="passowrd">new password</label>
          <input type="password" class="userinput"  name="newpassword">
          </div>
          <div>
          <label for="cpassword"  class="secin">confirme password</label>
          <input type="password" class="userinput" name="confirmpassword"><br>
          </div>
          </div>
          <input type="submit" name="changepassword" value="change password" class="changeinfos">
        <!-- <button>change password </button> -->
        
        </form>


        <?php }?>
      </div>  

    </div>

    <div class="content" id="content2" style="display: none;">
     <div class="your-products">
     <?php
          $conn = mysqli_connect('localhost', 'root', '', 'shop');
          $sql = "SELECT * FROM product where UserID=$userid";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {

          ?>

            <div class="product-card">  
                <?php echo "<img src='images/" . $row['img1'] . "' >";?>
                <div class="card1">
                    <a href="productdetails.php?id=<?php echo $row['ProductID'] ?>  ">see more!</a>
                </div>
                <a  href="product.php?id=<?php echo $row['ProductID'] ?>  "class="product-name"><?php echo $row['Title']; ?></a>
                <p class="product-description"><?php echo $row['ProductID']; ?></p>
                <p class="product-description"><?php echo $row['Description']; ?></p>
                <div class="price">price: $<?php echo  $row['Price']; ?></div>
                
            </div>
        
                  <?php }?>
    </div>  

      
      

    </div>

    <div class="content" id="content3" style="display: none;">
      <div class="orders">
      <?php
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    $sql = "SELECT p.Title, p.Price, p.img1, o.quantity
            FROM orders o
            INNER JOIN product p ON o.productid = p.ProductID
            WHERE o.UserID = $userid";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
?>

<div class="order">
    <div>
    <?php echo "<img src='images/" . $row['img1'] . "' >";?>
    </div>
    <div class="orderinfos">
        <h4><?php echo $row['Title']; ?></h4>
        <p>Price: $<?php echo $row['Price']; ?></p>
        <p>Quantity: <?php echo $row['quantity']; ?></p>
    </div>
</div>
<?php } ?>
        
      </div>




    </div>

    <div class="content" id="content4" style="display: none;">
        <div class="addproduct">
            <div class="addimages">
                <h2>add images</h2>
                <form action="upload.php"  id="myDropzone" class="dropzone"> 
                <div class="drop-area" id="dropArea" ondrop="dropHandler(event)" ondragover="dragOverHandler(event)">
                     Drop images here (3 images required) 
                  
                     
                </div>
                </form>
                <div>
                    <h4>Image Names:</h4>
                    <ul id="imageNames"></ul>
                </div>
            </div>
            <div class="productinfos">
                <form id="productForm" action="profilephp.php" method="post"  >
                    

                    
                  
                    <label for="product-title">Product Title</label><br>
                    <input type="text" name="product-title" id="product-title"><br>

                    <label for="product-description">Description</label><br>
                    <textarea name="product-description" id="product-description" cols="60" rows="10"></textarea><br>

                    <label for="product-price">Price</label><br>
                    <input type="number" name="product-price" id="product-price"><br>

                    <label for="product-quantity">Quantity</label><br>
                    <input type="number" name="product-quantity" id="product-quantity"><br>

                    <label for="main-category">Main Category:</label><br>
                    <select id="main-category" name="main-category" onchange="updateSubcategories()">
                        <option value="">Main Category</option>
                        <option value="fruits">Fruits</option>
                        <option value="dairy-eggs">Dairy and Eggs</option>
                        <option value="meat-poultry">Meat and Poultry</option>
                        <option value="farm-supplies">Farm Supplies and Equipment</option>
                        <option value="value-added">Value-Added Products</option>
                    </select><br>

                    <label for="sub-category">Subcategory:</label><br>
                    <select id="sub-category" name="sub-category"><br>
                        <option value="">Subcategory</option>
                    </select><br>

                     Hidden input fields for image variables 
                    <input type="hidden" name="img1" id="img1" value="">
                    <input type="hidden" name="img2" id="img2" value="">
                    <input type="hidden" name="img3" id="img3" value="">


                    <input type="submit" name="add_button" class="addproductbtn" value="Add Product" onclick="addProduct()">
                </form>

              
            </div>
        </div>





    </div>  


  </div>
</div>

<!-- ... rest of the HTML code ... -->





















    
    <footer class="footer">
        <div class="containerf">
         <div class="row">
           <div class="footer-col">
             <h4>company</h4>
             <ul>
               <li><a href="home.html">home</a></li>
               <li><a href="signup.html">signup</a></li>
               <li><a href="login.html">login</a></li>
               <li><a href="aboutus.html">about us</a></li>
             </ul>
           </div>
           <div class="footer-col">
             <h4>get help</h4>
             <ul>
               <li><a href="#">FAQ</a></li>
               <li><a href="#">shipping</a></li>
               <li><a href="#">returns</a></li>
               <li><a href="#">order status</a></li>
               <li><a href="#">payment options</a></li>
             </ul>
           </div>
           <div class="footer-col">
             <h4>products </h4>
             <ul>
               <li><a href="#">Meat/Fish</a></li>
               <li><a href="#">Fruits/Vegetables</a></li>
               <li><a href="#">Wool/Cotton</a></li>
               <li><a href="#">Honey/Eggs</a></li>
             </ul>
           </div>
           <div class="footer-col">
             <h4>follow us</h4>
             <div class="social-links">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-linkedin-in"></i></a>
             </div>
           </div>
         </div>
        </div>
     </footer>    


     <script src="profile.js">
 

     </script>
</body>
</html>
<?php
  
//     $username =$_SESSION['username'] ;

    
//     // Form submission handling
//     if (isset($_POST['changeinfos'])) {
//       // Retrieve the updated information from the form fields
//       $newUsername = $_POST['username'];
//       $newEmail = $_POST['email'];
//       $newPhoneNumber = $_POST['phone'];

//       // Re-establish the database connection if needed
//       $conn = mysqli_connect('localhost', 'root', '', 'shop');

//       // Execute an UPDATE SQL query to update the information in the user table
//       $updateSql = "UPDATE user SET Username = ?, Email = ?, PhoneNumber = ? WHERE Username = ?";
//       $updateStmt = $conn->prepare($updateSql);
//       $updateStmt->bind_param("ssss", $newUsername, $newEmail, $newPhoneNumber, $username);
//       if ($updateStmt->execute()) {
//         $_SESSION['username']=$newUsername;
//         header("Location: profile.php");

//       } else {
//           echo "Error updating information: " . $conn->error;
//       }
//   }




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
//   if (isset($_POST['add_button'])) {
//     $conn = mysqli_connect('localhost', 'root', '', 'shop');
//     $productTitle = $_POST['product-title'];
//     $productDescription = $_POST['product-description'];
//     $productPrice = $_POST['product-price'];
//     $mainCategory = $_POST['main-category'];
//     $subCategory = $_POST['sub-category'];
//     // The three image variables from JavaScript hidden inputs
//     $img1 = $_POST['img1'];
//     $img2 = $_POST['img2'];
//     $img3 = $_POST['img3'];
    

    

//     $sql = "INSERT INTO product (UserID,Title, Description,Price,MainCategory,SubCategory, img1, img2, img3) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("sssdsssss", $userid,$productTitle, $productDescription, $productPrice, $mainCategory, $subCategory, $img1, $img2, $img3);

//     if ($stmt->execute()) {
//         echo "Product added successfully!";
//     } else {
//         echo "Error adding product: " . $conn->error;
//     }


//   }

$username =$_SESSION['username'] ;
$userid = $_SESSION['userid'];
include("conect.php");


// Form submission handling
if (isset($_POST['changeinfos'])) {
  // Retrieve the updated information from the form fields
  $newUsername = $_POST['username'];
  $newEmail = $_POST['email'];
  $newPhoneNumber = $_POST['phone'];

  // Re-establish the database connection if needed
  $conn = mysqli_connect('localhost', 'root', '', 'shop');

  // Execute an UPDATE SQL query to update the information in the user table
  $updateSql = "UPDATE user SET Username = ?, Email = ?, PhoneNumber = ? WHERE Username = ?";
  $updateStmt = $conn->prepare($updateSql);
  $updateStmt->bind_param("ssss", $newUsername, $newEmail, $newPhoneNumber, $username);
  if ($updateStmt->execute()) {
    $_SESSION['username']=$newUsername;
    header("Location: profile.php");

  } else {
      echo "Error updating information: " . $conn->error;
  }
}
if (isset($_POST['changepassword'])) {
  $oldPassword = $_POST['oldpassword'];
  $newPassword = $_POST['newpassword'];
  $confirmPassword = $_POST['confirmpassword'];

  // Verify the old password against the hashed password in the database
  $verifyPasswordSql = "SELECT Password FROM user WHERE Username = ?";
  $verifyPasswordStmt = $conn->prepare($verifyPasswordSql);
  $verifyPasswordStmt->bind_param("s", $username);
  $verifyPasswordStmt->execute();
  $verifyPasswordStmt->bind_result($hashedPassword);

  if ($verifyPasswordStmt->fetch() && password_verify($oldPassword, $hashedPassword)) {
      $verifyPasswordStmt->close(); // Close the old statement

      // Check if the new password and confirm password match
      if ($newPassword === $confirmPassword) {
          // Hash the new password before storing it in the database
          $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

          // Execute an UPDATE SQL query to update the password in the user table
          $updatePasswordSql = "UPDATE user SET Password = ? WHERE Username = ?";
          $updatePasswordStmt = $conn->prepare($updatePasswordSql);
          $updatePasswordStmt->bind_param("ss", $hashedNewPassword, $username);

          if ($updatePasswordStmt->execute()) {
              echo '<script>alert("Password updated successfully!");</script>';
              
          } else {
              echo "Error updating password: " . $conn->error;
          }
          
          $updatePasswordStmt->close(); // Close the update statement
      } else {
      
          echo '<script>alert("New password and confirm password do not match.");</script>';
      }
  } else {

      echo '<script>alert("Old password is incorrect.");</script>';
  }
}
    ?>