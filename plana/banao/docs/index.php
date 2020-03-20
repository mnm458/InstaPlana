<!DOCTYPE html>
 <html lang="en">
  
 <head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <meta name="description" content="" />
     <meta name="keywords" content="" />

        <title>RankPost - A Wiser Way To Schedule And Auto Post on Instagram</title>

     <!-- Styles -->
     <link href="./assets/css/plugins.css" rel="stylesheet" />

     <!-- Fonts -->
     <link href='https://fonts.googleapis.com/css?family=Raleway:100,300,400,500%7CLato:300,400' rel='stylesheet' type='text/css' />
     <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css' />

     <link rel="icon" href="./assets/img/favicon.png" />
   </head>

   <body>

     <header class="site-header navbar-fullwidth navbar-transparent">

   <!-- Top navbar & branding -->
   <nav class="navbar navbar-default navbar-transparent" style="">
     <div class="container">

      
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
           <span class="glyphicon glyphicon-option-vertical"></span>
         </button>

         <button type="button" class="navbar-toggle for-sidebar" data-toggle="offcanvas">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>

         <a class="navbar-brand" href="index.php"><img src="./assets/img/logo-white.png" alt="RankPost" /></a>
       </div>

      
       <div id="navbar" class="navbar-collapse collapse" aria-expanded="true" role="banner">
         <ul class="nav navbar-nav navbar-right">
           <li><a href="#"><strong>FAQ </strong></a></li>
           <li><a href="#" target="_blank"><strong>ISSUES </strong></a></li>
           <li class="hero"><a href="#">Purchase </a></li>
         </ul>
       </div>
     </div>
   </nav>
   <!-- END Top navbar & branding -->

         <!-- Banner -->
       <div class="banner banner-lg" style="background: #fe9400;
background: -moz-linear-gradient(-45deg, #fe9400 0%, #86269b 100%);
background: -webkit-gradient(left top, right bottom, color-stop(0%, #fe9400), color-stop(100%, #86269b));
background: -webkit-linear-gradient(-45deg, #fe9400 0%, #86269b 100%);
background: -o-linear-gradient(-45deg, #fe9400 0%, #86269b 100%);
background: -ms-linear-gradient(-45deg, #fe9400 0%, #86269b 100%);
background: linear-gradient(135deg, #fe9400 0%, #86269b 100%);
 color: #fff;  background-position: center; background-repeat: no-repeat; background-size: auto; background-attachment: scroll;">
         <div class="container text-center">
           <h1><strong>A</strong><strong> Wiser Way <br />To  </strong> <strong>Schedule </strong> <strong>And AutoPost On Instagram</strong></h1>
           <h5 style="line-height: 1.5;">Save time managing your Instagram accounts, publish and 
<br />analyze all your posts in one panel.  </h5>
           <br /><br /><br /><br />
           <p><a class="btn btn-round btn-white btn-outline" href="#overview" role="button"> Get Started  </a></p>
         </div>

         <ul class="social-icons">
           <li><a href="https://www.facebook.com/RankSol?ref=hl" target="_blank"><i class="fa fa-facebook"></i></a></li>
           <li><a href="https://twitter.com/ranksol" target="_blank"><i class="fa fa-twitter"></i></a></li>
         </ul>
       </div>
       <!-- END Banner -->
   </header>

     <main class="container">
       <div class="row">

         <!-- Sidebar -->
         <aside class="col-md-3 col-sm-3 sidebar">
           <ul class="sidenav dropable sticky">
   <li><a class="active" href="index.php">Overview </a></li>
   <li><a class="" href="installation.php">Installation </a></li>
 
   <li><a class="" href="scheduling.php">How to schedule </a></li>
   <li>
     <a class="has-child open" href="#">Integrations </a>

     <ul style="display: block">
     
       <li><a class="" href="paypal.php">PayPal </a></li>
       <li><a class="" href="stripe.php">Stripe </a></li>
    
     </ul>
   </li>
   <li><a class="" href="#" target="_blank">FAQ </a></li>
  
 </ul>         </aside>
         <!-- END Sidebar -->


         <!-- Main content -->
         <article class="col-md-9 col-sm-9 main-content" role="main">
          
           <header>
             <h1 id="overview">Overview </h1>
             <p>
               <strong>RankPost </strong> is an Instagram auto posting web application that allows you to auto post, schedule and manage your Instagram accounts at the same time. Here you can find all necessary information from step-by- step installation guide to third party API integrations.
             </p>
            
             <ol class="toc">
               <li><a href="features.php">Features </a></li>
               <li><a href="#requirements">Requirements </a></li>
             </ol>
           </header>

           <section>
             <h2 id="features"><a href="features.php">Features </a> </h2>
             <p>RankPost has many useful and unique features. Please have a look at our item description page for more details. </p>
           </section>


        <section>
            <h2 id="requirements"><a href="#">Requirements</a></h2>
            <p>Your server must match following requirements to run the app properly</p>

            <table class="table table-bordered table-striped table-info">
              <tbody>
                <tr>
                  <td>PHP version</td>
                  <td>Minimum required PHP version for this app is 5.6.0. So your server should run PHP 5.6.0+</td>
                </tr>

                <tr>
                  <td>allow_url_fopen</td>
                  <td>Value of allow_url_fopen setting in your php.ini file must be <strong>On</strong>. <br><code>allow_url_fopen=On</code></td>
                </tr>

                <tr>
                  <td>cURL</td>
                  <td>PHP cURL extension must be installed and enabled. Minimum required cURL version is 7.19.4</td>
                </tr>

                <tr>
                  <td>OpenSSL</td>
                  <td>PHP OpenSSL extension must be installed and enabled. This is required for secure data encryption. OpenSSL version must be 1.0.1c or above. <br> <span class="text-warning"><strong>Outdated OpenSSL extension might cause several issues.</strong></span></td>
                </tr>

                <tr>
                  <td>PDO</td>
                  <td>PHP PDO extension is required to create secure connection to MySQL server.</td>
                </tr>

                <tr>
                  <td>GD</td>
                  <td>PHP GD extension must be installed and enabled. Required for image processing.</td>
                </tr>

                <tr>
                  <td>EXIF</td>
                  <td>PHP EXIF extension must be installed and enabled. This is required for validating JPEG files before sending to Instagram's servers.</td>
                </tr>

                <tr>
                  <td>mbstring</td>
                  <td>PHP mbstring extension must be installed and enabled.</td>
                </tr>

                <tr>
                  <td>FFMPEG</td>
                  <td>FFMPEG extension is only required for video posts. It is not necessary for Photo or Story Photo post types.</td>
                </tr>

                <tr>
                  <td>FFPROBE</td>
                  <td>FFPROBE extension is required for video processing. In most cases it's being installed automatically when you install the FFMPEG extension.</td>
                </tr>
              </tbody>
            </table>

            <p class="text-gray">Please consider that some other php setting values might be required.</p>
          </section>
          
         </article>
         <!-- END Main content -->
       </div>
     </main>


     <!-- Footer -->
     <footer class="site-footer">
       <div class="container">
         <a id="scroll-up" href="#"><i class="fa fa-angle-up"></i></a>

   <div class="row">
           <div class="col-md-6 col-sm-6">
             <p>Copyright &copy; 2018. All Rights reserved </p>
           </div>
           <div class="col-md-6 col-sm-6">
             <ul class="footer-menu">
               <li><a href="#">Changelog </a></li>
               <li><a href="mailto:azhar@ranksol.com">Contact us </a></li>
             </ul>
           </div>
         </div>
       </div>
     </footer>
     <!-- END Footer -->

     <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92210897-3', 'auto');
  ga('send', 'pageview');

</script>     <script src="./assets/js/plugins.js"></script>
   </body>
 </html>
 