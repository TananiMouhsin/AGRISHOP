<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>about us </title>
    <link rel="website icon" type="png" href="images/logo1.png">
</head>
<body >
 
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
    <div class="abt1">
      <div class="abtext1">
        <h1><span>Agrishop</span>: Empowering the Future of Local <span>Agriculture</span></h1>
        <p>
        <span>Welcome to agrishop</span>, an innovative e-commerce platform proudly established by <span>the Direction Régionale de l'Agriculture Guelmim.</span>
           Our primary mission is to bolster local businesses and small shops by providing them with a digital space to showcase and sell their
          <span>agricultural products</span>. With a passion for supporting the community and<span> empowering local farmers,</span> we strive to create a thriving 
            marketplace that fosters sustainable growth and economic opportunities. <span>At Agrishop</span>, we are dedicated to offering buyers access 
            to<span> the finest and freshest produce</span>, ensuring that they receive the best quality products available. Join us on this journey as we
             bridge the gap between sellers and buyers, fostering a stronger, more vibrant <span>agricultural ecosystem</span> for the benefit of all.
        </p>
      </div>
        <img src="images/44444.jpeg" alt="">
        

    </div>

    
      <div class="aboutus-cards"> 
        
        <h2>Growing Together as One: Empowering Local Businesses, Promoting Sustainable Choices,<span> and Ensuring Quality Fresh Produce with  Agrishop !</span></h2>
        <div class="caards">

          <div class="cardd">
            <img src="images/farmericon.png" alt="">
            <h2>Empowering Local Entrepreneurs</h2>
            <p>At Agrishop, we take pride in supporting and empowering local farmers and businesses within your community. Our mission is to provide a robust digital platform that connects these hardworking entrepreneurs with a wider audience. By shopping with us, you contribute to the growth and sustainability of the agricultural sector in your locality. Together, we can create a thriving ecosystem that fosters economic opportunities and uplifts the community.</p>
          </div>

          <div class="cardd">
            <img src="images/shopicon.png" alt="">
            <h2>Empowering Local Entrepreneurs</h2>
            <p> Our vision at Agrishop is to make agriculture accessible and sustainable for everyone. With our user-friendly platform, finding the agricultural products you need becomes a breeze. We believe that making eco-friendly choices should be effortless, and our digital marketplace encourages sustainable practices to protect our planet. As you explore the diverse array of agricultural goods, you become an active participant in driving positive change in the agricultural industry.</p>
          </div>

          <div class="cardd">
            <img src="images/checkicon.png" alt="">
            <h2>The Finest and Freshest Produce</h2>
            <p> Quality is at the heart of everything we do. Agrishop is dedicated to offering you the best quality agricultural products available. Our direct partnerships with local farmers and trusted sellers ensure that every purchase is a guarantee of fresh and top-notch produce. Whether you're seeking succulent fruits, vibrant vegetables, or other agricultural delights, rest assured that Agric Shop provides only the finest options. Trust us to deliver the exceptional quality you deserve.</p>
          </div>
        </div>
      </div>

      <div class="background-image">  
        <div class="backimtext">
          <h1>Nurturing Growth and Cultivating  <br>Excellence: <span> Agrishop's</span> Guiding <br>Principles  and Core Values</h1>
          <div class="backbtn">   
            <button class="shopnow">shop now </button>
            <button class="contactus">contact us </button>
          </div>
        </div>
        <div class="values">
          <div class="value">
            <img src="images/icon1.png" alt="">
            <h4>Transparency</h4>
            <p>We value transparency in all our interactions,<br>ensuring open communication with our <br>customers, partners, and stakeholders.</p>
          </div>

          <div class="value">
            <img src="images/icon2.png" alt="">
            <h4>Innovation</h4>
            <p>We embrace innovation and technology, continuously <br>seeking new ways to improve our platform and<br> meet the evolving needs of our users.</p>
          </div>

          <div class="value">
            <img src="images/icon3.png" alt="">
            <h4>Integrity</h4>
            <p> We uphold the highest standards of integrity and <br>ethical conduct, building trust and credibility in <br>all aspects of our business.
            </p>
          </div>

          <div class="value">
            <img src="images/icon4.png" alt="">
            <h4>Social Impact</h4>
            <p> Beyond business success, we are committed to making <br>a positive social impact by supporting local economies  <br>and promoting sustainable agriculture practices.</p>
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
                 const menuHamburger = document.querySelector(".hb")
        const navLinks = document.querySelector(".navlinks")
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('active')
        })</script>
    
</body>
</html>