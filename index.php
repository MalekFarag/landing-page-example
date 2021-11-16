<?php
// require_once 'load.php';

// $ip = $_SERVER['REMOTE_ADDR'];
// $message = '';
// if (isset($_GET['id'])) {
//   $id = $_GET['id'];
//   $tbl = 'tbl_digital_landing';
//   $col = 'id';
//   $getProd = getSingleProd($tbl, $col, $id);
// }



    if(isset($_POST['submit'])){
        $name = trim($_POST['customerName']);
        $company = trim($_POST['customerCompany']);
        $email = trim($_POST['customerEmail']);
        $phone = trim($_POST['customerPhone']);

        

        

        // $interests = array();
        

        if(!empty($name) || !empty($email)){
            //Log user in
                // $message = sendMessage($name, $company, $email, $phone, $body, $interests);
                
                //formating phone number
                    // Allow only Digits, remove all other characters.
                    $number = preg_replace("/[^\d]/","",$phone);
                    // get number length.
                    $length = strlen($number);
                    // if number = 10
                    if($length == 10) {
                        $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone);
                    }else{
                      $number='0';
                    }
                    $phone2 = $number;

    
                    //mail config
                        ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        $from = 'contact@revesolutions.ca';
                        $to = 'contact@revesolutions.ca';
                        $subject = "Inquiry From $company | Reve Business Solutions";
                        $message = "

The client has filled out the form in the landing page;
                        
The following message was sent by $name 
Email: $email
Phone number: $phone2
                          




Email is formatted by Reve Business Solutions. Powered by Titan.
";
                        $headers = 'From:'.$from;
                        mail($to,$subject,$message,$headers);
                
                
                        header('Location: https://meetings.hubspot.com/reveseo/step-by-step-business-growth-plan');
        }else{
            $message = "<span class='errmsg'>Please fill out the required fields</span>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reve Solutions - B2B Digital Marketing</title>

  <link rel="stylesheet" href="sass/style.css" type="text/css">

  <link rel="shortcut icon" href="../favicon.svg" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">


  
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js"></script>
  

  <!-- <script src="https://unpkg.com/vue"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script> 
</head>
<body>
  <main id="app">
  <div v-bind:class="[isLightbox ? '' : 'show']" class="lightbox">
      <div @click='closeLightbox()' class="x">x</div>
      <div class='image' :style=" 'background-image:' + this.thumbnail + ';' " alt="reve business soluions thumbnail"></div>
      <div class="desc">{{this.desc}}</div>
      <div @click='closeLightbox()' class="background"></div>
    </div>
    <h1 class="hidden">Reve Business Solutions London ON Ontario - Digital Marketing, Commercial Photography & Web Development</h1>

    <div class="landHeader">
      <div class='logoDiv'><div class="logo" style="background-image: url('images/reve-logo.png');"></div><span>Digital Advertising</span></div>
      <div class="quoteBox scroll" id='landForm'>
        <span>Get Your Free Consultation</span>
      </div>
    </div>

    <div class="content landingPage">

    <div class="landHero" style="background-image: url('images/landing/bg/car.jpg');">
      <h1>Start a <br><span class='bold'>Digital Marketing </span><br>Campaign With Reve</h1>


      <h3>Get <span class='bold'>More Clients</span> Today</h3>


      <div class="points">
        <div class="point">
        <i class="fas fa-street-view"></i>
          <span>Target Ideal Clients</span>
        </div>
        <div class="point">
          <i class="fas fa-chart-line"></i>
          <span>Results in 1-2 Weeks</span>
        </div>
        <div class="point">
          <i class="fab fa-canadian-maple-leaf"></i>
          <span>Based in London, ON</span>
        </div>
      </div>


      <div class="scrollNow scroll" id='workList'>
        <span>Learn more</span>
        <i class="fas fa-chevron-down"></i>
      </div>
      
    
    </div>
    



    <div class="landForm" id='xlandForm'>
      <h2>Get a Free <br>15 Minute Consultation</h2>

      <form action="index.php" method='POST'>
        <div class="inputArea">
          <label for="Name">Name</label>
          <input type="text" name="customerName" id="Name" required>

          <label for="Company">Company</label>
          <input type="text" name="customerCompany" id="Company">

          <label for="Email">Email</label>
          <input type="email" name="customerEmail" id="Email" required>

          <label for="Phone">Phone</label>
          <input type="phone" name="customerPhone" id="Phone">
        </div>

        <span>You won't be added to an annoying mailing list by inquiring with us</span>


        <button name="submit" class='startButton' id='landForm'>Get Started</button>
      </form>
    </div>
    <div class="waypoint"></div>

      <div class="information workList" id='xworkList'>
        <h2>Digital Marketing... <br><span>How Does it Work?</span></h2>

        <div class="work">
          <div class="text">
            <h5>We Analyse Your Business</h5>
            <p>We sit down 1-on-1 with you and your team and learn about your business and its goals</p>
          </div>
          <div class="img" style="background-image: url('images/landing/analyse.png');"></div>
        </div>

        <div class="work">
          <div class="img" style="background-image: url('images/landing/create.png');"></div>
          <div class="text right">
            <h5>Create Ads Based On Your Services</h5>
            <p>Using data gathered from our business analysis, we create ads that best suits you and your demographic</p>
          </div>
          
        </div>

        <div class="work">
          
          <div class="text">
            <h5>Target Audiences Using Online User Data</h5>
            <p>We target ultra specific audiences and work within your budget for the best ROI</p>
          </div>
          <div class="img" style="background-image: url('images/landing/target.png');"></div>
        </div>
      
        <button class="startButton scroll" id='landForm'>Get Started</button>
      </div>
      
      <div class="quoteSection">
        <h2>Our Happy Customers</h2>

        <div class="quoteSlide">
          <div class="quoteDiv">
             <p class='quote q1'>
              “We recently had a social media ad created by Reve Solutions. They were professional, motivated, and we got a very good response from the ad! These guys are highly recommended!”
              </p>

              <span class="customer q1">Junaid. M</span>
              <span class="position q1">Sales Manager at London Prime Auto</span>
          </div>
          <div class="quoteDiv">
             <p class='quote q2'>
              “Thank you so much for your amazing work, Reve helped me build my online infrastructure and saved me from the thousands i was spending on unnecessary web work from other companies.”
              </p>

              <span class="customer q2">Aj. A</span>
              <span class="position q2">Sales Manager at Pest Control Center</span>
          </div>
          <div class="quoteDiv">
             <p class='quote q3'>
              “Reve has done great work for me and my coworkers. Quick turnaround time, fantastic customer service, and most importantly high quality work.”
              </p>

              <span class="customer q3">Sam. V</span>
              <span class="position q3">Audio Engineer at VB Studios</span>
          </div>

          <div class="quoteDiv">
             <p class='quote q4'>
              “My ecommerce website is amazing! People now take my brand seriously and my sales have gone up since I've connected with Malek and Emannuel!”
              </p>

              <span class="customer q4">Chase. M</span>
              <span class="position q4">Sales Manager at Exotic Gardens</span>
          </div>

          <div class="quoteDiv">
             <p class='quote q5'>
              “Reve did a great animated commercial for my business. The new ad has attracted so many more sellers and has helped me buy more houses to rent and flip.”
              </p>

              <span class="customer q5">Mousa. S</span>
              <span class="position q5">Founder at Mozes Properties</span>
          </div>
        </div>
      </div>

      <div class="resultsDiv brandsDiv">
        <h2>Companies We Work With</h2>

        <div class="brandList">
          <div class="listSlide">

                <div class="img" style="background-image: url('images/brands/lp-logo.png');"></div>

                <div class="img" style="background-image: url('images/brands/vb-logo2.svg');"></div>
                <div class="img" style="background-image: url('images/brands/mozes-logo.svg');"></div>
                <div class="img" style="background-image: url('images/brands/country-nerd-logo.svg');"></div>
                <div class="img" style="background-image: url('../images/brands/pcc.svg');"></div>
                <div class="img" style="background-image: url('images/brands/br-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/cc-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/diamond-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/eg-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/os-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/ps-logo.png');"></div>

                <div class="img" style="background-image: url('images/brands/lp-logo.png');"></div>
               
                <div class="img" style="background-image: url('images/brands/vb-logo2.svg');"></div>
                <div class="img" style="background-image: url('images/brands/mozes-logo.svg');"></div>
                <div class="img" style="background-image: url('images/brands/country-nerd-logo.svg');"></div>
                <div class="img" style="background-image: url('../images/brands/pcc.svg');"></div>
                <div class="img" style="background-image: url('images/brands/br-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/cc-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/diamond-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/eg-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/os-logo.png');"></div>
                <div class="img" style="background-image: url('images/brands/ps-logo.png');"></div>
          </div>
        </div>
      </div>

      <div class="waypoint2"></div>

      <div class="information resultsDiv">
        <h2>Our Proven Results<br><span>Using a $39 Budget on Google Ads</span></h2>
        <div class="results">
          <div class="result">
            <div class="info">
              <div class="underline"><span class='counter' data-target='2134'>0</span>+</div>
              <h5>Average Daily Impressions</h5>
            </div>
            

            <div class="img" style="background-image: url('images/landing/bar-chart.svg');"></div>
          </div>

          <div class="result r2">
            <div class="info">
            <div class="underline"><span class='counter' data-target='732'>0</span>+</div>
              <h5>Website Clicks Per Month From Unique Visitors</h5>
            </div>
            

            <div class="img" style="background-image: url('images/landing/click.svg');"></div>
          </div>

          <div class="result r3">
            <div class="info">
              <div class="underline"><span class='counter' data-target='5'>0</span> billion+</div>
              <h5>Available Users to Serve Ads To</h5>
            </div>
            

            <div class="img" style="background-image: url('images/landing/customer.svg');"></div>
          </div>
        </div>

        <div class="largeImg"></div>
      
        <!-- <button class="startButton scroll" id='landForm'>Get Started</button> -->
      </div>


      <div class="consultDiv" style="background-image: url('images/landing/background.jpg');" id='xConsultServe'>
        <h2>Start a <span class='bold'>Digital Marketing Campaign</span> for Your Business Today</h2>

        <div class="info">
        <i class="fas fa-check-circle"></i>
          <p><span class='bold'>Get Your Free Quote</span> and Experience Why Businesses Love <span class='bold'>Reve Digital Advertising</span></p>
        </div>
        <div class="img"  style="background-image: url('images/reve-logo.png');"></div>
        <h3>We Grow Businesses.</h3>
        <p>Get <span class='bold'>More Clients</span> Today</p>

        

        <h4>Get Your Free Quote Now</h4>
        <button class="startButton scroll" id='landForm'>Get Started</button>
      </div>

      

      <div class="aboutDiv">
        <div class="reveDiv">
          <div class="img" style="background-image: url('images/reve-logo.png'); top: 20px;"></div>
          <span>Serving Local Businesses</span>
        </div>

        <div class="missionDiv">
          <i class="fab fa-canadian-maple-leaf"></i>
          <p>We love seeing Canadian businesses thrive in our growing economy. Reve is dedicated to bringing your business goals and visions to life. We do everything from digital advertising, photography and developing web apps. <br><span class='bold'>Welcome to Reve.</span></p>
          
        </div>
      </div>


      <div class="mapDiv">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2921.1530597794917!2d-81.20728788423894!3d42.932900006724445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882ef3752825233b%3A0x9f195bd743a60d77!2s213%20Consortium%20Ct%2C%20London%2C%20ON%20N6E%202S8!5e0!3m2!1sen!2sca!4v1601771289394!5m2!1sen!2sca" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="infoDiv">
          <h6>Reve Solutions</h6>
          <span>213 Consortium Ct. London, ON</span>
          <a href="mailto:contact@revesolutions.ca">contact@revesolutions.ca</a>
          <a href="tel:+15198085147">519-808-5147</a>
        </div>
      </div>

      <div class="divLine"></div>

      <h2 class='lastH'>Are You Ready To Grow Your Business?</h2>

      <div class="startButton scroll lastBut" id='landForm'>Get Started</div>
    </div>
    <!-- <footer class="mainFooter" style="margin-top: 0;"> 
        <div class="footCon">
            <nav class="footerNav">
                <ul>
                    <li><a href="/">Home</a></router-link></li>
                    <li><a href="/ourwork.php">Our Work</a></li>
                    <li><a href="/about.php">About Us</a></li>
                    <li><a href="/contact.php">Contact</a></li>
                </ul>
            </nav>

            <nav class="footerNav">
                <ul class="serviceList">
                    <li><a href="/advertising.php">Advertising</a></li>
                    
                    <li><a href="/photography.php">Photography</a></li>
                    <li><a href="/webdevelopment.php">Web Development</a></li>
                                
                </ul>
            </nav>

            <nav class="socialNav">
                <ul>
                    <li><a href="https://www.facebook.com/reveseo" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/revesolutionca/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/revesolutions/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCXhvNgv-hRWTeU2moBdqZvQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </nav>
            
        </div>
            <span class="copyright">Reve Business Solutions&copy; All rights reserved.</span>
        
        </footer> -->
    </main>
    
	<script type="module" src="js/main.js"></script>
</body>
</html>
