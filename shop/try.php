<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>products</title>
    <link rel="website icon" type="png" href="images/logo1.png">
</head>
<body>
    <nav >   
        <div class="logo">
            <img src="images/logo1.png" alt="">
            <h2>AGRISHOP</h2>
        </div>
        <div class="navlinks" id="naglinks">
            <ul>

                <li><a href="home.php">home</a></li>
                <li><a href="products.php">products</a></li>
                <li><a href="aboutus.php">about us</a></li>
                <?php
                // session_start(); 
                // if (isset($_SESSION['username'])) {
                //     echo '<li><a href="profile.php">profile</a></li>';
                // } else {
                //     echo '<li><a href="login.html">login</a></li>';
                // }
                ?>

            </ul>
        </div>
        <img src="images/hb.png" alt="" class="hb">
        
    </nav>

  <div class="container-nav-products">   
        <nav class="navp">
            <div class="categories">
            <div class="category" onclick="toggleSubCategories(this)">
              <p><span class="arrow"></span>Produce</p>
                <div class="sub-categories">
                <div class="sub-category">Fruits</div>
                <div class="sub-category">Vegetables</div>
                <div class="sub-category">Grains</div>
                <div class="sub-category">Herbs</div>
                <div class="sub-category">Nuts</div>
                <div class="sub-category">Spices</div>
                </div>
            </div>
            <div class="category" onclick="toggleSubCategories(this)">
              <p><span class="arrow"></span>Dairy and Eggs</p>
                <div class="sub-categories">
                <div class="sub-category">Milk</div>
                <div class="sub-category">Cheese</div>
                <div class="sub-category">Butter</div>
                <div class="sub-category">Yogurt</div>
                <div class="sub-category">Eggs</div>
                </div>
            </div>
            <div class="category" onclick="toggleSubCategories(this)">
            <p><span class="arrow"></span>Meat and Poultry</p>
                <div class="sub-categories">
                <div class="sub-category">Beef</div>
                <div class="sub-category">Chicken</div>
                <div class="sub-category">Lamb</div>
                <div class="sub-category">Pork</div>
                <div class="sub-category">Turkey</div>
                </div>
            </div>
            <div class="category" onclick="toggleSubCategories(this)">
            <p><span class="arrow"></span>Farm Supplies and Equipment</p>
                <div class="sub-categories">
                <div class="sub-category">Seeds</div>
                <div class="sub-category">Fertilizers</div>
                <div class="sub-category">Irrigation Systems</div>
                <div class="sub-category">Farm Machinery</div>
                <div class="sub-category">Gardening Tools</div>
                <div class="sub-category">Pest Control Products</div>
                </div>
            </div>
            <div class="category" onclick="toggleSubCategories(this)">
            <p><span class="arrow"></span>Value-Added Products</p>
                <div class="sub-categories">
                <div class="sub-category">Honey</div>
                <div class="sub-category">Jams and Preserves</div>
                <div class="sub-category">Pickles</div>
                <div class="sub-category">Sausages and Charcuterie</div>
                <div class="sub-category">Baked Goods (using farm produce)</div>
                </div>
            </div>
            </div>
        </nav>
        <div class="products">
          <?php
          // $conn = mysqli_connect('localhost', 'root', '', 'shop');
          // $sql = "SELECT * FROM product ";
          // $result = $conn->query($sql);
          // while($row = $result->fetch_assoc()) {

          ?>

          
            <div class="product-card">
                <?php
                //  echo "<img src='images/" . $row['img1'] . "' >";
                 ?>
                <div class="card1">
                    <a href="product.php?id=<?php
                    //  echo $row['ProductID']
                      ?> ">see more!</a>
                </div>
                <a  href="product.php?id=<?php
                //  echo $row['ProductID']
                  ?>  "class="product-name"><?php 
                  // echo $row['Title']; 
                  ?></a>
                
                <p class="product-description"><?php 
                // echo $row['Description']; ?></p>

                <div class="price">price: $<?php 
                // echo  $row['Price']; ?></div>
                
            </div>


          <?php
        //  }?>
              
              

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

  <script>
    function toggleSubCategories(category) {
      const subCategories = category.querySelector(".sub-categories");
      const arrow = category.querySelector(".arrow");

      if (subCategories.style.display === "none") {
        subCategories.style.display = "flex";
        arrow.classList.add("expanded");
      } else {
        subCategories.style.display = "none";
        arrow.classList.remove("expanded");
      }
    }

    const menuHamburger = document.querySelector(".hb")
        const navLinks = document.querySelector(".navlinks")
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('active')
        })
  </script>
    
</body>
</html> -->








<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles.css">  You can create a CSS file for styling 
    <style>
        .dropzone{
            border:2px solid black  ;
            padding :100px ;
        }
    </style>
</head>
<body>
    <form id="productForm" action="try.php" method="post" enctype="multipart/form-data">
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

        <label for="image-upload">Upload Images (Drag and Drop or Click)</label><br>
        <div id="image-dropzone" class="dropzone">
            Drop images here or click to upload
        </div>
        <input type="hidden" name="img1" id="img1" value="">
        <input type="hidden" name="img2" id="img2" value="">
        <input type="hidden" name="img3" id="img3" value="">

        <input type="submit" name="add_button" class="addproductbtn" value="Add Product">
    </form>

    <script>
        // Function to handle image dropzone
function handleImageDropzone() {
    const dropzone = document.getElementById('image-dropzone');
    const imgInputs = ['img1', 'img2', 'img3'];

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach((eventName) => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    // Highlight drop area when image is dragged over it
    ['dragenter', 'dragover'].forEach((eventName) => {
        dropzone.addEventListener(eventName, () => {
            dropzone.classList.add('highlight');
        });
    });

    // Remove highlight when image is dragged out of drop area
    ['dragleave', 'drop'].forEach((eventName) => {
        dropzone.addEventListener(eventName, () => {
            dropzone.classList.remove('highlight');
        });
    });

    // Handle dropped images
    dropzone.addEventListener('drop', (e) => {
        dropzone.classList.remove('highlight');
        const files = e.dataTransfer.files;

        if (files.length > 3) {
            alert('You can only upload up to 3 images.');
            return;
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const imgInputId = imgInputs[i];
            const formData = new FormData();

            formData.append('image', file);

            // Upload image via AJAX (you can use a library like Axios here)
            // Example using vanilla JavaScript:
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Store the image name in the hidden input
                        document.getElementById(imgInputId).value = response.filename;
                    } else {
                        alert('Image upload failed.');
                    }
                }
            };
            xhr.send(formData);
        }
    });
}

// Initialize the image dropzone
handleImageDropzone();

    </script>
</body>
</html>
<?php
// if (isset($_POST['add_button'])) {
//     $conn = mysqli_connect('localhost', 'root', '', 'shop');
//     $productTitle = $_POST['product-title'];
//     $productDescription = $_POST['product-description'];
//     $productPrice = $_POST['product-price'];
//     $productQuantity = $_POST['product-quantity'];
//     $mainCategory = $_POST['main-category'];
//     $subCategory = $_POST['sub-category'];

//     // The three image variables from hidden inputs
//     $img1 = $_POST['img1'];
//     $img2 = $_POST['img2'];
//     $img3 = $_POST['img3'];

//     // Destination folder for uploaded images
//     $uploadDirectory = 'images/';

//     // Move uploaded images to the destination folder
//     $img1Path = $uploadDirectory . basename($img1);
//     $img2Path = $uploadDirectory . basename($img2);
//     $img3Path = $uploadDirectory . basename($img3);

//     // Move the images
//     if (
//         move_uploaded_file($_FILES['image1']['tmp_name'], $img1Path) &&
//         move_uploaded_file($_FILES['image2']['tmp_name'], $img2Path) &&
//         move_uploaded_file($_FILES['image3']['tmp_name'], $img3Path)
//     ) {
//         // Insert product data into the database with image paths
//         $sql = "INSERT INTO product (UserID, Title, Description, Price, Quantity, MainCategory, SubCategory, Img1, Img2, Img3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("ssssssssss", $userid, $productTitle, $productDescription, $productPrice, $productQuantity, $mainCategory, $subCategory, $img1Path, $img2Path, $img3Path);

//         if ($stmt->execute()) {
//             header("Location: profile.php");
//         } else {
//             echo "Error adding product: " . $conn->error;
//         }
//     } else {
//         echo "Error moving uploaded images to the destination folder.";
//     }
// }
?> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>

    <!-- Include Dropzone.js from a CDN 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" rel="stylesheet">

    <style>
        #image-dropzone {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer; /* Add cursor style for drop zone */
        }
    </style>
</head>
<body>
    <form id="imageForm" action="<?php 
    // echo $_SERVER['PHP_SELF']; ?>" class="dropzone" enctype="multipart/form-data">
        <div class="fallback">
            <input type="file" name="images[]" id="images" accept="image/*" multiple>
        </div>
        <input type="submit" name="upload_button" value="Upload Images">
    </form>

    <script>
        // Function to handle image drop zone
        function handleDrop(event) {
            event.preventDefault();
            let files = event.dataTransfer.files;

            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                // You can add more validation for file types and size here

                // Display the selected file names
                document.getElementById('image-dropzone').innerHTML += `<p>${file.name}</p>`;
            }
        }

        function allowDrop(event) {
            event.preventDefault();
        }

        // Trigger file input when clicking the drop zone
        document.getElementById('image-dropzone').addEventListener('click', () => {
            document.getElementById('images').click();
        });

        // Set up event listeners for the drop zone
        document.getElementById('image-dropzone').addEventListener('dragover', allowDrop);
        document.getElementById('image-dropzone').addEventListener('drop', handleDrop);
    </script>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>