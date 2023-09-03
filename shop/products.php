<!DOCTYPE html>
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
                session_start(); 
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="profile.php">profile</a></li>';
                } else {
                    echo '<li><a href="login.html">login</a></li>';
                }
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
          $conn = mysqli_connect('localhost', 'root', '', 'shop');
          $sql = "SELECT * FROM product ";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {

          ?>

          
            <div class="product-card">
                <?php echo "<img src='images/" . $row['img1'] . "' >";?>
                <div class="card1">
                    <a href="product.php?id=<?php echo $row['ProductID'] ?> ">see more!</a>
                </div>
                <a  href="product.php?id=<?php echo $row['ProductID'] ?>  "class="product-name"><?php echo $row['Title']; ?></a>
                
                <p class="product-description"><?php echo $row['Description']; ?></p>
                <div class="price">price: $<?php echo  $row['Price']; ?></div>
                
            </div>


          <?php }?>
              
              

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
</html>