<?php
session_start();

$productid = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'shop');  

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT Rating FROM commentrating WHERE ProductID = $productid";
$result = $conn->query($sql);

$totalRatings = 0;
$totalUsersRated = 0;

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $totalRatings += $row['Rating'];
    $totalUsersRated++;
}
}

// Calculate average rating
$averageRating = ($totalUsersRated > 0) ? ($totalRatings / $totalUsersRated) : 0;

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>product</title>
    <link rel="website icon" type="png" href="images/logo1.png">
    <style>
 
    </style>
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
    <?php


          $conn = mysqli_connect('localhost', 'root', '', 'shop');
          $productid = $_GET['id'];
          $sql = "SELECT * FROM product WHERE ProductID = $productid";
          $result = $conn->query($sql);
            if($row = $result->fetch_assoc()) {
              $maincategory=$row['MainCategory'];

?>
          <div class="divxxx" id="xx">
            <div class="buyinfos" id="popupDiv">
              
            
              
              <!-- <div class="image"> -->
                <div class="buyimg">
                <img src="images/ssho.png" alt="">
                </div>
              <!-- </div> -->
              <form action="rating.php?id=<?php echo $productid; ?>" method="post" id="buyform">
                <!-- <div class="infos"> -->
                  <div class="inf1">
                  <h3>personal informations </h3>
                  <div class="inps">

                    <div class="inf">
                      <label for="">first name</label>
                      <input type="text" name="first">
                    </div>

                    <div class="inf">
                      <label for="">last name</label>
                      <input type="text" name="last">
                    </div>

                  </div>


                  <div class="inps">
                    <div class="inf">
                      <label for="">email</label><br>
                      <input type="text" name="email">
                    </div>

                    <div class="inf">
                      <label for="">phone number</label><br>
                      <input type="number" name="phone">
                    </div>

                  </div>
                  </div>
                  <div class="inf1">
                  <h3> shipping informations</h3>
                  <div class="inps">
                    <div class="inf">
                      <label for="">quantity</label>
                      <input type="number"name="quantity">

                    </div>
                    <div class="inf">
                      <label for="">shipping address</label>
                      <input type="text" name="address">
                    </div>

                    <div class="inf">
                      <label for="">code postal</label>
                      <input type="number" name="postal">
                    </div>
                  
                  </div>
                  <input type="submit" name="buynow" value="buy now " class="buybtn">
                  </div>
                  <!-- </div> -->
                </form> 
                <span id="closeButton">&times;</span>
                

            </div>
          </div>
        
<div class="product">
        <div class="gallery-container">
            <div class="main-image">
            
            <?php echo "<img src='images/". $row['img1'] ."'    alt='Main Image' id='main-img'>";?>
            </div>
            <div class="thumbnail-images">
            
            <?php echo '<img src="images/' . $row['img1'] . '" alt="Thumbnail 1" onclick="changeImage(\'images/' . $row['img1'] . '\')">';
                echo '<img src="images/' . $row['img2'] . '" alt="Thumbnail 2" onclick="changeImage(\'images/' . $row['img2'] . '\')">';
                echo '<img src="images/' . $row['img3'] . '" alt="Thumbnail 3" onclick="changeImage(\'images/' . $row['img3'] . '\')">';;
            ?>

            </div>
        </div>

        <div class="product-info">
          <p class="categorys"><?php echo $row['MainCategory']; ?>    /  <?php echo $row['SubCategory']; ?></p>
            <h1><?php echo $row['Title']; ?></h1>
            <div class="ratingsss">
            <?php
                            $rating = intval($averageRating); // Convert rating to an integer
                              for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<span >&#9733;</span>'; // Filled star
                                } else {
                                    echo '<span >&#9734;</span>'; // Empty star
                                }
                                }
                        ?>
              <div class="rrr">
                <p><?php echo $totalUsersRated; ?> ratings </p>
              </div>
            </div>
            
            

            <h3>Product Details</h3>
            <p><?php echo $row['Description']; ?>
            </p>
            
              <input type="number" name="products-number" class="number"><br>
              <h3>Quantity : <?php echo $row['Quantity']; ?></h3>
              <h2>Price : $<?php echo $row['Price']; ?></h2>  
              <input type="submit" name="buy" value="buy now" class="buynow"  id="popupButton">
            <!-- </form> -->

        </div>
    </div>


<?php }?>


    <div class="fp">
      <h1>Featured Products</h1>
    </div>
    
    <div class="products-rec">
      
    <?php
          
          $conn = mysqli_connect('localhost', 'root', '', 'shop');
          $sql = "SELECT * FROM product WHERE MainCategory = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $maincategory);
          
          // Execute the prepared statement
          $stmt->execute();
          
          // Get the result
          $result = $stmt->get_result();
          $counter = 0;
          while($row = $result->fetch_assoc()) {
            if ($counter >= 4) {
              break;
            }
            $counter++;
          ?>




      <div class="product-cardr">
      <?php echo "<img src='images/" . $row['img1'] . "' >";?><br>
        <a  href="product.php?id=<?php echo $row['ProductID'] ?>" ><?php echo $row['Title']; ?></a>
        <p><?php echo $row['Description']; ?></p>
        <h3>$<?php echo $row['Price']; ?></h3>
        <button>see more!</button>
      </div>



      <?php }?>


    </div>
    

    <div class="rating-container">
      <div class="comment-container">
      <h2>Customer Reviews </h2>
        <div class="comments">
        
        `      <?php
          $conn = mysqli_connect('localhost', 'root', '', 'shop');
          $sql = "SELECT * FROM CommentRating where ProductID=$productid";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {

          ?>
          <div class="comment">
            


                  <div class="username-date">
                    <h3 class="username" > <?php echo $row['username']; ?></h3>

                    <p class="date" ><?php echo $row['Date']; ?></p>
                  </div>
                  <div class="rating-stars">
                        <?php
                            $rating = intval($row['Rating']); // Convert rating to an integer
                              for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<span class="star">&#9733;</span>'; // Filled star
                                } else {
                                    echo '<span class="star">&#9734;</span>'; // Empty star
                                }
                                }
                        ?>
                  </div>
                  
                  <p class="comment-text"  ><?php echo $row['Comment']; ?></p>
                
          </div>

            <?php }?>

        </div>



        <div class="comment-input">
          

        
        
        <?php
                
                if (isset($_SESSION['username'])) {
                  ?>
                  <div class="rating">
          <span class="star" data-value="1">&#9733;</span>
          <span class="star" data-value="2">&#9733;</span>
          <span class="star" data-value="3">&#9733;</span>
          <span class="star" data-value="4">&#9733;</span>
          <span class="star" data-value="5">&#9733;</span>
        </div>
                  <form action="rating.php?id=<?php echo $productid; ?>" method="post" id="ratingForm">
                  <input type="hidden" name="userRating" value="">
                  
                  <input type="text"  class="inputcomment" name="comment" placeholder="add comment...">
                  <input type="submit" class="submitcomment" name="submitcomment" value="submit rating" onclick="submitRating()">
                </form> 
                <?php
                } else {
                   echo " <h3 class='hh33'>to add your review you need to <a href='login.html'> login </a> first </h3> ";
                }
                ?>
        
          <!-- <input type="text" name="comment" class="inputcomment" placeholder="add comment...">
          <input type="submit" name="commentbtn"class="submitcomment"> -->
        </div>





      </div>

   


            <!-- HTML structure -->
            <div class="rating-infos">
                <div class="infr">
                    <h2>Total Reviews</h2>
                    <h2><?php echo $totalUsersRated; ?></h2>
                    <p>Growth in reviews this year</p>
                </div>

                <div class="infr">
                    <h2>Average Rating</h2>
                    <h2><?php echo number_format($averageRating, 1); ?></h2>
                    <div class="ratingss">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            $filled = ($i <= $averageRating) ? 'filled' : '';
                            
                            
                                $rating = $averageRating; // Convert rating to an integer
                                  for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<span class="star">&#9733;</span>'; // Filled star
                                    } else {
                                        echo '<span class="star">&#9734;</span>'; // Empty star
                                    }
                                    }
                           
                       
                        }
                        ?>
                    </div>
                    <p>Average rating on this year</p>
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
    <script>
        function
        
      changeImage(imageSrc) {
      const mainImage = document.getElementById('main-img');
      mainImage.src = imageSrc;
      }




const stars = document.querySelectorAll('.star');
    let userRating = 0;

    stars.forEach(star => {
      star.addEventListener('click', () => {
        userRating = parseInt(star.dataset.value);
        updateStars();
      });
    });

    function updateStars() {
      stars.forEach(star => {
        const value = parseInt(star.dataset.value);
        star.classList.toggle('checked', value <= userRating);
      });
      
      // Update the hidden input field value with the selected rating
      document.querySelector('input[name="userRating"]').value = userRating;
    }

    function submitRating() {
      console.log('User rating:', userRating);

      // Manually submit the form after updating the rating value
      document.getElementById('ratingForm').submit();
    }


    const popupButton = document.getElementById('popupButton');
const xx = document.getElementById('xx');
const popupDiv = document.getElementById('popupDiv');
const closeButton = document.getElementById('closeButton');
const body = document.body;

popupButton.addEventListener('click', function() {
  // Scroll to the top of the page
  window.scrollTo(0, 0);

  popupDiv.style.display = 'flex';
  xx.style.display = 'flex';
  body.classList.add('noscroll');
});

closeButton.addEventListener('click', function() {
  popupDiv.style.display = 'none';
  xx.style.display = 'none';
  body.classList.remove('noscroll');
});
const menuHamburger = document.querySelector(".hb")
        const navLinks = document.querySelector(".navlinks")
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('active')
        })

    </script>
</body>
</html>

