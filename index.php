<?php
/* This file is our homepage. It can be visited by clicking on our logo or just entering the website URL */
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
include("includes/search.php");
#include("includes/search_results.php");
?>
<div class="wrapper" style="position:relative; top:90px; right:70px; white-space:nowrap;">
	<h1>
		<b>Welcome to Hug with Mug!</b>
	</h1>
</div>

  <!-- slide show cover images -->
  <main>
<div class="image-container" style="position:relative; top:70px">
<img class = "slidepic" src="/images/merch_image.png" id = "pic3"/>
<img class = "slidepic" src="/images/matcha_tea_image.png" id = "pic2"/>
<img class = "slidepic" src="/images/hug_w_mug_image.png" id = "pic1"/>
</div>

    <div class="wrapper" style="position:relative; top:70px;">
	    <h1 style="font-size:2vw;">
		Happiness in a mug :)			
	    </h1>
	    <p style="font-size:1.3vw;"> We sell the best coffee and tea available to bring a smile on your face. Need a mug? Want a shirt related to coffee or tea? We got that too!  </p>
	</div>
            

</div>
    </div>
    <!-- Main -->
    <div class="wrapper" style="position:relative; top:40px;">
            <h1 style="font-size:3vw;">BESTSELLERS<h1>
            
      </div>



    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php
/* in the functions/functions.php, run getPro() which gets 8 products to display on our home page */
    getPro();

    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
<?php /* FOOTER */
include("includes/footer.php");
?>
</body>

</html>
