<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>


  <!-- Cover -->
  <main>
<div class="image-container">
<img class = "slidepic" src="/images/merch_image.png" id = "pic3"/>
<img class = "slidepic" src="/images/matcha_tea_image.png" id = "pic2"/>
<img class = "slidepic" src="/images/hug_w_mug_image.png" id = "pic1"/>
</div>
    </div>
    <!-- Main -->
    <div class="wrapper">
            <h1>BESTSELLERS<h1>
            
      </div>



    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php

    getPro();

    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
    <!-- FOOTER -->
    <footer class="page-footer">

      <div class="footer-nav">
        <div class="container clearfix">

          <div class="footer-nav__col footer-nav__col--info">
            <div class="footer-nav__heading">Information</div>
            <ul class="footer-nav__list">
              <li class="footer-nav__item">
                <a href="" class="footer-nav__link">FAQ</a>
              </li>
              <li class="footer-nav__item">
                <a href="" class="footer-nav__link">Help</a>
              </li>
            </ul>
          </div>

          <div class="footer-nav__col footer-nav__col--account">
            <div class="footer-nav__heading">Your account</div>
            <ul class="footer-nav__list">
              <li class="footer-nav__item">
                <a href="checkout.php" class="footer-nav__link">Sign in</a>
              </li>
              <li class="footer-nav__item">
                <a href="customer_register.php" class="footer-nav__link">Register</a>
              </li>
              <li class="footer-nav__item">
                <a href="cart.php" class="footer-nav__link">View cart</a>
              </li>
            </ul>
          </div>


          <div class="footer-nav__col footer-nav__col--contacts">
            <div class="footer-nav__heading">Contact us!</div>
            <address class="address">
            1 UTSA Circle, San Antonio, TX 78249
          </address>
            <div class="phone">
              Phone Number:
              <a class="phone__number" href="tel:0123456789">0123-456-789</a>
            </div>
            <div class="email">
              Email:
              <a class="email__addr">kassie.garcia@my.utsa.edu</a>
            </div>
          </div>

        </div>
      </div>


        </div>
      </div>
    </footer>
</body>

</html>
