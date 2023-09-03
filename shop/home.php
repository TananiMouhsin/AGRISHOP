<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="website icon" type="png" href="images/logo1.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head >
<body class="home">
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
    <div class="d">
    <h1 >Transforming the way you buy and sell agricultural products 
        <br> Discover the power of <span>Agrishop</span> today!</h1>
        <h3>Join our thriving community of farmers and buyers, and experience the future of <span>agricultural</span> commerce</h3>
    </div>
    <div class="cards">
        <div class="sell">
            <img src="images/sell.jpeg" alt="">
            <h2>Maximize Your Reach, Boost Your Sales</h2>
            <p>Tap into a vast network of potential buyers by logging in now. Showcase your agricultural products and 
                reach customers eager to purchase from you. Start selling and grow your business today!</p>
            <div class="card">
                <h2>Sell Your Products now</h2>
                <a href="profile.php">sell now!</a>
            </div>
        </div>
        <div class="buy">
            <img src="images/buy.jpeg" alt="">
            <h2>Discover a World of Agricultural Delights</h2>
            <p> Find the finest selection of agricultural products from trusted sellers. Login to explore a diverse range of 
                farm-fresh produce, equipment, and supplies. Fulfill your farming needs effortlessly with Agrishop</p>
            <div class="card">
                <h2> Buy What You Need now</h2>
                <a href="products.php">shop now!</a>
            </div>
        </div>
    </div>  
    <!-- <div class="d">
      <h2>Agric Shop: Your Ultimate <span>Agricultural</span> Wonderland for Every Farmer's Dream!</h2>
    </div> -->

    <div class="prod">
        <div class="prodt">
            <h2>Unveiling <span>Nature's </span>Bounty: Explore a Thriving Marketplace of <span>Agricultural Products!</span></h2>
            <p>At <span>Agrishop</span>, we bring you a vast and diverse assortment of <span>agricultural products</span>, catering to 
                all your <span>farming needs</span>. Our platform serves as a hub for everything <span>agriculture</span>, offering an 
                extensive range of <span>farm-fresh produce</span>, including an assortment of <span>fruits, vegetables, grains, 
                and dairy products</span>. Additionally, we showcase agricultural equipment, machinery, and tools to 
                enhance farming operations. From organic fertilizers to premium seeds, we have it all! Whether 
                you're a farmer looking to sell your harvest or a buyer in search of the finest quality produce 
                and supplies, <span>Agrishop</span>is your destination for all <span>agriculture products</span>. Join us today to explore 
                the bounty of agricultural commerce!</p>

        </div>
        <img src="images/prod.jpeg" alt="">
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
              const menuHamburger = document.querySelector(".hb")
        const navLinks = document.querySelector(".navlinks")
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('active')
        })
     </script>   
</body>
</html>