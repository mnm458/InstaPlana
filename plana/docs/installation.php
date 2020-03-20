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

     <link rel="icon" href="./assets/img/favicon.png" />
   </head>

   <body>

     <header class="site-header ">

   <!-- Top navbar & branding -->
   <nav class="navbar navbar-default navbar-light" style="box-shadow: none; border-bottom: 1px solid #f0f0f0;">
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

         <a class="navbar-brand" href="index.php"><img src="./assets/img/logo.png" alt="RankPost" /></a>
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

   </header>

     <main class="container">
       <div class="row">

         <!-- Sidebar -->
         <aside class="col-md-3 col-sm-3 sidebar">
    <ul class="sidenav dropable sticky">
   <li><a class="" href="index.php">Overview </a></li>
   <li><a class="active" href="installation.php">Installation </a></li>
   
   <li><a class="" href="scheduling.php">How to schedule </a></li>
   <li>
     <a class="has-child open" href="#">Integrations </a>

     <ul style="display: block">
     
       <li><a class="" href="paypal.php">PayPal </a></li>
       <li><a class="" href="stripe.php">Stripe </a></li>
    
     </ul>
   </li>
   <li><a class="" href="#" target="_blank">FAQ </a></li>
  
 </ul>        </aside>
         <!-- END Sidebar -->


         <!-- Main content -->
        <article class="col-md-9 col-sm-9 main-content" role="main">
          <section>
            <h2 id="installation"><a href="#">Installation</a></h2>
            <p>
              Installation process is very easy and you may finish all process 
              just in 2 minutes. Please read the following guide carefully.
            </p>

            <br>
            
            <ul class="step-text">
              <li>
                <h5>Upload archive</h5>
                <p>
                  Upload the downloaded zip archive which contains all necessary 
                  files of app to any directory in your web hosting.
                </p>
              </li>

              <li>
                <h5>Extract files</h5>
                <p>
                  Extract all files from archive file to the directory where your 
                  application will be installed. This directory might be  root directory of 
                  your domain (i.e. public_html or www) or any public accessible 
                  subdirectory of any domain.
                </p>

                <div class="text-gray">
                  Please note that some hosting providers don't allow to extract 
                  <code>.htaccess</code> files from zip archive. There are two <code>.htaccess</code> files in 
                  archive file. One of them in <code>root directory</code>, 
                  another in <code>/app</code> directory. Please make sure both of 
                  these files has been extracted.
                </div>
              </li>

              <li>
                <h5>Navigate to installation page</h5>

                <p>
                  Open your web browser and navigate to the directory you’ve 
                  selected in step 2. For example if you’ve extracted the 
                  application files to the root of your domain then you 
                  should navigate to the <strong>yourdomain.com</strong>. When you navigate to 
                  the right directory then page should be redirected to 
                  installation page.
                </p>
              </li>

              <li>
                <h5>Start Installation</h5>

                <p>
                  On installation page click Start Installation button. 
                  And check if you server is configured correctly to run 
                  the application. If everything is alright, then you should 
                  see Next button at the bottom of page. Click it!
                </p>
              </li>

              <li>
                <h5>Database and Account Details,</h5>

              

                <p>Then include your database credentials. And setup your main administrative account.</p>

                <div class="text-gray">
                  Please note that you'll not be able to change your database 
                  credentials from account. But you can always 
                  change your administrative account details
                </div>
              </li>

              <li>
                <h5>Finish Installation</h5>

                <p>
                  After filling form on step 5, click finish installation. 
                  If everything is ok, then you should see success 
                  message after few seconds.
                </p>
              </li>
            </ul>
          </section>

          <section>
            <h2 id="errors"><a href="#">Errors</a></h2>
            <p>
              During the installation process sometimes you might get an error. 
              Generally detailed description about the error should be displayed.
            </p>

            <p>
              If you're getting <code>Unexpected error occured!</code> then probably
              something is wrong with your server configuration. In this case,
              you should have a look at PHP error log for more information about the error.
            </p>
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
 