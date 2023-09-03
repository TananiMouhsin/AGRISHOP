<?php   

session_start();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Document</title>
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
                <li><a href="profile.php">profile</a></li>

            </ul>
        </div>
        <img src="images/hb.png" alt="" class="hb">  
    </nav> 

    <!-- ... previous HTML code ... -->

  


        
          

                <div class="commands">
                  <h2>product's orders</h2>
                    <table>
                      <tr>
                        <th>product</th>
                        <th>first name</th>
                        <th>last name</th>
                        <th>email</th>
                        <th>phone number</th>
                        <th>adress</th>
                        <th>code postal</th>
                        <th>quantity</th>
                      </tr>

                      <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'shop');
                        $productid = $_GET['id'];
                        $sql = "SELECT o.*, p.title 
                        FROM orders o
                        JOIN product p ON o.productid = p.productid
                        WHERE o.productid = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('i', $productid);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($row = $result->fetch_assoc()) {

                      ?>
                      <tr>
                        <td><?php echo $row['title'] ?> </td>
                        <td><?php echo $row['firstname'] ?> </td>
                        <td><?php echo $row['lastname'] ?> </td>
                        <td><?php echo $row['email'] ?> </td>
                        <td><?php echo $row['phonenumber'] ?> </td>
                        <td><?php echo $row['address'] ?>  </td>
                        <td><?php echo $row['codepostal'] ?> </td>
                        <td><?php echo $row['quantity'] ?> </td>
                      </tr>
                      <?php }?>
                    </table>
                    
                    
                </div>
                <div class="modify">
                <div class="addproduct">
                  <?php


                    $conn = mysqli_connect('localhost', 'root', '', 'shop');


                    $sql = "SELECT * FROM product WHERE ProductID =?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $productid);
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {

    

                  ?>
                  
                  <div class="addimages">
                      <h2>add images</h2>
                      <div class="drop-area" id="dropArea" ondrop="dropHandler(event)" ondragover="dragOverHandler(event)">
                          Drop images here (3 images required)
                      </div>
                      <div>
                          <h4>Image Names:</h4>
                          <ul id="imageNames"></ul>
                      </div>
                  </div>
                  <div class="productinfos">
                
                  <form id="productForm" action="productdetails.php?id=<?php echo $row['ProductID'] ?>  " method="post">

                      <label for="product-title">Product Title</label><br>
                      <input type="text" name="product-title" id="product-title" value="<?php echo $row['Title'] ?> "><br>

                      <label for="product-description">Description</label><br>
                      <textarea name="product-description" id="product-description" cols="60" rows="10" ><?php echo $row['Description'] ?></textarea><br>

                      <label for="product-price">Price</label><br>
                      <input type="text" name="product-price" id="product-price" value="<?php echo $row['Price'] ?> " ><br>

                      <label for="product-quantity">Quantity</label><br>
                      <input type="text" name="product-quantity" id="product-quantity" value="<?php echo $row['Quantity'] ?> " ><br>

                      <label for="main-category">Main Category:</label><br>
                      <select id="main-category" name="main-category" onchange="updateSubcategories()">
                          <option value=""><?php echo $row['MainCategory'] ?></option>
                          <option value="fruits">Fruits</option>
                          <option value="dairy-eggs">Dairy and Eggs</option>
                          <option value="meat-poultry">Meat and Poultry</option>
                          <option value="farm-supplies">Farm Supplies and Equipment</option>
                          <option value="value-added">Value-Added Products</option>
                      </select><br>

                      <label for="sub-category">Subcategory:</label><br>
                      <select id="sub-category" name="sub-category"><br>
                          <option value=""><?php echo $row['SubCategory'] ?></option>
                      </select><br>

                      <?php }?>
                      <!-- Hidden input fields for image variables -->
                      <input type="hidden" name="img1" id="img1" value="">
                      <input type="hidden" name="img2" id="img2" value="">
                      <input type="hidden" name="img3" id="img3" value="">


                      <input type="submit" name="change_button" class="addproductbtn" value="submit changes" >
                      <!-- onclick="addProduct()" -->
                  </form>
                </div>
              </div>
            </div>
               

           
        
    























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



     <script >
                    const menuHamburger = document.querySelector(".hb")
        const navLinks = document.querySelector(".navlinks")
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('active')
        })
 

 </script>
</body>
</html>
<?php   


if (isset($_POST['change_button'])) {
  // Retrieve the updated information from the form fields
  $title = $_POST['product-title'];
  $desciption = $_POST['product-description'];
  $price = $_POST['product-price'];
  $quantity = $_POST['product-quantity'];
  $main = $_POST['main-category'];
  $sub = $_POST['sub-category'];


  // Re-establish the database connection if needed
  $conn = mysqli_connect('localhost', 'root', '', 'shop');

  // Execute an UPDATE SQL query to update the information in the user table
  $updateSql = "UPDATE product SET Title = ?, Description = ?, Price = ?, Quantity = ?,MainCategory = ?, SubCategory = ? WHERE ProductID = ?";
  $updateStmt = $conn->prepare($updateSql);
  $updateStmt->bind_param("sssssss", $title, $desciption, $price,$quantity,$main,$sub, $productid);
  if ($updateStmt->execute()) {
    $_SESSION['username']=$newUsername;
    header("Location: profile.php");

  } else {
      echo "Error updating information: " . $conn->error;
  }
}



?>