<?php


?>

<!--  /*|||||||||||||||| slider |||||||||||||||||||||*/-->

      <div id="">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <!--<li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>-->

      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
<!--
        <div class="item height-of-slider active">
       <img src="/themes/sushinabe/img/slider3.jpg" alt="#" class="img-responsive" >
          <div class="hero">
           <hgroup>

            <p>Celebrate with all you can eat sushi.  Happy Holidays!</p>
                <h1> <strong> Christmas</strong>  Sushi Buffet</h1>
    <h3>December 20<sup>th</sup>, 21<sup>st</sup>, and 22<sup>nd</sup> of 2016</h3>
            </hgroup>

          </div>
        </div>
-->
<!--
            <div class="item height-of-slider">
       <img src="/themes/sushinabe/img/christmas-wine.jpg" alt="#" class="img-responsive" >
          <div class="hero">
           <hgroup>
               <p>Sushi Nabe Presents</p>
               <h1><strong>The Wine</strong>  Flights</h1>
               <h3>A sampler of Pinot Noirs</h3>
            </hgroup>

          </div>
        </div>
-->
<!--
            <div class="item height-of-slider">
       <img src="/themes/sushinabe/img/holiday_table_final.jpg" alt="#" class="img-responsive" >
          <div class="hero">
           <hgroup>

            <p>Stop by the restaurant to purchase a giftcard for your special someone today.
    </p>
                <h1> <strong> Eat</strong>  Happy This Holiday Season</h1>
               <h3> Give the Gift of Sushi! </h3>
            </hgroup>

          </div>
        </div>
-->
        <div class="item height-of-slider">
         <img src="/themes/sushinabe/img/slider_image.jpg" alt="#" class="img-responsive" >
         <div class="hero">
            <hgroup>
               <p>Every Tuesday, Wednesday, and Thursday</p>
               <h1> <strong><?= date("F") ?></strong> Dine-in Special</h1>
               <h3> 50% Off Select Sushi Rolls</h3>
            </hgroup>

          </div>
        </div>
    
        <div class="item height-of-slider">
         <img src="/themes/sushinabe/img/slider2.jpg" alt="#" class="img-responsive" >
         <div class="hero">
            <hgroup>
              <p>Earn discounts and rewards with your membership everytime you dine with us</p>
              <h1> <strong>Join</strong>Our Chopsticks Club</h1>
              <h3>What is your number?</h3>
            </hgroup>

          </div>
        </div>

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

      </div>


    <!--/*|||||||||||||||||||||||contact info ||||||||||||||*/-->
      <section id="contactinfo">
      <div class="container">
      <div class="row">
      <div class="col-md-6 col-xs-12 col-lg-4 col-sm-6 text-center sub-contact-one ">
       <img src="/themes/sushinabe/img/header - phone.png"  alt="" class="img-responsive"/>
         <div  class="sub-contact-two" ><p>+1.423.634.0171</p>
        <p style="font-family: 'open_sansbold' !important;"><a href="mailto:eathappy@sushinabe.com">eathappy@sushinabe.com</a></p></div></div>

       <div class="col-md-6 col-xs-12 col-lg-4 col-sm-6 text-center sub-contact-one ">
        <img src="/themes/sushinabe/img/header - location.png"  alt="" class="img-responsive"/>
      <div  class="sub-contact-two"  ><p>110 River Street</p>

    <p> Chattanooga, TN 37405</p></div>
      </div>
        <div class="col-md-6 col-xs-12 col-lg-4 col-sm-6 text-center sub-contact-one ">
        <img src="/themes/sushinabe/img/header - time.png"  alt="" class="img-responsive"/>
    <div class="sub-contact-two" >

<?php
    $days = array(
        'Sunday' => array('status' => 'Open', 'hours' => '12:00pm-9:00pm'),
        'Monday' => array('status' => 'Closed', 'hours' => NULL),
        //'Monday' => array('status' => 'Open', 'hours' => '4:00pm-9:00pm'),
        'Tuesday' => array('status' => 'Open', 'hours' => '11:30am-2:30pm and 5:00pm-9:30pm'),
        'Wednesday' => array('status' => 'Open', 'hours' => '11:30am-2:30pm and 5:00pm-9:30pm'),
        'Thursday' => array('status' => 'Open', 'hours' => '11:30am-2:30pm and 5:00pm-9:30pm'),
        'Friday' => array('status' => 'Open', 'hours' => '11:30am-2:30pm and 5:00pm-9:30pm'),
        'Saturday' => array('status' => 'Open', 'hours' => '12:00pm-10:00pm'),
        //'Sunday' => array('status' => 'Closed', 'hours' => NULL),
        //'Monday' => array('status' => 'Closed', 'hours' => NULL),
        //'Tuesday' => array('status' => 'Closed', 'hours' => NULL),
        //'Wednesday' => array('status' => 'Closed', 'hours' => NULL),
        //'Thursday' => array('status' => 'Closed', 'hours' => NULL),
        //'Friday' => array('status' => 'Closed', 'hours' => NULL),
        //'Saturday' => array('status' => 'Closed', 'hours' => NULL),
    );
$today = date("l");
if($days[$today]['status'] == 'Closed') {
    echo '<p style="font-family: \'open_sansbold\' !important;">Closed Today</p>';
}else{
    echo '<p style="font-family: \'open_sansbold\' !important;">Open Today</p>';
    echo '<p>' . $days[$today]['hours'] . '</p>';
}

      ?>
    </div>

                                                               </div>
                                                               <!--<div class="col-md-6 col-xs-12 col-lg-3 col-sm-6 text-center margin-23">
                                                               <a href="#reservations" class="page-scroll">Make Reservations</a>
                                                               </div>-->
                                                               </div>
                                                               </div>

                                                               </section>


    <!--||||||||||||||||||||ABOUT US |||||||||||||||||-->
    <!--                                                         <section id="about">
                                                             <div class="container">
                                                             <div class="row">

                                                             <div class="col-md-7 col-xs-12 col-md-offset-1 for-center">
                                                             <h1>ABOUT US</h1>
                                                             <p>Yasushi Watanabe has been making sushi for over 25 years. He was born in Tokyo, Japan and came to the U.S. in 1981 to work at a Japanese restaurant in Washington D.C. After 5 years there, he moved to Florida and worked at another restaurant for 5 years.</p>

                                                             <p>He always dreamed of opening his own restaurant, and in 1991, he came to Chattanooga and opened Sushi Nabe at its original location at Lee Highway and Shallowford Road. Nabe-san enjoyed many years of success there, but in 2004 he wanted to be part of the Chattanooga downtown revival, and moved to the current location in Coolidge Park.</p>

                                                             <p>Chikako Watanabe, Nabe-san's wife, has always been an integral part of the restaurant's operation. She's behind the scenes, behind the bar, and always working hard to keep Nabe-san on the right path. She also works hard raising the couple's two children, Emi and Taizo. Sushi Nabe is truly a family operation, and we welcome families to bring their children to enjoy the true cuisine of Japan. We look forward to hosting you at Sushi Nabe!</p>

                                                             </div>
                                                             <div class="col-md-3 col-xs-12">
                                                             <div class="col-md-12 col-xs-6 padding-20">
                                                               <img src="/themes/sushinabe/img/about 1.jpg" alt="" class="img-responsive mt-30"/> </div>

                                                             </div>
                                                             </div>
                                                             </section>-->


                                                                   <!--|||||||||||||||||||| MENU |||||||||||||||||-->
                                                             <section id="menu">
                                                             <div class="container">
                                                             <div class="row">

                                                             <div class="col-sm-12 for-center">

                                             <div class="row">
                                               <div class="col-sm-10 col-sm-offset-1">
                                                                 <h1>Menu</h1>
                                               </div>
                                             </div>
                                             <div class="row">
                                               <div class="col-sm-10 col-sm-offset-1">

<div class="row">
                                               <div class="col-sm-4">
                                                 <a href="/themes/sushinabe/menu/Appetizer.pdf" class="btn btn-block" target="_blank">Appetizer</a>
                                               </div>
                                               <div class="col-sm-4">
                                                 <a href="/themes/sushinabe/menu/Lunch.pdf" class="btn btn-block" target="_blank">Lunch</a>
                                               </div>
                                               <div class="col-sm-4">
                                                 <a href="/themes/sushinabe/menu/Dinner.pdf" class="btn btn-block" target="_blank">Dinner</a>
                                               </div>
                                               <div class="col-sm-4">
                                                 <a href="/themes/sushinabe/menu/Sushi.pdf" class="btn btn-block" target="_blank">Sushi</a>
                                               </div>
                                               <div class="col-sm-4">
                                                 <a href="/themes/sushinabe/menu/Dessert.pdf" class="btn btn-block" target="_blank">Dessert</a>
                                               </div>
                                               <div class="col-sm-4">
                                                 <a href="/themes/sushinabe/menu/Special.pdf" class="btn btn-block" target="_blank">Specials</a>
                                               </div>
                                             </div>

    
                                               </div>
                                             </div>
    
                                                             </div>

                                                             </section>

    

                                                             <!--||||||||||||||||||||||||gallery section ||||||||||||||||-->
                                                             <section id="gallery">
                                                             <div class="container">
                                                             <div class="row">

                                                             <div class="col-md-6 col-xs-12 sub-gallery">
                                                               <img src="/themes/sushinabe/img/garden_roll.jpg" class="img-responsive" alt=""/> </div>
                                                             <div class="col-md-6 col-xs-12">
                                                             <div class="col-md-6 col-xs-6">
                                                               <img src="/themes/sushinabe/img/gallery2.jpg" class="img-responsive" alt=""/> </div>
                                                             <div class="col-md-6 col-xs-6">
                                                               <img src="/themes/sushinabe/img/tomato_with_a_hat.jpg" class="img-responsive" alt=""/> </div>
                                                             <div class="col-md-12 padding-30">
                                                             <img src="/themes/sushinabe/img/gallery4.jpg" class="img-responsive" alt=""/> </div>
                                                             </div>

                                                             </div>
                                                             </div>

                                                             </section>


                                                                 <!--|||||||||||||||||||||||| prefooter ||||||||||||||||-->
                                                             <div class="FooterTop" id="reservations">
                                                             <div class="container">
                                                             <div class="row">
                                                             <div class="col-sm-12">
                                                             <h3><span>Dining</span> Reservations</h3>
                                                             <div class="GMap">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3265.7957317600385!2d-85.31036558554146!3d35.06184577129947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88605e5c28a8607b%3A0xbad272848d26bf68!2sSushi+Nabe!5e0!3m2!1sen!2sin!4v1466595503734" width="600" height="350" frameborder="0" style="border:0;" allowfullscreen></iframe>
                                                                             </div>
                                                                         </div>


                                                                         <!--<div class="col-md-5">
                                                             <h3>&nbsp;</h3
                                                             <div class="ConForm">


Online reservations coming soon.

                                                             
                                                                             </div>
                                                                         </div>-->
                                                                     </div>
                                                                 </div>
                                                             </div>